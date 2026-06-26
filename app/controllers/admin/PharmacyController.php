<?php
class PharmacyController extends Controller
{
    public function register(): void
    {
        Auth::requireAdmin();

        $isEdit = !empty($_GET['edit']);
        $editMedicationId = $isEdit ? (int) $_GET['edit'] : 0;
        $medicationData = [];

        if ($isEdit) {
            $medicationData = Medication::find($editMedicationId) ?? [];
            if (!$medicationData) {
                $this->redirect('admin/pharmacy/manage');
            }
        }

        $this->render('admin/pharmacy/register', [
            'page_title'       => $isEdit ? 'Modify Medication' : 'Add Medication',
            'isEdit'           => $isEdit,
            'editMedicationId' => $editMedicationId,
            'medicationData'   => $medicationData,
        ], 'admin');
    }

    public function store(): void
    {
        Auth::requireAdmin();

        if (!$this->isPost()) {
            $this->redirect('admin/pharmacy/register');
        }

        $sanitize = fn($v) => htmlspecialchars(strip_tags(trim((string) $v)), ENT_QUOTES, 'UTF-8');

        $isEdit = !empty($_POST['edit_medication_id']);
        $editId = $isEdit ? (int) $_POST['edit_medication_id'] : 0;

        $name         = $sanitize($_POST['name'] ?? '');
        $dosage       = $sanitize($_POST['dosage'] ?? '');
        $quantity     = (int) ($_POST['quantity'] ?? 0);
        $category     = $sanitize($_POST['category'] ?? '');
        $manufacturer = $sanitize($_POST['manufacturer'] ?? '');
        $description  = $sanitize($_POST['description'] ?? '');

        $errors = [];
        if ($name === '') $errors[] = 'Medication name is required';
        if ($dosage === '') $errors[] = 'Dosage is required';
        if ($quantity < 0) $errors[] = 'Quantity must be a positive number';
        if ($category === '') $errors[] = 'Category is required';
        if ($manufacturer === '') $errors[] = 'Manufacturer is required';
        if (!$errors && Medication::nameExists($name, $isEdit ? $editId : null)) {
            $errors[] = 'A medication with this name already exists.';
        }

        if ($errors) {
            $_SESSION['register_errors'] = $errors;
            $_SESSION['register_data'] = $_POST;
            $this->redirect($isEdit ? 'admin/pharmacy/register&edit=' . $editId : 'admin/pharmacy/register');
        }

        $record = [
            'Name'         => $name,
            'Category'     => $category,
            'Dosage'       => $dosage,
            'Quantity'     => $quantity,
            'Manufacturer' => $manufacturer,
            'Description'  => $description,
        ];

        try {
            if ($isEdit) {
                Medication::update($editId, $record);
                $_SESSION['register_success'] = 'Medication updated successfully.';
            } else {
                $newId = Medication::create($record);
                $_SESSION['register_success'] = 'Medication added successfully. Medication ID: ' . $newId;
            }
            unset($_SESSION['register_data']);
            $this->redirect('admin/pharmacy/manage');
        } catch (Throwable $e) {
            error_log('Medication save failed: ' . $e->getMessage());
            $_SESSION['register_errors'] = ['An error occurred while saving. Please try again.'];
            $_SESSION['register_data'] = $_POST;
            $this->redirect($isEdit ? 'admin/pharmacy/register&edit=' . $editId : 'admin/pharmacy/register');
        }
    }

    public function view(): void
    {
        Auth::requireAdmin();
        $this->render('admin/pharmacy/view', [
            'page_title'   => 'View Medications',
            'medications'  => Medication::all(),
            'totalRecords' => Medication::count(),
            'search'       => '',
        ], 'admin');
    }

    /** "View Medications" link — same working list as view(). */
    public function medications(): void
    {
        $this->view();
    }

    public function manage(): void
    {
        Auth::requireAdmin();

        if (isset($_GET['delete'])) {
            $deleteId = (int) $_GET['delete'];
            if ($deleteId > 0) {
                Medication::delete($deleteId);
            }
            $this->redirect('admin/pharmacy/manage');
        }

        $this->render('admin/pharmacy/manage', [
            'page_title'   => 'Manage Medications',
            'medications'  => Medication::all(),
            'totalRecords' => Medication::count(),
            'search'       => '',
        ], 'admin');
    }

    public function profile(): void
    {
        Auth::requireAdmin();

        $medicationId = (int) ($_GET['id'] ?? 0);
        $medication = $medicationId > 0 ? Medication::find($medicationId) : null;

        if (!$medication) {
            $this->redirect('admin/pharmacy/view');
        }

        $this->render('admin/pharmacy/profile', [
            'page_title' => 'Medication Profile',
            'medication' => $medication,
        ], 'admin');
    }

    /** Secondary "quick add" medication form with a recent-medications panel. */
    public function addCategory(): void
    {
        Auth::requireAdmin();

        if ($this->isPost()) {
            $name        = trim($_POST['name'] ?? '');
            $dosage      = trim($_POST['dosage'] ?? '');
            $category    = trim($_POST['category'] ?? '');
            $company     = trim($_POST['company'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $quantity    = (int) ($_POST['quantity'] ?? 0);

            $errors = [];
            if ($name === '') $errors[] = 'Medication name is required';
            if ($dosage === '') $errors[] = 'Dosage is required';
            if ($category === '') $errors[] = 'Category is required';
            if ($quantity < 0) $errors[] = 'Quantity cannot be negative';

            if (!$errors) {
                try {
                    Medication::create([
                        'Name'         => $name,
                        'Category'     => $category,
                        'Dosage'       => $dosage,
                        'Quantity'     => $quantity,
                        'Manufacturer' => $company,
                        'Description'  => $description,
                    ]);
                    $_SESSION['medication_success'] = 'Medication added successfully!';
                    $this->redirect('admin/pharmacy/add-category');
                } catch (Throwable $e) {
                    error_log('Quick-add medication failed: ' . $e->getMessage());
                    $errors[] = 'Error adding medication. Please try again.';
                }
            }

            $_SESSION['medication_errors'] = $errors;
            $_SESSION['medication_data'] = $_POST;
            $this->redirect('admin/pharmacy/add-category');
        }

        $this->render('admin/pharmacy/add-category', [
            'page_title'  => 'Add Medication',
            'medications' => Medication::recent(10),
        ], 'admin');
    }

    public function manageCategories(): void
    {
        Auth::requireAdmin();
        $this->render('admin/pharmacy/manage-categories', [
            'page_title' => 'Manage Categories',
        ], 'admin');
    }

    public function delete(): void
    {
        Auth::requireAdmin();
        $id = (int) ($_GET['id'] ?? $_GET['delete'] ?? 0);
        if ($id > 0) {
            Medication::delete($id);
        }
        $this->redirect('admin/pharmacy/manage');
    }
}
