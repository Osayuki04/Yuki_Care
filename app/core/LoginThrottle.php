<?php
/**
 * LoginThrottle
 *
 * Brute-force protection. Failed sign-in attempts are counted per
 * (identifier, ip, scope); once the limit is reached the pair is locked out for
 * a cool-down period. Backed by the login_attempts table.
 */
class LoginThrottle
{
    private const MAX_ATTEMPTS = 5;
    private const LOCK_MINUTES = 15;

    /** Seconds of lockout remaining, or 0 if not locked. */
    public static function lockedFor(string $identifier, string $scope = 'patient'): int
    {
        $row = self::row($identifier, $scope);
        if (!$row || empty($row['locked_until'])) {
            return 0;
        }
        $remaining = strtotime($row['locked_until']) - time();
        return $remaining > 0 ? $remaining : 0;
    }

    public static function isLocked(string $identifier, string $scope = 'patient'): bool
    {
        return self::lockedFor($identifier, $scope) > 0;
    }

    /** Attempts still allowed before lockout (for user messaging). */
    public static function remaining(string $identifier, string $scope = 'patient'): int
    {
        $row = self::row($identifier, $scope);
        $used = $row ? (int) $row['attempts'] : 0;
        return max(0, self::MAX_ATTEMPTS - $used);
    }

    /** Record a failed attempt; locks the account when the limit is hit. */
    public static function recordFailure(string $identifier, string $scope = 'patient'): void
    {
        $ip = self::ip();
        $row = self::row($identifier, $scope);

        // Reset a stale counter once a previous lockout has fully elapsed.
        $attempts = ($row && (empty($row['locked_until']) || strtotime($row['locked_until']) > time()))
            ? (int) $row['attempts'] + 1
            : 1;

        $lockedUntil = $attempts >= self::MAX_ATTEMPTS
            ? date('Y-m-d H:i:s', time() + self::LOCK_MINUTES * 60)
            : null;

        Database::execute(
            "INSERT INTO login_attempts (identifier, ip, scope, attempts, locked_until)
             VALUES (?, ?, ?, ?, ?)
             ON DUPLICATE KEY UPDATE attempts = VALUES(attempts), locked_until = VALUES(locked_until)",
            [$identifier, $ip, $scope, $attempts, $lockedUntil]
        );
    }

    /** Clear the counter after a successful sign-in. */
    public static function clear(string $identifier, string $scope = 'patient'): void
    {
        Database::execute(
            "DELETE FROM login_attempts WHERE identifier = ? AND ip = ? AND scope = ?",
            [$identifier, self::ip(), $scope]
        );
    }

    private static function row(string $identifier, string $scope): ?array
    {
        return Database::first(
            "SELECT * FROM login_attempts WHERE identifier = ? AND ip = ? AND scope = ?",
            [$identifier, self::ip(), $scope]
        );
    }

    private static function ip(): string
    {
        return substr($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0', 0, 45);
    }
}
