<?php
/** Book Appointment page. Rendered inside the public layout. */
$old = $_SESSION['appointment_data'] ?? [];
$gender = $old['gender'] ?? '';

$steps = [
    ['icon' => 'fa-file-pen',       'title' => 'Fill the Form',   'desc' => 'Tell us who you are and your preferred date — it takes about two minutes.'],
    ['icon' => 'fa-headset',        'title' => 'We Confirm',      'desc' => 'Our care team reviews your request and confirms your appointment by phone or email.'],
    ['icon' => 'fa-hospital-user',  'title' => 'Visit Us',        'desc' => 'Arrive at your scheduled time and meet your specialist — no long waiting.'],
];

$benefits = [
    ['icon' => 'fa-clock',        'title' => '24/7 Online Booking', 'desc' => 'Schedule your appointment any time, from anywhere.'],
    ['icon' => 'fa-user-doctor',  'title' => 'Expert Medical Team', 'desc' => 'Qualified doctors and specialists across every department.'],
    ['icon' => 'fa-shield-halved','title' => 'Secure & Confidential','desc' => 'Your information is protected to the highest standards.'],
    ['icon' => 'fa-bell',         'title' => 'Instant Confirmation','desc' => 'Receive prompt confirmation and helpful reminders.'],
];

$departments = ['Cardiology' => 'fa-heart', 'Neurology' => 'fa-brain', 'Pediatrics' => 'fa-child-reaching', 'Orthopaedics' => 'fa-bone', 'Maternity' => 'fa-baby', 'Dermatology' => 'fa-hand-dots', 'Emergency' => 'fa-truck-medical', 'General Medicine' => 'fa-stethoscope'];
?>

<!-- HERO : 50/50 split, full-height image with no padding -->
<section class="relative">
    <div class="grid lg:grid-cols-2 lg:min-h-[78vh]">
        <div class="bg-yuki-600 text-white flex items-center px-6 sm:px-10 lg:px-16 py-16 lg:py-20 order-2 lg:order-1">
            <div class="max-w-xl" data-aos="fade-right">
                <span class="inline-block bg-white/15 text-white text-sm font-medium px-4 py-1.5 rounded-md mb-5">Online Booking · 24/7</span>
                <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold leading-tight mb-5">Book Your <span class="text-secondary-300">Appointment</span></h1>
                <p class="text-lg md:text-xl text-white/85 mb-8">Schedule a consultation with our expert medical team in just a few minutes. Quick, easy and secure.</p>
                <div class="grid grid-cols-3 gap-4 mb-8 max-w-md">
                    <div><div class="text-3xl font-bold count-up">150+</div><div class="text-sm text-white/80">Doctors</div></div>
                    <div><div class="text-3xl font-bold count-up">2</div><div class="text-sm text-white/80">Min to Book</div></div>
                    <div><div class="text-3xl font-bold">24/7</div><div class="text-sm text-white/80">Availability</div></div>
                </div>
                <a href="#booking-form" class="inline-block bg-white text-yuki-700 hover:bg-gray-100 px-8 py-3.5 rounded-md font-semibold transition-colors"><i class="fas fa-calendar-plus mr-2"></i> Start Booking</a>
            </div>
        </div>
        <div class="relative min-h-[42vh] lg:min-h-0 order-1 lg:order-2">
            <img src="<?= asset('images/hero.jpg') ?>" alt="Book an appointment at Yibera" class="absolute inset-0 w-full h-full object-cover">
            <div class="hidden lg:flex absolute bottom-8 left-8 items-center gap-3 bg-white/95 backdrop-blur-sm rounded-md px-5 py-4 shadow-xl">
                <div class="w-12 h-12 rounded-full bg-yuki-100 text-yuki-600 flex items-center justify-center"><i class="fas fa-circle-check text-xl"></i></div>
                <div>
                    <p class="text-sm font-bold text-gray-900">Instant confirmation</p>
                    <p class="text-xs text-gray-500">No queues, no hassle</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HOW IT WORKS : illustrated 3-step process -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Booking in <span class="text-yuki-600 font-semibold">3 Simple Steps</span></h2>
            <p class="text-lg text-gray-600">From request to consultation — we've made it effortless.</p>
        </div>
        <div class="grid sm:grid-cols-3 gap-8 relative">
            <?php foreach ($steps as $i => $st): ?>
                <div class="relative text-center px-4" data-aos="fade-up" data-aos-delay="<?= $i * 120 ?>">
                    <div class="relative inline-flex items-center justify-center w-24 h-24 rounded-full bg-yuki-50 mb-6">
                        <i class="fas <?= $st['icon'] ?> text-yuki-600 text-3xl"></i>
                        <span class="absolute -top-1 -right-1 w-9 h-9 rounded-full bg-yuki-600 text-white font-bold flex items-center justify-center shadow-md"><?= $i + 1 ?></span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?= e($st['title']) ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?= e($st['desc']) ?></p>
                    <?php if ($i < count($steps) - 1): ?>
                        <i class="fas fa-arrow-right text-yuki-200 text-2xl absolute top-10 -right-4 hidden sm:block"></i>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- BOOKING FORM + SIDEBAR -->
