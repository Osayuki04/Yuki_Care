<?php
/**
 * StaffAuth
 *
 * Session guard for the staff portal. Lives in its own session namespace
 * (staff_*) so it never collides with the admin guard (Auth) or the patient
 * guard (PatientAuth). Mirrors PatientAuth's session hardening: id regeneration
 * on login plus idle and absolute timeouts.
 */
class StaffAuth
{
    private const IDLE_TIMEOUT     = 1800;   // 30 minutes of inactivity
    private const ABSOLUTE_TIMEOUT = 28800;  // 8 hours total

    public static function check(): bool
    {
        if (!isset($_SESSION['staff_id'])) {
            return false;
        }
        if (self::expired()) {
            self::logout();
            return false;
        }
        $_SESSION['staff_last_activity'] = time();
        return true;
    }

    public static function login(array $staff): void
    {
        session_regenerate_id(true);

        $_SESSION['staff_id']            = (int) $staff['ID'];
        $_SESSION['staff_name']          = Staff::fullName($staff);
        $_SESSION['staff_email']         = $staff['Email'];
        $_SESSION['staff_department']    = $staff['Department'] ?? '';
        $_SESSION['staff_role']          = $staff['StaffCategory'] ?? 'Staff';
        $_SESSION['staff_login_time']    = time();
        $_SESSION['staff_last_activity'] = time();
    }

    public static function id(): int
    {
        return (int) ($_SESSION['staff_id'] ?? 0);
    }

    public static function name(): string
    {
        return $_SESSION['staff_name'] ?? 'Staff';
    }

    public static function email(): string
    {
        return $_SESSION['staff_email'] ?? '';
    }

    public static function department(): string
    {
        return $_SESSION['staff_department'] ?? '';
    }

    public static function role(): string
    {
        return $_SESSION['staff_role'] ?? 'Staff';
    }

    /** The currently authenticated staff record, or null. */
    public static function user(): ?array
    {
        return self::check() ? Staff::find(self::id()) : null;
    }

    public static function require(): void
    {
        if (!self::check()) {
            $_SESSION['staff_intended'] = $_GET['page'] ?? 'staff/dashboard';
            flash('staff_error', 'Please sign in to access the staff portal.');
            redirect('staff/login');
        }
    }

    /** Clear only the staff-portal keys (leaves admin/patient sessions intact). */
    public static function logout(): void
    {
        foreach (array_keys($_SESSION) as $key) {
            if (str_starts_with($key, 'staff_')) {
                unset($_SESSION[$key]);
            }
        }
    }

    private static function expired(): bool
    {
        $now      = time();
        $idle     = $now - ($_SESSION['staff_last_activity'] ?? $now);
        $lifetime = $now - ($_SESSION['staff_login_time'] ?? $now);

        return $idle > self::IDLE_TIMEOUT || $lifetime > self::ABSOLUTE_TIMEOUT;
    }
}
