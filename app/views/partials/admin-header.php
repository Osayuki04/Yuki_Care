<?php /** Admin top header bar. Expects optional $page_title. */ ?>
<header class="bg-white  shadow-sm border-b border-gray-200 ">
    <div class="flex items-center justify-between px-4 sm:px-6 py-4">
        <div class="flex items-center gap-3">
            <button id="adminSidebarToggle" class="lg:hidden p-2.5 text-gray-600  hover:bg-gray-100  rounded-md focus:outline-none focus:ring-2 focus:ring-yuki-500" aria-label="Open menu">
                <i class="fas fa-bars text-lg"></i>
            </button>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900 ">
                <?= e($page_title ?? 'Admin Panel') ?>
            </h1>
        </div>

        <div class="flex items-center space-x-3">
            <div class="relative">
                <button onclick="toggleUserMenu()" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100  focus:outline-none focus:ring-2 focus:ring-yuki-500 transition-all duration-200">
                    <div class="bg-yuki-400  rounded-full w-9 h-9 flex items-center justify-center shadow-sm">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-medium text-gray-900 "><?= e(Auth::name()) ?></p>
                        <p class="text-xs text-gray-500 "><?= e(ucfirst(Auth::role())) ?></p>
                    </div>
                    <div class="hidden md:block"><i class="fas fa-chevron-down text-gray-400 text-xs"></i></div>
                </button>

                <div id="userMenu" class="hidden absolute right-0 mt-2 w-56 bg-white  rounded-md shadow-xl border border-gray-200  z-50 overflow-hidden">
                    <div class="px-4 py-3 bg-yuki-50    border-b border-gray-200 ">
                        <p class="text-sm font-medium text-gray-900 "><?= e(Auth::name()) ?></p>
                        <p class="text-xs text-gray-500 "><?= e(Auth::email()) ?></p>
                    </div>
                    <div class="py-2">
                        <a href="<?= url('admin/settings') ?>" class="flex items-center px-4 py-3 text-sm text-gray-700  hover:bg-gray-100  transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center"><i class="fas fa-cog text-gray-500 "></i></div>
                            <span class="ml-3">Settings</span>
                        </a>
                        <div class="border-t border-gray-200  my-1"></div>
                        <a href="<?= url('logout') ?>" class="flex items-center px-4 py-3 text-sm text-red-600  hover:bg-red-50  transition-colors">
                            <div class="w-8 h-8 flex items-center justify-center"><i class="fas fa-sign-out-alt text-red-500"></i></div>
                            <span class="ml-3">Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
