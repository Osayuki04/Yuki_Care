<?php
session_start();
require_once '../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../auth/admin-login.php');
    exit();
}

$page_title = "Reports";
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
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Reports</h1>
                        <p class="text-gray-600 dark:text-gray-400">Generate and view hospital analytics and reports</p>
                    </div>

                    <!-- Coming Soon Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="bg-gradient-to-r from-blue-100 to-purple-100 dark:from-blue-900/20 dark:to-purple-900/20 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-chart-bar text-blue-600 dark:text-blue-400 text-3xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Analytics & Reports</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-8">
                                Advanced reporting features are currently under development. Basic statistics are available on the dashboard.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="dashboard.php" class="bg-gradient-to-r from-yuki-600 to-yuki-500 text-white px-6 py-3 rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    View Dashboard
                                </a>
                                <a href="patients/view.php" class="bg-gradient-to-r from-secondary-600 to-secondary-500 text-white px-6 py-3 rounded-lg hover:from-secondary-700 hover:to-secondary-600 transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-users mr-2"></i>
                                    View Patients
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Available Reports Preview -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Available Reports (Coming Soon)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100 dark:bg-blue-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-users text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Patient Reports</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Patient demographics, admission trends, and statistics</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-green-100 dark:bg-green-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-user-md text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Staff Reports</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Employee performance, department distribution, and schedules</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-purple-100 dark:bg-purple-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-pills text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Pharmacy Reports</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Medication inventory, usage patterns, and stock levels</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-yellow-100 dark:bg-yellow-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-dollar-sign text-yellow-600 dark:text-yellow-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Financial Reports</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Revenue, expenses, and billing analytics</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100 dark:bg-red-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-calendar-alt text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Appointment Reports</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Appointment trends, no-shows, and scheduling efficiency</p>
                            </div>

                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-indigo-100 dark:bg-indigo-900/50 rounded-lg w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-chart-line text-indigo-600 dark:text-indigo-400"></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Performance Metrics</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Key performance indicators and operational metrics</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Quick Statistics</h3>
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-blue-600 dark:text-blue-400 mb-2">
                                        <i class="fas fa-users mr-2"></i>
                                        <?php
                                        try {
                                            $pdo = getDatabaseConnection();
                                            $stmt = $pdo->query("SELECT COUNT(*) as total FROM patient");
                                            echo $stmt->fetch()['total'];
                                        } catch (Exception $e) {
                                            echo "0";
                                        }
                                        ?>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400">Total Patients</p>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-green-600 dark:text-green-400 mb-2">
                                        <i class="fas fa-user-md mr-2"></i>
                                        <?php
                                        try {
                                            $stmt = $pdo->query("SELECT COUNT(*) as total FROM staff WHERE status = 'active'");
                                            echo $stmt->fetch()['total'];
                                        } catch (Exception $e) {
                                            echo "0";
                                        }
                                        ?>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400">Active Staff</p>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-2">
                                        <i class="fas fa-pills mr-2"></i>
                                        <?php
                                        try {
                                            $stmt = $pdo->query("SELECT COUNT(*) as total FROM medication");
                                            echo $stmt->fetch()['total'];
                                        } catch (Exception $e) {
                                            echo "0";
                                        }
                                        ?>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400">Medications</p>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 mb-2">
                                        <i class="fas fa-calendar-check mr-2"></i>
                                        <?php
                                        try {
                                            $stmt = $pdo->query("SELECT COUNT(*) as total FROM patient WHERE status = 'pending'");
                                            echo $stmt->fetch()['total'];
                                        } catch (Exception $e) {
                                            echo "0";
                                        }
                                        ?>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400">Pending Appointments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
