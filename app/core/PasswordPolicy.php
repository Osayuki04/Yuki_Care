<?php
/**
 * PasswordPolicy
 *
 * Enforces a strong password standard for portal accounts: minimum length plus
 * upper-case, lower-case, digit and symbol, and rejection of obviously weak
 * choices.
 */
class PasswordPolicy
{
    public const MIN_LENGTH = 8;

    /** A small block-list of the most common weak passwords. */
    private const COMMON = [
        'password', 'password1', 'password123', '12345678', '123456789',
        'qwerty', 'qwerty123', 'abc123', 'admin123', 'iloveyou', 'welcome',
        'letmein', 'monkey', 'football', 'changeme', 'passw0rd',
    ];

    /**
     * Validate a password, returning a list of human-readable problems
     * (empty list = the password is acceptable).
     */
    public static function validate(string $password): array
    {
        $errors = [];

        if (strlen($password) < self::MIN_LENGTH) {
            $errors[] = 'Password must be at least ' . self::MIN_LENGTH . ' characters long.';
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'Password must contain an upper-case letter.';
        }
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = 'Password must contain a lower-case letter.';
        }
        if (!preg_match('/\d/', $password)) {
            $errors[] = 'Password must contain a number.';
        }
        if (!preg_match('/[^A-Za-z0-9]/', $password)) {
            $errors[] = 'Password must contain a symbol (e.g. ! @ # $).';
        }
        if (in_array(strtolower($password), self::COMMON, true)) {
            $errors[] = 'That password is too common. Please choose a stronger one.';
        }

        return $errors;
    }

    public static function passes(string $password): bool
    {
        return self::validate($password) === [];
    }
}
