<?php /** Public site navigation (top contact bar + main nav). */ ?>
<!-- TOP INFO BAR — sleek -->
<div class="hidden md:block bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between py-2.5 text-sm">
        <div class="flex items-center gap-5 text-gray-600">
            <a href="tel:+4401902321000" class="group inline-flex items-center gap-2 hover:text-yuki-700 transition-colors">
                <span class="w-7 h-7 rounded-full bg-yuki-50 text-yuki-600 flex items-center justify-center group-hover:bg-yuki-600 group-hover:text-white transition-colors"><i class="fas fa-phone-volume text-xs"></i></span>
                <span class="font-medium">+44 (0)1902 321000</span>
            </a>
            <a href="mailto:consultation@yibera.com" class="hidden lg:inline-flex items-center gap-2 hover:text-yuki-700 transition-colors group">
                <span class="w-7 h-7 rounded-full bg-yuki-50 text-yuki-600 flex items-center justify-center group-hover:bg-yuki-600 group-hover:text-white transition-colors"><i class="fas fa-envelope text-xs"></i></span>
                <span>consultation@yibera.com</span>
            </a>
            <span class="hidden xl:inline-flex items-center gap-2">
                <span class="w-7 h-7 rounded-full bg-yuki-50 text-yuki-600 flex items-center justify-center"><i class="fas fa-location-dot text-xs"></i></span>
                <span>Wulfruna Street, Wolverhampton</span>
            </span>
        </div>
        <div class="flex items-center gap-4">
            <span class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">
                <span class="relative flex w-2 h-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span></span>
                24/7 Emergency
            </span>
            <span class="flex items-center gap-1.5 border-l border-gray-200 pl-4 text-gray-400">
                <a href="#" aria-label="Facebook"  class="w-7 h-7 rounded-full hover:bg-yuki-50 hover:text-yuki-600 flex items-center justify-center transition-colors"><i class="fab fa-facebook-f text-xs"></i></a>
                <a href="#" aria-label="Twitter"   class="w-7 h-7 rounded-full hover:bg-yuki-50 hover:text-yuki-600 flex items-center justify-center transition-colors"><i class="fab fa-x-twitter text-xs"></i></a>
                <a href="#" aria-label="Instagram" class="w-7 h-7 rounded-full hover:bg-yuki-50 hover:text-yuki-600 flex items-center justify-center transition-colors"><i class="fab fa-instagram text-xs"></i></a>
            </span>
        </div>
    </div>
</div>

