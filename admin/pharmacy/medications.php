<?php
session_start();
require_once '../../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../../auth/admin-login.php');
    exit();
}

// Pagination settings
$recordsPerPage = 5;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $recordsPerPage;

// Search functionality
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$searchCondition = '';
$searchParams = [];

if (!empty($search)) {
    $searchCondition = "WHERE (Name LIKE ? OR Category LIKE ? OR Company LIKE ?)";
    $searchTerm = "%$search%";
    $searchParams = [$searchTerm, $searchTerm, $searchTerm];
}

try {
    $pdo = getDatabaseConnection();
    
    // Get total count for pagination
    $countSql = "SELECT COUNT(*) as total FROM medication $searchCondition";
    $stmt = $pdo->prepare($countSql);
    $stmt->execute($searchParams);
    $totalRecords = $stmt->fetch()['total'];
    $totalPages = ceil($totalRecords / $recordsPerPage);
    
    // Get medications with pagination
    $sql = "SELECT * FROM medication 
            $searchCondition
            ORDER BY created_at DESC 
            LIMIT $recordsPerPage OFFSET $offset";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($searchParams);
    $medications = $stmt->fetchAll();
    
} catch (Exception $e) {
    error_log("View medications error: " . $e->getMessage());
    $medications = [];
    $totalRecords = 0;
    $totalPages = 0;
}

$page_title = "Medications";
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
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Medications</h1>
                                <p class="text-gray-600 dark:text-gray-400">View and manage pharmacy inventory</p>
                            </div>
                            <a href="add-category.php" class="bg-gradient-to-r from-yuki-600 to-yuki-500 text-white px-6 py-3 rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors shadow-lg hover:shadow-xl">
                                <i class="fas fa-plus mr-2"></i>
                                Add Medication
                            </a>
                        </div>
                    </div>

                    <!-- Search and Filters -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-6">
                        <form method="GET" class="flex items-center space-x-4">
                            <div class="flex-1">
                                <div class="relative">
                                    <input type="text" name="search" placeholder="Search medications by name, category, or company..." 
                                           value="<?php echo htmlspecialchars($search); ?>"
                                           class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <button type="submit" class="bg-yuki-600 text-white px-6 py-3 rounded-lg hover:bg-yuki-700 transition-colors">
                                <i class="fas fa-search mr-2"></i>
                                Search
                            </button>
                            <?php if (!empty($search)): ?>
                                <a href="medications.php" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors">
                                    <i class="fas fa-times mr-2"></i>
                                    Clear
                                </a>
                            <?php endif; ?>
                        </form>
                    </div>

                    <!-- Medications Table -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Medication Inventory 
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        (<?php echo number_format($totalRecords); ?> total)
                                    </span>
                                </h2>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    Page <?php echo $currentPage; ?> of <?php echo $totalPages; ?>
                                </div>
                            </div>
                        </div>
                        
                        <?php if (empty($medications)): ?>
                            <div class="p-12 text-center">
                                <i class="fas fa-pills text-gray-300 dark:text-gray-600 text-6xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No medications found</h3>
                                <p class="text-gray-500 dark:text-gray-400 mb-6">
                                    <?php echo !empty($search) ? 'No medications match your search criteria.' : 'Get started by adding your first medication.'; ?>
                                </p>
                                <a href="add-category.php" class="bg-gradient-to-r from-yuki-600 to-yuki-500 text-white px-6 py-3 rounded-lg hover:from-yuki-700 hover:to-yuki-600 transition-colors">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add First Medication
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Medication</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Dosage</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Quantity</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Company</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                        <?php foreach ($medications as $medication): ?>
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="bg-gradient-to-r from-blue-400 to-purple-400 rounded-full w-10 h-10 flex items-center justify-center mr-4">
                                                            <i class="fas fa-pills text-white text-sm"></i>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                                <?php echo htmlspecialchars($medication['Name']); ?>
                                                            </div>
                                                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                                                ID: <?php echo $medication['ID']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                                        <?php echo htmlspecialchars($medication['Category'] ?? 'Uncategorized'); ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    <?php echo htmlspecialchars($medication['Dosage']); ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <span class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                                            <?php echo $medication['Quantity']; ?>
                                                        </span>
                                                        <?php if ($medication['Quantity'] <= 10): ?>
                                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                                                Low Stock
                                                            </span>
                                                        <?php elseif ($medication['Quantity'] <= 50): ?>
                                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                                                Medium
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                                In Stock
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    <?php echo htmlspecialchars($medication['Company'] ?? 'N/A'); ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <button class="bg-blue-100 text-blue-700 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800 px-3 py-2 rounded-lg transition-colors">
                                                            <i class="fas fa-eye mr-1"></i>
                                                            View
                                                        </button>
                                                        <button class="bg-green-100 text-green-700 hover:bg-green-200 dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800 px-3 py-2 rounded-lg transition-colors">
                                                            <i class="fas fa-edit mr-1"></i>
                                                            Update
                                                        </button>
                                                        <button class="bg-red-100 text-red-700 hover:bg-red-200 dark:bg-red-900 dark:text-red-300 dark:hover:bg-red-800 px-3 py-2 rounded-lg transition-colors">
                                                            <i class="fas fa-trash mr-1"></i>
                                                            Delete
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <?php if ($totalPages > 1): ?>
                                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            Showing <?php echo (($currentPage - 1) * $recordsPerPage) + 1; ?> to 
                                            <?php echo min($currentPage * $recordsPerPage, $totalRecords); ?> of 
                                            <?php echo $totalRecords; ?> results
                                        </div>
                                        
                                        <div class="flex space-x-2">
                                            <?php if ($currentPage > 1): ?>
                                                <a href="?page=<?php echo $currentPage - 1; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                                                   class="px-3 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                                    <i class="fas fa-chevron-left"></i>
                                                </a>
                                            <?php endif; ?>
                                            
                                            <?php for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++): ?>
                                                <a href="?page=<?php echo $i; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                                                   class="px-3 py-2 <?php echo $i === $currentPage ? 'bg-yuki-600 text-white' : 'border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'; ?> rounded-lg transition-colors">
                                                    <?php echo $i; ?>
                                                </a>
                                            <?php endfor; ?>
                                            
                                            <?php if ($currentPage < $totalPages): ?>
                                                <a href="?page=<?php echo $currentPage + 1; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                                                   class="px-3 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
