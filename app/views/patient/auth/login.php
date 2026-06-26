<?php
/** Patient portal — step 1: email + password. Standalone page. */
$error   = flash('portal_error');
$success = flash('portal_success');
$email   = $_SESSION['portal_old_email'] ?? '';
unset($_SESSION['portal_old_email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Patient Login') ?> - Yibera</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Brand panel -->
        <div class="relative hidden lg:flex flex-col justify-between p-12 overflow-hidden bg-cover bg-center" style="background-image:url('<?= asset('images/loginbackgrounds.png') ?>')">
            <div class="absolute inset-0 bg-yuki-950/80"></div>
            <a href="<?= url('home') ?>" class="relative flex items-center gap-3">
                <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" class="h-16 w-auto object-contain">
                <div><p class="text-lg font-bold leading-tight text-white">Yibera</p><p class="text-sm text-yuki-100">Patient Portal</p></div>
            </a>
            <div class="relative max-w-md">
                <h1 class="text-4xl xl:text-5xl font-bold leading-tight mb-4 text-white">Patient <span class="text-secondary-300">Portal</span></h1>
                <p class="text-lg text-white/85">Manage your appointments, prescriptions, lab results and bills — securely, anytime.</p>
            </div>
            <p class="relative text-sm text-white/70">&copy; <?= date('Y') ?> Yibera Medical Center.</p>
        </div>

        <!-- Form -->
        <div class="flex items-center justify-center p-6 sm:p-10">
            <div class="w-full max-w-md">
                <a href="<?= url('home') ?>" class="lg:hidden flex items-center justify-center mb-8">
                    <span class="text-xl font-bold text-gray-900">Yibera</span>
                </a>

                <div class="mb-8 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Sign in</h2>
                    <p class="text-gray-500">Access your patient portal to continue.</p>
                </div>

                <?php if ($error): ?>
                    <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md flex items-center"><i class="fas fa-circle-exclamation mr-2"></i><?= e($error) ?></div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="mb-5 bg-yuki-50 border border-yuki-200 text-yuki-800 px-4 py-3 rounded-md flex items-center"><i class="fas fa-circle-check mr-2"></i><?= e($success) ?></div>
                <?php endif; ?>

                <form action="<?= url('portal/login/submit') ?>" method="POST" class="space-y-5">
                    <?= csrf_field() ?>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-envelope"></i></span>
                            <input type="email" id="email" name="email" required value="<?= e($email) ?>"
                                   class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-gray-900 placeholder-gray-400 transition" placeholder="you@example.com">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-lock"></i></span>
                            <input type="password" id="password" name="password" required
                                   class="w-full pl-11 pr-11 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-gray-900 placeholder-gray-400 transition" placeholder="Your password">
                            <button type="button" onclick="(()=>{const p=document.getElementById('password'),i=document.getElementById('ti');const s=p.type==='password';p.type=s?'text':'password';i.className='fas '+(s?'fa-eye-slash':'fa-eye');})()" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"><i class="fas fa-eye" id="ti"></i></button>
                        </div>
                    </div>
                    <div class="flex items-center justify-end">
                        <a href="<?= url('portal/activate') ?>" class="text-sm font-medium text-yuki-600 hover:text-yuki-700">Forgot / activate account?</a>
                    </div>
                    <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-3 rounded-md font-semibold transition-colors shadow-sm">
                        <i class="fas fa-arrow-right-to-bracket mr-2"></i> Continue
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-500">
                    New here? <a href="<?= url('portal/register') ?>" class="font-medium text-yuki-600 hover:text-yuki-700">Create an account</a>
                </p>
                <div class="mt-4 text-center">
                    <a href="<?= url('home') ?>" class="inline-flex items-center text-sm text-gray-500 hover:text-yuki-600 font-medium"><i class="fas fa-arrow-left mr-2"></i> Back to homepage</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
