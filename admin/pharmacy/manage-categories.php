<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

$page_title = "Manage Categories";
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
                <div class="max-w-6xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Manage Categories</h1>
                        <p class="text-gray-600 dark:text-gray-400">Organize and manage medication categories</p>
                    </div>

                    <!-- Coming Soon Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="bg-gradient-to-r from-blue-100 to-indigo-100 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-list-ul text-blue-600 dark:text-blue-400 text-3xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Category Management</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-8">
                                This feature is currently under development. You can add medications with categories using the Add Medication form.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="add-category.php" class="bg-gradient-to-r from-yuki-600 to-yuki-500 text-white px-6 py-3 rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-pills mr-2"></i>
                                    Add Medication
                                </a>
                                <a href="medications.php" class="bg-gradient-to-r from-secondary-600 to-secondary-500 text-white px-6 py-3 rounded-lg hover:from-secondary-700 hover:to-secondary-600 transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-prescription-bottle-alt mr-2"></i>
                                    View Medications
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Available Categories -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Medication Categories</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100 dark:bg-red-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-shield-virus text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Antibiotics</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Medications to treat bacterial infections</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100 dark:bg-blue-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-hand-holding-medical text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Pain Relief</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Analgesics and pain management medications</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100 dark:bg-red-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-heartbeat text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Cardiovascular</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Heart and blood pressure medications</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-green-100 dark:bg-green-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-tint text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Diabetes</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Blood sugar management medications</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-cyan-100 dark:bg-cyan-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-lungs text-cyan-600 dark:text-cyan-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Respiratory</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Breathing and lung-related medications</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-purple-100 dark:bg-purple-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-brain text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Neurological</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Brain and nervous system medications</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-yellow-100 dark:bg-yellow-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-capsules text-yellow-600 dark:text-yellow-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Vitamins</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Vitamins and dietary supplements</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-pills text-gray-600 dark:text-gray-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Other</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Miscellaneous medications and treatments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
