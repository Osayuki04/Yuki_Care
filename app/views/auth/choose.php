<?php
/** Login chooser — pick which portal to sign in to. Standalone page. */
$options = [
    [
        'href' => url('portal/login'),
        'icon' => 'fa-user',
        'name' => 'Patient',
        'desc' => 'Book appointments, view prescriptions, lab results and bills.',
    ],
    [
        'href' => url('staff/login'),
        'icon' => 'fa-user-doctor',
        'name' => 'Staff',
        'desc' => 'Doctors, nurses and clinical staff access.',
    ],
    [
        'href' => url('admin-login'),
        'icon' => 'fa-user-shield',
        'name' => 'Administrator',
        'desc' => 'Manage patients, staff, pharmacy and reports.',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Sign In') ?> - Yibera</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen relative bg-yuki-950">
    <!-- Background image + darkened green wash -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('<?= asset('images/loginbackgrounds.png') ?>')"></div>
    <div class="absolute inset-0 bg-linear-to-br from-yuki-950/95 via-yuki-900/92 to-yuki-800/90"></div>

    <!-- Decorative medical glyphs -->
    <i class="fas fa-heart-pulse absolute top-12 left-10 text-white/5 text-7xl -rotate-12 hidden sm:block"></i>
    <i class="fas fa-stethoscope absolute bottom-16 right-12 text-white/5 text-8xl rotate-12 hidden sm:block"></i>
    <i class="fas fa-plus absolute top-1/3 right-1/4 text-white/5 text-5xl hidden lg:block"></i>
    <i class="fas fa-notes-medical absolute bottom-24 left-1/4 text-white/5 text-6xl hidden lg:block"></i>

    <div class="relative min-h-screen flex flex-col items-center justify-center px-4 py-12">
        <!-- Brand (logo desktop only) -->
        <div class="text-center mb-10">
            <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" class="hidden sm:block h-20 w-auto object-contain mx-auto mb-4 drop-shadow-lg">
            <h1 class="text-3xl sm:text-4xl font-bold text-white">Welcome to <span class="text-secondary-300">Yibera</span></h1>
            <p class="text-white/85 mt-2 text-base sm:text-lg">Choose how you'd like to sign in</p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 w-full max-w-4xl">
            <?php foreach ($options as $o): ?>
                <a href="<?= $o['href'] ?>" class="group bg-white rounded-md p-6 sm:p-7 text-center shadow-xl hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col items-center border-t-4 border-yuki-500">
                    <span class="w-16 h-16 rounded-full bg-linear-to-br from-yuki-500 to-yuki-700 text-white flex items-center justify-center text-2xl mb-4 shadow-lg shadow-yuki-600/30 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas <?= $o['icon'] ?>"></i>
                    </span>
                    <h2 class="text-lg font-bold text-gray-900"><?= e($o['name']) ?></h2>
                    <p class="text-sm text-gray-500 mt-1.5 flex-1"><?= e($o['desc']) ?></p>
                    <span class="mt-5 inline-flex items-center justify-center gap-2 w-full bg-yuki-50 text-yuki-700 group-hover:bg-yuki-600 group-hover:text-white font-semibold text-sm py-2.5 rounded-md transition-colors duration-300">
                        Continue <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>

        <a href="<?= url('home') ?>" class="mt-10 inline-flex items-center text-sm text-white/80 hover:text-white font-medium transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Back to homepage
        </a>
    </div>
</body>
</html>
