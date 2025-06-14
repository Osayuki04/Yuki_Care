<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic HTML5 document setup -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic page title - shows page name + site name -->
    <title>
        <?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Yuki Care - Advanced Healthcare Management</title>

    <!-- Website icons (favicon) for browser tabs and bookmarks -->
    <link rel="icon" type="image/svg+xml" href="/hospital/assets/images/favicon.svg">
    <link rel="alternate icon" type="image/x-icon" href="/hospital/assets/images/favicon.ico">

    <!-- TAILWIND CSS FRAMEWORK -->
    <!-- Main Tailwind CSS library from CDN (Content Delivery Network) -->


    <!-- Custom Tailwind configuration with our brand colors and animations -->
    <!-- This file contains: Yuki/Carte/Medical colors, custom animations, fonts -->

    <!-- Custom CSS styles for additional styling not covered by Tailwind -->
    <link href="../dist/output.css?v=<?php echo filemtime('../dist/output.css'); ?>" rel="stylesheet">


    <!-- ICON LIBRARY -->
    <!-- Font Awesome - provides all the icons used throughout the site (fas fa-heart, fas fa-user, etc.) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- ANIMATION LIBRARIES -->
    <!-- AOS (Animate On Scroll) - creates scroll-triggered animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Lottie - for complex JSON-based animations (if needed) -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- CUSTOM FONTS -->
    <!-- Google Fonts - Poppins (body text) and Montserrat (headings) -->
    <!-- These fonts are defined in our Tailwind config as font-sans and font-display -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 dark:bg-gray-900 font-sans transition-colors duration-300">

    <!-- LOADING SCREEN -->
    <!-- Shows while page is loading, then fades out automatically -->
    <!-- Clean design with centered logo -->
    <div id="loading-screen" class="fixed inset-0 bg-white dark:bg-gray-900 z-50 flex items-center justify-center transition-colors duration-300">
        <div class="text-center">
            <!-- Centered logo -->
            <div class="mb-6 flex justify-center">
                <!-- Simple logo container -->
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg">
                    <!-- Logo image -->
                    <img src="../images/logo.png"
                         alt="Yuki Care Hospital Logo"
                         class="w-20 h-20 object-contain">
                </div>
            </div>

            <!-- Loading screen title -->
            <h2 class="text-2xl font-bold font-display mb-2 text-secondary-600">
                Yuki Care
            </h2>

            <!-- Loading message -->
            <p class="text-gray-600 dark:text-gray-300 mb-4">Your path to quality healthcare</p>

            <!-- Simple progress bar -->
            <div class="w-48 h-2 bg-gray-200 dark:bg-gray-700 rounded-full mx-auto overflow-hidden">
                <div class="h-full bg-secondary-600 rounded-full animate-pulse" style="width: 100%; animation: loadingBar 2s ease-in-out;"></div>
            </div>
        </div>
    </div>

    <!-- CUSTOM CSS FOR LOADING ANIMATION -->
    <style>
        /* Custom keyframe animation for the loading progress bar */
        @keyframes loadingBar {
            0% { width: 0%; }    /* Start with no width */
            100% { width: 100%; } /* End with full width */
        }

        /* Active navigation styling */
        .nav-link-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 2px;
            background: linear-gradient(90deg, #006f6a, #e7a82a);
            border-radius: 1px;
        }

        /* Navigation hover effect */
        .nav-link-hover::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0%;
            height: 2px;
            background: linear-gradient(90deg, #006f6a, #e7a82a);
            border-radius: 1px;
            transition: width 0.3s ease;
        }

        .nav-link-hover:hover::after {
            width: 80%;
        }
    </style>

    <!-- MAIN NAVIGATION HEADER -->
    <!-- Sticky navigation that stays at top when scrolling -->
    <!-- Supports dark mode with automatic color transitions -->
     <!-- TOP CONTACT BAR -->
     <nav class="hidden md:block bg-white dark:bg-gray-900 shadow-sm border-b border-gray-200 dark:border-gray-700 transition-colors duration-300 py-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center items-center space-x-12 ">
                <!-- Logo/Brand Image - UBTH.org Style (Large & Professional) -->
                <div class="flex items-center">
                    <!-- Large logo similar to UBTH.org size - Using inline styles for immediate effect -->
                    <img 
                         style="width: 150px; height: 150px;"
                         src="../images/logo.png"
                         alt="Hospital Logo">
                </div>
                <!-- Emergency Hotline -->
                <div class="flex items-center space-x-3 group cursor-pointer">
                    <div class="relative">
                        <div class="absolute inset-0 bg-red-500 rounded-full blur-sm opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="relative bg-gradient-to-r from-red-500 to-red-600 p-3 rounded-full shadow-lg">
                            <i class="fas fa-phone-volume text-white text-lg "></i>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 block font-medium">Emergency Hotline</span>
                        <span class="text-sm font-bold text-gray-800 dark:text-gray-200">+234 7062 403852</span>
                    </div>
                </div>

                <!-- Medical Consultation -->
                <div class="flex items-center space-x-3 group cursor-pointer">
                    <div class="relative">
                        <div class="absolute inset-0 bg-secondary-500 rounded-full blur-sm opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="relative bg-gradient-to-r from-secondary-500 to-secondary-600 p-3 rounded-full shadow-lg">
                            <i class="fas fa-stethoscope text-white text-lg "></i>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 block font-medium">Medical Consultation</span>
                        <span class="text-sm font-bold text-gray-800 dark:text-gray-200">consultation@yukicare.com</span>
                    </div>
                </div>

                <!-- Appointment Booking -->
                <div class="flex items-center space-x-3 group cursor-pointer">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary-500 rounded-full blur-sm opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                        <div class="relative bg-gradient-to-r from-primary-500 to-primary-600 p-3 rounded-full shadow-lg">
                            <i class="fas fa-calendar-check text-white text-lg "></i>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 block font-medium">Book Appointment</span>
                        <span class="text-sm font-bold text-gray-800 dark:text-gray-200">24/7 Online Booking</span>
                    </div>
                </div>

               
            </div>
        </div>
     </nav>
    <nav class="bg-primary-300 dark:bg-gray-700 shadow-sm border-b border-gray-200 dark:border-gray-700 sticky top-0 z-40 transition-colors duration-300 py-2">
        <!-- Container with responsive padding -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- LOGO AND BRAND SECTION -->
                <div class="flex items-center">
                    <!-- Brand text only - No logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <!-- Brand text - Responsive sizing -->
                        <div>
                            <!-- Main brand name with single color - Responsive sizing -->
                            <h1 class="font-bold font-display text-gray-900 text-[15px] sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl leading-tight">
                                Yuki Care
                            </h1>
                               
                        </div>
                    </div>
                </div>
                

                <!-- NAVIGATION LINKS SECTION -->
                <!-- Hidden on mobile (md:block), shown on desktop -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">

                        <!-- NAVIGATION FOR NON-LOGGED IN USERS -->
                        <?php if (!isset($_SESSION['user_id'])): ?>
                            <!-- Home link -->
                            <a href="../home/" class="nav-link-hover text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 hover:scale-105 relative" data-page="index">
                                <i class="fas fa-house-medical mr-1"></i> Home
                            </a>

                            <!-- Services link -->
                            <a href="../services/" class="nav-link-hover text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 hover:scale-105 relative" data-page="services">
                                <i class="fas fa-stethoscope mr-1"></i> Services
                            </a>

                            <!-- About link -->
                            <a href="../about/" class="nav-link-hover text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 hover:scale-105 relative" data-page="about">
                                <i class="fas fa-users mr-1"></i> About
                            </a>

                            <!-- Contact Us link -->
                            <a href="../contact/" class="nav-link-hover text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 hover:scale-105 relative" data-page="contact">
                                <i class="fas fa-phone mr-1"></i> Contact Us
                            </a>

                            <!-- Dark Mode Toggle Button -->
                            <!-- Shows moon icon in light mode, sun icon in dark mode -->
                            <button id="darkModeToggle" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 hover:scale-105">
                                <i class="fas fa-moon" id="moonIcon"></i>    <!-- Shown in light mode -->
                                <i class="fas fa-sun hidden dark:inline-block" id="sunIcon"></i> <!-- Shown in dark mode -->
                            </button>

                            <!-- Login buttons -->
                            <div class="flex space-x-2">
                                <a href="../auth/admin-login.php" class="bg-secondary-500 text-white hover:bg-secondary-600 px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 hover:scale-105 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-user-shield mr-1"></i> Admin Login
                                </a>
                            </div>
                        <!-- NAVIGATION FOR LOGGED IN USERS -->
                        <?php else: ?>
                            <!-- Dashboard link - dynamically goes to user's dashboard based on their type -->
                            <a href="/hospital/dashboard/<?php echo $_SESSION['user_type']; ?>.php" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 hover:scale-105">
                                <i class="fas fa-chart-line mr-1"></i> Dashboard
                            </a>

                            <!-- Dark Mode Toggle (same as above) -->
                            <button id="darkModeToggle2" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 hover:scale-105">
                                <i class="fas fa-moon dark:hidden" id="moonIcon2"></i>
                                <i class="fas fa-sun hidden dark:inline-block" id="sunIcon2"></i>
                            </button>

                            <!-- User Profile Dropdown -->
                            <div class="relative group">
                                <!-- Dropdown trigger button -->
                                <button class="flex items-center text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 hover:scale-105">
                                    <!-- User avatar with gradient background -->
                                    <div class="w-8 h-8 bg-gradient-to-r from-secondary-400 to-primary-400 rounded-full flex items-center justify-center mr-2">
                                        <i class="fas fa-user-doctor text-white text-xs"></i>
                                    </div>
                                    <!-- User name from session -->
                                    <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>
                                    <!-- Dropdown arrow that rotates on hover -->
                                    <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                                </button>

                                <!-- Dropdown menu (hidden by default, shown on hover) -->
                                <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-xl py-2 z-50 hidden group-hover:block animate-slide-down border border-gray-100 dark:border-gray-700">
                                    <!-- Profile link -->
                                    <a href="/hospital/profile.php" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-primary-50 dark:hover:bg-primary-900 hover:text-primary-700 dark:hover:text-primary-300 transition-colors duration-200">
                                        <i class="fas fa-user-edit mr-2"></i> Profile
                                    </a>
                                    <!-- Logout link -->
                                    <a href="/hospital/auth/logout.php" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-accent-50 dark:hover:bg-accent-900 hover:text-accent-700 dark:hover:text-accent-300 transition-colors duration-200">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- MOBILE MENU BUTTON -->
                <!-- Only visible on mobile devices (hidden on md and larger screens) -->
                <div class="md:hidden">
                    <!-- Hamburger menu button with logo colors -->
                    <button type="button" class="mobile-menu-button bg-primary-100 inline-flex items-center justify-center p-3 rounded-lg text-primary-600 hover:text-primary-700 hover:bg-primary-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500 transition-all duration-200">
                        <span class="sr-only">Open main menu</span>  <!-- Screen reader text -->
                        <i class="fas fa-bars text-lg"></i>  <!-- Hamburger icon -->
                    </button>
                </div>
            </div>
        </div>

        <!-- MOBILE MENU DROPDOWN -->
        <!-- Hidden by default, shown when mobile menu button is clicked -->
        <!-- Only visible on mobile devices (hidden on md and larger screens) -->
        <div class="mobile-menu hidden md:hidden">
            <div class="px-4 pt-4 pb-6 space-y-2 sm:px-6 bg-white dark:bg-gray-900 border-t border-primary-200 dark:border-gray-700 shadow-lg">

                <!-- MOBILE MENU FOR NON-LOGGED IN USERS -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <!-- Home link -->
                    <a href="../home/" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900 block px-4 py-3 rounded-lg text-base font-medium transition-all duration-200">
                        <i class="fas fa-house-medical mr-3 text-primary-500"></i> Home
                    </a>

                    <!-- Services link -->
                    <a href="../services/" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900 block px-4 py-3 rounded-lg text-base font-medium transition-all duration-200">
                        <i class="fas fa-stethoscope mr-3 text-secondary-500"></i> Services
                    </a>

                    <!-- About link -->
                    <a href="../about/" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900 block px-4 py-3 rounded-lg text-base font-medium transition-all duration-200">
                        <i class="fas fa-users mr-3 text-primary-500"></i> About
                    </a>
                    <!-- Contact Us link -->
                    <a href="../contact/" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900 block px-4 py-3 rounded-lg text-base font-medium transition-all duration-200">
                        <i class="fas fa-phone mr-3 text-accent-500"></i> Contact Us
                    </a>

                    <!-- Login buttons -->
                    <div class="pt-4 border-t border-gray-200 dark:border-gray-700 space-y-2">
                        <a href="../auth/admin-login.php" class="bg-secondary-500 text-white hover:bg-secondary-600 block px-4 py-3 rounded-lg text-base font-medium text-center transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-user-shield mr-2"></i> Admin Login
                        </a>
                    </div>

                <!-- MOBILE MENU FOR LOGGED IN USERS -->
                <?php else: ?>
                    <!-- User info section -->
                    <div class="flex items-center px-4 py-3 bg-primary-50 dark:bg-primary-900 rounded-lg mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-primary-400 to-secondary-400 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>
                            </p>
                            <p class="text-xs text-primary-600 dark:text-primary-400 capitalize">
                                <?php echo htmlspecialchars($_SESSION['user_type'] ?? 'Member'); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Dashboard link -->
                    <a href="/hospital/dashboard/<?php echo $_SESSION['user_type']; ?>.php" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900 block px-4 py-3 rounded-lg text-base font-medium transition-all duration-200">
                        <i class="fas fa-chart-line mr-3 text-primary-500"></i> Dashboard
                    </a>

                    <!-- Profile link -->
                    <a href="/hospital/profile.php" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900 block px-4 py-3 rounded-lg text-base font-medium transition-all duration-200">
                        <i class="fas fa-user-edit mr-3 text-secondary-500"></i> Profile
                    </a>

                    <!-- Settings link -->
                    <a href="/hospital/settings.php" class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900 block px-4 py-3 rounded-lg text-base font-medium transition-all duration-200">
                        <i class="fas fa-cog mr-3 text-accent-500"></i> Settings
                    </a>

                    <!-- Logout button -->
                    <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="/hospital/auth/logout.php" class="bg-accent-500 text-white hover:bg-accent-600 block px-4 py-3 rounded-lg text-base font-medium text-center transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- MAIN JAVASCRIPT FUNCTIONALITY -->
    <script>
        // Wait for the entire page to load before running scripts
        document.addEventListener('DOMContentLoaded', function() {

            // ===== ACTIVE NAVIGATION FUNCTIONALITY =====
            // Detect current page and add active styling
            const currentPage = window.location.pathname;
            const navLinks = document.querySelectorAll('[data-page]');

            navLinks.forEach(link => {
                const page = link.getAttribute('data-page');
                if (currentPage.includes(page) || (page === 'index' && currentPage === '/hospital/')) {
                    link.classList.remove('nav-link-hover');
                    link.classList.add('nav-link-active');
                }
            });

            // ===== DARK MODE FUNCTIONALITY =====
            // Get references to the dark mode toggle buttons and HTML element
            const darkModeToggle = document.getElementById('darkModeToggle');
            const darkModeToggle2 = document.getElementById('darkModeToggle2');
            const html = document.documentElement;

            // Check for saved theme preference in browser storage
            // If no preference saved, use system preference (light/dark mode)
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');  // Enable dark mode
            }

            // Function to toggle dark mode
            function toggleDarkMode() {
                html.classList.toggle('dark');  // Toggle dark class on/off

                // Save user's preference to browser storage
                if (html.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');   // Save dark preference
                } else {
                    localStorage.setItem('theme', 'light');  // Save light preference
                }
            }

            // Add click event listeners to both dark mode toggle buttons
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', toggleDarkMode);
            }
            if (darkModeToggle2) {
                darkModeToggle2.addEventListener('click', toggleDarkMode);
            }

            // ===== LOADING SCREEN FUNCTIONALITY =====
            // Hide the loading screen after 1.5 seconds
            setTimeout(function() {
                const loadingScreen = document.getElementById('loading-screen');
                if (loadingScreen) {
                    loadingScreen.style.opacity = '0';                    // Start fade out
                    loadingScreen.style.transition = 'opacity 0.5s ease-out';  // Smooth transition
                    // After fade completes, completely hide the element
                    setTimeout(function() {
                        loadingScreen.style.display = 'none';
                    }, 500);  // Wait for fade animation to complete
                }
            }, 1500);  // Show loading screen for 1.5 seconds

            // ===== AOS ANIMATIONS INITIALIZATION =====
            // Initialize AOS (Animate On Scroll) library
            AOS.init({
                duration: 800,        // Animation duration: 800ms
                easing: 'ease-in-out', // Smooth easing function
                once: true,           // Animate only once (don't repeat on scroll up)
                offset: 100           // Start animation 100px before element enters viewport
            });

            // ===== MOBILE MENU FUNCTIONALITY =====
            // Get references to mobile menu button and menu
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');

            // Add click event to toggle mobile menu visibility
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');  // Show/hide mobile menu
                });
            }

            // ===== SMOOTH SCROLLING FOR ANCHOR LINKS =====
            // Add smooth scrolling behavior to all internal anchor links (links starting with #)
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();  // Prevent default jump behavior
                    // Find the target element
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        // Smoothly scroll to the target
                        target.scrollIntoView({
                            behavior: 'smooth',  // Smooth scrolling animation
                            block: 'start'       // Align to top of viewport
                        });
                    }
                });
            });

            // ===== PARALLAX EFFECT FOR HERO SECTIONS =====
            // Add parallax scrolling effect to elements with 'parallax-bg' class
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;  // Get scroll position
                const parallax = document.querySelector('.parallax-bg');
                if (parallax) {
                    // Move background slower than scroll (0.5x speed for parallax effect)
                    const speed = scrolled * 0.5;
                    parallax.style.transform = `translateY(${speed}px)`;
                }
            });
        });
    </script>

