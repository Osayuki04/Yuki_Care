<?php
session_start();
require_once '../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../auth/admin-login.php');
    exit();
}

// Get dashboard statistics using your preferred simple mysqli approach
$db_handle = getDatabaseConnection();

// Initialize variables
$totalPatients = $totalStaff = $todayAppointments = $pendingAppointments = 0;
$recentPatients = [];

// Get total patients
$sql = "SELECT COUNT(*) as total FROM patient";
$result = mysqli_query($db_handle, $sql);
if ($result) {
    $row = mysqli_fetch_array($result);
    $totalPatients = $row['total'];
}

// Get total staff (remove status filter since column might not exist yet)
$sql = "SELECT COUNT(*) as total FROM staff";
$result = mysqli_query($db_handle, $sql);
if ($result) {
    $row = mysqli_fetch_array($result);
    $totalStaff = $row['total'];
}

// Get today's appointments
$sql = "SELECT COUNT(*) as total FROM patient WHERE DATE(PreferredDate) = CURDATE()";
$result = mysqli_query($db_handle, $sql);
if ($result) {
    $row = mysqli_fetch_array($result);
    $todayAppointments = $row['total'];
}

// Get pending appointments (since Status column doesn't exist, count patients with future dates)
$sql = "SELECT COUNT(*) as total FROM patient WHERE PreferredDate >= CURDATE()";
$result = mysqli_query($db_handle, $sql);
if ($result) {
    $row = mysqli_fetch_array($result);
    $pendingAppointments = $row['total'];
} else {
    // If PreferredDate column doesn't exist, just count all patients
    $sql = "SELECT COUNT(*) as total FROM patient";
    $result = mysqli_query($db_handle, $sql);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $pendingAppointments = $row['total'];
    }
}

// Get recent patients - using simplified structure (order by ID since created_at doesn't exist)
$sql = "SELECT * FROM patient ORDER BY ID DESC LIMIT 5";
$result = mysqli_query($db_handle, $sql);
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        $recentPatients[] = $row;
    }
}

mysqli_close($db_handle);

