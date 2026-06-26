<?php
/** Patient portal — step 2: email OTP verification. Standalone page. */
$error   = flash('portal_error');
$success = flash('portal_success');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Verify Code') ?> - Yibera</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-yuki-700 flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="text-center mb-6">
            <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" class="hidden sm:block h-16 w-auto object-contain mx-auto mb-3">
            <h1 class="text-2xl font-bold text-white">Two-factor verification</h1>
        </div>

        <div class="bg-white rounded-md shadow-xl p-8">
            <div class="w-14 h-14 rounded-md bg-yuki-50 text-yuki-600 flex items-center justify-center mx-auto mb-4 text-2xl"><i class="fas fa-shield-halved"></i></div>
            <p class="text-center text-gray-600 mb-1">We sent a 6-digit code to</p>
            <p class="text-center font-semibold text-gray-900 mb-6"><?= e($maskedEmail) ?></p>

            <?php if ($error): ?>
                <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md flex items-center text-sm"><i class="fas fa-circle-exclamation mr-2"></i><?= e($error) ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="mb-5 bg-yuki-50 border border-yuki-200 text-yuki-800 px-4 py-3 rounded-md flex items-center text-sm"><i class="fas fa-circle-check mr-2"></i><?= e($success) ?></div>
            <?php endif; ?>

            <form action="<?= url('portal/otp/verify') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>
                <input type="text" name="code" inputmode="numeric" pattern="\d{6}" maxlength="6" autocomplete="one-time-code" required autofocus
                       class="w-full text-center text-3xl tracking-[0.5em] font-bold py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-gray-900" placeholder="••••••">
                <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-3 rounded-md font-semibold transition-colors">Verify &amp; continue</button>
            </form>

            <div class="mt-6 flex items-center justify-between text-sm">
                <a href="<?= url('portal/otp/resend') ?>" class="font-medium text-yuki-600 hover:text-yuki-700"><i class="fas fa-rotate-right mr-1"></i> Resend code</a>
                <a href="<?= url('portal/login') ?>" class="text-gray-500 hover:text-gray-700">Start over</a>
            </div>
        </div>
        <p class="text-center text-white/70 text-xs mt-6">The code expires in 10 minutes. Never share it with anyone.</p>
    </div>
</body>
</html>
