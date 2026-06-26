<?php
/** Patient portal sidebar. Highlights the active item based on the current route. */
$active = $_GET['page'] ?? 'portal/dashboard';
$isActive = fn(string $route) => $active === $route
    ? 'bg-yuki-100 text-yuki-700 border-r-2 border-yuki-500'
    : 'text-gray-700 hover:bg-gray-100';
$item = 'flex items-center px-4 py-3 rounded-md transition-all duration-200';

$links = [
    ['portal/dashboard',     'fa-gauge-high',   'Dashboard'],
    ['portal/appointments',  'fa-calendar-check','Appointments'],
    ['portal/prescriptions', 'fa-prescription', 'Prescriptions'],
    ['portal/lab-results',   'fa-flask',        'Lab Results'],
    ['portal/invoices',      'fa-file-invoice-dollar', 'Billing'],
    ['portal/profile',       'fa-user',         'My Profile'],
];
?>
<div id="portalSidebarOverlay" class="fixed inset-0 z-30 bg-black/40 hidden lg:hidden"></div>

<div id="portalSidebar" class="bg-white w-64 h-full shadow-lg border-r border-gray-200 flex flex-col
            fixed lg:static inset-y-0 left-0 z-40 -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out">
    <div class="flex items-center p-6 border-b border-gray-200">
        <a href="<?= url('home') ?>" class="flex items-center group">
            <img src="<?= asset('images/yiberalogo2.png') ?>" alt="Yibera" class="h-12 w-auto object-contain mr-3">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Yibera</h2>
                <p class="text-xs text-gray-500">Patient Portal</p>
            </div>
        </a>
    </div>

    <nav class="flex-1 mt-4 px-4 pb-4 overflow-y-auto space-y-1">
        <?php foreach ($links as [$route, $icon, $label]): ?>
            <a href="<?= url($route) ?>" class="<?= $isActive($route) ?> <?= $item ?>">
                <span class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas <?= $icon ?> text-sm"></i></span>
                <span class="font-medium"><?= $label ?></span>
            </a>
        <?php endforeach; ?>
    </nav>

    <div class="mt-auto p-4 border-t border-gray-200">
        <div class="flex items-center">
            <div class="bg-yuki-100 text-yuki-700 rounded-full w-10 h-10 flex items-center justify-center mr-3 font-semibold text-sm">
                <?= e(strtoupper(substr(PatientAuth::name(), 0, 1))) ?>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate"><?= e(PatientAuth::name()) ?></p>
                <p class="text-xs text-gray-500 truncate">Patient</p>
            </div>
            <a href="<?= url('portal/logout') ?>" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-md transition-all" title="Sign out">
                <i class="fas fa-sign-out-alt text-sm"></i>
            </a>
        </div>
    </div>
</div>
