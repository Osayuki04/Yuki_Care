<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Color Test</title>
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Tailwind CSS Color Test</h1>
        
        <!-- Test Standard Colors -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Standard Colors Test</h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="p-4 rounded-lg bg-red-50 border border-red-200">
                    <p class="text-red-800 font-medium">Red 800</p>
                    <p class="text-red-700">Red 700</p>
                    <p class="text-red-600">Red 600</p>
                </div>
                <div class="p-4 rounded-lg bg-green-50 border border-green-200">
                    <p class="text-green-800 font-medium">Green 800</p>
                    <p class="text-green-700">Green 700</p>
                    <p class="text-green-600">Green 600</p>
                </div>
                <div class="p-4 rounded-lg bg-yellow-50 border border-yellow-200">
                    <p class="text-yellow-800 font-medium">Yellow 800</p>
                    <p class="text-yellow-700">Yellow 700</p>
                    <p class="text-yellow-600">Yellow 600</p>
                </div>
            </div>
        </div>

        <!-- Test Custom Colors -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Custom Colors Test</h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="p-4 rounded-lg bg-primary-50 border border-primary-200">
                    <p class="text-primary-800 font-medium">Primary 800</p>
                    <p class="text-primary-700">Primary 700</p>
                    <p class="text-primary-600">Primary 600</p>
                </div>
                <div class="p-4 rounded-lg bg-secondary-50 border border-secondary-200">
                    <p class="text-secondary-800 font-medium">Secondary 800</p>
                    <p class="text-secondary-700">Secondary 700</p>
                    <p class="text-secondary-600">Secondary 600</p>
                </div>
                <div class="p-4 rounded-lg bg-accent-50 border border-accent-200">
                    <p class="text-accent-800 font-medium">Accent 800</p>
                    <p class="text-accent-700">Accent 700</p>
                    <p class="text-accent-600">Accent 600</p>
                </div>
            </div>
        </div>

        <!-- Test Legacy Colors -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Legacy Colors Test</h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="p-4 rounded-lg bg-yuki-50 border border-yuki-200">
                    <p class="text-yuki-800 font-medium">Yuki 800</p>
                    <p class="text-yuki-700">Yuki 700</p>
                    <p class="text-yuki-600">Yuki 600</p>
                </div>
                <div class="p-4 rounded-lg bg-carte-50 border border-carte-200">
                    <p class="text-carte-800 font-medium">Carte 800</p>
                    <p class="text-carte-700">Carte 700</p>
                    <p class="text-carte-600">Carte 600</p>
                </div>
                <div class="p-4 rounded-lg bg-medical-50 border border-medical-200">
                    <p class="text-medical-800 font-medium">Medical 800</p>
                    <p class="text-medical-700">Medical 700</p>
                    <p class="text-medical-600">Medical 600</p>
                </div>
            </div>
        </div>

        <!-- Color Comparison -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Color Comparison (Should be Different)</h2>
            <div class="space-y-2">
                <p class="text-red-800">This should be RED</p>
                <p class="text-green-800">This should be GREEN</p>
                <p class="text-yellow-800">This should be YELLOW</p>
                <p class="text-blue-800">This should be BLUE</p>
                <p class="text-gray-800">This should be GRAY</p>
            </div>
        </div>

        <!-- Success/Error Message Test -->
        <div class="space-y-4">
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    Success message with green-700 text
                </div>
            </div>
            
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    Error message with red-700 text
                </div>
            </div>
            
            <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 px-4 py-3 rounded-xl">
                <div class="flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Warning message with yellow-700 text
                </div>
            </div>
        </div>
    </div>
</body>
</html>
