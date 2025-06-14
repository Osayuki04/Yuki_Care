<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

$page_title = "Assign Department";
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
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Assign Department</h1>
                        <p class="text-gray-600 dark:text-gray-400">Assign staff members to departments and manage organizational structure</p>
                    </div>

                    <!-- Coming Soon Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="bg-gradient-to-r from-yellow-100 to-orange-100 dark:from-yellow-900/20 dark:to-orange-900/20 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-sitemap text-yellow-600 dark:text-yellow-400 text-3xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Department Assignment</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-8">
                                This feature is currently under development. You can add staff members with department assignments using the Add Employee form.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="add.php" class="bg-gradient-to-r from-yuki-600 to-yuki-500 text-white px-6 py-3 rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Add Employee
                                </a>
                                <a href="view.php" class="bg-gradient-to-r from-secondary-600 to-secondary-500 text-white px-6 py-3 rounded-lg hover:from-secondary-700 hover:to-secondary-600 transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-users mr-2"></i>
                                    View Staff
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Department Overview -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Hospital Departments</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100 dark:bg-red-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-heart text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Cardiology</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Heart and cardiovascular system specialists</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-purple-100 dark:bg-purple-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-brain text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Neurology</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Brain and nervous system specialists</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-pink-100 dark:bg-pink-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-baby text-pink-600 dark:text-pink-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Maternity</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Maternal and newborn care specialists</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100 dark:bg-red-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-ambulance text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Emergency</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Emergency and trauma care specialists</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100 dark:bg-blue-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-stethoscope text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">General Medicine</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">General practice and internal medicine</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-green-100 dark:bg-green-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-child text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Pediatrics</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Children's health and development</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-orange-100 dark:bg-orange-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-bone text-orange-600 dark:text-orange-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Orthopedics</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Bone, joint, and muscle specialists</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-yellow-100 dark:bg-yellow-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-pills text-yellow-600 dark:text-yellow-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Pharmacy</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Medication management and dispensing</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-indigo-100 dark:bg-indigo-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-flask text-indigo-600 dark:text-indigo-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Laboratory</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Diagnostic testing and analysis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
