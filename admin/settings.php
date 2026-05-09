<?php
session_start();
require_once '../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../auth/admin-login.php');
    exit();
}

$page_title = "Settings";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Yuki Care Medical Center</title>
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <?php include 'components/sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <?php include 'components/header.php'; ?>
            
            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-gray-900 p-6">
                <div class="max-w-6xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Settings</h1>
                        <p class="text-gray-600 dark:text-gray-400">Configure system settings and preferences</p>
                    </div>

                    <!-- Coming Soon Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="bg-gradient-to-r from-gray-100 to-slate-100 dark:from-gray-700 dark:to-slate-700 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-cog text-gray-600 dark:text-gray-400 text-3xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">System Settings</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-8">
                                Settings and configuration options are currently under development. The system is fully functional with default settings.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="dashboard.php" class="bg-gradient-to-r from-yuki-600 to-yuki-500 text-white px-6 py-3 rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    Back to Dashboard
                                </a>
                                <a href="reports.php" class="bg-gradient-to-r from-secondary-600 to-secondary-500 text-white px-6 py-3 rounded-lg hover:from-secondary-700 hover:to-secondary-600 transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-chart-bar mr-2"></i>
                                    View Reports
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Available Settings Preview -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Available Settings (Coming Soon)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100 dark:bg-blue-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-user-cog text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">User Management</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Manage admin users, roles, and permissions</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-green-100 dark:bg-green-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-hospital text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Hospital Info</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Update hospital details and contact information</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-purple-100 dark:bg-purple-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-envelope text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Email Settings</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Configure email notifications and SMTP settings</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-yellow-100 dark:bg-yellow-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-shield-alt text-yellow-600 dark:text-yellow-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Security</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Password policies and security configurations</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100 dark:bg-red-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-database text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Backup</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Database backup and restore options</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-indigo-100 dark:bg-indigo-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-palette text-indigo-600 dark:text-indigo-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Appearance</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Theme customization and branding options</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
