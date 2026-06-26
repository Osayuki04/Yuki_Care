<?php
/** Patient portal — set a new (strong) password after email verification. Standalone. */
$error = flash('portal_error');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Set Password') ?> - Yibera</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-yuki-700 flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="text-center mb-6">
            <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" class="hidden sm:block h-16 w-auto object-contain mx-auto mb-3">
            <h1 class="text-2xl font-bold text-white">Create your password</h1>
        </div>

        <div class="bg-white rounded-md shadow-xl p-8">
            <div class="mb-5 bg-yuki-50 border border-yuki-200 text-yuki-800 px-4 py-3 rounded-md text-sm flex items-center"><i class="fas fa-circle-check mr-2"></i> Email verified. Choose a strong password.</div>

            <?php if ($error): ?>
                <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md text-sm flex items-start"><i class="fas fa-circle-exclamation mr-2 mt-0.5"></i><span><?= e($error) ?></span></div>
            <?php endif; ?>

            <form action="<?= url('portal/set-password/submit') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">New password</label>
                    <input type="password" name="password" required minlength="8" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-gray-900" placeholder="••••••••">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Confirm password</label>
                    <input type="password" name="confirm_password" required minlength="8" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-gray-900" placeholder="••••••••">
                </div>
                <div class="bg-gray-50 rounded-md p-3 text-xs text-gray-500">
                    Must be at least 8 characters and include an upper-case letter, a lower-case letter, a number and a symbol.
                </div>
                <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-3 rounded-md font-semibold transition-colors">Set password &amp; sign in</button>
            </form>
        </div>
    </div>
</body>
</html>
