<?php
class PatientController extends Controller
{
    /** Show the register / edit form. */
    public function register(): void
    {
        Auth::requireAdmin();

        $isEdit = !empty($_GET['edit']);
        $editPatientId = $isEdit ? (int) $_GET['edit'] : 0;
        $patientData = [];

        if ($isEdit) {
            $patientData = Patient::find($editPatientId) ?? [];
            if (!$patientData) {
                $this->redirect('admin/patients/manage');
            }
        }

        $this->render('admin/patients/register', [
            'page_title'    => $isEdit ? 'Modify Patient' : 'Register Patient',
            'isEdit'        => $isEdit,
            'editPatientId' => $editPatientId,
            'patientData'   => $patientData,
        ], 'admin');
    }

    /** Persist a new or edited patient. */
    public function store(): void
    {
        Auth::requireAdmin();

        if (!$this->isPost()) {
            $this->redirect('admin/patients/register');
        }

        $sanitize = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');

        $isEdit = !empty($_POST['edit_patient_id']);
        $editId = $isEdit ? (int) $_POST['edit_patient_id'] : 0;

        $data = [
            'first_name'        => $sanitize($_POST['first_name'] ?? ''),
            'last_name'         => $sanitize($_POST['last_name'] ?? ''),
            'middle_name'       => $sanitize($_POST['middle_name'] ?? ''),
            'email'             => $sanitize($_POST['email'] ?? ''),
            'phone'             => $sanitize($_POST['phone'] ?? ''),
            'date_of_birth'     => $sanitize($_POST['date_of_birth'] ?? ''),
            'gender'            => $sanitize($_POST['gender'] ?? ''),
            'emergency_contact' => $sanitize($_POST['emergency_contact'] ?? ''),
            'address'           => $sanitize($_POST['address'] ?? ''),
            'preferred_date'    => $sanitize($_POST['preferred_date'] ?? ''),
            'notes'             => $sanitize($_POST['notes'] ?? ''),
        ];
        $password = $_POST['password'] ?? '';

        $errors = [];
        if ($data['first_name'] === '') $errors[] = 'First name is required';
        if ($data['last_name'] === '') $errors[] = 'Last name is required';
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required';
        if ($data['phone'] === '') $errors[] = 'Phone is required';
        if ($data['date_of_birth'] === '') $errors[] = 'Date of birth is required';
        if ($data['gender'] === '') $errors[] = 'Gender is required';
        if ($data['address'] === '') $errors[] = 'Address is required';
        if (!$isEdit && $password === '') $errors[] = 'Password is required';
        if ($password !== '' && strlen($password) < 8) $errors[] = 'Password must be at least 8 characters';
        if (!$errors && Patient::emailExists($data['email'], $isEdit ? $editId : null)) {
            $errors[] = 'A patient with this email address already exists.';
        }

        if ($errors) {
            $_SESSION['register_errors'] = $errors;
            $_SESSION['register_data'] = $_POST;
            $this->redirect($isEdit ? 'admin/patients/register&edit=' . $editId : 'admin/patients/register');
        }

        $record = [
            'FirstName'        => $data['first_name'],
            'MiddleName'       => $data['middle_name'],
            'Surname'          => $data['last_name'],
            'Email'            => $data['email'],
            'Contact'          => $data['phone'],
            'DateOfBirth'      => $data['date_of_birth'],
            'Gender'           => $data['gender'],
            'EmergencyContact' => $data['emergency_contact'],
            'Address'          => $data['address'],
            'PreferredDate'    => $data['preferred_date'] ?: null,
            'Notes'            => $data['notes'],
            'AGE'              => calculateAge($data['date_of_birth']) ?: null,
            'password'         => $password !== '' ? password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]) : null,
        ];

        try {
            if ($isEdit) {
                Patient::update($editId, $record);
                $_SESSION['register_success'] = 'Patient record updated successfully.';
            } else {
                $newId = Patient::create($record);
                $_SESSION['register_success'] = 'Patient registered successfully. Patient ID: ' . $newId;
            }
            unset($_SESSION['register_data']);
            $this->redirect('admin/patients/manage');
        } catch (Throwable $e) {
            error_log('Patient save failed: ' . $e->getMessage());
            $_SESSION['register_errors'] = ['An error occurred while saving. Please try again.'];
            $_SESSION['register_data'] = $_POST;
            $this->redirect($isEdit ? 'admin/patients/register&edit=' . $editId : 'admin/patients/register');
        }
    }

    /** Read-only list of patients. */
    public function view(): void
    {
        Auth::requireAdmin();
        $this->render('admin/patients/view', [
            'page_title'   => 'View Patients',
            'patients'     => Patient::all(),
            'totalRecords' => Patient::count(),
            'search'       => '',
        ], 'admin');
    }

    /** Management list with edit/delete actions. */
    public function manage(): void
    {
        Auth::requireAdmin();

        if (isset($_GET['delete'])) {
            $deleteId = (int) $_GET['delete'];
            if ($deleteId > 0) {
                Patient::delete($deleteId);
            }
            $this->redirect('admin/patients/manage');
        }

        $this->render('admin/patients/manage', [
            'page_title'   => 'Manage Patients',
            'patients'     => Patient::all(),
            'totalRecords' => Patient::count(),
            'search'       => '',
        ], 'admin');
    }

    /** Single patient profile. */
    public function profile(): void
    {
        Auth::requireAdmin();

        $patientId = (int) ($_GET['id'] ?? 0);
        $patient = $patientId > 0 ? Patient::find($patientId) : null;

        if (!$patient) {
            $this->redirect('admin/patients/view');
        }

        $this->render('admin/patients/profile', [
            'page_title' => 'Patient Profile',
            'patient'    => $patient,
            'age'        => calculateAge($patient['DateOfBirth'] ?? null),
        ], 'admin');
    }

    /** Delete a patient (used by direct delete links). */
    public function delete(): void
    {
        Auth::requireAdmin();
        $id = (int) ($_GET['id'] ?? $_GET['delete'] ?? 0);
        if ($id > 0) {
            Patient::delete($id);
        }
        $this->redirect('admin/patients/manage');
    }
}
