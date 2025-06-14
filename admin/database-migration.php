<?php
session_start();
require_once '../config/database.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../auth/admin-login.php');
    exit();
}

// Function to check if column exists
function columnExists($pdo, $table, $column) {
    try {
        $stmt = $pdo->prepare("SHOW COLUMNS FROM `$table` LIKE ?");
        $stmt->execute([$column]);
        return $stmt->rowCount() > 0;
    } catch (Exception $e) {
        return false;
    }
}

// Function to add missing columns
function addMissingColumns($pdo) {
    $migrations = [];
    
    try {
        // Check and add password_hash column to person table
        if (!columnExists($pdo, 'person', 'password_hash')) {
            $pdo->exec("ALTER TABLE person ADD COLUMN password_hash VARCHAR(255) NULL");
            $migrations[] = "Added password_hash column to person table";
        }
        
        // Check and add created_at column to person table if missing
        if (!columnExists($pdo, 'person', 'created_at')) {
            $pdo->exec("ALTER TABLE person ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
            $migrations[] = "Added created_at column to person table";
        }
        
        // Check and add Status column to patient table if missing
        if (!columnExists($pdo, 'patient', 'Status')) {
            $pdo->exec("ALTER TABLE patient ADD COLUMN Status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending'");
            $migrations[] = "Added Status column to patient table";
        }
        
        // Check and add created_at column to patient table if missing
        if (!columnExists($pdo, 'patient', 'created_at')) {
            $pdo->exec("ALTER TABLE patient ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
            $migrations[] = "Added created_at column to patient table";
        }
        
        return $migrations;
        
    } catch (Exception $e) {
        throw new Exception("Migration failed: " . $e->getMessage());
    }
}

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['run_migration'])) {
    try {
        $pdo = getDatabaseConnection();
        $migrations = addMissingColumns($pdo);
        
        if (empty($migrations)) {
            $message = "No migrations needed. All columns are up to date.";
        } else {
            $message = "Migration completed successfully:\n" . implode("\n", $migrations);
        }
        
    } catch (Exception $e) {
        $error = "Migration failed: " . $e->getMessage();
        error_log("Database migration error: " . $e->getMessage());
    }
}

// Check current table structure
$tableInfo = [];
try {
    $pdo = getDatabaseConnection();
    
    // Get person table structure
    $stmt = $pdo->query("SHOW COLUMNS FROM person");
    $tableInfo['person'] = $stmt->fetchAll();
    
    // Get patient table structure
    $stmt = $pdo->query("SHOW COLUMNS FROM patient");
    $tableInfo['patient'] = $stmt->fetchAll();
    
} catch (Exception $e) {
    $error = "Could not retrieve table information: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Migration - Hospital Management</title>
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <img src="../../assets/images/logo.png" alt="Hospital Logo" class="h-10 w-auto mr-3">
                        <h1 class="text-2xl font-bold text-gray-900">Database Migration</h1>
                    </div>
                    <a href="../dashboard.php" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                    </a>
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Messages -->
            <?php if ($message): ?>
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <pre class="whitespace-pre-wrap"><?php echo htmlspecialchars($message); ?></pre>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Migration Form -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900">Run Database Migration</h2>
                    <p class="text-gray-600 mt-2">This will add any missing columns to your database tables.</p>
                </div>
                <div class="p-6">
                    <form method="POST">
                        <button type="submit" name="run_migration" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-database mr-2"></i>Run Migration
                        </button>
                    </form>
                </div>
            </div>

            <!-- Table Information -->
            <?php if (!empty($tableInfo)): ?>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <?php foreach ($tableInfo as $tableName => $columns): ?>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900"><?php echo ucfirst($tableName); ?> Table Structure</h3>
                            </div>
                            <div class="p-6">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Null</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Default</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <?php foreach ($columns as $column): ?>
                                                <tr>
                                                    <td class="px-4 py-3 text-sm font-medium text-gray-900"><?php echo htmlspecialchars($column['Field']); ?></td>
                                                    <td class="px-4 py-3 text-sm text-gray-500"><?php echo htmlspecialchars($column['Type']); ?></td>
                                                    <td class="px-4 py-3 text-sm text-gray-500"><?php echo htmlspecialchars($column['Null']); ?></td>
                                                    <td class="px-4 py-3 text-sm text-gray-500"><?php echo htmlspecialchars($column['Default'] ?? 'NULL'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
