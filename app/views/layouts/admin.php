<?php /** Admin layout. Expects $content, optional $page_title and $extra_head/$extra_scripts. */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Admin') ?> - Yibera Medical Center</title>
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?= $extra_head ?? '' ?>
</head>
<body class="bg-gray-50 ">
    <div class="flex h-screen overflow-hidden">
        <?php require BASE_PATH . '/app/views/partials/admin-sidebar.php'; ?>

        <div class="flex-1 flex flex-col overflow-hidden">
            <?php require BASE_PATH . '/app/views/partials/admin-header.php'; ?>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50  p-4 sm:p-6 pb-24 lg:pb-6">
                <?= $content ?>
            </main>
        </div>
    </div>

    <!-- Mobile bottom navigation -->
    <?php
    $bnActive = $_GET['page'] ?? 'admin/dashboard';
    $bnItems = [
        ['admin/dashboard',       'fa-gauge-high',   'Home'],
        ['admin/patients/view',   'fa-users',        'Patients'],
        ['admin/staff/manage',    'fa-user-doctor',  'Staff'],
        ['admin/pharmacy/manage', 'fa-pills',        'Pharmacy'],
        ['admin/reports',         'fa-chart-line',   'Reports'],
    ];
    ?>
    <nav class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-white border-t border-gray-200 shadow-[0_-2px_10px_rgba(0,0,0,0.04)] flex justify-around">
        <?php foreach ($bnItems as [$route, $icon, $label]):
            $on = $bnActive === $route; ?>
            <a href="<?= url($route) ?>" class="flex-1 flex flex-col items-center justify-center py-2.5 gap-0.5 <?= $on ? 'text-yuki-600' : 'text-gray-400' ?>">
                <i class="fas <?= $icon ?> text-lg"></i>
                <span class="text-[10px] font-medium"><?= $label ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <script>
        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            if (menu) menu.classList.toggle('hidden');
        }
        document.addEventListener('click', function (event) {
            const userMenu = document.getElementById('userMenu');
            const userButton = event.target.closest('button[onclick="toggleUserMenu()"]');
            if (userMenu && !userButton && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });

        // Responsive sidebar (mobile off-canvas)
        (function () {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('adminSidebarOverlay');
            const toggle = document.getElementById('adminSidebarToggle');
            function open() { sidebar.classList.remove('-translate-x-full'); overlay.classList.remove('hidden'); }
            function close() { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); }
            if (toggle) toggle.addEventListener('click', open);
            if (overlay) overlay.addEventListener('click', close);
            // Close any open menu when resizing up to desktop
            window.addEventListener('resize', function () { if (window.innerWidth >= 1024) close(); });
        })();
    </script>
    <?php require BASE_PATH . '/app/views/partials/countup.php'; ?>
    <?= $extra_scripts ?? '' ?>
</body>
</html>
