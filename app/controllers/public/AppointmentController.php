<?php
class AppointmentController extends Controller
{
    /** Show the dedicated booking form. */
    public function create(): void
    {
        $this->render('public/book-appointment', ['page_title' => 'Book Appointment']);
    }

    /**
     * Validate and persist an appointment (stored as a pending patient row),
     * then redirect back to the page it was submitted from.
     */
    public function store(): void
    {
        if (!$this->isPost()) {
            $this->redirect('book-appointment');
        }

        $return = $this->returnRoute();

        $sanitize = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');

        $input = [
            'first_name'        => $sanitize($_POST['first_name'] ?? ''),
            'last_name'         => $sanitize($_POST['last_name'] ?? ''),
            'middle_name'       => $sanitize($_POST['middle_name'] ?? ''),
            'date_of_birth'     => $sanitize($_POST['date_of_birth'] ?? ''),
            'email'             => $sanitize($_POST['email'] ?? ''),
            'phone'             => $sanitize($_POST['phone'] ?? ''),
            'gender'            => $sanitize($_POST['gender'] ?? ''),
            'emergency_contact' => $sanitize($_POST['emergency_contact'] ?? ''),
            'address'           => $sanitize($_POST['address'] ?? ''),
            'preferred_date'    => $sanitize($_POST['preferred_date'] ?? ''),
            'notes'             => $sanitize($_POST['notes'] ?? ''),
        ];
        $password = $_POST['password'] ?? '';

        $errors = [];
        if ($input['first_name'] === '') $errors[] = 'First name is required';
        if ($input['last_name'] === '') $errors[] = 'Last name is required';
        if ($input['date_of_birth'] === '') $errors[] = 'Date of birth is required';
        if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
        if (!preg_match('/^\+?\d[\d\s-]{6,19}$/', $input['phone'])) $errors[] = 'Valid phone number is required';
        if ($input['gender'] === '') $errors[] = 'Gender is required';
        if ($input['address'] === '') $errors[] = 'Address is required';
        if ($password !== '' && strlen($password) < 6) $errors[] = 'Password must be at least 6 characters';
        if ($input['preferred_date'] !== '' && strtotime($input['preferred_date']) <= time()) {
            $errors[] = 'Preferred appointment date must be in the future';
        }
        if (!$errors && Patient::emailExists($input['email'])) {
            $errors[] = 'An appointment with this email already exists. Please contact us to update it.';
        }

        if ($errors) {
            $_SESSION['appointment_errors'] = $errors;
            $_SESSION['appointment_data'] = $_POST;
            $this->redirect($return);
        }

        try {
            $age = date_diff(date_create($input['date_of_birth']), date_create('today'))->y;

            $patientId = Patient::create([
                'FirstName'        => $input['first_name'],
                'MiddleName'       => $input['middle_name'],
                'Surname'          => $input['last_name'],
                'Email'            => $input['email'],
                'Contact'          => $input['phone'],
                'DateOfBirth'      => $input['date_of_birth'],
                'Gender'           => $input['gender'],
                'EmergencyContact' => $input['emergency_contact'],
                'Address'          => $input['address'],
                'PreferredDate'    => $input['preferred_date'] ?: null,
                'Notes'            => $input['notes'],
                'AGE'              => $age,
                'password'         => $password !== '' ? password_hash($password, PASSWORD_DEFAULT) : null,
                'Status'           => 'pending',
            ]);

            unset($_SESSION['appointment_data'], $_SESSION['appointment_errors']);
            $_SESSION['appointment_success'] =
                'Your appointment request has been submitted successfully! '
                . 'We will contact you shortly to confirm. Your reference ID is: ' . $patientId;
        } catch (Throwable $e) {
            error_log('Appointment booking error: ' . $e->getMessage());
            $_SESSION['appointment_errors'] = ['An error occurred while processing your request. Please try again.'];
            $_SESSION['appointment_data'] = $_POST;
        }

        $this->redirect($return);
    }

    /** Decide which public page to return to, based on the referring page. */
    private function returnRoute(): string
    {
        $ref = $_SERVER['HTTP_REFERER'] ?? '';
        if (str_contains($ref, 'page=contact')) {
            return 'contact';
        }
        if (str_contains($ref, 'page=home') || $ref === '' || str_ends_with(rtrim($ref, '/'), BASE_URL)) {
            return 'home';
        }
        return 'book-appointment';
    }
}
