<?php
// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = basename(dirname($_SERVER['PHP_SELF']));
?>

<!-- Sidebar -->
<div class="bg-white dark:bg-gray-800 w-64 min-h-screen shadow-lg border-r border-gray-200 dark:border-gray-700 flex flex-col">
    <!-- Logo Section -->
    <div class="flex items-center justify-center p-6 border-b border-gray-200 dark:border-gray-700">
        <a href="<?php echo (strpos($_SERVER['REQUEST_URI'], '/admin/patients/') !== false || strpos($_SERVER['REQUEST_URI'], '/admin/staff/') !== false || strpos($_SERVER['REQUEST_URI'], '/admin/pharmacy/') !== false) ? '../../home/' : '../home/'; ?>" class="flex items-center group">
            <img src="<?php echo (strpos($_SERVER['REQUEST_URI'], '/admin/patients/') !== false || strpos($_SERVER['REQUEST_URI'], '/admin/staff/') !== false || strpos($_SERVER['REQUEST_URI'], '/admin/pharmacy/') !== false) ? '../../images/logo.png' : '../images/logo.png'; ?>" alt="Yuki Care Medical Center" class="h-12 w-12 object-contain mr-3 group-hover:scale-105 transition-transform duration-200">
            <div>
                <h2 class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-yuki-600 dark:group-hover:text-yuki-400 transition-colors duration-200">Yuki Care</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Admin Portal</p>
            </div>
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 mt-6 px-4 pb-4 overflow-y-auto">
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="<?php echo (strpos($_SERVER['REQUEST_URI'], '/admin/') !== false) ? '../dashboard.php' : './dashboard.php'; ?>" class="<?php echo ($current_page === 'dashboard.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                <div class="w-5 h-5 flex items-center justify-center mr-3">
                    <i class="fas fa-chart-line text-sm"></i>
                </div>
                <span class="font-medium">Dashboard</span>
            </a>

            <!-- Patients Section -->
            <div class="pt-6">
                <h3 class="px-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                    Patient Management
                </h3>

                <a href="<?php echo ($current_dir === 'admin') ? './patients/register.php' : '../patients/register.php'; ?>" class="<?php echo ($current_dir === 'patients' && $current_page === 'register.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-user-plus text-sm"></i>
                    </div>
                    <span class="font-medium">Register Patient</span>
                </a>

                <a href="<?php echo ($current_dir === 'admin') ? './patients/view.php' : '../patients/view.php'; ?>" class="<?php echo ($current_dir === 'patients' && $current_page === 'view.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-users text-sm"></i>
                    </div>
                    <span class="font-medium">View Patients</span>
                </a>

                <a href="<?php echo ($current_dir === 'admin') ? './patients/manage.php' : '../patients/manage.php'; ?>" class="<?php echo ($current_dir === 'patients' && $current_page === 'manage.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-user-edit text-sm"></i>
                    </div>
                    <span class="font-medium">Manage Patients</span>
                </a>
            </div>

            <!-- Staff Section -->
            <div class="pt-6">
                <h3 class="px-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                    Staff Management
                </h3>

                <a href="<?php echo ($current_dir === 'admin') ? './staff/register.php' : '../staff/register.php'; ?>" class="<?php echo ($current_dir === 'staff' && $current_page === 'register.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-user-md text-sm"></i>
                    </div>
                    <span class="font-medium">Register Staff</span>
                </a>

                <a href="<?php echo ($current_dir === 'admin') ? './staff/view.php' : '../staff/view.php'; ?>" class="<?php echo ($current_dir === 'staff' && $current_page === 'view.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-user-friends text-sm"></i>
                    </div>
                    <span class="font-medium">View Staff</span>
                </a>

                <a href="<?php echo ($current_dir === 'admin') ? './staff/manage.php' : '../staff/manage.php'; ?>" class="<?php echo ($current_dir === 'staff' && $current_page === 'manage.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-users-cog text-sm"></i>
                    </div>
                    <span class="font-medium">Manage Staff</span>
                </a>

                <a href="<?php echo ($current_dir === 'admin') ? './staff/assign-department.php' : '../staff/assign-department.php'; ?>" class="<?php echo ($current_dir === 'staff' && $current_page === 'assign-department.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-sitemap text-sm"></i>
                    </div>
                    <span class="font-medium">Assign Department</span>
                </a>
            </div>

            <!-- Pharmacy Section -->
            <div class="pt-6">
                <h3 class="px-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                    Pharmacy Management
                </h3>

                <a href="<?php echo ($current_dir === 'admin') ? './pharmacy/register.php' : '../pharmacy/register.php'; ?>" class="<?php echo ($current_dir === 'pharmacy' && $current_page === 'register.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-pills text-sm"></i>
                    </div>
                    <span class="font-medium">Add Medication</span>
                </a>

                <a href="<?php echo ($current_dir === 'admin') ? './pharmacy/view.php' : '../pharmacy/view.php'; ?>" class="<?php echo ($current_dir === 'pharmacy' && $current_page === 'view.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-prescription-bottle-alt text-sm"></i>
                    </div>
                    <span class="font-medium">View Medications</span>
                </a>

                <a href="<?php echo ($current_dir === 'admin') ? './pharmacy/manage.php' : '../pharmacy/manage.php'; ?>" class="<?php echo ($current_dir === 'pharmacy' && $current_page === 'manage.php') ? 'bg-yuki-100 dark:bg-yuki-900/50 text-yuki-700 dark:text-yuki-300 border-r-2 border-yuki-500' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'; ?> flex items-center px-4 py-3 rounded-lg transition-all duration-200 group">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="fas fa-cogs text-sm"></i>
                    </div>
                    <span class="font-medium">Manage Medications</span>
                </a>
            </div>


        </div>
    </nav>

    <!-- User Profile Section -->
    <div class="mt-auto p-4 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
        <div class="flex items-center">
            <div class="bg-gradient-to-r from-yuki-400 to-secondary-400 rounded-full w-10 h-10 flex items-center justify-center mr-3 shadow-sm">
                <i class="fas fa-user text-white text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                    <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                    <?php echo ucfirst($_SESSION['admin_role']); ?>
                </p>
            </div>
            <a href="<?php echo ($current_dir === 'admin') ? './auth/logout.php' : '../auth/logout.php'; ?>" class="p-2 text-gray-400 hover:text-red-500 dark:text-gray-500 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all duration-200" title="Logout">
                <i class="fas fa-sign-out-alt text-sm"></i>
            </a>
        </div>
    </div>
</div>
