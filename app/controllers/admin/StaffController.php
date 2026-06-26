<?php
class StaffController extends Controller
{
    public function register(): void
    {
        Auth::requireAdmin();

        $isEdit = !empty($_GET['edit']);
        $editStaffId = $isEdit ? (int) $_GET['edit'] : 0;
        $staffData = [];

        if ($isEdit) {
            $staffData = Staff::find($editStaffId) ?? [];
            if (!$staffData) {
                $this->redirect('admin/staff/manage');
            }
        }

        $this->render('admin/staff/register', [
            'page_title'  => $isEdit ? 'Modify Staff' : 'Register Staff',
            'isEdit'      => $isEdit,
            'editStaffId' => $editStaffId,
            'staffData'   => $staffData,
        ], 'admin');
    }

    public function store(): void
    {
        Auth::requireAdmin();

        if (!$this->isPost()) {
            $this->redirect('admin/staff/register');
        }

        $sanitize = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');

        $isEdit = !empty($_POST['edit_staff_id']);
        $editId = $isEdit ? (int) $_POST['edit_staff_id'] : 0;

        $d = [
            'first_name'        => $sanitize($_POST['first_name'] ?? ''),
            'last_name'         => $sanitize($_POST['last_name'] ?? ''),
            'middle_name'       => $sanitize($_POST['middle_name'] ?? ''),
            'email'             => $sanitize($_POST['email'] ?? ''),
            'phone'             => $sanitize($_POST['phone'] ?? ''),
            'date_of_birth'     => $sanitize($_POST['date_of_birth'] ?? ''),
            'gender'            => $sanitize($_POST['gender'] ?? ''),
            'emergency_contact' => $sanitize($_POST['emergency_contact'] ?? ''),
            'address'           => $sanitize($_POST['address'] ?? ''),
            'department'        => $sanitize($_POST['department'] ?? ''),
            'hire_date'         => $sanitize($_POST['hire_date'] ?? ''),
            'staff_category'    => $sanitize($_POST['staff_category'] ?? ''),
            'staff_type'        => $sanitize($_POST['staff_type'] ?? ''),
            'staff_grade'       => $sanitize($_POST['staff_grade'] ?? ''),
        ];
        $password = $_POST['password'] ?? '';

        $errors = [];
        foreach ([
            'first_name' => 'First name', 'last_name' => 'Last name', 'phone' => 'Phone',
            'date_of_birth' => 'Date of birth', 'gender' => 'Gender', 'address' => 'Address',
            'department' => 'Department', 'hire_date' => 'Hire date', 'staff_category' => 'Staff category',
            'staff_type' => 'Staff type', 'staff_grade' => 'Staff grade',
        ] as $key => $label) {
            if ($d[$key] === '') $errors[] = "$label is required";
        }
        if (!filter_var($d['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required';
        if (!$isEdit && $password === '') $errors[] = 'Password is required';
        if ($password !== '' && strlen($password) < 8) $errors[] = 'Password must be at least 8 characters';
        if (!$errors && Staff::emailExists($d['email'], $isEdit ? $editId : null)) {
            $errors[] = 'A staff member with this email already exists.';
        }

        if ($errors) {
            $_SESSION['register_errors'] = $errors;
            $_SESSION['register_data'] = $_POST;
            $this->redirect($isEdit ? 'admin/staff/register&edit=' . $editId : 'admin/staff/register');
        }

        $record = [
            'FirstName'        => $d['first_name'],
            'MiddleName'       => $d['middle_name'],
            'Surname'          => $d['last_name'],
            'Email'            => $d['email'],
            'Contact'          => $d['phone'],
            'DateOfBirth'      => $d['date_of_birth'],
            'Gender'           => $d['gender'],
            'EmergencyContact' => $d['emergency_contact'],
            'Address'          => $d['address'],
            'Department'       => $d['department'],
            'HireDate'         => $d['hire_date'] ?: null,
            'StaffCategory'    => $d['staff_category'],
            'StaffType'        => $d['staff_type'],
            'StaffGrade'       => $d['staff_grade'],
            'password'         => $password !== '' ? password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]) : null,
        ];

        try {
            if ($isEdit) {
                Staff::update($editId, $record);
                $_SESSION['register_success'] = 'Staff record updated successfully.';
            } else {
                $newId = Staff::create($record);
                $_SESSION['register_success'] = 'Staff registered successfully. Staff ID: ' . $newId;
            }
            unset($_SESSION['register_data']);
            $this->redirect('admin/staff/manage');
        } catch (Throwable $e) {
            error_log('Staff save failed: ' . $e->getMessage());
            $_SESSION['register_errors'] = ['An error occurred while saving. Please try again.'];
            $_SESSION['register_data'] = $_POST;
            $this->redirect($isEdit ? 'admin/staff/register&edit=' . $editId : 'admin/staff/register');
        }
    }

    public function view(): void
    {
        Auth::requireAdmin();
        $this->render('admin/staff/view', [
            'page_title'   => 'View Staff',
            'staff'        => Staff::all(),
            'totalRecords' => Staff::count(),
            'search'       => '',
        ], 'admin');
    }

    public function manage(): void
    {
        Auth::requireAdmin();

        if (isset($_GET['delete'])) {
            $deleteId = (int) $_GET['delete'];
            if ($deleteId > 0) {
                Staff::delete($deleteId);
            }
            $this->redirect('admin/staff/manage');
        }

        $this->render('admin/staff/manage', [
            'page_title'   => 'Manage Staff',
            'staff'        => Staff::all(),
            'totalRecords' => Staff::count(),
            'search'       => '',
        ], 'admin');
    }

    public function profile(): void
    {
        Auth::requireAdmin();

        $staffId = (int) ($_GET['id'] ?? 0);
        $staff = $staffId > 0 ? Staff::find($staffId) : null;

        if (!$staff) {
            $this->redirect('admin/staff/view');
        }

        $this->render('admin/staff/profile', [
            'page_title' => 'Staff Profile',
            'staff'      => $staff,
            'age'        => calculateAge($staff['DateOfBirth'] ?? null),
        ], 'admin');
    }

    /** The legacy "Add Employee" form posted to a script that never existed;
     *  registration is fully handled by the register form. */
    public function add(): void
    {
        Auth::requireAdmin();
        $this->redirect('admin/staff/register');
    }

    public function assignDepartment(): void
    {
        Auth::requireAdmin();
        $this->render('admin/staff/assign-department', [
            'page_title' => 'Assign Department',
        ], 'admin');
    }

    public function delete(): void
    {
        Auth::requireAdmin();
        $id = (int) ($_GET['id'] ?? $_GET['delete'] ?? 0);
        if ($id > 0) {
            Staff::delete($id);
        }
        $this->redirect('admin/staff/manage');
    }
}
