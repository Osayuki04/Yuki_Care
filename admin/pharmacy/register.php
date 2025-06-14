<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

// Check if this is edit mode
$isEdit = isset($_GET['edit']) && !empty($_GET['edit']);
$editMedicationId = $isEdit ? (int)$_GET['edit'] : 0;
$medicationData = [];

if ($isEdit && $editMedicationId > 0) {
    // Get medication data for editing using your preferred method
    $db_handle = getDatabaseConnection();
    $sql = "SELECT * FROM medication WHERE ID = $editMedicationId";
    $result = mysqli_query($db_handle, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $medicationData = mysqli_fetch_array($result);
        $page_title = "Modify Medication - " . $medicationData['Name'];
    } else {
        // Medication not found, redirect to manage page
        header('Location: manage.php');
        exit();
    }
    mysqli_close($db_handle);
} else {
    $page_title = "Add Medication";
}
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
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                            <?php echo $isEdit ? 'Modify Medication Information' : 'Add New Medication'; ?>
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400">
                            <?php echo $isEdit ? 'Update medication information in the pharmacy system' : 'Add a new medication to the pharmacy inventory'; ?>
                        </p>
                    </div>

                    <!-- Success/Error Messages -->
                    <?php if (isset($_SESSION['register_success'])): ?>
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <?php echo htmlspecialchars($_SESSION['register_success']); ?>
                            </div>
                        </div>
                        <?php unset($_SESSION['register_success']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['register_errors'])): ?>
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                                <div>
                                    <?php foreach ($_SESSION['register_errors'] as $error): ?>
                                        <p><?php echo htmlspecialchars($error); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['register_errors']); ?>
                    <?php endif; ?>

                    <!-- Registration Form -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Medication Information</h2>
                        </div>
                        
                        <form action="process-register-new.php" method="POST" class="p-6 space-y-6">
                            <?php if ($isEdit): ?>
                                <input type="hidden" name="edit_medication_id" value="<?php echo $editMedicationId; ?>">
                            <?php endif; ?>
                            
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Medication Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($isEdit ? ($medicationData['Name'] ?? '') : ($_SESSION['register_data']['name'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="dosage" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Dosage <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="dosage" name="dosage" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           placeholder="e.g., 500mg, 10ml, 1 tablet"
                                           value="<?php echo htmlspecialchars($isEdit ? ($medicationData['Dosage'] ?? '') : ($_SESSION['register_data']['dosage'] ?? '')); ?>">
                                </div>
                            </div>

                            <!-- Quantity and Category -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Quantity <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" id="quantity" name="quantity" required min="0"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($isEdit ? ($medicationData['Quantity'] ?? '') : ($_SESSION['register_data']['quantity'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Category <span class="text-red-500">*</span>
                                    </label>
                                    <select id="category" name="category" required
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                        <option value="">Select Category</option>
                                        <?php 
                                        $selectedCategory = $isEdit ? ($medicationData['Category'] ?? '') : ($_SESSION['register_data']['category'] ?? '');
                                        ?>
                                        <option value="Antibiotics" <?php echo ($selectedCategory === 'Antibiotics') ? 'selected' : ''; ?>>Antibiotics</option>
                                        <option value="Pain Relief" <?php echo ($selectedCategory === 'Pain Relief') ? 'selected' : ''; ?>>Pain Relief</option>
                                        <option value="Cardiovascular" <?php echo ($selectedCategory === 'Cardiovascular') ? 'selected' : ''; ?>>Cardiovascular</option>
                                        <option value="Diabetes" <?php echo ($selectedCategory === 'Diabetes') ? 'selected' : ''; ?>>Diabetes</option>
                                        <option value="Respiratory" <?php echo ($selectedCategory === 'Respiratory') ? 'selected' : ''; ?>>Respiratory</option>
                                        <option value="Gastrointestinal" <?php echo ($selectedCategory === 'Gastrointestinal') ? 'selected' : ''; ?>>Gastrointestinal</option>
                                        <option value="Neurological" <?php echo ($selectedCategory === 'Neurological') ? 'selected' : ''; ?>>Neurological</option>
                                        <option value="Vitamins" <?php echo ($selectedCategory === 'Vitamins') ? 'selected' : ''; ?>>Vitamins & Supplements</option>
                                        <option value="Topical" <?php echo ($selectedCategory === 'Topical') ? 'selected' : ''; ?>>Topical</option>
                                        <option value="Emergency" <?php echo ($selectedCategory === 'Emergency') ? 'selected' : ''; ?>>Emergency</option>
                                        <option value="Other" <?php echo ($selectedCategory === 'Other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Manufacturer -->
                            <div>
                                <label for="manufacturer" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Manufacturer <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="manufacturer" name="manufacturer" required
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                       placeholder="Enter manufacturer name"
                                       value="<?php echo htmlspecialchars($isEdit ? ($medicationData['Manufacturer'] ?? '') : ($_SESSION['register_data']['manufacturer'] ?? '')); ?>">
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Description
                                </label>
                                <textarea id="description" name="description" rows="4"
                                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                          placeholder="Enter medication description, usage instructions, side effects, etc."><?php echo htmlspecialchars($isEdit ? ($medicationData['Description'] ?? '') : ($_SESSION['register_data']['description'] ?? '')); ?></textarea>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                                <a href="<?php echo $isEdit ? 'manage.php' : 'view.php'; ?>" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    <?php echo $isEdit ? 'Back to Manage Medications' : 'Back to Medications'; ?>
                                </a>

                                <div class="flex space-x-3">
                                    <button type="reset" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <i class="fas fa-undo mr-2"></i>
                                        Reset Form
                                    </button>

                                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-yuki-600 to-yuki-500 text-white rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors shadow-lg hover:shadow-xl">
                                        <?php if ($isEdit): ?>
                                            <i class="fas fa-save mr-2"></i>
                                            Update Medication
                                        <?php else: ?>
                                            <i class="fas fa-plus mr-2"></i>
                                            Add Medication
                                        <?php endif; ?>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Clear form data from session
        <?php unset($_SESSION['register_data']); ?>
    </script>
</body>
</html>
