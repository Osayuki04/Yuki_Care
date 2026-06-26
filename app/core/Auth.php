<?php
/**
 * Auth
 *
 * Small helper around the admin session. The application only has one type of
 * authenticated user (admins), so the session keys are kept consistent here.
 */
class Auth
{
    /** Is an admin currently logged in? */
    public static function check(): bool
    {
        return isset($_SESSION['admin_id']);
    }

    /** Log the given admin record into the session. */
    public static function login(array $admin): void
    {
        $_SESSION['admin_id']       = $admin['ID'];
        $_SESSION['admin_username'] = $admin['username'];
        $_SESSION['admin_name']     = $admin['full_name'];
        $_SESSION['admin_email']    = $admin['email'];
        $_SESSION['admin_role']     = $admin['role'];
        $_SESSION['login_time']     = time();
    }

    /** Current admin's display name. */
    public static function name(): string
    {
        return $_SESSION['admin_name'] ?? 'Administrator';
    }

    public static function role(): string
    {
        return $_SESSION['admin_role'] ?? 'admin';
    }

    public static function email(): string
    {
        return $_SESSION['admin_email'] ?? '';
    }

    /** Redirect to the login screen if not authenticated. */
    public static function requireAdmin(): void
    {
        if (!self::check()) {
            redirect('admin-login');
        }
    }

    /** Clear the session and destroy it. */
    public static function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        session_destroy();
    }
}
