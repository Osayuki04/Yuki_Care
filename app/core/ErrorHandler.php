<?php
/**
 * ErrorHandler
 *
 * App-wide safety net. Catches uncaught exceptions and fatal errors, logs the
 * full details server-side, and renders a friendly error page instead of a
 * stack trace. In production (APP_DEBUG = false) nothing sensitive is shown.
 */
class ErrorHandler
{
    private static bool $rendered = false;

    public static function register(): void
    {
        set_exception_handler([self::class, 'handleException']);
        register_shutdown_function([self::class, 'handleShutdown']);
    }

    public static function handleException(Throwable $e): void
    {
        self::log($e);
        self::render($e);
    }

    /** Catches fatal errors (parse/compile/out-of-memory) that bypass try/catch. */
    public static function handleShutdown(): void
    {
        $err = error_get_last();
        $fatal = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR];
        if ($err && in_array($err['type'], $fatal, true)) {
            $e = new ErrorException($err['message'], 0, $err['type'], $err['file'], $err['line']);
            self::log($e);
            self::render($e);
        }
    }

    private static function log(Throwable $e): void
    {
        $line = sprintf(
            "[%s] %s: %s in %s:%d | %s %s | IP %s\n%s\n%s\n",
            date('Y-m-d H:i:s'),
            get_class($e),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $_SERVER['REQUEST_METHOD'] ?? 'CLI',
            $_SERVER['REQUEST_URI'] ?? '',
            $_SERVER['REMOTE_ADDR'] ?? '-',
            $e->getTraceAsString(),
            str_repeat('-', 70)
        );

        error_log($line);                                    // PHP's configured log
        $dir = (defined('BASE_PATH') ? BASE_PATH : __DIR__ . '/../..') . '/storage';
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        @file_put_contents($dir . '/error.log', $line, FILE_APPEND | LOCK_EX);
    }

    private static function render(Throwable $e): void
    {
        if (self::$rendered) {
            return;
        }
        self::$rendered = true;

        // Drop any half-rendered output so the user sees a clean page.
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        if (!headers_sent()) {
            http_response_code(500);
        }

        $debug = defined('APP_DEBUG') && APP_DEBUG;
        $view  = (defined('BASE_PATH') ? BASE_PATH : __DIR__ . '/../..') . '/app/views/errors/500.php';

        if (is_file($view)) {
            (function () use ($view, $debug, $e) {
                require $view;
            })();
        } else {
            echo $debug
                ? '<pre>' . htmlspecialchars((string) $e, ENT_QUOTES) . '</pre>'
                : 'Something went wrong. Please try again later.';
        }
        exit;
    }
}
