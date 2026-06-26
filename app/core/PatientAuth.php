<?php
/**
 * PatientAuth
 *
 * Session guard for the patient portal. Kept in its own session namespace
 * (patient_*) so it never collides with the admin guard (Auth). Enforces an
 * idle timeout and an absolute session lifetime, and regenerates the session id
 * on login to defend against fixation.
 */
class PatientAuth
{
    private const IDLE_TIMEOUT     = 1800;   // 30 minutes of inactivity
    private const ABSOLUTE_TIMEOUT = 28800;  // 8 hours total

    /** Is a patient currently logged in (and within the allowed session window)? */
    public static function check(): bool
    {
        if (!isset($_SESSION['patient_id'])) {
            return false;
        }
        if (self::expired()) {
            self::logout();
            return false;
        }
        $_SESSION['patient_last_activity'] = time();
        return true;
    }

    /** Establish a fresh, authenticated patient session. */
    public static function login(array $patient): void
    {
        // Defend against session fixation.
        session_regenerate_id(true);

        $_SESSION['patient_id']            = (int) $patient['ID'];
        $_SESSION['patient_name']          = Patient::fullName($patient);
        $_SESSION['patient_email']         = $patient['Email'];
        $_SESSION['patient_login_time']    = time();
        $_SESSION['patient_last_activity'] = time();
    }

    public static function id(): int
    {
        return (int) ($_SESSION['patient_id'] ?? 0);
    }

    public static function name(): string
    {
        return $_SESSION['patient_name'] ?? 'Patient';
    }

    public static function email(): string
    {
        return $_SESSION['patient_email'] ?? '';
    }

    /** The currently authenticated patient record, or null. */
    public static function user(): ?array
    {
        return self::check() ? Patient::find(self::id()) : null;
    }

    /** Redirect to the portal login when not authenticated. */
    public static function require(): void
    {
        if (!self::check()) {
            $_SESSION['portal_intended'] = $_GET['page'] ?? 'portal/dashboard';
            flash('portal_error', 'Please sign in to access your patient portal.');
            redirect('portal/login');
        }
    }

    /** Clear only the patient-portal keys (leaves any admin session intact). */
    public static function logout(): void
    {
        foreach (array_keys($_SESSION) as $key) {
            if (str_starts_with($key, 'patient_')) {
                unset($_SESSION[$key]);
            }
        }
    }

    private static function expired(): bool
    {
        $now      = time();
        $idle     = $now - ($_SESSION['patient_last_activity'] ?? $now);
        $lifetime = $now - ($_SESSION['patient_login_time'] ?? $now);

        return $idle > self::IDLE_TIMEOUT || $lifetime > self::ABSOLUTE_TIMEOUT;
    }
}
