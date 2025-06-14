<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
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

// Get patient ID from URL
$patientId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($patientId <= 0) {
    header('Location: view.php');
    exit();
}

// Get patient information from database using your preferred method
$db_handle = getDatabaseConnection();
$sql = "SELECT * FROM patient WHERE ID = $patientId";
$result = mysqli_query($db_handle, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header('Location: view.php');
    exit();
}

$patient = mysqli_fetch_array($result);
$age = calculateAge($patient['DateOfBirth']);

$page_title = "Patient Profile - " . $patient['FirstName'] . " " . $patient['Surname'];
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
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Patient Profile</h1>
                                <p class="text-gray-600 dark:text-gray-400">Detailed information for patient ID: <?php echo $patient['ID']; ?></p>
                            </div>
                            <a href="view.php" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back to Patients
                            </a>
                        </div>
                    </div>

                    <!-- Patient Information Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <!-- Card Header with Plain Green Background -->
                        <div class="bg-yuki-600 p-8 text-white">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-full w-24 h-24 flex items-center justify-center shadow-lg flex-shrink-0">
                                        <i class="fas fa-user text-white text-4xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 break-words">
                                            <?php
                                            echo htmlspecialchars($patient['FirstName']);
                                            if (!empty($patient['MiddleName'])) echo ' ' . htmlspecialchars($patient['MiddleName']);
                                            echo ' ' . htmlspecialchars($patient['Surname']);
                                            ?>
                                        </h2>
                                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-white/90">
                                            <span class="flex items-center">
                                                <i class="fas fa-id-card mr-3"></i>
                                                <span class="font-medium">ID: <?php echo $patient['ID']; ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-venus-mars mr-3"></i>
                                                <span class="font-medium"><?php echo ucfirst($patient['Gender']); ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-birthday-cake mr-3"></i>
                                                <span class="font-medium"><?php echo $age; ?> years old</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-12">
                            <!-- Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                                <!-- Personal Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-yuki-100 dark:bg-yuki-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-user-circle text-yuki-600 dark:text-yuki-400 text-lg"></i>
                                        </div>
                                        Personal Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Full Name</span>
                                            <span class="text-gray-900 dark:text-white font-medium text-lg">
                                                <?php
                                                echo htmlspecialchars($patient['FirstName']);
                                                if (!empty($patient['MiddleName'])) echo ' ' . htmlspecialchars($patient['MiddleName']);
                                                echo ' ' . htmlspecialchars($patient['Surname']);
                                                ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Date of Birth</span>
                                            <span class="text-gray-900 dark:text-white font-medium"><?php echo date('F j, Y', strtotime($patient['DateOfBirth'])); ?></span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Age</span>
                                            <span class="text-gray-900 dark:text-white font-medium"><?php echo $age; ?> years old</span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Gender</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-<?php echo $patient['Gender'] === 'male' ? 'mars' : 'venus'; ?> mr-3 text-<?php echo $patient['Gender'] === 'male' ? 'blue' : 'pink'; ?>-500"></i>
                                                <?php echo ucfirst($patient['Gender']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-blue-100 dark:bg-blue-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-phone text-blue-600 dark:text-blue-400 text-lg"></i>
                                        </div>
                                        Contact Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Email Address</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-envelope mr-3 text-gray-400"></i>
                                                <?php echo isset($patient['Email']) ? htmlspecialchars($patient['Email']) : 'Not provided'; ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Phone Number</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-phone mr-3 text-gray-400"></i>
                                                <?php echo isset($patient['Contact']) ? htmlspecialchars($patient['Contact']) : 'Not provided'; ?>
                                            </span>
                                        </div>

                                        <?php if (!empty($patient['EmergencyContact'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Emergency Contact</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-exclamation-triangle mr-3 text-red-500"></i>
                                                <?php echo htmlspecialchars($patient['EmergencyContact']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($patient['Address'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Address</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-start">
                                                <i class="fas fa-map-marker-alt mr-3 text-gray-400 mt-1"></i>
                                                <span><?php echo nl2br(htmlspecialchars($patient['Address'])); ?></span>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Medical Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-green-100 dark:bg-green-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-stethoscope text-green-600 dark:text-green-400 text-lg"></i>
                                        </div>
                                        Medical Information
                                    </h3>

                                    <div class="space-y-6">


                                        <?php if (!empty($patient['PreferredDate'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Preferred Appointment Date</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-calendar-alt mr-2 text-gray-400"></i>
                                                <?php echo date('F j, Y', strtotime($patient['PreferredDate'])); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($patient['Status'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Status</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 w-fit">
                                                <i class="fas fa-check-circle mr-2"></i>
                                                <?php echo ucfirst($patient['Status']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Registration Date</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-calendar-plus mr-2 text-gray-400"></i>
                                                <?php
                                                if (!empty($patient['created_at'])) {
                                                    echo date('M j, Y', strtotime($patient['created_at']));
                                                } else {
                                                    echo 'Not available';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notes Section -->
                            <?php if (!empty($patient['Notes'])): ?>
                            <div class="mt-12">
                                <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                                        <div class="bg-amber-100 dark:bg-amber-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-sticky-note text-amber-600 dark:text-amber-400 text-lg"></i>
                                        </div>
                                        Patient Notes
                                    </h3>
                                    <div class="text-gray-900 dark:text-white leading-relaxed text-base">
                                        <?php echo nl2br(htmlspecialchars($patient['Notes'])); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Action Buttons -->
                            <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex flex-wrap gap-6">
                                    <a href="view.php" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Back to Patients List
                                    </a>
                                    <a href="register.php?edit=<?php echo $patient['ID']; ?>" class="bg-yuki-600 text-white px-6 py-3 rounded-lg hover:bg-yuki-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Patient
                                    </a>
                                    <button onclick="window.print()" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-print mr-2"></i>
                                        Print Profile
                                    </button>
                                    <a href="manage.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-users mr-2"></i>
                                        Manage Patients
                                    </a>
                                    <button class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-file-medical mr-2"></i>
                                        Medical History
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
