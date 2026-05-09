<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

$page_title = "Add Employee";
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
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Add New Employee</h1>
                        <p class="text-gray-600 dark:text-gray-400">Add a new staff member to the hospital management system</p>
                    </div>

                    <!-- Success/Error Messages -->
                    <?php if (isset($_SESSION['staff_success'])): ?>
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <?php echo htmlspecialchars($_SESSION['staff_success']); ?>
                            </div>
                        </div>
                        <?php unset($_SESSION['staff_success']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['staff_errors'])): ?>
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                                <div>
                                    <?php foreach ($_SESSION['staff_errors'] as $error): ?>
                                        <p><?php echo htmlspecialchars($error); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['staff_errors']); ?>
                    <?php endif; ?>

                    <!-- Staff Form -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Employee Information</h2>
                        </div>
                        
                        <form action="process-add.php" method="POST" class="p-6 space-y-6">
                            <!-- Personal Information -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="first_name" name="first_name" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($_SESSION['staff_data']['first_name'] ?? ''); ?>">
                                </div>
                                
                                <div>
                                    <label for="middle_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Middle Name
                                    </label>
                                    <input type="text" id="middle_name" name="middle_name"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($_SESSION['staff_data']['middle_name'] ?? ''); ?>">
                                </div>
                                
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="last_name" name="last_name" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($_SESSION['staff_data']['last_name'] ?? ''); ?>">
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($_SESSION['staff_data']['email'] ?? ''); ?>">
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" id="phone" name="phone" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($_SESSION['staff_data']['phone'] ?? ''); ?>">
                                </div>
                            </div>

                            <!-- Personal Details -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Date of Birth <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($_SESSION['staff_data']['date_of_birth'] ?? ''); ?>">
                                </div>
                                
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Gender <span class="text-red-500">*</span>
                                    </label>
                                    <select id="gender" name="gender" required
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                        <option value="">Select Gender</option>
                                        <option value="male" <?php echo (($_SESSION['staff_data']['gender'] ?? '') === 'male') ? 'selected' : ''; ?>>Male</option>
                                        <option value="female" <?php echo (($_SESSION['staff_data']['gender'] ?? '') === 'female') ? 'selected' : ''; ?>>Female</option>
                                        <option value="other" <?php echo (($_SESSION['staff_data']['gender'] ?? '') === 'other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="emergency_contact" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Emergency Contact
                                    </label>
                                    <input type="tel" id="emergency_contact" name="emergency_contact"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($_SESSION['staff_data']['emergency_contact'] ?? ''); ?>">
                                </div>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Full Address <span class="text-red-500">*</span>
                                </label>
                                <textarea id="address" name="address" rows="3" required
                                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                          placeholder="Enter complete address including street, city, state, country"><?php echo htmlspecialchars($_SESSION['staff_data']['address'] ?? ''); ?></textarea>
                            </div>

                            <!-- Employment Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="department" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Department <span class="text-red-500">*</span>
                                    </label>
                                    <select id="department" name="department" required
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                        <option value="">Select Department</option>
                                        <option value="cardiology" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'cardiology') ? 'selected' : ''; ?>>Cardiology</option>
                                        <option value="neurology" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'neurology') ? 'selected' : ''; ?>>Neurology</option>
                                        <option value="maternity" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'maternity') ? 'selected' : ''; ?>>Maternity</option>
                                        <option value="emergency" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'emergency') ? 'selected' : ''; ?>>Emergency</option>
                                        <option value="general" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'general') ? 'selected' : ''; ?>>General Medicine</option>
                                        <option value="pediatrics" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'pediatrics') ? 'selected' : ''; ?>>Pediatrics</option>
                                        <option value="orthopedics" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'orthopedics') ? 'selected' : ''; ?>>Orthopedics</option>
                                        <option value="dermatology" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'dermatology') ? 'selected' : ''; ?>>Dermatology</option>
                                        <option value="administration" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'administration') ? 'selected' : ''; ?>>Administration</option>
                                        <option value="pharmacy" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'pharmacy') ? 'selected' : ''; ?>>Pharmacy</option>
                                        <option value="laboratory" <?php echo (($_SESSION['staff_data']['department'] ?? '') === 'laboratory') ? 'selected' : ''; ?>>Laboratory</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="hire_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Hire Date <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" id="hire_date" name="hire_date" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                           value="<?php echo htmlspecialchars($_SESSION['staff_data']['hire_date'] ?? date('Y-m-d')); ?>">
                                </div>
                            </div>

                            <!-- Staff Category and Type -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="staff_category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Staff Category <span class="text-red-500">*</span>
                                    </label>
                                    <select id="staff_category" name="staff_category" required
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                        <option value="">Select Category</option>
                                        <option value="1" <?php echo (($_SESSION['staff_data']['staff_category'] ?? '') === '1') ? 'selected' : ''; ?>>Medical Staff</option>
                                        <option value="2" <?php echo (($_SESSION['staff_data']['staff_category'] ?? '') === '2') ? 'selected' : ''; ?>>Administrative Staff</option>
                                        <option value="3" <?php echo (($_SESSION['staff_data']['staff_category'] ?? '') === '3') ? 'selected' : ''; ?>>Support Staff</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="staff_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Staff Type <span class="text-red-500">*</span>
                                    </label>
                                    <select id="staff_type" name="staff_type" required
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                        <option value="">Select Type</option>
                                        <option value="1" <?php echo (($_SESSION['staff_data']['staff_type'] ?? '') === '1') ? 'selected' : ''; ?>>Doctor</option>
                                        <option value="2" <?php echo (($_SESSION['staff_data']['staff_type'] ?? '') === '2') ? 'selected' : ''; ?>>Nurse</option>
                                        <option value="3" <?php echo (($_SESSION['staff_data']['staff_type'] ?? '') === '3') ? 'selected' : ''; ?>>Technician</option>
                                        <option value="4" <?php echo (($_SESSION['staff_data']['staff_type'] ?? '') === '4') ? 'selected' : ''; ?>>Administrator</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="staff_grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Staff Grade <span class="text-red-500">*</span>
                                    </label>
                                    <select id="staff_grade" name="staff_grade" required
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                        <option value="">Select Grade</option>
                                        <option value="1" <?php echo (($_SESSION['staff_data']['staff_grade'] ?? '') === '1') ? 'selected' : ''; ?>>Senior</option>
                                        <option value="2" <?php echo (($_SESSION['staff_data']['staff_grade'] ?? '') === '2') ? 'selected' : ''; ?>>Junior</option>
                                        <option value="3" <?php echo (($_SESSION['staff_data']['staff_grade'] ?? '') === '3') ? 'selected' : ''; ?>>Intern</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700">
                                <a href="../dashboard.php" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Back to Dashboard
                                </a>
                                
                                <div class="flex space-x-3">
                                    <button type="reset" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <i class="fas fa-undo mr-2"></i>
                                        Reset Form
                                    </button>
                                    
                                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-yuki-600 to-yuki-500 text-white rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors shadow-lg hover:shadow-xl">
                                        <i class="fas fa-user-plus mr-2"></i>
                                        Add Employee
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
        <?php unset($_SESSION['staff_data']); ?>
    </script>
</body>
</html>