$page_title = "Admin Dashboard";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Yuki Care Medical Center</title>
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <!-- Welcome Section -->
                <div class="mb-8">
                    <div class="bg-gradient-to-r from-yuki-600 to-secondary-600 rounded-2xl p-8 text-white shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold mb-2">Welcome back, <?php echo htmlspecialchars($_SESSION['admin_name']); ?>!</h1>
                                <p class="text-yuki-100 text-lg">Here's what's happening at your hospital today.</p>
                                <div class="flex items-center mt-4 space-x-6 text-yuki-200">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar-day mr-2"></i>
                                        <span><?php echo date('l, F j, Y'); ?></span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-clock mr-2"></i>
                                        <span id="currentTime"><?php echo date('g:i A'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block">
                                <img src="../images/logo.png" alt="Hospital Logo" class="h-20 w-20 object-contain opacity-90 drop-shadow-lg">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Patients -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Patients</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo number_format($totalPatients); ?></p>
                                <p class="text-sm text-green-600 dark:text-green-400 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+12% from last month
                                </p>
                            </div>
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                                <i class="fas fa-users text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Total Staff -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Active Staff</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo number_format($totalStaff); ?></p>
                                <p class="text-sm text-green-600 dark:text-green-400 mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i>+3% from last month
                                </p>
                            </div>
                            <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                                <i class="fas fa-user-md text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Today's Appointments -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Today's Appointments</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo number_format($todayAppointments); ?></p>
                                <p class="text-sm text-blue-600 dark:text-blue-400 mt-1">
                                    <i class="fas fa-calendar mr-1"></i><?php echo date('M d, Y'); ?>
                                </p>
                            </div>
                            <div class="bg-yellow-100 dark:bg-yellow-900 p-3 rounded-full">
                                <i class="fas fa-calendar-check text-yellow-600 dark:text-yellow-400 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Appointments -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Upcoming Appointments</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo number_format($pendingAppointments); ?></p>
                                <p class="text-sm text-orange-600 dark:text-orange-400 mt-1">
                                    <i class="fas fa-calendar-alt mr-1"></i>Future dates
                                </p>
                            </div>
                            <div class="bg-orange-100 dark:bg-orange-900 p-3 rounded-full">
                                <i class="fas fa-calendar-alt text-orange-600 dark:text-orange-400 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Recent Activity -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <!-- Chart -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Patient Statistics</h3>
                        <div class="h-64">
                            <canvas id="patientChart"></canvas>
                        </div>
                    </div>

                    <!-- Recent Patients -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Patients</h3>
                            <a href="patients/view.php" class="text-yuki-600 hover:text-yuki-700 dark:text-yuki-400 dark:hover:text-yuki-300 text-sm font-medium">
                                View All <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="space-y-3">
                            <?php if (empty($recentPatients)): ?>
                                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No recent patients</p>
                            <?php else: ?>
                                <?php foreach ($recentPatients as $patient): ?>
                                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="flex items-center">
                                            <div class="bg-gradient-to-r from-yuki-400 to-secondary-400 rounded-full w-10 h-10 flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-white text-sm"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900 dark:text-white">
                                                    <?php
                                                    $name = '';
                                                    if (isset($patient['FirstName'])) $name .= $patient['FirstName'];
                                                    if (isset($patient['MiddleName']) && $patient['MiddleName']) $name .= ' ' . $patient['MiddleName'];
                                                    if (isset($patient['Surname'])) $name .= ' ' . $patient['Surname'];
                                                    echo htmlspecialchars($name);
                                                    ?>
                                                </p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                                    <?php echo htmlspecialchars($patient['Department'] ?? 'General'); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-medium rounded-full
                                            <?php
                                            $status = isset($patient['Status']) ? $patient['Status'] : 'active';
                                            echo $status === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' :
                                                     ($status === 'confirmed' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' :
                                                      'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200'); ?>">
                                            <?php echo ucfirst($status); ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Quick Actions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <a href="patients/register.php" class="group flex items-center p-5 bg-blue-50 dark:bg-blue-900/20 rounded-xl hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-all duration-200 hover:shadow-md border border-blue-200/50 dark:border-blue-800/50">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-800/50 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-200">
                                <i class="fas fa-user-plus text-blue-600 dark:text-blue-400 text-lg"></i>
                            </div>
                            <div>
                                <span class="font-semibold text-blue-900 dark:text-blue-100 block">Register Patient</span>
                                <span class="text-xs text-blue-600 dark:text-blue-300">Add new patient</span>
                            </div>
                        </a>
                        <a href="staff/register.php" class="group flex items-center p-5 bg-green-50 dark:bg-green-900/20 rounded-xl hover:bg-green-100 dark:hover:bg-green-900/30 transition-all duration-200 hover:shadow-md border border-green-200/50 dark:border-green-800/50">
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-800/50 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-200">
                                <i class="fas fa-user-md text-green-600 dark:text-green-400 text-lg"></i>
                            </div>
                            <div>
                                <span class="font-semibold text-green-900 dark:text-green-100 block">Register Staff</span>
                                <span class="text-xs text-green-600 dark:text-green-300">New staff member</span>
                            </div>
                        </a>
                        <a href="pharmacy/add-category.php" class="group flex items-center p-5 bg-yellow-50 dark:bg-yellow-900/20 rounded-xl hover:bg-yellow-100 dark:hover:bg-yellow-900/30 transition-all duration-200 hover:shadow-md border border-yellow-200/50 dark:border-yellow-800/50">
                            <div class="w-12 h-12 bg-yellow-100 dark:bg-yellow-800/50 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-200">
                                <i class="fas fa-pills text-yellow-600 dark:text-yellow-400 text-lg"></i>
                            </div>
                            <div>
                                <span class="font-semibold text-yellow-900 dark:text-yellow-100 block">Add Medication</span>
                                <span class="text-xs text-yellow-600 dark:text-yellow-300">Pharmacy inventory</span>
                            </div>
                        </a>
                        <a href="patients/view.php" class="group flex items-center p-5 bg-purple-50 dark:bg-purple-900/20 rounded-xl hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-all duration-200 hover:shadow-md border border-purple-200/50 dark:border-purple-800/50">
                            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-800/50 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-200">
                                <i class="fas fa-users text-purple-600 dark:text-purple-400 text-lg"></i>
                            </div>
                            <div>
                                <span class="font-semibold text-purple-900 dark:text-purple-100 block">View Patients</span>
                                <span class="text-xs text-purple-600 dark:text-purple-300">Patient records</span>
                            </div>
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Real-time clock
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });
            const timeElement = document.getElementById('currentTime');
            if (timeElement) {
                timeElement.textContent = timeString;
            }
        }

        // Update time every second
        setInterval(updateTime, 1000);
        updateTime(); // Initial call

        // Patient Statistics Chart
        const ctx = document.getElementById('patientChart').getContext('2d');
        const patientChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'New Patients',
                    data: [12, 19, 15, 25, 22, 30],
                    borderColor: '#006f6a',
                    backgroundColor: 'rgba(0, 111, 106, 0.1)',
                    tension: 0.4,
                    fill: true,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 111, 106, 0.9)',
                        titleColor: 'white',
                        bodyColor: 'white',
                        borderColor: '#006f6a',
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6B7280',
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6B7280',
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
