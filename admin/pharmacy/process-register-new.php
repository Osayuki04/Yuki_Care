<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

$page_title = "Medication Registration Result";
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
    $isEdit = isset($_POST['edit_medication_id']) && !empty($_POST['edit_medication_id']);
    $editMedicationId = $isEdit ? (int)$_POST['edit_medication_id'] : 0;
    
    // Get form data with sanitization
    $name = sanitize($_POST['name'] ?? '');
    $dosage = sanitize($_POST['dosage'] ?? '');
    $quantity = (int)($_POST['quantity'] ?? 0);
    $category = sanitize($_POST['category'] ?? '');
    $manufacturer = sanitize($_POST['manufacturer'] ?? '');
    $description = sanitize($_POST['description'] ?? '');

    // Basic validation
    $errors = [];
    if (empty($name)) $errors[] = "Medication name is required";
    if (empty($dosage)) $errors[] = "Dosage is required";
    if ($quantity < 0) $errors[] = "Quantity must be a positive number";
    if (empty($category)) $errors[] = "Category is required";
    if (empty($manufacturer)) $errors[] = "Manufacturer is required";

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
        
        // Check if medication name already exists (but exclude current medication if editing)
        if ($isEdit) {
            $check_sql = "SELECT * FROM medication WHERE Name = '$name' AND ID != $editMedicationId";
        } else {
            $check_sql = "SELECT * FROM medication WHERE Name = '$name'";
        }
        $check_result = mysqli_query($db_handle, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<div class='bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6'>";
            echo "<div class='flex items-start'>";
            echo "<i class='fas fa-exclamation-triangle mr-3 mt-1 text-red-500'></i>";
            echo "<div>";
            echo "<h3 class='font-semibold text-lg mb-2'>Registration Failed</h3>";
            echo "<p>A medication with this name already exists in the system.</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            try {
                // SECURITY: Log attempts for audit trail
                // Benefit: Helps track suspicious activity and troubleshoot issues
                if ($isEdit) {
                    error_log("Admin {$_SESSION['admin_id']} attempting to update medication ID $editMedicationId: $name");
                } else {
                    error_log("Admin {$_SESSION['admin_id']} attempting to register medication: $name");
                }

                if ($isEdit) {
                    // Update existing medication record
                    $sql = "UPDATE medication SET
                            Name = '$name',
                            Dosage = '$dosage',
                            Quantity = $quantity,
                            Category = '$category',
                            Manufacturer = '$manufacturer',
                            Description = '$description'
                            WHERE ID = $editMedicationId";
                    
                    $result = mysqli_query($db_handle, $sql);
                    
                    if ($result) {
                        $medicationId = $editMedicationId;
                        echo "<div class='bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6'>";
                        echo "<div class='flex items-start'>";
                        echo "<i class='fas fa-check-circle mr-3 mt-1 text-green-500 text-xl'></i>";
                        echo "<div>";
                        echo "<h3 class='font-semibold text-lg mb-2'>Medication Record Updated Successfully!</h3>";
                        echo "<div class='space-y-1'>";
                        echo "<p><span class='font-medium'>Medication ID:</span> $medicationId</p>";
                        echo "<p><span class='font-medium'>Name:</span> $name</p>";
                        echo "<p><span class='font-medium'>Quantity:</span> $quantity units</p>";
                        echo "<p><span class='font-medium'>Category:</span> $category</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        error_log("Medication update successful for: $name, MedicationID: $medicationId");
                    } else {
                        throw new Exception("Failed to update medication record: " . mysqli_error($db_handle));
                    }
                } else {
                    // Insert new medication record
                    $sql = "INSERT INTO medication (Name, Dosage, Quantity, Category, Manufacturer, Description)
                            VALUES ('$name', '$dosage', $quantity, '$category', '$manufacturer', '$description')";

                    $result = mysqli_query($db_handle, $sql);

                    if ($result) {
                        $medicationId = mysqli_insert_id($db_handle);
                        echo "<div class='bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6'>";
                        echo "<div class='flex items-start'>";
                        echo "<i class='fas fa-pills mr-3 mt-1 text-green-500 text-xl'></i>";
                        echo "<div>";
                        echo "<h3 class='font-semibold text-lg mb-2'>Medication Record Created Successfully!</h3>";
                        echo "<div class='space-y-1'>";
                        echo "<p><span class='font-medium'>Medication ID:</span> $medicationId</p>";
                        echo "<p><span class='font-medium'>Name:</span> $name</p>";
                        echo "<p><span class='font-medium'>Dosage:</span> $dosage</p>";
                        echo "<p><span class='font-medium'>Quantity:</span> $quantity units</p>";
                        echo "<p><span class='font-medium'>Category:</span> $category</p>";
                        echo "<p><span class='font-medium'>Manufacturer:</span> $manufacturer</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        error_log("Medication registration successful for: $name, MedicationID: $medicationId");
                    } else {
                        throw new Exception("Failed to insert medication record: " . mysqli_error($db_handle));
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
                error_log("Medication registration failed: " . $e->getMessage());
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
                            <i class="fas fa-prescription-bottle-alt mr-2"></i>
                            View All Medications
                        </a>
                        <a href="manage.php" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors shadow-lg hover:shadow-xl">
                            <i class="fas fa-cogs mr-2"></i>
                            Manage Medications
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
