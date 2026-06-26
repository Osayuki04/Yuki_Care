<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Admin Login') ?> - Yibera Medical Center</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">

        <!-- Left: brand panel -->
        <div class="relative hidden lg:flex flex-col justify-between p-12 overflow-hidden bg-cover bg-center" style="background-image:url('<?= asset('images/adminloginbackground.png') ?>')">
            <div class="absolute inset-0 bg-yuki-950/80"></div>

            <!-- logo -->
            <a href="<?= url('home') ?>" class="relative flex items-center gap-3">
                <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" class="h-16 w-auto object-contain">
                <div>
                    <p class="text-lg font-bold leading-tight text-white">Yibera</p>
                    <p class="text-sm text-yuki-100">Medical Center</p>
                </div>
            </a>

            <!-- pitch -->
            <div class="relative max-w-md">
                <h1 class="text-4xl xl:text-5xl font-bold leading-tight mb-4 text-white">Admin <span class="text-secondary-300">Portal</span></h1>
                <p class="text-lg text-white/85">Secure access to your complete hospital management system — patients, staff, pharmacy and reports in one place.</p>
            </div>

            <p class="relative text-sm text-white/70">&copy; <?= date('Y') ?> Yibera Medical Center. All rights reserved.</p>
        </div>

        <!-- Right: login form -->
        <div class="flex items-center justify-center p-6 sm:p-10">
            <div class="w-full max-w-md">
                <!-- mobile wordmark (logo image removed on mobile) -->
                <a href="<?= url('home') ?>" class="lg:hidden flex items-center justify-center mb-8">
                    <span class="text-xl font-bold text-gray-900">Yibera</span>
                </a>

                <div class="mb-8 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome back</h2>
                    <p class="text-gray-500">Sign in to your admin dashboard to continue.</p>
                </div>

                <?php if (isset($_SESSION['login_error'])): ?>
                    <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md flex items-center">
                        <i class="fas fa-circle-exclamation mr-2"></i>
                        <?= e($_SESSION['login_error']) ?>
                    </div>
                    <?php unset($_SESSION['login_error']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['login_success'])): ?>
                    <div class="mb-5 bg-yuki-50 border border-yuki-200 text-yuki-800 px-4 py-3 rounded-md flex items-center">
                        <i class="fas fa-circle-check mr-2"></i>
                        <?= e($_SESSION['login_success']) ?>
                    </div>
                    <?php unset($_SESSION['login_success']); ?>
                <?php endif; ?>

                <form action="<?= url('process-admin-login') ?>" method="POST" class="space-y-5">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-user"></i></span>
                            <input type="text" id="username" name="username" required
                                   class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-gray-900 placeholder-gray-400 transition"
                                   placeholder="Enter your username"
                                   value="<?= e($_SESSION['login_username'] ?? '') ?>">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-lock"></i></span>
                            <input type="password" id="password" name="password" required
                                   class="w-full pl-11 pr-11 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-gray-900 placeholder-gray-400 transition"
                                   placeholder="Enter your password">
                            <button type="button" onclick="togglePassword()" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox" name="remember" class="h-4 w-4 text-yuki-600 focus:ring-yuki-500 border-gray-300 rounded">
                            Remember me
                        </label>
                        <a href="#" class="text-sm font-medium text-yuki-600 hover:text-yuki-700">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-3 rounded-md font-semibold transition-colors shadow-sm">
                        <i class="fas fa-arrow-right-to-bracket mr-2"></i> Sign In
                    </button>
                </form>

                <div class="mt-8 flex items-center justify-center gap-6 text-xs text-gray-400">
                    <span class="flex items-center gap-1.5"><i class="fas fa-shield-halved text-yuki-500"></i> SSL Secured</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-lock text-yuki-500"></i> HIPAA Compliant</span>
                </div>

                <div class="mt-6 text-center">
                    <a href="<?= url('home') ?>" class="inline-flex items-center text-sm text-gray-500 hover:text-yuki-600 font-medium transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i> Back to homepage
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const field = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            const show = field.type === 'password';
            field.type = show ? 'text' : 'password';
            icon.classList.toggle('fa-eye', !show);
            icon.classList.toggle('fa-eye-slash', show);
        }
        <?php unset($_SESSION['login_username']); ?>
    </script>
</body>
</html>
