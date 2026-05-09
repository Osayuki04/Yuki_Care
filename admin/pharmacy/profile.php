<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

// Get medication ID from URL
$medicationId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($medicationId <= 0) {
    header('Location: view.php');
    exit();
}

// Get medication data using your preferred simple method
$db_handle = getDatabaseConnection();
$sql = "SELECT * FROM medication WHERE ID = $medicationId";
$result = mysqli_query($db_handle, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header('Location: view.php');
    exit();
}

$medication = mysqli_fetch_array($result);
mysqli_close($db_handle);

$page_title = "Medication Profile - " . $medication['Name'];
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
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Medication Profile</h1>
                        <p class="text-gray-600 dark:text-gray-400">Complete medication information</p>
                    </div>

                    <!-- Medication Profile Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <!-- Medication Header with Plain Green Background -->
                        <div class="bg-yuki-600 p-8 text-white">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-full w-24 h-24 flex items-center justify-center shadow-lg flex-shrink-0">
                                        <i class="fas fa-pills text-white text-4xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 break-words">
                                            <?php echo htmlspecialchars($medication['Name']); ?>
                                        </h2>
                                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-white/90">
                                            <span class="flex items-center">
                                                <i class="fas fa-barcode mr-3"></i>
                                                <span class="font-medium">ID: <?php echo $medication['ID']; ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-tag mr-3"></i>
                                                <span class="font-medium"><?php echo htmlspecialchars($medication['Category']); ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-prescription-bottle mr-3"></i>
                                                <span class="font-medium"><?php echo htmlspecialchars($medication['Dosage']); ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-6 py-4 text-center">
                                        <div class="text-sm text-white/80 mb-1">Stock Status</div>
                                        <div class="text-lg font-semibold text-white">
                                            <?php
                                            $quantity = (int)$medication['Quantity'];
                                            if ($quantity <= 10): ?>
                                                <span class="flex items-center justify-center">
                                                    <i class="fas fa-exclamation-triangle mr-2 text-red-300"></i>
                                                    Low Stock
                                                </span>
                                            <?php elseif ($quantity <= 50): ?>
                                                <span class="flex items-center justify-center">
                                                    <i class="fas fa-minus-circle mr-2 text-yellow-300"></i>
                                                    Medium Stock
                                                </span>
                                            <?php else: ?>
                                                <span class="flex items-center justify-center">
                                                    <i class="fas fa-check-circle mr-2 text-green-300"></i>
                                                    In Stock
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-12">
                            <!-- Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                                <!-- Basic Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-purple-100 dark:bg-purple-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-info-circle text-purple-600 dark:text-purple-400 text-lg"></i>
                                        </div>
                                        Basic Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Medication Name</span>
                                            <span class="text-gray-900 dark:text-white font-medium text-lg">
                                                <?php echo htmlspecialchars($medication['Name']); ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Dosage</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-prescription-bottle mr-2 text-gray-400"></i>
                                                <?php echo htmlspecialchars($medication['Dosage']); ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Category</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200 w-fit">
                                                <i class="fas fa-tag mr-2"></i>
                                                <?php echo htmlspecialchars($medication['Category']); ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Manufacturer</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-industry mr-2 text-gray-400"></i>
                                                <?php echo htmlspecialchars($medication['Manufacturer']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Inventory Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-blue-100 dark:bg-blue-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-warehouse text-blue-600 dark:text-blue-400 text-lg"></i>
                                        </div>
                                        Inventory Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Current Quantity</span>
                                            <span class="text-gray-900 dark:text-white font-bold text-2xl flex items-center">
                                                <i class="fas fa-boxes mr-2 text-gray-400"></i>
                                                <?php echo $medication['Quantity']; ?> units
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Stock Status</span>
                                            <?php if ($quantity <= 10): ?>
                                                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 w-fit">
                                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                                    Low Stock - Reorder Required
                                                </span>
                                            <?php elseif ($quantity <= 50): ?>
                                                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200 w-fit">
                                                    <i class="fas fa-minus-circle mr-2"></i>
                                                    Medium Stock - Monitor Levels
                                                </span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 w-fit">
                                                    <i class="fas fa-check-circle mr-2"></i>
                                                    Well Stocked
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Stock Level</span>
                                            <div class="w-full bg-gray-200 rounded-full h-3">
                                                <?php
                                                $percentage = min(100, ($quantity / 100) * 100); // Assuming 100 is max stock
                                                $colorClass = $quantity <= 10 ? 'bg-red-500' : ($quantity <= 50 ? 'bg-yellow-500' : 'bg-green-500');
                                                ?>
                                                <div class="<?php echo $colorClass; ?> h-3 rounded-full transition-all duration-300" style="width: <?php echo $percentage; ?>%"></div>
                                            </div>
                                            <span class="text-xs text-gray-500 mt-1"><?php echo round($percentage); ?>% of capacity</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Information -->
                                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-8 flex items-center">
                                        <div class="bg-green-100 dark:bg-green-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-clipboard-list text-green-600 dark:text-green-400 text-lg"></i>
                                        </div>
                                        Additional Details
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Medication ID</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-barcode mr-2 text-gray-400"></i>
                                                <?php echo $medication['ID']; ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Last Updated</span>
                                            <span class="text-gray-900 dark:text-white font-medium flex items-center">
                                                <i class="fas fa-clock mr-2 text-gray-400"></i>
                                                <?php
                                                if (!empty($medication['created_at'])) {
                                                    echo date('M j, Y', strtotime($medication['created_at']));
                                                } else {
                                                    echo 'Not available';
                                                }
                                                ?>
                                            </span>
                                        </div>

                                        <?php if ($quantity <= 10): ?>
                                        <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-3">
                                            <div class="flex items-center">
                                                <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                                <span class="text-sm font-medium text-red-800 dark:text-red-200">Low Stock Alert</span>
                                            </div>
                                            <p class="text-xs text-red-600 dark:text-red-300 mt-1">This medication needs to be restocked soon.</p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Description Section -->
                            <?php if (!empty($medication['Description'])): ?>
                            <div class="mt-12">
                                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-8">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                                        <div class="bg-blue-100 dark:bg-blue-900/50 rounded-lg p-3 mr-4">
                                            <i class="fas fa-file-alt text-blue-600 dark:text-blue-400 text-lg"></i>
                                        </div>
                                        Description & Usage Information
                                    </h3>
                                    <div class="text-gray-900 dark:text-white leading-relaxed text-base">
                                        <?php echo nl2br(htmlspecialchars($medication['Description'])); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Action Buttons -->
                            <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex flex-wrap gap-6">
                                    <a href="view.php" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Back to Medications
                                    </a>
                                    <a href="register.php?edit=<?php echo $medication['ID']; ?>" class="bg-yuki-600 text-white px-6 py-3 rounded-lg hover:bg-yuki-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Medication
                                    </a>
                                    <button onclick="window.print()" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-print mr-2"></i>
                                        Print Details
                                    </button>
                                    <a href="manage.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-cogs mr-2"></i>
                                        Manage Medications
                                    </a>
                                    <?php if ($quantity <= 10): ?>
                                    <button class="bg-orange-600 text-white px-6 py-3 rounded-lg hover:bg-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-plus mr-2"></i>
                                        Restock Alert
                                    </button>
                                    <?php endif; ?>
                                    <button class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-chart-line mr-2"></i>
                                        Usage Analytics
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
