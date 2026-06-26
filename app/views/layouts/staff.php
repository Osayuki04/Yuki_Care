<?php /** Staff portal layout. Expects $content, optional $page_title/$extra_head/$extra_scripts. */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Staff Portal') ?> - Yibera</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?= $extra_head ?? '' ?>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <?php require BASE_PATH . '/app/views/partials/staff-sidebar.php'; ?>

        <div class="flex-1 flex flex-col overflow-hidden">
            <?php require BASE_PATH . '/app/views/partials/staff-header.php'; ?>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-4 sm:p-6 pb-24 lg:pb-6">
                <?php if ($msg = flash('staff_success')): ?>
                    <div class="mb-5 bg-yuki-50 border border-yuki-200 text-yuki-800 px-4 py-3 rounded-md flex items-center">
                        <i class="fas fa-circle-check mr-2"></i><?= e($msg) ?>
                    </div>
                <?php endif; ?>
                <?php if ($msg = flash('staff_error')): ?>
                    <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md flex items-center">
                        <i class="fas fa-circle-exclamation mr-2"></i><?= e($msg) ?>
                    </div>
                <?php endif; ?>

                <?= $content ?>
            </main>
        </div>
    </div>

    <!-- Mobile bottom navigation -->
    <?php
    $bnActive = $_GET['page'] ?? 'staff/dashboard';
    $bnItems = [
        ['staff/dashboard', 'fa-gauge-high', 'Home',    false],
        ['staff/profile',   'fa-id-badge',   'Profile', false],
        ['staff/logout',    'fa-sign-out-alt','Sign out', true],
    ];
    ?>
    <nav class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-white border-t border-gray-200 shadow-[0_-2px_10px_rgba(0,0,0,0.04)] flex justify-around">
        <?php foreach ($bnItems as [$route, $icon, $label, $isLogout]):
            $on = !$isLogout && $bnActive === $route;
            $cls = $isLogout ? 'text-red-500' : ($on ? 'text-yuki-600' : 'text-gray-400'); ?>
            <a href="<?= url($route) ?>" class="flex-1 flex flex-col items-center justify-center py-2.5 gap-0.5 <?= $cls ?>">
                <i class="fas <?= $icon ?> text-lg"></i>
                <span class="text-[10px] font-medium"><?= $label ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <script>
        function toggleStaffMenu() {
            const m = document.getElementById('staffUserMenu');
            if (m) m.classList.toggle('hidden');
        }
        document.addEventListener('click', function (e) {
            const m = document.getElementById('staffUserMenu');
            const btn = e.target.closest('button[onclick="toggleStaffMenu()"]');
            if (m && !btn && !m.contains(e.target)) m.classList.add('hidden');
        });
        (function () {
            const sb = document.getElementById('staffSidebar');
            const ov = document.getElementById('staffSidebarOverlay');
            const tg = document.getElementById('staffSidebarToggle');
            if (tg) tg.addEventListener('click', () => { sb.classList.remove('-translate-x-full'); ov.classList.remove('hidden'); });
            if (ov) ov.addEventListener('click', () => { sb.classList.add('-translate-x-full'); ov.classList.add('hidden'); });
            window.addEventListener('resize', () => { if (window.innerWidth >= 1024) { sb.classList.remove('-translate-x-full'); ov.classList.add('hidden'); } });
        })();
    </script>
    <?php require BASE_PATH . '/app/views/partials/countup.php'; ?>
    <?= $extra_scripts ?? '' ?>
</body>
</html>
