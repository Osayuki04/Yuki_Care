<?php
/**
 * PortalController
 *
 * The authenticated patient portal: dashboard, profile & medical history,
 * appointments, prescriptions, lab results and billing. Every action is guarded
 * by PatientAuth and every state-changing request is CSRF-checked.
 */
class PortalController extends Controller
{
    /** Department list offered when booking from the portal. */
    private const DEPARTMENTS = [
        'Cardiology', 'Neurology', 'Pediatrics', 'Orthopaedics', 'Maternity',
        'Dermatology', 'Emergency', 'General Medicine',
    ];

    public function __construct()
    {
        PatientAuth::require();
    }

    // ---- Dashboard --------------------------------------------------------

    public function dashboard(): void
    {
        $patient = PatientAuth::user();
        if (empty($patient['onboarded'])) {
            $this->redirect('portal/onboarding');
        }
        $id = PatientAuth::id();

        $this->render('patient/dashboard', [
            'page_title'        => 'Dashboard',
            'patient'           => $patient,
            'upcomingCount'     => Appointment::upcomingCount($id),
            'activeRx'          => Prescription::activeCount($id),
            'pendingLabs'       => LabReport::pendingCount($id),
            'unpaidInvoices'    => Invoice::unpaidCount($id),
            'outstanding'       => Invoice::outstandingTotal($id),
            'nextAppointment'   => Appointment::next($id),
            'recentRx'          => array_slice(Prescription::forPatient($id), 0, 4),
            'recentInvoices'    => array_slice(Invoice::forPatient($id), 0, 4),
        ], 'patient');
    }

    // ---- Profile & medical history ----------------------------------------

    public function profile(): void
    {
        $this->render('patient/profile', [
            'page_title' => 'My Profile',
            'patient'    => PatientAuth::user(),
        ], 'patient');
    }

    /** Personal & contact details (its own form/card). */
    public function updateContact(): void
    {
        $this->guardPost('portal/profile');
        $s = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');
        Patient::updateContact(
            PatientAuth::id(),
            $s($_POST['contact'] ?? ''),
            $s($_POST['address'] ?? ''),
            $s($_POST['emergency_contact'] ?? '')
        );
        flash('portal_success', 'Contact details updated.');
        $this->redirect('portal/profile');
    }

    /** Insurance details (its own form/card). */
    public function updateInsurance(): void
    {
        $this->guardPost('portal/profile');
        $s = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');
        Patient::updateInsurance(
            PatientAuth::id(),
            $s($_POST['insurance_provider'] ?? ''),
            $s($_POST['insurance_number'] ?? '')
        );
        flash('portal_success', 'Insurance details updated.');
        $this->redirect('portal/profile');
    }

    /** Medical details (its own form/card). */
    public function updateMedical(): void
    {
        $this->guardPost('portal/profile');
        $s = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');
        Patient::updateMedical(
            PatientAuth::id(),
            $s($_POST['blood_group'] ?? ''),
            $s($_POST['allergies'] ?? '')
        );
        flash('portal_success', 'Medical information updated.');
        $this->redirect('portal/profile');
    }

    // ---- Onboarding (quick & skippable) -----------------------------------

    public function onboarding(): void
    {
        $patient = PatientAuth::user();
        if (!empty($patient['onboarded'])) {
            $this->redirect('portal/dashboard');
        }
        $this->render('patient/onboarding', [
            'page_title' => 'Welcome',
            'patient'    => $patient,
        ], null);
    }

    public function saveOnboarding(): void
    {
        if (!$this->isPost()) {
            $this->redirect('portal/onboarding');
        }
        Csrf::check();
        $s = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');
        Patient::saveOnboarding(
            PatientAuth::id(),
            $s($_POST['emergency_contact'] ?? ''),
            $s($_POST['blood_group'] ?? ''),
            $s($_POST['allergies'] ?? '')
        );
        flash('portal_success', "You're all set — welcome to Yibera!");
        $this->redirect('portal/dashboard');
    }

    public function skipOnboarding(): void
    {
        Patient::markOnboarded(PatientAuth::id());
        $this->redirect('portal/dashboard');
    }

    public function changePassword(): void
    {
        $this->guardPost('portal/profile');

        $patient = PatientAuth::user();
        $current = $_POST['current_password'] ?? '';
        $new     = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (empty($patient['password']) || !password_verify($current, $patient['password'])) {
            flash('portal_error', 'Your current password is incorrect.');
            $this->redirect('portal/profile');
        }

        $errors = PasswordPolicy::validate($new);
        if ($new !== $confirm) {
            $errors[] = 'New passwords do not match.';
        }
        if ($errors) {
            flash('portal_error', implode(' ', $errors));
            $this->redirect('portal/profile');
        }

        Patient::setPassword(PatientAuth::id(), password_hash($new, PASSWORD_DEFAULT, ['cost' => 12]));
        flash('portal_success', 'Your password has been changed.');
        $this->redirect('portal/profile');
    }

