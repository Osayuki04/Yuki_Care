<?php
/** Patient portal — account activation / password reset (request a code). Standalone. */
$error   = flash('portal_error');
$success = flash('portal_success');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Activate Account') ?> - Yibera</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-yuki-700 flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="text-center mb-6">
            <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" class="hidden sm:block h-16 w-auto object-contain mx-auto mb-3">
            <h1 class="text-2xl font-bold text-white">Activate or reset</h1>
        </div>

        <div class="bg-white rounded-md shadow-xl p-8">
            <p class="text-gray-600 mb-6 text-sm">Enter your registered email and we'll send a verification code so you can set a new password.</p>

            <?php if ($error): ?>
                <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md flex items-center text-sm"><i class="fas fa-circle-exclamation mr-2"></i><?= e($error) ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="mb-5 bg-yuki-50 border border-yuki-200 text-yuki-800 px-4 py-3 rounded-md flex items-center text-sm"><i class="fas fa-circle-check mr-2"></i><?= e($success) ?></div>
            <?php endif; ?>

            <form action="<?= url('portal/activate/send') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>
                <div class="relative">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" required class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-gray-900 placeholder-gray-400" placeholder="you@example.com">
                </div>
                <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-3 rounded-md font-semibold transition-colors">Send verification code</button>
            </form>

            <div class="mt-6 text-center">
                <a href="<?= url('portal/login') ?>" class="text-sm text-gray-500 hover:text-yuki-600 font-medium"><i class="fas fa-arrow-left mr-2"></i> Back to sign in</a>
            </div>
        </div>
    </div>
</body>
</html>
