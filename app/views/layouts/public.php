<?php /** Public-facing layout. Expects $content and optional $page_title. */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require BASE_PATH . '/app/views/partials/head.php'; ?>
    <style>
        @keyframes loadingBar { 0% { width: 0%; } 100% { width: 100%; } }
        .nav-link-active::after,
        .nav-link-hover::after {
            content: ''; position: absolute; bottom: -2px; left: 50%; transform: translateX(-50%);
            height: 2px; background: #ffffff; border-radius: 1px;
        }
        .nav-link-active::after { width: 80%; }
        .nav-link-hover::after  { width: 0%; transition: width 0.3s ease; }
        .nav-link-hover:hover::after { width: 80%; }

        /* ===== Loading screen — minimal, pure white ===== */
        .ls-mark { transform-origin: 50% 50%; animation: lsPulse 1.6s ease-in-out infinite; }
        @keyframes lsPulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.07); } }
        .ls-dots::after { content: ''; animation: lsDots 1.5s steps(1, end) infinite; }
        @keyframes lsDots { 0% { content: ''; } 25% { content: '.'; } 50% { content: '..'; } 75% { content: '...'; } }
        @media (prefers-reduced-motion: reduce) {
            .ls-mark { animation: none; }
            .ls-dots::after { content: '…'; }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans overflow-x-hidden">

    <!-- Loading screen -->
    <div id="loading-screen" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-white">

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
                    stroke="#2f7d57"
                    stroke-width="12"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>

                <path
                    d="M48 48
                    L60 60
                    L72 46"
                    stroke="#2f7d57"
                    stroke-width="12"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
            <h1 style="color:#2f7d57" class="font-bold font-display text-[#2f7d57] text-xl sm:text-2xl lg:text-3xl leading-tight">Yibera</h1>
                    
        </div>

        <span class="mt-2 text-sm text-gray-400 tracking-wide">Loading<span class="ls-dots"></span></span>
    </div>

    <?php require BASE_PATH . '/app/views/partials/nav.php'; ?>

    <?= $content ?>

    <?php require BASE_PATH . '/app/views/partials/footer.php'; ?>

    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Active nav highlight (based on current route)
            const params = new URLSearchParams(window.location.search);
            const currentPage = params.get('page') || 'home';
            document.querySelectorAll('[data-page]').forEach(link => {
                if (link.getAttribute('data-page') === currentPage) {
                    link.classList.remove('nav-link-hover');
                    link.classList.add('nav-link-active');
                }
            });

            // Loading screen
            setTimeout(function () {
                const ls = document.getElementById('loading-screen');
                if (ls) {
                    ls.style.opacity = '0';
                    ls.style.transition = 'opacity 0.5s ease-out';
                    setTimeout(() => ls.style.display = 'none', 500);
                }
            }, 1200);

            // AOS
            if (window.AOS) AOS.init({ duration: 700, easing: 'ease-in-out', once: true, offset: 80 });

            // Mobile menu
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
            }

            // Smooth anchor scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
                });
            });

            // ===== Count-up animation =====
            // Any element with class "count-up" animates from 0 to the number in
            // its text (preserving prefix/suffix, e.g. "10,000+", "98%", "24/7").
            const counters = document.querySelectorAll('.count-up');
            if (counters.length) {
                const animate = (el) => {
                    const raw = el.getAttribute('data-target') || el.textContent;
                    const m = String(raw).match(/^([^\d]*)([\d.,]+)(.*)$/s);
                    if (!m) return;
                    const prefix = m[1], numStr = m[2], suffix = m[3];
                    const decimals = (numStr.split('.')[1] || '').length;
                    const target = parseFloat(numStr.replace(/,/g, ''));
                    if (isNaN(target)) return;
                    const dur = 1700, start = performance.now();
                    const fmt = (v) => prefix + v.toLocaleString(undefined, {
                        minimumFractionDigits: decimals, maximumFractionDigits: decimals
                    }) + suffix;
                    const step = (now) => {
                        const p = Math.min(1, (now - start) / dur);
                        const eased = 1 - Math.pow(1 - p, 3);
                        el.textContent = fmt(target * eased);
                        if (p < 1) requestAnimationFrame(step); else el.textContent = fmt(target);
                    };
                    el.textContent = fmt(0);
                    requestAnimationFrame(step);
                };
                const io = new IntersectionObserver((entries) => {
                    entries.forEach((en) => {
                        if (en.isIntersecting) { io.unobserve(en.target); animate(en.target); }
                    });
                }, { threshold: 0.35 });
                counters.forEach((el) => io.observe(el));
            }
        });
    </script>
</body>
</html>
