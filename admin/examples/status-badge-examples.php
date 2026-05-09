<?php
require_once '../includes/status-helpers.php';

// Sample patient data for demonstration
$patients = [
    ['Status' => 'pending', 'FirstName' => 'John', 'Surname' => 'Doe'],
    ['Status' => 'confirmed', 'FirstName' => 'Jane', 'Surname' => 'Smith'],
    ['Status' => 'completed', 'FirstName' => 'Bob', 'Surname' => 'Johnson'],
    ['Status' => 'cancelled', 'FirstName' => 'Alice', 'Surname' => 'Brown'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Badge Examples</title>
    <link href="../../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Status Badge Examples</h1>
        
        <!-- Method 1: Using Helper Function (Recommended) -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Method 1: Helper Function (Recommended)</h2>
            <div class="bg-white rounded-lg p-6 shadow-sm border">
                <div class="space-y-4">
                    <?php foreach ($patients as $patient): ?>
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <span class="font-medium"><?php echo $patient['FirstName'] . ' ' . $patient['Surname']; ?></span>
                            <?php echo renderStatusBadge($patient['Status'], true, 'md'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                    <h4 class="font-medium text-blue-900 mb-2">Code:</h4>
                    <pre class="text-sm text-blue-800"><code>&lt;?php echo renderStatusBadge($patient['Status'], true, 'md'); ?&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Method 2: Switch Statement -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Method 2: Switch Statement</h2>
            <div class="bg-white rounded-lg p-6 shadow-sm border">
                <div class="space-y-4">
                    <?php foreach ($patients as $patient): ?>
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <span class="font-medium"><?php echo $patient['FirstName'] . ' ' . $patient['Surname']; ?></span>
                            <?php
                            $statusClasses = '';
                            switch($patient['Status']) {
                                case 'pending':
                                    $statusClasses = 'bg-yellow-100 text-yellow-800 border-yellow-200';
                                    break;
                                case 'confirmed':
                                    $statusClasses = 'bg-green-100 text-green-800 border-green-200';
                                    break;
                                case 'completed':
                                    $statusClasses = 'bg-blue-100 text-blue-800 border-blue-200';
                                    break;
                                case 'cancelled':
                                    $statusClasses = 'bg-red-100 text-red-800 border-red-200';
                                    break;
                                default:
                                    $statusClasses = 'bg-gray-100 text-gray-800 border-gray-200';
                            }
                            ?>
                            <span class="px-4 py-2 text-sm font-medium rounded-full border <?php echo $statusClasses; ?>">
                                <?php echo ucfirst($patient['Status']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Method 3: Clean Ternary (Fixed Version) -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Method 3: Clean Ternary (Fixed)</h2>
            <div class="bg-white rounded-lg p-6 shadow-sm border">
                <div class="space-y-4">
                    <?php foreach ($patients as $patient): ?>
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <span class="font-medium"><?php echo $patient['FirstName'] . ' ' . $patient['Surname']; ?></span>
                            <span class="px-4 py-2 text-sm font-medium rounded-full border <?php 
                                echo $patient['Status'] === 'pending' ? 'bg-yellow-100 text-yellow-800 border-yellow-200' : 
                                    ($patient['Status'] === 'confirmed' ? 'bg-green-100 text-green-800 border-green-200' : 
                                    ($patient['Status'] === 'completed' ? 'bg-blue-100 text-blue-800 border-blue-200' :
                                    ($patient['Status'] === 'cancelled' ? 'bg-red-100 text-red-800 border-red-200' : 
                                     'bg-gray-100 text-gray-800 border-gray-200')));
                            ?>">
                                <?php echo ucfirst($patient['Status']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="mt-6 p-4 bg-red-50 rounded-lg">
                    <h4 class="font-medium text-red-900 mb-2">❌ Problems with this approach:</h4>
                    <ul class="text-sm text-red-800 space-y-1">
                        <li>• Hard to read and maintain</li>
                        <li>• Easy to make syntax errors</li>
                        <li>• IDE warnings and confusion</li>
                        <li>• Difficult to add new statuses</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Method 4: Array Mapping -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Method 4: Array Mapping</h2>
            <div class="bg-white rounded-lg p-6 shadow-sm border">
                <div class="space-y-4">
                    <?php 
                    $statusMap = [
                        'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                        'confirmed' => 'bg-green-100 text-green-800 border-green-200',
                        'completed' => 'bg-blue-100 text-blue-800 border-blue-200',
                        'cancelled' => 'bg-red-100 text-red-800 border-red-200'
                    ];
                    ?>
                    <?php foreach ($patients as $patient): ?>
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <span class="font-medium"><?php echo $patient['FirstName'] . ' ' . $patient['Surname']; ?></span>
                            <span class="px-4 py-2 text-sm font-medium rounded-full border <?php echo $statusMap[$patient['Status']] ?? 'bg-gray-100 text-gray-800 border-gray-200'; ?>">
                                <?php echo ucfirst($patient['Status']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="mt-6 p-4 bg-green-50 rounded-lg">
                    <h4 class="font-medium text-green-900 mb-2">✅ Benefits:</h4>
                    <ul class="text-sm text-green-800 space-y-1">
                        <li>• Clean and readable</li>
                        <li>• Easy to maintain</li>
                        <li>• No syntax errors</li>
                        <li>• Good for simple mappings</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Size Variations -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Size Variations (Helper Function)</h2>
            <div class="bg-white rounded-lg p-6 shadow-sm border">
                <div class="space-y-6">
                    <div>
                        <h4 class="font-medium mb-2">Small Size:</h4>
                        <div class="flex space-x-2">
                            <?php foreach (['pending', 'confirmed', 'completed', 'cancelled'] as $status): ?>
                                <?php echo renderStatusBadge($status, true, 'sm'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium mb-2">Medium Size (Default):</h4>
                        <div class="flex space-x-2">
                            <?php foreach (['pending', 'confirmed', 'completed', 'cancelled'] as $status): ?>
                                <?php echo renderStatusBadge($status, true, 'md'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium mb-2">Large Size:</h4>
                        <div class="flex space-x-2">
                            <?php foreach (['pending', 'confirmed', 'completed', 'cancelled'] as $status): ?>
                                <?php echo renderStatusBadge($status, true, 'lg'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium mb-2">Without Icons:</h4>
                        <div class="flex space-x-2">
                            <?php foreach (['pending', 'confirmed', 'completed', 'cancelled'] as $status): ?>
                                <?php echo renderStatusBadge($status, false, 'md'); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommendation -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-blue-900 mb-2">💡 Recommendation</h3>
            <p class="text-blue-800 mb-4">
                Use <strong>Method 1 (Helper Function)</strong> for the best maintainability and consistency across your application.
            </p>
            <div class="bg-blue-100 rounded p-3">
                <code class="text-blue-900">&lt;?php echo renderStatusBadge($patient['Status'], true, 'md'); ?&gt;</code>
            </div>
        </div>
    </div>
</body>
</html>
