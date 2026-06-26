<?php
/**
 * StaffPortalController
 *
 * The authenticated staff area. Login-only for now: a dashboard overview and a
 * read-only profile. Clinical features (prescriptions, lab requests, schedules)
 * are intended as follow-ups.
 */
class StaffPortalController extends Controller
{
    public function __construct()
    {
        StaffAuth::require();
    }

    public function dashboard(): void
    {
        $staff = StaffAuth::user();
        if (empty($staff['onboarded'])) {
            $this->redirect('staff/onboarding');
        }
        $this->render('staff/dashboard', [
            'page_title'        => 'Dashboard',
            'staff'             => $staff,
            'totalPatients'     => Patient::count(),
            'appointmentsToday' => Appointment::countToday(),
            'pendingRequests'   => Appointment::countPending(),
            'totalStaff'        => Staff::count(),
            'recentPatients'    => Patient::recent(6),
            'upcoming'          => Appointment::upcoming(6),
        ], 'staff');
    }

    public function profile(): void
    {
        $this->render('staff/profile', [
            'page_title' => 'My Profile',
            'staff'      => StaffAuth::user(),
        ], 'staff');
    }

    // ---- Onboarding (no re-asking admin-entered data) ---------------------

    public function onboarding(): void
    {
        $staff = StaffAuth::user();
        if (!empty($staff['onboarded'])) {
            $this->redirect('staff/dashboard');
        }
        $this->render('staff/onboarding', [
            'page_title' => 'Welcome',
            'staff'      => $staff,
        ], null);
    }

    /** Optionally set a personal password, then finish onboarding. */
    public function saveOnboarding(): void
    {
        if (!$this->isPost()) {
            $this->redirect('staff/onboarding');
        }
        Csrf::check();

        $new     = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        // Password is optional during onboarding; only validate if provided.
        if ($new !== '' || $confirm !== '') {
            $errors = PasswordPolicy::validate($new);
            if ($new !== $confirm) {
                $errors[] = 'Passwords do not match.';
            }
            if ($errors) {
                flash('staff_error', implode(' ', $errors));
                $this->redirect('staff/onboarding');
            }
            Staff::setPassword(StaffAuth::id(), password_hash($new, PASSWORD_DEFAULT, ['cost' => 12]));
        }

        Staff::markOnboarded(StaffAuth::id());
        flash('staff_success', 'Welcome aboard! Your portal is ready.');
        $this->redirect('staff/dashboard');
    }

    public function skipOnboarding(): void
    {
        Staff::markOnboarded(StaffAuth::id());
        $this->redirect('staff/dashboard');
    }
}
