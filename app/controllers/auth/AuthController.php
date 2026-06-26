<?php
class AuthController extends Controller
{
    /** Portal chooser — pick which area to sign in to (patient / staff / admin). */
    public function chooser(): void
    {
        $this->render('auth/choose', ['page_title' => 'Sign In'], null);
    }

    /** Show the admin login screen (redirect to dashboard if already in). */
    public function showLogin(): void
    {
        if (Auth::check()) {
            $this->redirect('admin/dashboard');
        }
        $this->render('auth/login', ['page_title' => 'Admin Login'], null);
    }

    /** Process the login form. */
    public function login(): void
    {
        if (!$this->isPost()) {
            $this->redirect('admin-login');
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $remember = isset($_POST['remember']);

        if ($username === '' || $password === '') {
            $_SESSION['login_error'] = 'Please enter both username and password.';
            $_SESSION['login_username'] = $username;
            $this->redirect('admin-login');
        }

        try {
            $admin = AdminUser::findActiveByUsername($username);

            if ($admin && password_verify($password, $admin['password_hash'])) {
                Auth::login($admin);
                AdminUser::touchLastLogin((int) $admin['ID']);

                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    setcookie('admin_remember', $token, time() + (30 * 24 * 60 * 60), '/', '', false, true);
                    AdminUser::setRememberToken((int) $admin['ID'], password_hash($token, PASSWORD_DEFAULT));
                }

                unset($_SESSION['login_username']);
                $this->redirect('admin/dashboard');
            }

            $_SESSION['login_error'] = 'Invalid username or password.';
            $_SESSION['login_username'] = $username;
            error_log('Failed login attempt for username: ' . $username . ' from IP: ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
            $this->redirect('admin-login');
        } catch (Throwable $e) {
            error_log('Login error: ' . $e->getMessage());
            $_SESSION['login_error'] = 'An error occurred during login. Please try again.';
            $_SESSION['login_username'] = $username;
            $this->redirect('admin-login');
        }
    }

    /** Log out and return to the login screen. */
    public function logout(): void
    {
        Auth::logout();
        if (isset($_COOKIE['admin_remember'])) {
            setcookie('admin_remember', '', time() - 3600, '/', '', false, true);
        }
        session_start();
        $_SESSION['login_success'] = 'You have been successfully logged out.';
        $this->redirect('admin-login');
    }
}
