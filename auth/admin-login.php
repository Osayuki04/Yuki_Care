<?php
session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['admin_id'])) {
    header('Location: ../admin/dashboard.php');
    exit();
}

$page_title = "Admin Login";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Yuki Care Medical Center</title>
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .medical-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23006f6a' fill-opacity='0.1'%3E%3Cpath d='M30 30c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20zm0 0c0 11.046 8.954 20 20 20s20-8.954 20-20-8.954-20-20-20-20 8.954-20 20z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-yuki-50 via-white to-secondary-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
    <!-- Background Pattern -->
    <div class="absolute inset-0 medical-pattern opacity-30"></div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-20 w-40 h-40 bg-gradient-to-r from-yuki-200/30 to-secondary-200/30 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-20 w-32 h-32 bg-gradient-to-r from-secondary-200/30 to-yuki-200/30 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>

    <div class="relative min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Left Column: Professional Medical Image -->
        <div class="relative bg-gradient-to-br from-yuki-600 to-primary-600 flex items-center justify-center p-8">
            <!-- Background Pattern -->
            <div class="absolute inset-0 medical-pattern opacity-20"></div>

            <!-- Floating Elements -->
            <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-24 h-24 bg-white/10 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>

            <div class="relative text-center text-white max-w-lg">
                <!-- Logo -->
                <div class="mb-8">
                    <img src="../images/logo.png" alt="Yuki Care Medical Center" class="h-32 w-32 mx-auto object-contain">
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Admin Portal
                </h1>
                <p class="text-xl mb-8 text-white/90">
                    Secure access to comprehensive hospital management system
                </p>

                <!-- Features -->
                <div class="space-y-4 text-left">
                    <div class="flex items-center">
                        <div class="bg-white/20 rounded-full p-2 mr-4">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <span>Advanced Security & Encryption</span>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-white/20 rounded-full p-2 mr-4">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                        <span>Real-time Analytics Dashboard</span>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-white/20 rounded-full p-2 mr-4">
                            <i class="fas fa-users-cog text-white"></i>
                        </div>
                        <span>Complete Hospital Management</span>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-white/20 rounded-full p-2 mr-4">
                            <i class="fas fa-mobile-alt text-white"></i>
                        </div>
                        <span>Mobile-Responsive Interface</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Login Form -->
        <div class="flex items-center justify-center p-8 bg-white dark:bg-gray-900">
            <div class="max-w-md w-full space-y-8">
                <!-- Header -->
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        Welcome Back
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300">
                        Sign in to your admin dashboard
                    </p>
                </div>

                <!-- Login Form -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-3xl shadow-2xl p-8 border border-gray-200 dark:border-gray-700">
                <?php if (isset($_SESSION['login_error'])): ?>
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <?php echo htmlspecialchars($_SESSION['login_error']); ?>
                        </div>
                    </div>
                    <?php unset($_SESSION['login_error']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['login_success'])): ?>
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            <?php echo htmlspecialchars($_SESSION['login_success']); ?>
                        </div>
                    </div>
                    <?php unset($_SESSION['login_success']); ?>
                <?php endif; ?>

                <form action="process-admin-login.php" method="POST" class="space-y-6">
                    <!-- Username Field -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-user mr-2 text-yuki-600"></i>Username
                        </label>
                        <input type="text" id="username" name="username" required
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all duration-200"
                               placeholder="Enter your username"
                               value="<?php echo htmlspecialchars($_SESSION['login_username'] ?? ''); ?>">
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-lock mr-2 text-yuki-600"></i>Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all duration-200 pr-12"
                                   placeholder="Enter your password">
                            <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-yuki-600 focus:ring-yuki-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="text-sm text-yuki-600 hover:text-yuki-500 dark:text-yuki-400 dark:hover:text-yuki-300">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-yuki-600 to-yuki-500 text-white py-3 px-4 rounded-xl font-semibold hover:from-yuki-700 hover:to-yuki-600 focus:outline-none focus:ring-2 focus:ring-yuki-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In to Dashboard
                    </button>
                </form>

                    <!-- Additional Info -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Secure healthcare administration portal
                        </p>
                        <div class="flex justify-center items-center mt-4 space-x-4 text-xs text-gray-500">
                            <span class="flex items-center">
                                <i class="fas fa-shield-alt mr-1 text-green-500"></i>
                                SSL Secured
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-lock mr-1 text-blue-500"></i>
                                HIPAA Compliant
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Back to Home -->
                <div class="text-center">
                    <a href="../home/" class="inline-flex items-center text-yuki-600 hover:text-yuki-500 dark:text-yuki-400 dark:hover:text-yuki-300 font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Clear session data
        <?php 
        unset($_SESSION['login_username']);
        ?>
    </script>
</body>
</html>
