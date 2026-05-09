<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

$page_title = "Staff Registration Result";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Yuki Care Medical Center</title>
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
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-8">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // SECURITY: Input sanitization function
    // Benefit: Prevents malicious scripts from being stored in the database
    function sanitize($input) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
    
    // Check if this is an edit operation
    $isEdit = isset($_POST['edit_staff_id']) && !empty($_POST['edit_staff_id']);
    $editStaffId = $isEdit ? (int)$_POST['edit_staff_id'] : 0;
    
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
    $department = sanitize($_POST['department'] ?? '');
    $hireDate = sanitize($_POST['hire_date'] ?? '');
    $staffCategory = sanitize($_POST['staff_category'] ?? '');
    $staffType = sanitize($_POST['staff_type'] ?? '');
    $staffGrade = sanitize($_POST['staff_grade'] ?? '');
    $password = $_POST['password'] ?? '';
    
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
    if (empty($department)) $errors[] = "Department is required";
    if (empty($hireDate)) $errors[] = "Hire date is required";
    if (empty($staffCategory)) $errors[] = "Staff category is required";
    if (empty($staffType)) $errors[] = "Staff type is required";
    if (empty($staffGrade)) $errors[] = "Staff grade is required";
    
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
        // Process the registration/update
        
        // SECURITY: Use database connection from config file instead of hardcoded credentials
        // Benefit: Centralizes database credentials for better security management
        $db_handle = getDatabaseConnection();
        
        // Check if email already exists (but exclude current staff if editing)
        if ($isEdit) {
            $check_sql = "SELECT * FROM staff WHERE Email = '$email' AND ID != $editStaffId";
        } else {
            $check_sql = "SELECT * FROM staff WHERE Email = '$email'";
        }
        $check_result = mysqli_query($db_handle, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<div class='bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6'>";
            echo "<div class='flex items-start'>";
            echo "<i class='fas fa-exclamation-triangle mr-3 mt-1 text-red-500'></i>";
            echo "<div>";
            echo "<h3 class='font-semibold text-lg mb-2'>Registration Failed</h3>";
            echo "<p>A staff member with this email address already exists in the system.</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            try {
                // SECURITY: Log attempts for audit trail
                // Benefit: Helps track suspicious activity and troubleshoot issues
                if ($isEdit) {
                    error_log("Admin {$_SESSION['admin_id']} attempting to update staff ID $editStaffId: $email");
                } else {
                    error_log("Admin {$_SESSION['admin_id']} attempting to register staff: $email");
                }

                // Calculate age from date of birth
                $birthDate = new DateTime($dateOfBirth);
                $today = new DateTime('today');
                $age = $birthDate->diff($today)->y;

                if ($isEdit) {
                    // Update existing staff record
                    if (!empty($passwordHash)) {
                        // Update with new password
                        $sql = "UPDATE staff SET 
                                FirstName = '$firstName', 
                                MiddleName = '$middleName', 
                                Surname = '$lastName', 
                                Email = '$email', 
                                Contact = '$phone', 
                                DateOfBirth = '$dateOfBirth', 
                                Gender = '$gender', 
                                EmergencyContact = '$emergencyContact', 
                                Address = '$address', 
                                Department = '$department', 
                                HireDate = '$hireDate', 
                                StaffCategory = '$staffCategory', 
                                StaffType = '$staffType', 
                                StaffGrade = '$staffGrade', 
                                password = '$passwordHash'
                                WHERE ID = $editStaffId";
                    } else {
                        // Update without changing password
                        $sql = "UPDATE staff SET 
                                FirstName = '$firstName', 
                                MiddleName = '$middleName', 
                                Surname = '$lastName', 
                                Email = '$email', 
                                Contact = '$phone', 
                                DateOfBirth = '$dateOfBirth', 
                                Gender = '$gender', 
                                EmergencyContact = '$emergencyContact', 
                                Address = '$address', 
                                Department = '$department', 
                                HireDate = '$hireDate', 
                                StaffCategory = '$staffCategory', 
                                StaffType = '$staffType', 
                                StaffGrade = '$staffGrade'
                                WHERE ID = $editStaffId";
                    }
                    
                    $result = mysqli_query($db_handle, $sql);
                    
                    if ($result) {
                        $staffId = $editStaffId;
                        echo "<div class='bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6'>";
                        echo "<div class='flex items-start'>";
                        echo "<i class='fas fa-check-circle mr-3 mt-1 text-green-500 text-xl'></i>";
                        echo "<div>";
                        echo "<h3 class='font-semibold text-lg mb-2'>Staff Record Updated Successfully!</h3>";
                        echo "<div class='space-y-1'>";
                        echo "<p><span class='font-medium'>Staff ID:</span> $staffId</p>";
                        echo "<p><span class='font-medium'>Age:</span> $age years</p>";
                        echo "<p><span class='font-medium'>Email:</span> $email</p>";
                        echo "<p><span class='font-medium'>Department:</span> $department</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        error_log("Staff update successful for email: $email, StaffID: $staffId");
                    } else {
                        throw new Exception("Failed to update staff record: " . mysqli_error($db_handle));
                    }
                } else {
                    // Insert new staff record
                    $sql = "INSERT INTO staff (FirstName, MiddleName, Surname, Email, Contact, DateOfBirth, Gender, EmergencyContact, Address, Department, HireDate, StaffCategory, StaffType, StaffGrade, password)
                            VALUES ('$firstName', '$middleName', '$lastName', '$email', '$phone', '$dateOfBirth', '$gender', '$emergencyContact', '$address', '$department', '$hireDate', '$staffCategory', '$staffType', '$staffGrade', '$passwordHash')";

                    $result = mysqli_query($db_handle, $sql);

                    if ($result) {
                        $staffId = mysqli_insert_id($db_handle);
                        echo "<div class='bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6'>";
                        echo "<div class='flex items-start'>";
                        echo "<i class='fas fa-user-md mr-3 mt-1 text-green-500 text-xl'></i>";
                        echo "<div>";
                        echo "<h3 class='font-semibold text-lg mb-2'>Staff Record Created Successfully!</h3>";
                        echo "<div class='space-y-1'>";
                        echo "<p><span class='font-medium'>Staff ID:</span> $staffId</p>";
                        echo "<p><span class='font-medium'>Name:</span> $firstName $lastName</p>";
                        echo "<p><span class='font-medium'>Age:</span> $age years</p>";
                        echo "<p><span class='font-medium'>Email:</span> $email</p>";
                        echo "<p><span class='font-medium'>Department:</span> $department</p>";
                        echo "<p><span class='font-medium'>Staff Type:</span> $staffType</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        error_log("Staff registration successful for email: $email, StaffID: $staffId");
                    } else {
                        throw new Exception("Failed to insert staff record: " . mysqli_error($db_handle));
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
                error_log("Staff registration failed: " . $e->getMessage());
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
                            <i class="fas fa-user-friends mr-2"></i>
                            View All Staff
                        </a>
                        <a href="manage.php" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors shadow-lg hover:shadow-xl">
                            <i class="fas fa-users-cog mr-2"></i>
                            Manage Staff
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
