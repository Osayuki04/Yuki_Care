<?php
/**
 * StaffAuthController
 *
 * Staff portal authentication — sign-in only. Staff accounts are created
 * exclusively by an administrator (admin/staff/register), so there is no
 * public registration here. Reuses the shared security primitives: brute-force
 * throttling, CSRF, hardened sessions and constant-time password checks.
 */
class StaffAuthController extends Controller
{
    public function showLogin(): void
    {
        if (StaffAuth::check()) {
            $this->redirect('staff/dashboard');
        }
        $this->render('staff/auth/login', ['page_title' => 'Staff Login'], null);
    }

    public function login(): void
    {
        if (!$this->isPost()) {
            $this->redirect('staff/login');
        }
        Csrf::check();

        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($locked = LoginThrottle::lockedFor($email, 'staff')) {
            flash('staff_error', 'Too many attempts. Try again in ' . ceil($locked / 60) . ' minute(s).');
            $this->redirect('staff/login');
        }

        if ($email === '' || $password === '') {
            flash('staff_error', 'Please enter your email and password.');
            $this->redirect('staff/login');
        }

        $staff = Staff::findByEmail($email);

        if (!$staff || empty($staff['password']) || !password_verify($password, $staff['password'])) {
            LoginThrottle::recordFailure($email, 'staff');
            $left = LoginThrottle::remaining($email, 'staff');
            flash('staff_error', 'Invalid email or password.' . ($left > 0 && $left <= 3 ? " $left attempt(s) left." : ''));
            $_SESSION['staff_old_email'] = $email;
            $this->redirect('staff/login');
        }

        // Only active staff may sign in.
        if (($staff['Status'] ?? 'active') !== 'active') {
            flash('staff_error', 'Your account is not active. Please contact the administrator.');
            $this->redirect('staff/login');
        }

        LoginThrottle::clear($email, 'staff');
        if (password_needs_rehash($staff['password'], PASSWORD_DEFAULT, ['cost' => 12])) {
            Staff::setPassword((int) $staff['ID'], password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]));
        }

        StaffAuth::login($staff);
        Staff::touchLastLogin((int) $staff['ID']);

        $intended = $_SESSION['staff_intended'] ?? 'staff/dashboard';
        unset($_SESSION['staff_intended'], $_SESSION['staff_old_email']);
        $this->redirect($intended);
    }

    public function logout(): void
    {
        StaffAuth::logout();
        flash('staff_success', 'You have been signed out.');
        $this->redirect('staff/login');
    }
}
