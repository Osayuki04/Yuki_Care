<!-- Header -->
<header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Page Title and Breadcrumb -->
        <div class="flex items-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                <?php
                $page_titles = [
                    'dashboard.php' => 'Dashboard',
                    'register.php' => 'Register Patient',
                    'view.php' => 'View ' . (strpos($_SERVER['REQUEST_URI'], 'patients') ? 'Patients' : (strpos($_SERVER['REQUEST_URI'], 'staff') ? 'Staff' : 'Records')),
                    'manage.php' => 'Manage ' . (strpos($_SERVER['REQUEST_URI'], 'patients') ? 'Patients' : 'Staff'),
                    'add.php' => 'Add Employee',
                    'assign-department.php' => 'Assign Department',
                    'add-category.php' => 'Add Medication',
                    'manage-categories.php' => 'Manage Categories',
                    'medications.php' => 'Medications',
                    'profile.php' => 'Patient Profile',
                    'settings.php' => 'Settings',
                    'reports.php' => 'Reports'
                ];

                $current_page = basename($_SERVER['PHP_SELF']);
                echo $page_titles[$current_page] ?? 'Admin Panel';
                ?>
            </h1>

            <!-- Breadcrumb -->
            <nav class="ml-6 hidden md:block">
                <ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                    <li>
                        <a href="<?php echo (strpos($_SERVER['REQUEST_URI'], '/admin/') !== false) ? '../dashboard.php' : './dashboard.php'; ?>" class="hover:text-yuki-600 dark:hover:text-yuki-400 transition-colors">
                            <i class="fas fa-home w-4 h-4"></i>
                        </a>
                    </li>
                    <?php
                    $current_dir = basename(dirname($_SERVER['PHP_SELF']));
                    if ($current_dir !== 'admin') {
                        echo '<li><i class="fas fa-chevron-right text-xs mx-2"></i></li>';
                        echo '<li><span class="capitalize">' . htmlspecialchars($current_dir) . '</span></li>';
                    }
                    if ($current_page !== 'dashboard.php') {
                        echo '<li><i class="fas fa-chevron-right text-xs mx-2"></i></li>';
                        echo '<li><span class="text-gray-900 dark:text-white">' . ($page_titles[$current_page] ?? ucfirst(str_replace('.php', '', $current_page))) . '</span></li>';
                    }
                    ?>
                </ol>
            </nav>
        </div>

        <!-- Header Actions -->
        <div class="flex items-center space-x-3">
            <!-- Search Bar -->
            <div class="hidden lg:block relative">
                <input type="text" placeholder="Search patients, staff..."
                       class="w-64 pl-10 pr-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all duration-200">
                <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                    <i class="fas fa-search text-gray-400 text-sm"></i>
                </div>
            </div>

            <!-- Dark Mode Toggle -->
            <button onclick="toggleDarkMode()" class="p-2.5 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-yuki-500 rounded-lg transition-all duration-200">
                <i class="fas fa-moon text-lg"></i>
            </button>

            <!-- User Menu -->
            <div class="relative">
                <button onclick="toggleUserMenu()" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-yuki-500 transition-all duration-200">
                    <div class="bg-gradient-to-r from-yuki-400 to-secondary-400 rounded-full w-9 h-9 flex items-center justify-center shadow-sm">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                            <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            <?php echo ucfirst($_SESSION['admin_role']); ?>
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                    </div>
                </button>

                <!-- User Dropdown Menu -->
                <div id="userMenu" class="hidden absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 z-50 overflow-hidden">
                    <!-- User Info Header -->
                    <div class="px-4 py-3 bg-gradient-to-r from-yuki-50 to-secondary-50 dark:from-yuki-900/20 dark:to-secondary-900/20 border-b border-gray-200 dark:border-gray-700">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                            <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            <?php echo htmlspecialchars($_SESSION['admin_email']); ?>
                        </p>
                    </div>

                    <!-- Menu Items -->
                    <div class="py-2">
                        <a href="<?php echo (strpos($_SERVER['REQUEST_URI'], '/admin/') !== false) ? '../profile.php' : './profile.php'; ?>" class="flex items-center px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center">
                                <i class="fas fa-user text-gray-500 dark:text-gray-400"></i>
                            </div>
                            <span class="ml-3">Profile</span>
                        </a>
                        <a href="<?php echo (strpos($_SERVER['REQUEST_URI'], '/admin/') !== false) ? '../settings.php' : './settings.php'; ?>" class="flex items-center px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center">
                                <i class="fas fa-cog text-gray-500 dark:text-gray-400"></i>
                            </div>
                            <span class="ml-3">Settings</span>
                        </a>
                        <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
                        <a href="<?php echo (strpos($_SERVER['REQUEST_URI'], '/admin/') !== false) ? '../auth/logout.php' : './auth/logout.php'; ?>" class="flex items-center px-4 py-3 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center">
                                <i class="fas fa-sign-out-alt text-red-500"></i>
                            </div>
                            <span class="ml-3">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Toggle user menu
    function toggleUserMenu() {
        const menu = document.getElementById('userMenu');
        menu.classList.toggle('hidden');
    }

    // Close user menu when clicking outside
    document.addEventListener('click', function(event) {
        const userMenu = document.getElementById('userMenu');
        const userButton = event.target.closest('button[onclick="toggleUserMenu()"]');
        
        if (!userButton && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });

    // Dark mode toggle
    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
    }

    // Initialize dark mode from localStorage
    if (localStorage.getItem('darkMode') === 'true') {
        document.documentElement.classList.add('dark');
    }
</script>
