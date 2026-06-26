<?php /** Patient portal top header. Expects optional $page_title. */ ?>
<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between px-4 sm:px-6 py-4">
        <div class="flex items-center gap-3">
            <button id="portalSidebarToggle" class="lg:hidden p-2.5 text-gray-600 hover:bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-yuki-500" aria-label="Open menu">
                <i class="fas fa-bars text-lg"></i>
            </button>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900"><?= e($page_title ?? 'Patient Portal') ?></h1>
        </div>

        <div class="flex items-center gap-3">
            <a href="<?= url('portal/appointments') ?>" class="hidden sm:inline-flex items-center gap-2 bg-yuki-600 hover:bg-yuki-700 text-white px-4 py-2 rounded-md font-semibold text-sm transition-colors">
                <i class="fas fa-plus"></i> Book Appointment
            </a>
            <div class="relative">
                <button onclick="togglePortalMenu()" class="flex items-center gap-3 p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yuki-500 transition-all">
                    <div class="bg-yuki-100 text-yuki-700 rounded-full w-9 h-9 flex items-center justify-center font-semibold text-sm">
                        <?= e(strtoupper(substr(PatientAuth::name(), 0, 1))) ?>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-medium text-gray-900"><?= e(PatientAuth::name()) ?></p>
                        <p class="text-xs text-gray-500">Patient</p>
                    </div>
                    <i class="fas fa-chevron-down text-gray-400 text-xs hidden md:block"></i>
                </button>
                <div id="portalUserMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-md shadow-xl border border-gray-200 z-50 overflow-hidden">
                    <div class="px-4 py-3 bg-yuki-50 border-b border-gray-200">
                        <p class="text-sm font-medium text-gray-900"><?= e(PatientAuth::name()) ?></p>
                        <p class="text-xs text-gray-500 truncate"><?= e(PatientAuth::email()) ?></p>
                    </div>
                    <div class="py-2">
                        <a href="<?= url('portal/profile') ?>" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                            <span class="w-8 h-8 flex items-center justify-center"><i class="fas fa-user text-gray-500"></i></span>
                            <span class="ml-2">My Profile</span>
                        </a>
                        <div class="border-t border-gray-200 my-1"></div>
                        <a href="<?= url('portal/logout') ?>" class="flex items-center px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                            <span class="w-8 h-8 flex items-center justify-center"><i class="fas fa-sign-out-alt text-red-500"></i></span>
                            <span class="ml-2">Sign out</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
