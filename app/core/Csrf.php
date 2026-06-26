<?php
/**
 * Csrf
 *
 * Synchroniser-token CSRF protection. A per-session secret token is embedded
 * in every state-changing form and validated on submission with a constant-time
 * comparison.
 */
class Csrf
{
    private const KEY = '_csrf_token';

    /** Return the current token, creating one for the session if needed. */
    public static function token(): string
    {
        if (empty($_SESSION[self::KEY])) {
            $_SESSION[self::KEY] = bin2hex(random_bytes(32));
        }
        return $_SESSION[self::KEY];
    }

    /** Hidden input markup to drop inside a <form>. */
    public static function field(): string
    {
        return '<input type="hidden" name="' . self::KEY . '" value="' . self::token() . '">';
    }

    /** True when the submitted token matches the session token. */
    public static function verify(?string $token): bool
    {
        return !empty($_SESSION[self::KEY])
            && is_string($token)
            && hash_equals($_SESSION[self::KEY], $token);
    }

    /** Validate the token on the current POST request, aborting with 403 on failure. */
    public static function check(): void
    {
        if (!self::verify($_POST[self::KEY] ?? null)) {
            http_response_code(403);
            exit('Invalid or expired security token. Please go back and try again.');
        }
    }
}
