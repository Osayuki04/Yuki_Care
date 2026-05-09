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

// Simple database query using your preferred method
$db_handle = getDatabaseConnection();

// Get all patients - simple approach
$sql_new = "SELECT * FROM patient ORDER BY ID DESC";
$resultnew = mysqli_query($db_handle, $sql_new);

// Count total records
$count_sql = "SELECT COUNT(*) as total FROM patient";
$count_result = mysqli_query($db_handle, $count_sql);
$totalRecords = 0;
if ($count_result) {
    $count_row = mysqli_fetch_array($count_result);
    $totalRecords = $count_row['total'];
}

$patients = [];
if ($resultnew) {
    while ($db_fields = mysqli_fetch_array($resultnew)) {
        $patients[] = $db_fields;
    }
}

$page_title = "View Patients";
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
                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">View Patients</h1>
                                <p class="text-gray-600 dark:text-gray-400">Manage and view all registered patients</p>
                            </div>
                            <a href="register.php" class="bg-gradient-to-r from-yuki-600 to-yuki-500 text-white px-6 py-3 rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors shadow-lg hover:shadow-xl">
                                <i class="fas fa-user-plus mr-2"></i>
                                Register New Patient
                            </a>
                        </div>
                    </div>

                    <!-- Simple patient list without search for now -->

                    <!-- Patients Table -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Patients List
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        (<?php echo number_format($totalRecords); ?> total)
                                    </span>
                                </h2>
                            </div>
                        </div>
                        
                        <?php if (empty($patients)): ?>
                            <div class="p-12 text-center">
                                <i class="fas fa-users text-gray-300 dark:text-gray-600 text-6xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No patients found</h3>
                                <p class="text-gray-500 dark:text-gray-400 mb-6">
                                    <?php echo !empty($search) ? 'No patients match your search criteria.' : 'Get started by registering your first patient.'; ?>
                                </p>
                                <a href="register.php" class="bg-gradient-to-r from-yuki-600 to-yuki-500 text-white px-6 py-3 rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Register First Patient
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Patient</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Contact</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Age</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        <?php foreach ($patients as $patient): ?>
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="bg-gradient-to-r from-yuki-400 to-secondary-400 rounded-full w-10 h-10 flex items-center justify-center mr-4">
                                                            <i class="fas fa-user text-white text-sm"></i>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                                <?php
                                                                $name = '';
                                                                if (isset($patient['FirstName'])) $name .= $patient['FirstName'];
                                                                if (isset($patient['MiddleName']) && $patient['MiddleName']) $name .= ' ' . $patient['MiddleName'];
                                                                if (isset($patient['Surname'])) $name .= ' ' . $patient['Surname'];
                                                                echo htmlspecialchars($name);
                                                                ?>
                                                            </div>
                                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                                Patient ID: <?php echo $patient['ID']; ?>
                                                                <?php if (isset($patient['Gender'])): ?>
                                                                    | <?php echo ucfirst($patient['Gender']); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 dark:text-white">
                                                        <?php echo isset($patient['Email']) ? htmlspecialchars($patient['Email']) : 'N/A'; ?>
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                                        <?php echo isset($patient['Contact']) ? htmlspecialchars($patient['Contact']) : 'N/A'; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    <?php
                                                    $age = calculateAge($patient['DateOfBirth']);
                                                    echo $age !== 'N/A' ? $age . ' years' : 'N/A';
                                                    ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                                        <?php echo isset($patient['Status']) ? ucfirst($patient['Status']) : 'Active'; ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="profile.php?id=<?php echo $patient['ID']; ?>"
                                                       class="bg-blue-100 text-blue-700 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors mr-2">
                                                        <i class="fas fa-eye mr-1"></i>
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Simple display - no pagination needed -->
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
