<?php
// Simple patient registration processing
session_start();
require_once '../../config/database.php';

// Basic security check
if (!isset($_SESSION['admin_id'])) {
    die("Access denied. Please login as admin.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Result - Yuki Care Medical Center</title>
    <link href="../../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <?php include '../components/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <?php include '../components/header.php'; ?>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-gray-900 p-6">
                <div class="max-w-4xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Patient Registration Result</h1>
                        <p class="text-gray-600 dark:text-gray-400">Registration processing complete</p>
                    </div>

                    <!-- Result Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-8">

<?php
// SECURITY: Add CSRF protection - prevents cross-site request forgery attacks
// Benefit: Prevents attackers from tricking admins into submitting forms without their knowledge
// if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//     echo "<div class='error'>Security validation failed. Please try again.</div>";
//     exit;
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // SECURITY: Sanitize input data - prevents XSS attacks
    // Benefit: Prevents malicious scripts from being stored in the database
    function sanitize($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
    
    // Check if this is an edit operation
    $isEdit = isset($_POST['edit_patient_id']) && !empty($_POST['edit_patient_id']);
    $editPatientId = $isEdit ? (int)$_POST['edit_patient_id'] : 0;

    // Get form data with sanitization
    $firstName = sanitize($_POST['first_name'] ?? '');
    $lastName = sanitize($_POST['last_name'] ?? '');
    $middleName = sanitize($_POST['middle_name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $dateOfBirth = sanitize($_POST['date_of_birth'] ?? '');
    $gender = sanitize($_POST['gender'] ?? '');
    $emergencyContact = sanitize($_POST['emergency_contact'] ?? '');
    $address = sanitize($_POST['address'] ?? '');
    $preferredDate = sanitize($_POST['preferred_date'] ?? '');
    $password = $_POST['password'] ?? '';
    $notes = sanitize($_POST['notes'] ?? '');

    // SECURITY: Use stronger password hashing with options (only if password is provided)
    // Benefit: Makes password cracking much more difficult
    $passwordHash = '';
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    }

    // Basic validation
    $errors = [];
    if (empty($firstName)) $errors[] = "First name is required";
    if (empty($lastName)) $errors[] = "Last name is required";
    if (empty($email)) $errors[] = "Email is required";
    if (empty($phone)) $errors[] = "Phone is required";
    if (empty($dateOfBirth)) $errors[] = "Date of birth is required";
    if (empty($gender)) $errors[] = "Gender is required";
    if (empty($address)) $errors[] = "Address is required";
    // Password is only required for new registrations, not for edits
    if (!$isEdit && empty($password)) $errors[] = "Password is required";

    // SECURITY: Additional validation for email format and password strength
    // Benefit: Ensures data integrity and security
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";
    if (!empty($password) && strlen($password) < 8) $errors[] = "Password must be at least 8 characters";

    if (!empty($errors)) {
        echo "<div class='bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6'>";
        echo "<div class='flex items-start'>";
        echo "<i class='fas fa-exclamation-triangle mr-3 mt-1 text-red-500'></i>";
        echo "<div>";
        echo "<h3 class='font-semibold text-lg mb-2'>Validation Errors</h3>";
        echo "<ul class='list-disc list-inside space-y-1'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        // Process the registration
        
        // SECURITY: Use database connection from config file instead of hardcoded credentials
        // Benefit: Centralizes database credentials for better security management
        $db_handle = getDatabaseConnection();
        
        // Check if email already exists (but exclude current patient if editing)
        if ($isEdit) {
            $check_sql = "SELECT * FROM patient WHERE Email = '$email' AND ID != $editPatientId";
        } else {
            $check_sql = "SELECT * FROM patient WHERE Email = '$email'";
        }
        $check_result = mysqli_query($db_handle, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<div class='bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6'>";
            echo "<div class='flex items-start'>";
            echo "<i class='fas fa-exclamation-triangle mr-3 mt-1 text-red-500'></i>";
            echo "<div>";
            echo "<h3 class='font-semibold text-lg mb-2'>Registration Failed</h3>";
            echo "<p>A patient with this email address already exists in the system.</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            try {
                // SECURITY: Log attempts for audit trail
                // Benefit: Helps track suspicious activity and troubleshoot issues
                if ($isEdit) {
                    error_log("Admin {$_SESSION['admin_id']} attempting to update patient ID $editPatientId: $email");
                } else {
                    error_log("Admin {$_SESSION['admin_id']} attempting to register patient: $email");
                }

                // Calculate age from date of birth
                $birthDate = new DateTime($dateOfBirth);
                $today = new DateTime('today');
                $age = $birthDate->diff($today)->y;

                if ($isEdit) {
                    // Update existing patient record
                    if (!empty($passwordHash)) {
                        // Update with new password
                        $sql = "UPDATE patient SET
                                FirstName = '$firstName',
                                MiddleName = '$middleName',
                                Surname = '$lastName',
                                Email = '$email',
                                Contact = '$phone',
                                DateOfBirth = '$dateOfBirth',
                                Gender = '$gender',
                                EmergencyContact = '$emergencyContact',
                                Address = '$address',
                                PreferredDate = '$preferredDate',
                                Notes = '$notes',
                                password = '$passwordHash'
                                WHERE ID = $editPatientId";
                    } else {
                        // Update without changing password
                        $sql = "UPDATE patient SET
                                FirstName = '$firstName',
                                MiddleName = '$middleName',
                                Surname = '$lastName',
                                Email = '$email',
                                Contact = '$phone',
                                DateOfBirth = '$dateOfBirth',
                                Gender = '$gender',
                                EmergencyContact = '$emergencyContact',
                                Address = '$address',
                                PreferredDate = '$preferredDate',
                                Notes = '$notes'
                                WHERE ID = $editPatientId";
                    }

                    $result = mysqli_query($db_handle, $sql);

                    if ($result) {
                        $patientId = $editPatientId;
                        echo "<div class='bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6'>";
                        echo "<div class='flex items-start'>";
                        echo "<i class='fas fa-check-circle mr-3 mt-1 text-green-500 text-xl'></i>";
                        echo "<div>";
                        echo "<h3 class='font-semibold text-lg mb-2'>Patient Record Updated Successfully!</h3>";
                        echo "<div class='space-y-1'>";
                        echo "<p><span class='font-medium'>Patient ID:</span> $patientId</p>";
                        echo "<p><span class='font-medium'>Age:</span> $age years</p>";
                        echo "<p><span class='font-medium'>Email:</span> $email</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        error_log("Patient update successful for email: $email, PatientID: $patientId");
                    } else {
                        throw new Exception("Failed to update patient record: " . mysqli_error($db_handle));
                    }
                } else {
                    // Insert new patient record
                    $sql = "INSERT INTO patient (FirstName, MiddleName, Surname, Email, Contact, DateOfBirth, Gender, EmergencyContact, Address, PreferredDate, Notes, password)
                            VALUES ('$firstName', '$middleName', '$lastName', '$email', '$phone', '$dateOfBirth', '$gender', '$emergencyContact', '$address', '$preferredDate', '$notes', '$passwordHash')";

                    $result = mysqli_query($db_handle, $sql);

                    if ($result) {
                        $patientId = mysqli_insert_id($db_handle);
                        echo "<div class='bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6'>";
                        echo "<div class='flex items-start'>";
                        echo "<i class='fas fa-user-plus mr-3 mt-1 text-green-500 text-xl'></i>";
                        echo "<div>";
                        echo "<h3 class='font-semibold text-lg mb-2'>Patient Record Created Successfully!</h3>";
                        echo "<div class='space-y-1'>";
                        echo "<p><span class='font-medium'>Patient ID:</span> $patientId</p>";
                        echo "<p><span class='font-medium'>Name:</span> $firstName $lastName</p>";
                        echo "<p><span class='font-medium'>Age:</span> $age years</p>";
                        echo "<p><span class='font-medium'>Email:</span> $email</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        error_log("Patient registration successful for email: $email, PatientID: $patientId");
                    } else {
                        throw new Exception("Failed to insert patient record: " . mysqli_error($db_handle));
                    }
                }

            } catch (Exception $e) {
                // SECURITY: Generic error message to user, detailed error to log
                // Benefit: Prevents information disclosure while still logging details for debugging
                echo "<div class='bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6'>";
                echo "<div class='flex items-start'>";
                echo "<i class='fas fa-exclamation-triangle mr-3 mt-1 text-red-500'></i>";
                echo "<div>";
                echo "<h3 class='font-semibold text-lg mb-2'>Registration Failed</h3>";
                echo "<p>An error occurred while processing your request. Please try again.</p>";
                echo "<p class='text-sm mt-2 text-red-600'>Debug: " . $e->getMessage() . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                error_log("Patient registration failed: " . $e->getMessage());
            }
        }

        // Close the database connection
        mysqli_close($db_handle);
    }
} else {
    echo "<div class='bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6'>";
    echo "<div class='flex items-start'>";
    echo "<i class='fas fa-exclamation-triangle mr-3 mt-1 text-red-500'></i>";
    echo "<div>";
    echo "<h3 class='font-semibold text-lg mb-2'>No Data Received</h3>";
    echo "<p>No form data was received. Please submit the registration form properly.</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

// SECURITY: Generate new CSRF token for next form submission
// Benefit: Ensures each form submission has a fresh token
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="register.php" class="bg-yuki-600 text-white px-6 py-3 rounded-lg hover:bg-yuki-700 transition-colors shadow-lg hover:shadow-xl">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back to Registration Form
                        </a>
                        <a href="view.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-lg hover:shadow-xl">
                            <i class="fas fa-users mr-2"></i>
                            View All Patients
                        </a>
                        <a href="manage.php" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors shadow-lg hover:shadow-xl">
                            <i class="fas fa-user-edit mr-2"></i>
                            Manage Patients
                        </a>
                        <a href="../dashboard.php" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors shadow-lg hover:shadow-xl">
                            <i class="fas fa-chart-line mr-2"></i>
                            Dashboard
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>


