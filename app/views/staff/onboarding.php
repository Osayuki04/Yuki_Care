<?php
/** Staff onboarding — welcome + confirm admin-entered details + optional password. Standalone. */
$s     = $staff ?? [];
$first = explode(' ', trim(Staff::fullName($s)))[0] ?? 'there';
$error = flash('staff_error');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Welcome') ?> - Yibera</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo1.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6">
    <div class="w-full max-w-lg">
        <!-- Welcome header -->
        <div class="text-center mb-6">
            <img src="<?= e(avatar_url(Staff::fullName($s), $s['Gender'] ?? null)) ?>" alt="Your avatar"
                 class="h-24 w-24 rounded-full ring-4 ring-yuki-100 bg-yuki-50 mx-auto mb-4 animate-float-slow">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Welcome, <?= e($first) ?>! 👋</h1>
            <p class="text-gray-500 mt-1">Your account was set up by the administrator. Confirm your details and set a personal password to finish.</p>
        </div>

        <!-- Admin-entered details (read-only) -->
        <div class="bg-white rounded-md border border-gray-200 shadow-sm p-6 sm:p-7 mb-5">
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Your details</h2>
            <dl class="grid grid-cols-2 gap-x-6 gap-y-4 text-sm">
                <?php
                $rows = [
                    'Name'       => Staff::fullName($s),
                    'Email'      => $s['Email'] ?? '',
                    'Department' => $s['Department'] ?? '—',
                    'Role'       => $s['StaffCategory'] ?? 'Staff',
                ];
                foreach ($rows as $label => $value): ?>
                    <div>
                        <dt class="text-xs text-gray-400 uppercase tracking-wide"><?= e($label) ?></dt>
                        <dd class="mt-0.5 font-medium text-gray-900 truncate"><?= e($value !== '' ? $value : '—') ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
            <p class="text-xs text-gray-400 mt-4"><i class="fas fa-circle-info mr-1"></i>Need a change? Contact your administrator.</p>
        </div>

        <!-- Optional: set personal password -->
        <div class="bg-white rounded-md border border-gray-200 shadow-sm p-6 sm:p-7">
            <h2 class="text-base font-semibold text-gray-900 mb-1">Set your own password <span class="text-gray-400 font-normal text-sm">(recommended)</span></h2>
            <p class="text-sm text-gray-500 mb-4">Replace the password your administrator created.</p>

            <?php if ($error): ?>
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md text-sm flex items-start"><i class="fas fa-circle-exclamation mr-2 mt-0.5"></i><span><?= e($error) ?></span></div>
            <?php endif; ?>

            <form action="<?= url('staff/onboarding/save') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="password" name="new_password" minlength="8" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="New password">
                    <input type="password" name="confirm_password" minlength="8" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="Confirm password">
                </div>
                <p class="text-xs text-gray-400">8+ chars with upper, lower, number &amp; symbol. Leave blank to keep your current password.</p>
                <div class="flex flex-col sm:flex-row gap-3 pt-1">
                    <button type="submit" class="flex-1 bg-yuki-600 hover:bg-yuki-700 text-white py-3 rounded-md font-semibold transition-colors shadow-sm">
                        <i class="fas fa-arrow-right-to-bracket mr-2"></i> Enter portal
                    </button>
                    <a href="<?= url('staff/onboarding/skip') ?>" class="flex-1 text-center border border-gray-300 text-gray-600 hover:bg-gray-50 py-3 rounded-md font-semibold transition-colors">
                        Skip for now
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
