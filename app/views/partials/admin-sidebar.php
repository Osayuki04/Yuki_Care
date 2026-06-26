<?php
/** Admin sidebar. Highlights the active item based on the current route. */
$active = $_GET['page'] ?? 'admin/dashboard';
$isActive = fn(string $route) => $active === $route
    ? 'bg-yuki-100  text-yuki-700  border-r-2 border-yuki-500'
    : 'text-gray-700  hover:bg-gray-100 ';
$item = 'flex items-center px-4 py-3 rounded-md transition-all duration-200 group';
?>
<!-- Mobile overlay (click to close) -->
<div id="adminSidebarOverlay" class="fixed inset-0 z-30 bg-black/40 hidden lg:hidden"></div>

<div id="adminSidebar" class="bg-white  w-64 h-full shadow-lg border-r border-gray-200  flex flex-col
            fixed lg:static inset-y-0 left-0 z-40 -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out">
    <div class="flex items-center justify-center p-6 border-b border-gray-200 ">
        <a href="<?= url('home') ?>" class="flex items-center group">
            <img src="<?= asset('images/yiberalogo2.png') ?>" alt="Yibera Medical Center" class="h-14 w-auto object-contain mr-3 group-hover:scale-105 transition-transform duration-200">
            <div>
                <h2 class="text-lg font-bold text-gray-900  group-hover:text-yuki-600 transition-colors duration-200">Yibera</h2>
                <p class="text-sm text-gray-500 ">Admin Portal</p>
            </div>
        </a>
    </div>

    <nav class="flex-1 mt-6 px-4 pb-4 overflow-y-auto">
        <div class="space-y-1">
            <a href="<?= url('admin/dashboard') ?>" class="<?= $isActive('admin/dashboard') ?> <?= $item ?>">
                <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-chart-line text-sm"></i></div>
                <span class="font-medium">Dashboard</span>
            </a>

            <div class="pt-6">
                <h3 class="px-4 text-xs font-semibold text-gray-500  uppercase tracking-wider mb-3">Patient Management</h3>
                <a href="<?= url('admin/patients/register') ?>" class="<?= $isActive('admin/patients/register') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-user-plus text-sm"></i></div>
                    <span class="font-medium">Register Patient</span>
                </a>
                <a href="<?= url('admin/patients/view') ?>" class="<?= $isActive('admin/patients/view') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-users text-sm"></i></div>
                    <span class="font-medium">View Patients</span>
                </a>
                <a href="<?= url('admin/patients/manage') ?>" class="<?= $isActive('admin/patients/manage') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-user-edit text-sm"></i></div>
                    <span class="font-medium">Manage Patients</span>
                </a>
            </div>

            <div class="pt-6">
                <h3 class="px-4 text-xs font-semibold text-gray-500  uppercase tracking-wider mb-3">Staff Management</h3>
                <a href="<?= url('admin/staff/register') ?>" class="<?= $isActive('admin/staff/register') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-user-md text-sm"></i></div>
                    <span class="font-medium">Register Staff</span>
                </a>
                <a href="<?= url('admin/staff/view') ?>" class="<?= $isActive('admin/staff/view') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-user-friends text-sm"></i></div>
                    <span class="font-medium">View Staff</span>
                </a>
                <a href="<?= url('admin/staff/manage') ?>" class="<?= $isActive('admin/staff/manage') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-users-cog text-sm"></i></div>
                    <span class="font-medium">Manage Staff</span>
                </a>
                <a href="<?= url('admin/staff/assign-department') ?>" class="<?= $isActive('admin/staff/assign-department') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-sitemap text-sm"></i></div>
                    <span class="font-medium">Assign Department</span>
                </a>
                <a href="<?= url('staff/login') ?>" target="_blank" rel="noopener" class="text-gray-700 hover:bg-gray-100 <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-arrow-up-right-from-square text-sm"></i></div>
                    <span class="font-medium">Staff Portal</span>
                    <i class="fas fa-external-link-alt text-xs text-gray-400 ml-auto"></i>
                </a>
            </div>

            <div class="pt-6">
                <h3 class="px-4 text-xs font-semibold text-gray-500  uppercase tracking-wider mb-3">Pharmacy Management</h3>
                <a href="<?= url('admin/pharmacy/register') ?>" class="<?= $isActive('admin/pharmacy/register') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-pills text-sm"></i></div>
                    <span class="font-medium">Add Medication</span>
                </a>
                <a href="<?= url('admin/pharmacy/view') ?>" class="<?= $isActive('admin/pharmacy/view') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-prescription-bottle-alt text-sm"></i></div>
                    <span class="font-medium">View Medications</span>
                </a>
                <a href="<?= url('admin/pharmacy/manage') ?>" class="<?= $isActive('admin/pharmacy/manage') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-cogs text-sm"></i></div>
                    <span class="font-medium">Manage Medications</span>
                </a>
                <a href="<?= url('admin/pharmacy/manage-categories') ?>" class="<?= $isActive('admin/pharmacy/manage-categories') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-tags text-sm"></i></div>
                    <span class="font-medium">Categories</span>
                </a>
            </div>

            <div class="pt-6">
                <h3 class="px-4 text-xs font-semibold text-gray-500  uppercase tracking-wider mb-3">System</h3>
                <a href="<?= url('admin/reports') ?>" class="<?= $isActive('admin/reports') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-file-alt text-sm"></i></div>
                    <span class="font-medium">Reports</span>
                </a>
                <a href="<?= url('admin/settings') ?>" class="<?= $isActive('admin/settings') ?> <?= $item ?>">
                    <div class="w-5 h-5 flex items-center justify-center mr-3"><i class="fas fa-cog text-sm"></i></div>
                    <span class="font-medium">Settings</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="mt-auto p-4 border-t border-gray-200  bg-white ">
        <div class="flex items-center">
            <div class="bg-yuki-400  rounded-full w-10 h-10 flex items-center justify-center mr-3 shadow-sm">
                <i class="fas fa-user text-white text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900  truncate"><?= e(Auth::name()) ?></p>
                <p class="text-xs text-gray-500  truncate"><?= e(ucfirst(Auth::role())) ?></p>
            </div>
            <a href="<?= url('logout') ?>" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50  rounded-md transition-all duration-200" title="Logout">
                <i class="fas fa-sign-out-alt text-sm"></i>
            </a>
        </div>
    </div>
</div>
