<?php /** Public site footer (matches the navbar green). */ ?>
<footer class="bg-yuki-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Brand -->
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" class="h-12 w-auto object-contain">
                    <span class="text-xl font-bold">Yibera</span>
                </div>
                <p class="text-white/80 leading-relaxed">
                    Advanced healthcare delivered with compassion. Quality patient care, modern technology, and a team you can trust.
                </p>
                <div class="flex items-center gap-3 mt-5">
                    <a href="#" aria-label="Facebook" class="w-9 h-9 rounded-md bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter" class="w-9 h-9 rounded-md bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" aria-label="Instagram" class="w-9 h-9 rounded-md bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn" class="w-9 h-9 rounded-md bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick links -->
            <div>
                <h3 class="text-base font-semibold mb-4 text-white">Quick Links</h3>
                <ul class="space-y-2.5 text-white/80">
                    <li><a href="<?= url('home') ?>" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="<?= url('services') ?>" class="hover:text-white transition-colors">Services</a></li>
                    <li><a href="<?= url('about') ?>" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="<?= url('contact') ?>" class="hover:text-white transition-colors">Contact</a></li>
                    <li><a href="<?= url('book-appointment') ?>" class="hover:text-white transition-colors">Book Appointment</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-base font-semibold mb-4 text-white">Our Services</h3>
                <ul class="space-y-2.5 text-white/80">
                    <li>Emergency Care</li>
                    <li>Cardiology</li>
                    <li>Neurology</li>
                    <li>Pediatrics</li>
                    <li>Pharmacy</li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-base font-semibold mb-4 text-white">Get in Touch</h3>
                <ul class="space-y-3 text-white/80">
                    <li class="flex items-start gap-3"><i class="fas fa-phone mt-1"></i><span>+44 (0)1902 321000</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-envelope mt-1"></i><span>info@yibera.com</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-map-marker-alt mt-1"></i><span>Wulfruna Street, Wolverhampton, WV1 1LY</span></li>
                    <li class="flex items-start gap-3"><i class="fas fa-clock mt-1"></i><span>24/7 Emergency Service</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-yuki-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm text-white/80">
            <p>&copy; <?= date('Y') ?> Yibera Medical Center. All rights reserved.</p>
            <p class="flex items-center gap-4">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </p>
        </div>
    </div>
</footer>
