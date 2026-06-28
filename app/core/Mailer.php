<?php
/**
 * Mailer
 *
 * Sends mail via SMTP when configured (config/mail.php), otherwise falls back to
 * PHP mail(), and in all cases writes a copy to storage/mail.log so OTP codes
 * stay retrievable during local development.
 *
 * The SMTP client is intentionally dependency-free (raw sockets) so it works on
 * shared hosting without Composer/PHPMailer. It supports STARTTLS (port 587) and
 * implicit SSL (port 465) with AUTH LOGIN.
 */
class Mailer
{
    public static function send(string $to, string $subject, string $body): bool
    {
        $cfg  = self::config();
        $smtp = $cfg['smtp'] ?? [];
        $sent = false;
        $how  = 'log-only';

        if (!empty($smtp['enabled']) && !empty($smtp['host'])) {
            try {
                $sent = self::sendViaSmtp($to, $subject, $body, $cfg);
                $how  = 'smtp';
            } catch (Throwable $e) {
                error_log('SMTP send failed: ' . $e->getMessage());
                $how = 'smtp-failed';
            }
        } elseif (function_exists('mail')) {
            $headers = implode("\r\n", [
                'MIME-Version: 1.0',
                'Content-type: text/html; charset=UTF-8',
                'From: ' . self::fromHeader($cfg),
            ]);
            $sent = @mail($to, $subject, $body, $headers);
            $how  = 'mail()';
        }

        self::log($to, $subject, $body, $sent, $how);

        return $sent;
    }

    // ---- SMTP ------------------------------------------------------------

    private static function sendViaSmtp(string $to, string $subject, string $body, array $cfg): bool
    {
        $smtp       = $cfg['smtp'];
        $host       = $smtp['host'];
        $port       = (int) ($smtp['port'] ?? 587);
        $enc        = strtolower((string) ($smtp['encryption'] ?? 'tls'));
        $timeout    = (int) ($smtp['timeout'] ?? 15);
        $user       = (string) ($smtp['username'] ?? '');
        $pass       = (string) ($smtp['password'] ?? '');
        $from       = $cfg['from'] ?? 'no-reply@yibera.local';

        $transport = ($enc === 'ssl') ? "ssl://{$host}" : $host;

        $fp = @stream_socket_client(
            "{$transport}:{$port}",
            $errno,
            $errstr,
            $timeout,
            STREAM_CLIENT_CONNECT
        );
        if (!$fp) {
            throw new RuntimeException("Could not connect to {$host}:{$port} ({$errstr})");
        }
        stream_set_timeout($fp, $timeout);

        $read = function () use ($fp): string {
            $data = '';
            while (($line = fgets($fp, 515)) !== false) {
                $data .= $line;
                // A space in the 4th column marks the final line of a reply.
                if (isset($line[3]) && $line[3] === ' ') {
                    break;
                }
            }
            return $data;
        };
        $cmd = function (string $command, array $expect) use ($fp, $read): string {
            fwrite($fp, $command . "\r\n");
            $resp = $read();
            $code = (int) substr($resp, 0, 3);
            if (!in_array($code, $expect, true)) {
                throw new RuntimeException("SMTP error after '" . explode("\r", $command)[0] . "': {$resp}");
            }
            return $resp;
        };

        $read(); // server greeting (220)
        $ehloHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $cmd("EHLO {$ehloHost}", [250]);

        if ($enc === 'tls') {
            $cmd('STARTTLS', [220]);
            if (!stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                throw new RuntimeException('Failed to enable TLS');
            }
            $cmd("EHLO {$ehloHost}", [250]);
        }

        if ($user !== '') {
            $cmd('AUTH LOGIN', [334]);
            $cmd(base64_encode($user), [334]);
            $cmd(base64_encode($pass), [235]);
        }

        $cmd('MAIL FROM:<' . self::addr($from) . '>', [250]);
        $cmd('RCPT TO:<' . self::addr($to) . '>', [250, 251]);
        $cmd('DATA', [354]);

        $message = self::buildMessage($to, $subject, $body, $cfg);
        // End-of-data marker. (Body is dot-stuffed in buildMessage.)
        fwrite($fp, $message . "\r\n.\r\n");
        $resp = $read();
        if ((int) substr($resp, 0, 3) !== 250) {
            throw new RuntimeException("Message not accepted: {$resp}");
        }

        $cmd('QUIT', [221]);
        fclose($fp);

        return true;
    }

    private static function buildMessage(string $to, string $subject, string $body, array $cfg): string
    {
        $headers = [
            'Date: ' . date('r'),
            'From: ' . self::fromHeader($cfg),
            'To: <' . self::addr($to) . '>',
            'Subject: ' . $subject,
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8',
            'Content-Transfer-Encoding: 8bit',
        ];

        // Normalise to CRLF and dot-stuff lines that begin with a dot.
        $body = preg_replace("/\r\n|\r|\n/", "\r\n", $body);
        $body = preg_replace('/^\./m', '..', $body);

        return implode("\r\n", $headers) . "\r\n\r\n" . $body;
    }

    private static function fromHeader(array $cfg): string
    {
        $name = $cfg['from_name'] ?? 'Yibera';
        $from = self::addr($cfg['from'] ?? 'no-reply@yibera.local');
        return sprintf('%s <%s>', $name, $from);
    }

    /** Extract a bare email address from a "Name <email>" or "email" string. */
    private static function addr(string $value): string
    {
        if (preg_match('/<([^>]+)>/', $value, $m)) {
            return trim($m[1]);
        }
        return trim($value);
    }

    // ---- Config + logging -------------------------------------------------

    private static function config(): array
    {
        static $cfg = null;
        if ($cfg !== null) {
            return $cfg;
        }
        $path = BASE_PATH . '/config/mail.php';
        if (is_file($path)) {
            return $cfg = require $path;
        }
        // No config on this environment yet — log instead of sending.
        return $cfg = ['smtp' => ['enabled' => false], 'from' => 'no-reply@yibera.local', 'from_name' => 'Yibera'];
    }

    private static function log(string $to, string $subject, string $body, bool $sent, string $how): void
    {
        $dir = BASE_PATH . '/storage';
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        $entry = sprintf(
            "[%s] sent=%s via=%s to=%s subject=%s\n%s\n%s\n",
            date('Y-m-d H:i:s'),
            $sent ? 'yes' : 'no',
            $how,
            $to,
            $subject,
            strip_tags($body),
            str_repeat('-', 60)
        );
        @file_put_contents($dir . '/mail.log', $entry, FILE_APPEND);
    }
}
