<?php
/**
 * PatientAuthController
 *
 * Secure patient-portal authentication:
 *   1. Email + password  (constant-time verify, brute-force throttling)
 *   2. Email OTP 2FA      (one-time code, hashed, expiring, attempt-limited)
 *
 * The same OTP machinery powers account activation / password reset, so a
 * patient who booked without a password can verify ownership of their email
 * and set a strong one.
 */
class PatientAuthController extends Controller
{
    private const OTP_TTL         = 600;  // 10 minutes
    private const OTP_MAX_TRIES   = 5;

    // ---- Step 1: password -------------------------------------------------

    public function showLogin(): void
    {
        if (PatientAuth::check()) {
            $this->redirect('portal/dashboard');
        }
        $this->render('patient/auth/login', ['page_title' => 'Patient Login'], null);
    }

    public function login(): void
    {
        if (!$this->isPost()) {
            $this->redirect('portal/login');
        }
        Csrf::check();

        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($locked = LoginThrottle::lockedFor($email)) {
            flash('portal_error', 'Too many attempts. Try again in ' . ceil($locked / 60) . ' minute(s).');
            $this->redirect('portal/login');
        }

        if ($email === '' || $password === '') {
            flash('portal_error', 'Please enter your email and password.');
            $this->redirect('portal/login');
        }

        $patient = Patient::findByEmail($email);

        // No account, or account has no portal password set yet.
        if (!$patient || empty($patient['password']) || !password_verify($password, $patient['password'])) {
            LoginThrottle::recordFailure($email);
            $left = LoginThrottle::remaining($email);
            flash('portal_error', 'Invalid email or password.' . ($left > 0 && $left <= 3 ? " $left attempt(s) left." : ''));
            $_SESSION['portal_old_email'] = $email;
            $this->redirect('portal/login');
        }

        // Password is correct — clear the throttle and transparently upgrade weak hashes.
        LoginThrottle::clear($email);
        if (password_needs_rehash($patient['password'], PASSWORD_DEFAULT, ['cost' => 12])) {
            Patient::setPassword((int) $patient['ID'], password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]));
        }

        // Two-factor is opt-in: only challenge for a code when the patient enabled it.
        if (!empty($patient['twofa_enabled'])) {
            self::issueOtp((int) $patient['ID'], $patient['Email'], 'login');
            $this->redirect('portal/otp');
        }

        $this->completeLogin($patient);
    }

    // ---- Self-service registration ---------------------------------------

    public function showRegister(): void
    {
        if (PatientAuth::check()) {
            $this->redirect('portal/dashboard');
        }
        $old = $_SESSION['portal_register_old'] ?? [];
        unset($_SESSION['portal_register_old']);
        $this->render('patient/auth/register', [
            'page_title' => 'Create Account',
            'old'        => $old,
            'error'      => flash('portal_error'),
        ], null);
    }

    public function register(): void
    {
        if (!$this->isPost()) {
            $this->redirect('portal/register');
        }
        Csrf::check();

        $s = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');
        $input = [
            'first_name'    => $s($_POST['first_name'] ?? ''),
            'last_name'     => $s($_POST['last_name'] ?? ''),
            'email'         => $s($_POST['email'] ?? ''),
            'phone'         => $s($_POST['phone'] ?? ''),
            'date_of_birth' => $s($_POST['date_of_birth'] ?? ''),
            'gender'        => $s($_POST['gender'] ?? ''),
        ];
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';

        $errors = [];
        if ($input['first_name'] === '') $errors[] = 'First name is required.';
        if ($input['last_name'] === '')  $errors[] = 'Last name is required.';
        if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
        if (!preg_match('/^\+?\d[\d\s-]{6,19}$/', $input['phone'])) $errors[] = 'A valid phone number is required.';
        if ($input['date_of_birth'] === '' || strtotime($input['date_of_birth']) >= strtotime('today')) {
            $errors[] = 'A valid date of birth is required.';
        }
        if (!in_array($input['gender'], ['male', 'female', 'other'], true)) $errors[] = 'Please select your gender.';
        if (empty($_POST['terms'])) $errors[] = 'Please accept the terms to continue.';
        if ($password !== $confirm) $errors[] = 'Passwords do not match.';
        $errors = array_merge($errors, PasswordPolicy::validate($password));

        if (!$errors && Patient::emailExists($input['email'])) {
            $errors[] = 'An account with this email already exists. Try signing in instead.';
        }

        if ($errors) {
            flash('portal_error', implode(' ', $errors));
            unset($input['email']); // keep everything except re-displaying nothing sensitive
            $_SESSION['portal_register_old'] = array_merge($input, ['email' => $s($_POST['email'] ?? '')]);
            $this->redirect('portal/register');
        }

        $age = date_diff(date_create($input['date_of_birth']), date_create('today'))->y;

        $patientId = Patient::create([
            'FirstName'        => $input['first_name'],
            'MiddleName'       => '',
            'Surname'          => $input['last_name'],
            'Email'            => $input['email'],
            'Contact'          => $input['phone'],
            'DateOfBirth'      => $input['date_of_birth'],
            'Gender'           => $input['gender'],
            'EmergencyContact' => '',
            'Address'          => '',
            'PreferredDate'    => null,
            'Notes'            => null,
            'AGE'              => $age,
            'password'         => password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]),
            'Status'           => 'pending',
        ]);

        // Sign the new patient straight in. Two-factor stays off until they opt in
        // from their profile.
        $patient = Patient::find($patientId);
        PatientAuth::login($patient);
        Patient::touchLastLogin($patientId);
        flash('portal_success', 'Welcome to Yibera! Your account is ready. You can enable two-factor sign-in anytime from your profile.');
        $this->redirect('portal/dashboard');
    }

    // ---- Step 2: OTP 2FA --------------------------------------------------

    public function showOtp(): void
    {
        if (empty($_SESSION['otp_patient_id'])) {
            $this->redirect('portal/login');
        }
        $this->render('patient/auth/otp', [
            'page_title' => 'Verify Code',
            'maskedEmail' => $this->maskEmail($_SESSION['otp_email'] ?? ''),
            'purpose'     => $_SESSION['otp_purpose'] ?? 'login',
        ], null);
    }

    public function verifyOtp(): void
    {
        if (!$this->isPost()) {
            $this->redirect('portal/otp');
        }
        Csrf::check();

        $patientId = (int) ($_SESSION['otp_patient_id'] ?? 0);
        $purpose   = $_SESSION['otp_purpose'] ?? 'login';
        $code      = preg_replace('/\D/', '', $_POST['code'] ?? '');

        if (!$patientId) {
            $this->redirect('portal/login');
        }

        $patient = Patient::find($patientId);
        if (!$patient || empty($patient['otp_hash'])) {
            flash('portal_error', 'Your code has expired. Please start again.');
            $this->clearOtpSession();
            $this->redirect('portal/login');
        }

        if (strtotime($patient['otp_expires_at']) < time()) {
            Patient::clearOtp($patientId);
            flash('portal_error', 'Your code has expired. Please request a new one.');
            $this->redirect('portal/login');
        }

        if ((int) $patient['otp_attempts'] >= self::OTP_MAX_TRIES) {
            Patient::clearOtp($patientId);
            $this->clearOtpSession();
            flash('portal_error', 'Too many incorrect codes. Please sign in again.');
            $this->redirect('portal/login');
        }

        if (!password_verify($code, $patient['otp_hash'])) {
            Patient::incrementOtpAttempts($patientId);
            flash('portal_error', 'Incorrect code. Please check and try again.');
            $this->redirect('portal/otp');
        }

        // Code is valid — consume it.
        Patient::clearOtp($patientId);

        if ($purpose === 'reset') {
            // Mark the email as proven so a new password may be set.
            $_SESSION['reset_verified_id'] = $patientId;
            $this->clearOtpSession();
            $this->redirect('portal/set-password');
        }

        if ($purpose === 'enable_2fa') {
            // Email confirmed — safe to switch two-factor on without risking lockout.
            Patient::setTwoFactor($patientId, true);
            $this->clearOtpSession();
            flash('portal_success', 'Two-factor sign-in is now enabled.');
            $this->redirect('portal/profile');
        }

        // Normal login.
        $this->completeLogin($patient);
    }

    public function resendOtp(): void
    {
        $patientId = (int) ($_SESSION['otp_patient_id'] ?? 0);
        $email     = $_SESSION['otp_email'] ?? '';
        $purpose   = $_SESSION['otp_purpose'] ?? 'login';
        if (!$patientId) {
            $this->redirect('portal/login');
        }
        $this->issueOtp($patientId, $email, $purpose);
        flash('portal_success', 'A new verification code has been sent to your email.');
        $this->redirect('portal/otp');
    }

    // ---- Activation / password reset (email-verified) ---------------------

    public function showActivate(): void
    {
        $this->render('patient/auth/activate', ['page_title' => 'Activate / Reset'], null);
    }

    public function sendActivation(): void
    {
        if (!$this->isPost()) {
            $this->redirect('portal/activate');
        }
        Csrf::check();

        $email = trim($_POST['email'] ?? '');
        $patient = $email !== '' ? Patient::findByEmail($email) : null;

        // Always show the same message so we don't reveal which emails exist.
        if ($patient) {
            $this->issueOtp((int) $patient['ID'], $patient['Email'], 'reset');
            $this->redirect('portal/otp');
        }

        flash('portal_success', 'If that email is registered, a verification code has been sent.');
        $this->redirect('portal/activate');
    }

    public function showSetPassword(): void
    {
        if (empty($_SESSION['reset_verified_id'])) {
            $this->redirect('portal/activate');
        }
        $this->render('patient/auth/set-password', ['page_title' => 'Set Password'], null);
    }

    public function setPassword(): void
    {
        if (!$this->isPost()) {
            $this->redirect('portal/set-password');
        }
        Csrf::check();

        $patientId = (int) ($_SESSION['reset_verified_id'] ?? 0);
        if (!$patientId) {
            $this->redirect('portal/activate');
        }

        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';

        $errors = PasswordPolicy::validate($password);
        if ($password !== $confirm) {
            $errors[] = 'Passwords do not match.';
        }
        if ($errors) {
            flash('portal_error', implode(' ', $errors));
            $this->redirect('portal/set-password');
        }

        Patient::setPassword($patientId, password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]));
        unset($_SESSION['reset_verified_id']);

        $patient = Patient::find($patientId);
        PatientAuth::login($patient);
        Patient::touchLastLogin($patientId);
        flash('portal_success', 'Your password has been set. Welcome to your portal!');
        $this->redirect('portal/dashboard');
    }

    // ---- Logout -----------------------------------------------------------

    public function logout(): void
    {
        PatientAuth::logout();
        flash('portal_success', 'You have been signed out.');
        $this->redirect('portal/login');
    }

    // ---- Helpers ----------------------------------------------------------

    /** Finalise an authenticated session and send the patient to their destination. */
    private function completeLogin(array $patient): void
    {
        PatientAuth::login($patient);
        Patient::touchLastLogin((int) $patient['ID']);
        $intended = $_SESSION['portal_intended'] ?? 'portal/dashboard';
        $this->clearOtpSession();
        unset($_SESSION['portal_intended']);
        $this->redirect($intended);
    }

    /** Generate, store (hashed) and email a one-time code. */
    public static function issueOtp(int $patientId, string $email, string $purpose): void
    {
        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        Patient::setOtp($patientId, password_hash($code, PASSWORD_DEFAULT), self::OTP_TTL);

        $_SESSION['otp_patient_id'] = $patientId;
        $_SESSION['otp_email']      = $email;
        $_SESSION['otp_purpose']    = $purpose;

        $minutes = (int) (self::OTP_TTL / 60);
        Mailer::send(
            $email,
            'Your Yibera verification code',
            "<p>Your verification code is:</p>"
            . "<p style='font-size:24px;font-weight:bold;letter-spacing:4px'>$code</p>"
            . "<p>It expires in $minutes minutes. If you didn't request this, you can ignore this email.</p>"
        );
    }

    private function clearOtpSession(): void
    {
        unset($_SESSION['otp_patient_id'], $_SESSION['otp_email'], $_SESSION['otp_purpose']);
    }

    private function maskEmail(string $email): string
    {
        if (!str_contains($email, '@')) {
            return $email;
        }
        [$user, $domain] = explode('@', $email, 2);
        $masked = strlen($user) <= 2 ? $user[0] . '*' : $user[0] . str_repeat('*', max(1, strlen($user) - 2)) . substr($user, -1);
        return $masked . '@' . $domain;
    }
}
