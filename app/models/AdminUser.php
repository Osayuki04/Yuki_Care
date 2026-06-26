<?php
/**
 * AdminUser model — admin_users table.
 */
class AdminUser
{
    public static function findActiveByUsername(string $username): ?array
    {
        return Database::first(
            "SELECT * FROM admin_users WHERE username = ? AND status = 'active'",
            [$username]
        );
    }

    public static function find(int $id): ?array
    {
        return Database::first("SELECT * FROM admin_users WHERE ID = ?", [$id]);
    }

    public static function touchLastLogin(int $id): void
    {
        Database::execute("UPDATE admin_users SET last_login = NOW() WHERE ID = ?", [$id]);
    }

    public static function setRememberToken(int $id, string $hashedToken): void
    {
        Database::execute("UPDATE admin_users SET remember_token = ? WHERE ID = ?", [$hashedToken, $id]);
    }

    public static function updateProfile(int $id, string $fullName, string $email): void
    {
        Database::execute(
            "UPDATE admin_users SET full_name = ?, email = ? WHERE ID = ?",
            [$fullName, $email, $id]
        );
    }

    public static function updatePassword(int $id, string $passwordHash): void
    {
        Database::execute(
            "UPDATE admin_users SET password_hash = ? WHERE ID = ?",
            [$passwordHash, $id]
        );
    }
}
