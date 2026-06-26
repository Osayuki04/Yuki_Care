<?php
/** Patient onboarding — a quick, optional welcome step. Standalone page. */
$p     = $patient ?? [];
$first = explode(' ', trim(Patient::fullName($p)))[0] ?? 'there';
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
            <div class="relative inline-block mb-4">
                <img src="<?= e(avatar_url(Patient::fullName($p), $p['Gender'] ?? null)) ?>" alt="Your avatar"
                     class="h-24 w-24 rounded-full ring-4 ring-yuki-100 bg-yuki-50 animate-float-slow">
                <span class="absolute -bottom-1 -right-1 w-8 h-8 rounded-full bg-yuki-600 text-white flex items-center justify-center text-sm shadow-md"><i class="fas fa-check"></i></span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Welcome, <?= e($first) ?>! 🎉</h1>
            <p class="text-gray-500 mt-1">Your account is ready. Add a few health basics now, or skip — you can update them anytime.</p>
        </div>

        <!-- Optional quick form -->
        <div class="bg-white rounded-md border border-gray-200 shadow-sm p-6 sm:p-7">
            <form action="<?= url('portal/onboarding/save') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5"><i class="fas fa-phone text-yuki-600 mr-1.5"></i>Emergency contact <span class="text-gray-400 font-normal">(optional)</span></label>
                    <input type="tel" name="emergency_contact" value="<?= e($p['EmergencyContact'] ?? '') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="Who should we call in an emergency?">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5"><i class="fas fa-droplet text-yuki-600 mr-1.5"></i>Blood group</label>
                        <select name="blood_group" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                            <option value="">Select…</option>
                            <?php foreach (['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg): ?>
                                <option value="<?= $bg ?>" <?= ($p['BloodGroup'] ?? '') === $bg ? 'selected' : '' ?>><?= $bg ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5"><i class="fas fa-triangle-exclamation text-yuki-600 mr-1.5"></i>Allergies</label>
                        <input type="text" name="allergies" value="<?= e($p['Allergies'] ?? '') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="e.g. Penicillin (or leave blank)">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-yuki-600 hover:bg-yuki-700 text-white py-3 rounded-md font-semibold transition-colors shadow-sm">
                        <i class="fas fa-check mr-2"></i> Save &amp; continue
                    </button>
                    <a href="<?= url('portal/onboarding/skip') ?>" class="flex-1 text-center border border-gray-300 text-gray-600 hover:bg-gray-50 py-3 rounded-md font-semibold transition-colors">
                        Skip for now
                    </a>
                </div>
            </form>
        </div>
        <p class="text-center text-xs text-gray-400 mt-4">Takes less than a minute · You can edit everything later in your profile.</p>
    </div>
</body>
</html>
