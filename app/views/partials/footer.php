<?php /** Public site footer. */ ?>
<footer class="relative bg-yuki-600 text-white overflow-hidden">
    <!-- decorative -->
    <div class="absolute top-0 right-0 w-72 h-72 bg-white/5 rounded-full -translate-y-1/3 translate-x-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-yuki-500/40 rounded-full blur-3xl -translate-x-1/3 translate-y-1/4 pointer-events-none"></div>

    <!-- ===================== CTA strip ===================== -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 lg:pt-16">
        <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-2xl px-6 sm:px-10 py-8 lg:py-9 flex flex-col lg:flex-row items-center justify-between gap-6 shadow-xl">
            <div class="text-center lg:text-left">
                <h3 class="text-2xl sm:text-3xl font-bold leading-tight">Ready to put your <span class="text-secondary-300">health first?</span></h3>
                <p class="text-white/80 mt-2">Book an appointment in minutes, or talk to our care team today.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto shrink-0">
                <a href="<?= url('book-appointment') ?>" class="bg-white text-yuki-700 hover:bg-gray-100 px-7 py-3.5 rounded-md font-semibold text-center transition-colors shadow-sm"><i class="fas fa-calendar-plus mr-2"></i> Book Appointment</a>
                <a href="<?= url('contact') ?>" class="border border-white/40 hover:bg-white/10 text-white px-7 py-3.5 rounded-md font-semibold text-center transition-colors"><i class="fas fa-headset mr-2"></i> Contact Us</a>
            </div>
        </div>
    </div>

    <!-- ===================== Main ===================== -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-14">

        <!-- Desktop -->
        <div class="hidden lg:grid lg:grid-cols-12 gap-10">
            <!-- Brand -->
            <div class="lg:col-span-4">
                <div class="flex items-center gap-2 mb-4">
                    <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" width="500" height="500" class="h-12 w-auto object-contain">
                    <span class="text-2xl font-bold">Yibera</span>
                </div>
                <p class="text-white/80 leading-relaxed max-w-sm">
                    Advanced healthcare delivered with compassion — quality patient care, modern technology, and a team you can trust.
                </p>
                <div class="flex flex-wrap gap-2 mt-5">
                    <span class="bg-white/10 text-xs px-3 py-1.5 rounded-md"><i class="fas fa-shield-heart text-secondary-300 mr-1"></i> HIPAA Compliant</span>
                    <span class="bg-white/10 text-xs px-3 py-1.5 rounded-md"><i class="fas fa-certificate text-secondary-300 mr-1"></i> ISO Certified</span>
                </div>
                <div class="flex items-center gap-3 mt-6">
                    <?php foreach (['fa-facebook-f' => 'Facebook', 'fa-x-twitter' => 'Twitter', 'fa-instagram' => 'Instagram', 'fa-linkedin-in' => 'LinkedIn'] as $icon => $label): ?>
                        <a href="#" aria-label="<?= $label ?>" class="w-10 h-10 rounded-full bg-white/10 hover:bg-white hover:text-yuki-600 flex items-center justify-center transition-colors"><i class="fab <?= $icon ?>"></i></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Quick links -->
            <div class="lg:col-span-2">
                <h3 class="text-base font-semibold mb-1 inline-block">Quick Links</h3>
                <span class="block h-0.5 w-8 bg-secondary-300 rounded-full mb-4"></span>
                <ul class="space-y-3 text-white/80">
                    <?php foreach (['home' => 'Home', 'services' => 'Services', 'about' => 'About Us', 'contact' => 'Contact', 'book-appointment' => 'Book Appointment'] as $route => $label): ?>
                        <li><a href="<?= url($route) ?>" class="group inline-flex items-center gap-2 hover:text-white transition-colors"><i class="fas fa-chevron-right text-[10px] text-secondary-300 group-hover:translate-x-0.5 transition-transform"></i> <?= $label ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Services -->
            <div class="lg:col-span-2">
                <h3 class="text-base font-semibold mb-1 inline-block">Our Services</h3>
                <span class="block h-0.5 w-8 bg-secondary-300 rounded-full mb-4"></span>
                <ul class="space-y-3 text-white/80">
                    <?php foreach (['Emergency Care', 'Cardiology', 'Neurology', 'Pediatrics', 'Pharmacy'] as $svc): ?>
                        <li><a href="<?= url('services') ?>" class="group inline-flex items-center gap-2 hover:text-white transition-colors"><i class="fas fa-chevron-right text-[10px] text-secondary-300 group-hover:translate-x-0.5 transition-transform"></i> <?= $svc ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact -->
            <div class="lg:col-span-4">
                <h3 class="text-base font-semibold mb-1 inline-block">Get in Touch</h3>
                <span class="block h-0.5 w-8 bg-secondary-300 rounded-full mb-4"></span>
                <ul class="space-y-4 text-white/85">
                    <li class="flex items-start gap-3"><span class="w-9 h-9 rounded-md bg-white/10 flex items-center justify-center shrink-0"><i class="fas fa-phone text-secondary-300 text-sm"></i></span><div><p class="text-xs text-white/60">Emergency Hotline</p><a href="tel:+4401902321000" class="font-medium hover:text-white transition-colors">+44 (0)1902 321000</a></div></li>
                    <li class="flex items-start gap-3"><span class="w-9 h-9 rounded-md bg-white/10 flex items-center justify-center shrink-0"><i class="fas fa-envelope text-secondary-300 text-sm"></i></span><div><p class="text-xs text-white/60">Email Us</p><a href="mailto:info@yibera.com" class="font-medium hover:text-white transition-colors">info@yibera.com</a></div></li>
                    <li class="flex items-start gap-3"><span class="w-9 h-9 rounded-md bg-white/10 flex items-center justify-center shrink-0"><i class="fas fa-location-dot text-secondary-300 text-sm"></i></span><div><p class="text-xs text-white/60">Visit Us</p><p class="font-medium">Wulfruna Street, Wolverhampton, WV1 1LY</p></div></li>
                </ul>
            </div>
        </div>

        <!-- Mobile / tablet: compact & centered -->
        <div class="lg:hidden text-center">
            <a href="<?= url('home') ?>" class="inline-flex items-center gap-2 mb-3">
                <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" width="500" height="500" class="h-10 w-auto object-contain">
                <span class="text-xl font-bold">Yibera</span>
            </a>
            <p class="text-white/80 text-sm max-w-xs mx-auto mb-6">Advanced healthcare, delivered with compassion.</p>

            <nav class="flex flex-wrap justify-center gap-x-5 gap-y-2.5 text-sm font-medium text-white/85 mb-6">
                <a href="<?= url('home') ?>" class="hover:text-white transition-colors">Home</a>
                <a href="<?= url('services') ?>" class="hover:text-white transition-colors">Services</a>
                <a href="<?= url('about') ?>" class="hover:text-white transition-colors">About</a>
                <a href="<?= url('contact') ?>" class="hover:text-white transition-colors">Contact</a>
                <a href="<?= url('book-appointment') ?>" class="hover:text-white transition-colors">Book</a>
            </nav>

            <div class="flex flex-col items-center gap-2.5 text-sm text-white/85 mb-6">
                <a href="tel:+4401902321000" class="inline-flex items-center gap-2 hover:text-white transition-colors"><i class="fas fa-phone text-secondary-300"></i> +44 (0)1902 321000</a>
                <a href="mailto:info@yibera.com" class="inline-flex items-center gap-2 hover:text-white transition-colors"><i class="fas fa-envelope text-secondary-300"></i> info@yibera.com</a>
            </div>

            <div class="flex justify-center gap-3">
                <?php foreach (['fa-facebook-f' => 'Facebook', 'fa-x-twitter' => 'Twitter', 'fa-instagram' => 'Instagram', 'fa-linkedin-in' => 'LinkedIn'] as $icon => $label): ?>
                    <a href="#" aria-label="<?= $label ?>" class="w-9 h-9 rounded-full bg-white/10 hover:bg-white hover:text-yuki-600 flex items-center justify-center transition-colors"><i class="fab <?= $icon ?>"></i></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Bottom bar -->
    <div class="relative border-t border-white/10 bg-yuki-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs sm:text-sm text-white/75 text-center">
            <p>&copy; <?= date('Y') ?> Yibera Medical Center. All rights reserved.</p>
            <div class="flex items-center gap-5">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <button type="button" onclick="window.scrollTo({top:0,behavior:'smooth'});" class="inline-flex items-center gap-1.5 hover:text-white transition-colors">Top <i class="fas fa-arrow-up text-xs"></i></button>
            </div>
        </div>
    </div>
</footer>