<!-- MAIN NAVIGATION -->
<nav class="bg-yuki-600 shadow-md sticky top-0 z-40">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="<?= url('home') ?>" class="flex items-center gap-2">


        <div class="flex  items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" fill="none" width = "40" height = "40" class="">
                <path d="M58 26
                    C47 15 29 16 20 28
                    C10 41 13 58 27 69
                    L38 78

                    M58 26
                    C69 15 88 16 98 29
                    C107 41 105 58 93 70
                    L61 104

                    M61 104
                    C57 109 50 109 46 105"
                    stroke="#fff"
                    stroke-width="12"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>

                <path
                    d="M48 48
                    L60 60
                    L72 46"
                    stroke="#ffff"
                    stroke-width="12"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
            <h1 class="font-bold font-display text-white text-xl sm:text-2xl lg:text-3xl leading-tight">Yibera</h1>
                    
        </div>

            </a>

            <!-- Desktop nav -->
            <div class="hidden md:block">
                <div class="flex items-center gap-1">
                    <?php if (!Auth::check()): ?>
                        <a href="<?= url('home') ?>" class="nav-link-hover text-white/90 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors relative" data-page="home">
                            <i class="fas fa-house-medical mr-1"></i> Home
                        </a>
                        <a href="<?= url('services') ?>" class="nav-link-hover text-white/90 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors relative" data-page="services">
                            <i class="fas fa-stethoscope mr-1"></i> Services
                        </a>
                        <a href="<?= url('about') ?>" class="nav-link-hover text-white/90 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors relative" data-page="about">
                            <i class="fas fa-users mr-1"></i> About
                        </a>
                        <a href="<?= url('contact') ?>" class="nav-link-hover text-white/90 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors relative" data-page="contact">
                            <i class="fas fa-phone mr-1"></i> Contact Us
                        </a>
                        <a href="<?= url('book-appointment') ?>" class="ml-2 bg-white text-yuki-700 hover:bg-gray-100 px-5 py-2.5 rounded-md text-sm font-semibold transition-colors shadow-sm">
                            <i class="fas fa-calendar-plus mr-1"></i> Book Appointment
                        </a>
                        <a href="<?= url('login') ?>" class="ml-1 border border-white/40 text-white hover:bg-white/10 px-5 py-2.5 rounded-md text-sm font-semibold transition-colors">
                            <i class="fas fa-right-to-bracket mr-1"></i> Login
                        </a>
                    <?php else: ?>
                        <a href="<?= url('admin/dashboard') ?>" class="text-white/90 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            <i class="fas fa-chart-line mr-1"></i> Dashboard
                        </a>
                        <div class="relative group">
                            <button class="flex items-center text-white/90 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                <div class="w-8 h-8 bg-yuki-600 rounded-full flex items-center justify-center mr-2">
                                    <i class="fas fa-user-doctor text-white text-xs"></i>
                                </div>
                                <?= e(Auth::name()) ?>
                                <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-xl py-2 z-50 hidden group-hover:block border border-gray-100">
                                <a href="<?= url('admin/settings') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yuki-50 hover:text-yuki-700 transition-colors">
                                    <i class="fas fa-cog mr-2"></i> Settings
                                </a>
                                <a href="<?= url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="mobile-menu-button bg-white/15 inline-flex items-center justify-center p-3 rounded-md text-white hover:bg-white/25 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white transition-colors">
                    <span class="sr-only">Open main menu</span>
                    <i class="fas fa-bars text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="mobile-menu hidden md:hidden">
        <div class="px-4 pt-4 pb-6 space-y-2 sm:px-6 bg-white border-t border-yuki-700 shadow-lg">
            <?php if (!Auth::check()): ?>
                <a href="<?= url('home') ?>" class="text-gray-700 hover:text-yuki-600 hover:bg-yuki-50 block px-4 py-3 rounded-md text-base font-medium transition-colors">
                    <i class="fas fa-house-medical mr-3 text-yuki-500"></i> Home
                </a>
                <a href="<?= url('services') ?>" class="text-gray-700 hover:text-yuki-600 hover:bg-yuki-50 block px-4 py-3 rounded-md text-base font-medium transition-colors">
                    <i class="fas fa-stethoscope mr-3 text-yuki-500"></i> Services
                </a>
                <a href="<?= url('about') ?>" class="text-gray-700 hover:text-yuki-600 hover:bg-yuki-50 block px-4 py-3 rounded-md text-base font-medium transition-colors">
                    <i class="fas fa-users mr-3 text-yuki-500"></i> About
                </a>
                <a href="<?= url('contact') ?>" class="text-gray-700 hover:text-yuki-600 hover:bg-yuki-50 block px-4 py-3 rounded-md text-base font-medium transition-colors">
                    <i class="fas fa-phone mr-3 text-yuki-500"></i> Contact Us
                </a>
                <div class="pt-4 border-t border-gray-200 space-y-2">
                    <a href="<?= url('book-appointment') ?>" class="bg-yuki-600 text-white hover:bg-yuki-700 block px-4 py-3 rounded-md text-base font-medium text-center transition-colors">
                        <i class="fas fa-calendar-plus mr-2"></i> Book Appointment
                    </a>
                    <a href="<?= url('login') ?>" class="bg-yuki-600 text-white hover:bg-yuki-700 block px-4 py-3 rounded-md text-base font-medium text-center transition-colors">
                        <i class="fas fa-right-to-bracket mr-2"></i> Login
                    </a>
                </div>
            <?php else: ?>
                <div class="flex items-center px-4 py-3 bg-yuki-50 rounded-md mb-4">
                    <div class="w-10 h-10 bg-yuki-600 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900"><?= e(Auth::name()) ?></p>
                        <p class="text-xs text-yuki-600 capitalize"><?= e(Auth::role()) ?></p>
                    </div>
                </div>
                <a href="<?= url('admin/dashboard') ?>" class="text-gray-700 hover:text-yuki-600 hover:bg-yuki-50 block px-4 py-3 rounded-md text-base font-medium transition-colors">
                    <i class="fas fa-chart-line mr-3 text-yuki-500"></i> Dashboard
                </a>
                <a href="<?= url('admin/settings') ?>" class="text-gray-700 hover:text-yuki-600 hover:bg-yuki-50 block px-4 py-3 rounded-md text-base font-medium transition-colors">
                    <i class="fas fa-cog mr-3 text-yuki-600"></i> Settings
                </a>
                <div class="pt-4 border-t border-gray-200">
                    <a href="<?= url('logout') ?>" class="bg-red-500 text-white hover:bg-red-600 block px-4 py-3 rounded-md text-base font-medium text-center transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