    /** Begin enabling 2FA: confirm the email works by sending a code first. */
    public function enableTwoFactor(): void
    {
        $this->guardPost('portal/profile');
        $patient = PatientAuth::user();
        PatientAuthController::issueOtp(PatientAuth::id(), $patient['Email'], 'enable_2fa');
        flash('portal_success', 'Enter the code we just emailed to turn on two-factor sign-in.');
        $this->redirect('portal/otp');
    }

    public function disableTwoFactor(): void
    {
        $this->guardPost('portal/profile');
        Patient::setTwoFactor(PatientAuth::id(), false);
        flash('portal_success', 'Two-factor sign-in has been turned off.');
        $this->redirect('portal/profile');
    }

    // ---- Appointments -----------------------------------------------------

    public function appointments(): void
    {
        $this->render('patient/appointments', [
            'page_title'   => 'My Appointments',
            'appointments' => Appointment::forPatient(PatientAuth::id()),
            'departments'  => self::DEPARTMENTS,
        ], 'patient');
    }

    public function storeAppointment(): void
    {
        $this->guardPost('portal/appointments');

        $s = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');
        $department = $s($_POST['department'] ?? '');
        $date       = $s($_POST['date'] ?? '');
        $time       = $s($_POST['time'] ?? '');
        $reason     = $s($_POST['reason'] ?? '');

        $errors = [];
        if (!in_array($department, self::DEPARTMENTS, true)) $errors[] = 'Please choose a valid department.';
        if ($date === '' || strtotime($date) < strtotime('today')) $errors[] = 'Please choose a future date.';

        if ($errors) {
            flash('portal_error', implode(' ', $errors));
            $this->redirect('portal/appointments');
        }

        Appointment::create([
            'patient_id'      => PatientAuth::id(),
            'Department'      => $department,
            'AppointmentDate' => $date,
            'AppointmentTime' => $time ?: null,
            'Reason'          => $reason,
            'Status'          => 'pending',
        ]);

        flash('portal_success', 'Your appointment request has been submitted.');
        $this->redirect('portal/appointments');
    }

    public function cancelAppointment(): void
    {
        $this->guardPost('portal/appointments');
        Appointment::cancel((int) ($_POST['id'] ?? 0), PatientAuth::id());
        flash('portal_success', 'Appointment cancelled.');
        $this->redirect('portal/appointments');
    }

    public function rescheduleAppointment(): void
    {
        $this->guardPost('portal/appointments');

        $id   = (int) ($_POST['id'] ?? 0);
        $date = trim($_POST['date'] ?? '');
        $time = trim($_POST['time'] ?? '');

        if ($date === '' || strtotime($date) < strtotime('today')) {
            flash('portal_error', 'Please choose a valid future date.');
            $this->redirect('portal/appointments');
        }

        Appointment::reschedule($id, PatientAuth::id(), $date, $time ?: null);
        flash('portal_success', 'Appointment rescheduled — pending re-confirmation.');
        $this->redirect('portal/appointments');
    }

    // ---- EMR: prescriptions & lab results ---------------------------------

    public function prescriptions(): void
    {
        $this->render('patient/prescriptions', [
            'page_title'    => 'My Prescriptions',
            'prescriptions' => Prescription::forPatient(PatientAuth::id()),
        ], 'patient');
    }

    public function labResults(): void
    {
        $this->render('patient/lab-results', [
            'page_title' => 'Lab Results',
            'reports'    => LabReport::forPatient(PatientAuth::id()),
        ], 'patient');
    }

    // ---- Billing ----------------------------------------------------------

    public function invoices(): void
    {
        $id = PatientAuth::id();
        $this->render('patient/invoices', [
            'page_title'  => 'Billing & Payments',
            'invoices'    => Invoice::forPatient($id),
            'outstanding' => Invoice::outstandingTotal($id),
        ], 'patient');
    }

    public function payInvoice(): void
    {
        $this->guardPost('portal/invoices');
        Invoice::markPaid((int) ($_POST['id'] ?? 0), PatientAuth::id());
        flash('portal_success', 'Payment recorded. Thank you!');
        $this->redirect('portal/invoices');
    }

    // ---- Helpers ----------------------------------------------------------

    /** Require POST + a valid CSRF token, else bounce back to $back. */
    private function guardPost(string $back): void
    {
        if (!$this->isPost()) {
            $this->redirect($back);
        }
        Csrf::check();
    }
}
