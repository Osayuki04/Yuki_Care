<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

// Get staff ID from URL
$staffId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($staffId <= 0) {
    header('Location: view.php');
    exit();
}

// Function to calculate age from date of birth
function calculateAge($dateOfBirth) {
    if (empty($dateOfBirth)) return 'N/A';
    
    $birthDate = new DateTime($dateOfBirth);
    $today = new DateTime('today');
    $age = $birthDate->diff($today)->y;
    return $age;
}

// Get staff data using your preferred simple method
$db_handle = getDatabaseConnection();
$sql = "SELECT * FROM staff WHERE ID = $staffId";
$result = mysqli_query($db_handle, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header('Location: view.php');
    exit();
}

$staff = mysqli_fetch_array($result);
$age = calculateAge($staff['DateOfBirth']);

mysqli_close($db_handle);

$page_title = "Staff Profile - " . $staff['FirstName'] . " " . $staff['Surname'];
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
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 dark:bg-gray-900 p-8">
                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-12">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Staff Profile</h1>
                        <p class="text-gray-600 dark:text-gray-400">Complete staff member information</p>
                    </div>

                    <!-- Staff Profile Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <!-- Staff Header with Plain Green Background -->
                        <div class="bg-yuki-600 p-8 text-white">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-full w-24 h-24 flex items-center justify-center shadow-lg flex-shrink-0">
                                        <i class="fas fa-user-tie text-white text-4xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 break-words">
                                            <?php
                                            $fullName = $staff['FirstName'];
                                            if (!empty($staff['MiddleName'])) $fullName .= ' ' . $staff['MiddleName'];
                                            $fullName .= ' ' . $staff['Surname'];
                                            echo htmlspecialchars($fullName);
                                            ?>
                                        </h2>
                                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-white/90">
                                            <span class="flex items-center">
                                                <i class="fas fa-id-badge mr-3"></i>
                                                <span class="font-medium">ID: <?php echo $staff['ID']; ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-venus-mars mr-3"></i>
                                                <span class="font-medium"><?php echo ucfirst($staff['Gender']); ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-birthday-cake mr-3"></i>
                                                <span class="font-medium"><?php echo $age; ?> years old</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-6 py-4 text-center">
                                        <div class="text-sm text-white/80 mb-1">Department</div>
                                        <div class="text-lg font-semibold text-white">
                                            <?php echo !empty($staff['Department']) ? ucfirst($staff['Department']) : 'General'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-12">
                            <!-- Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                                <!-- Personal Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-blue-100 dark:bg-blue-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-user text-blue-600 dark:text-blue-400 text-lg"></i>
                                        </div>
                                        Personal Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Full Name</span>
                                            <span class="text-gray-900 dark:text-white font-medium">
                                                <?php
                                                $fullName = $staff['FirstName'];
                                                if (!empty($staff['MiddleName'])) $fullName .= ' ' . $staff['MiddleName'];
                                                $fullName .= ' ' . $staff['Surname'];
                                                echo htmlspecialchars($fullName);
                                                ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Date of Birth</span>
                                            <span class="text-gray-900 dark:text-white font-medium"><?php echo date('F j, Y', strtotime($staff['DateOfBirth'])); ?></span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Age</span>
                                            <span class="text-gray-900 dark:text-white font-medium"><?php echo $age; ?> years old</span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Gender</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-<?php echo $staff['Gender'] === 'male' ? 'mars' : 'venus'; ?> mr-2 text-<?php echo $staff['Gender'] === 'male' ? 'blue' : 'pink'; ?>-500"></i>
                                                <?php echo ucfirst($staff['Gender']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-green-100 dark:bg-green-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-address-book text-green-600 dark:text-green-400 text-lg"></i>
                                        </div>
                                        Contact Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Email Address</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-envelope mr-2 text-gray-400"></i>
                                                <?php echo htmlspecialchars($staff['Email']); ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Phone Number</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-phone mr-2 text-gray-400"></i>
                                                <?php echo htmlspecialchars($staff['Contact']); ?>
                                            </span>
                                        </div>

                                        <?php if (!empty($staff['EmergencyContact'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Emergency Contact</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-exclamation-triangle mr-2 text-red-500"></i>
                                                <?php echo htmlspecialchars($staff['EmergencyContact']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['Address'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Address</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-start">
                                                <i class="fas fa-map-marker-alt mr-2 text-gray-400 mt-1"></i>
                                                <span><?php echo nl2br(htmlspecialchars($staff['Address'])); ?></span>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Employment Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-purple-100 dark:bg-purple-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-briefcase text-purple-600 dark:text-purple-400 text-lg"></i>
                                        </div>
                                        Employment Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Department</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 w-fit">
                                                <i class="fas fa-hospital-alt mr-2"></i>
                                                <?php echo !empty($staff['Department']) ? ucfirst($staff['Department']) : 'General'; ?>
                                            </span>
                                        </div>

                                        <?php if (!empty($staff['StaffType'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Staff Type</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200 w-fit">
                                                <i class="fas fa-user-tie mr-2"></i>
                                                <?php echo ucfirst($staff['StaffType']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['StaffCategory'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Category</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 w-fit">
                                                <i class="fas fa-tags mr-2"></i>
                                                <?php echo ucfirst($staff['StaffCategory']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['StaffGrade'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Grade</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 w-fit">
                                                <i class="fas fa-star mr-2"></i>
                                                <?php echo ucfirst($staff['StaffGrade']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['HireDate'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Hire Date</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-calendar-plus mr-2 text-gray-400"></i>
                                                <?php echo date('F j, Y', strtotime($staff['HireDate'])); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['Status'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Status</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 w-fit">
                                                <i class="fas fa-check-circle mr-2"></i>
                                                <?php echo ucfirst($staff['Status']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex flex-wrap gap-6">
                                    <a href="view.php" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Back to Staff List
                                    </a>
                                    <a href="register.php?edit=<?php echo $staff['ID']; ?>" class="bg-yuki-600 text-white px-6 py-3 rounded-lg hover:bg-yuki-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Staff
                                    </a>
                                    <button onclick="window.print()" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-print mr-2"></i>
                                        Print Profile
                                    </button>
                                    <a href="manage.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-users mr-2"></i>
                                        Manage Staff
                                    </a>
                                    <button class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-clock mr-2"></i>
                                        Work Schedule
                                    </button>
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