<section id="booking-form" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Complete Your <span class="text-yuki-600 font-semibold">Booking</span></h2>
            <p class="text-lg text-gray-600">Fill in your details below and we'll confirm your appointment shortly.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <!-- Form -->
            <div class="lg:col-span-2" data-aos="fade-right">
                <div class="bg-white rounded-md p-6 sm:p-8 border border-gray-100 shadow-sm">
                    <?php if (isset($_SESSION['appointment_success'])): ?>
                        <div class="mb-6 bg-yuki-50 border border-yuki-200 text-yuki-800 px-4 py-3 rounded-md">
                            <i class="fas fa-check-circle mr-2"></i><?= e($_SESSION['appointment_success']) ?>
                        </div>
                        <?php unset($_SESSION['appointment_success']); ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['appointment_errors'])): ?>
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md">
                            <?php foreach ($_SESSION['appointment_errors'] as $error): ?>
                                <p class="flex items-start"><i class="fas fa-exclamation-triangle mr-2 mt-1"></i><?= e($error) ?></p>
                            <?php endforeach; ?>
                        </div>
                        <?php unset($_SESSION['appointment_errors']); ?>
                    <?php endif; ?>

                    <form action="<?= url('appointment/store') ?>" method="POST" class="space-y-8">
                        <!-- Personal -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 mb-4 flex items-center"><span class="w-7 h-7 rounded-md bg-yuki-100 text-yuki-600 flex items-center justify-center mr-2 text-sm"><i class="fas fa-user"></i></span> Personal Information</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <input type="text" name="first_name" placeholder="First Name *" required class="form-input" value="<?= e($old['first_name'] ?? '') ?>">
                                <input type="text" name="middle_name" placeholder="Middle Name" class="form-input" value="<?= e($old['middle_name'] ?? '') ?>">
                                <input type="text" name="last_name" placeholder="Last Name *" required class="form-input" value="<?= e($old['last_name'] ?? '') ?>">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">Date of Birth *</label>
                                    <input type="date" name="date_of_birth" required class="form-input" value="<?= e($old['date_of_birth'] ?? '') ?>">
                                </div>
                                <select name="gender" required class="form-input self-end">
                                    <option value="">Gender *</option>
                                    <option value="male" <?= $gender === 'male' ? 'selected' : '' ?>>Male</option>
                                    <option value="female" <?= $gender === 'female' ? 'selected' : '' ?>>Female</option>
                                    <option value="other" <?= $gender === 'other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 mb-4 flex items-center"><span class="w-7 h-7 rounded-md bg-yuki-100 text-yuki-600 flex items-center justify-center mr-2 text-sm"><i class="fas fa-phone"></i></span> Contact Information</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="email" name="email" placeholder="Email Address *" required class="form-input" value="<?= e($old['email'] ?? '') ?>">
                                <input type="tel" name="phone" placeholder="Phone Number *" required class="form-input" value="<?= e($old['phone'] ?? '') ?>">
                            </div>
                            <input type="tel" name="emergency_contact" placeholder="Emergency Contact (optional)" class="form-input mt-4" value="<?= e($old['emergency_contact'] ?? '') ?>">
                            <input type="text" name="address" placeholder="Full Address *" required class="form-input mt-4" value="<?= e($old['address'] ?? '') ?>">
                        </div>

                        <!-- Appointment -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 mb-4 flex items-center"><span class="w-7 h-7 rounded-md bg-yuki-100 text-yuki-600 flex items-center justify-center mr-2 text-sm"><i class="fas fa-stethoscope"></i></span> Appointment Details</h4>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Preferred Appointment Date</label>
                            <input type="date" name="preferred_date" class="form-input" value="<?= e($old['preferred_date'] ?? '') ?>">
                            <textarea name="notes" rows="4" placeholder="Symptoms, medical history or specific concerns..." class="form-input mt-4"><?= e($old['notes'] ?? '') ?></textarea>
                        </div>

                        <!-- Portal -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 mb-4 flex items-center"><span class="w-7 h-7 rounded-md bg-yuki-100 text-yuki-600 flex items-center justify-center mr-2 text-sm"><i class="fas fa-key"></i></span> Patient Portal <span class="text-gray-400 font-normal ml-1">(optional)</span></h4>
                            <input type="password" name="password" minlength="6" placeholder="Create a password (min 6 characters)" class="form-input">
                            <p class="text-xs text-gray-500 mt-1">Leave blank if you don't want a patient portal account.</p>
                        </div>

                        <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-3.5 rounded-md font-semibold transition-colors">
                            <i class="fas fa-calendar-check mr-2"></i> Book Appointment
                        </button>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6" data-aos="fade-left">
                <div class="bg-white rounded-md p-7 border border-gray-100 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-5">Why Book With Us?</h3>
                    <div class="space-y-5">
                        <?php foreach ($benefits as $b): ?>
                            <div class="flex items-start gap-3">
                                <div class="w-11 h-11 rounded-md bg-yuki-100 text-yuki-600 flex items-center justify-center flex-shrink-0"><i class="fas <?= $b['icon'] ?>"></i></div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm"><?= e($b['title']) ?></h4>
                                    <p class="text-gray-600 text-sm"><?= e($b['desc']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="bg-yuki-600 text-white rounded-md p-7">
                    <h3 class="text-lg font-bold mb-5">Need Help?</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex items-center gap-3"><i class="fas fa-phone text-white/80"></i><div><p class="font-semibold">Hotline</p><p class="text-white/85">+44 (0)1902 321000</p></div></div>
                        <div class="flex items-center gap-3"><i class="fas fa-envelope text-white/80"></i><div><p class="font-semibold">Email</p><p class="text-white/85">appointments@yibera.com</p></div></div>
                        <div class="flex items-center gap-3"><i class="fas fa-location-dot text-white/80"></i><div><p class="font-semibold">Visit</p><p class="text-white/85">Wulfruna Street, Wolverhampton, WV1 1LY</p></div></div>
                    </div>
                    <a href="<?= url('contact') ?>" class="mt-6 block text-center bg-white text-yuki-700 hover:bg-gray-100 px-5 py-2.5 rounded-md font-semibold transition-colors">Contact Us</a>
                </div>

                <div class="bg-white rounded-md p-7 border border-gray-100 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Our Departments</h3>
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <?php foreach ($departments as $name => $icon): ?>
                            <div class="flex items-center text-gray-700"><i class="fas <?= $icon ?> text-yuki-600 mr-2 w-4 text-center"></i><?= e($name) ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pd = document.querySelector('input[name="preferred_date"]');
        if (pd) pd.min = new Date().toISOString().split('T')[0];
    });
    <?php unset($_SESSION['appointment_data']); ?>
</script>
