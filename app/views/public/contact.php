<?php
/** Contact page. Rendered inside the public layout. */
$old = $_SESSION['appointment_data'] ?? [];

$methods = [
    ['icon' => 'fa-phone',         'title' => 'Call Us',   'lines' => ['+44 (0)1902 321000', '24/7 Emergency Line']],
    ['icon' => 'fa-envelope',      'title' => 'Email Us',  'lines' => ['info@yibera.com', 'consultation@yibera.com']],
    ['icon' => 'fa-location-dot',  'title' => 'Visit Us',  'lines' => ['Wulfruna Street, Wolverhampton', 'WV1 1LY, United Kingdom']],
    ['icon' => 'fa-clock',         'title' => 'Opening Hours', 'lines' => ['Emergency: 24/7', 'Outpatient: 6AM – 10PM']],
];

$locations = [
    ['img' => 'c.jfif',  'tag' => 'Main Campus', 'name' => 'Yibera Main Hospital', 'email' => 'main@yibera.com',      'hours' => 'Emergency 24/7 · Outpatient 6AM–10PM', 'tags' => ['Emergency Care', 'Surgery', 'ICU', 'All Specialties']],
    ['img' => 'c1.jpg',  'tag' => 'Outpatient',  'name' => 'Yibera Outpatient Centre', 'email' => 'outpatient@yibera.com', 'hours' => 'Mon–Fri 7AM–8PM · Weekends 8AM–6PM', 'tags' => ['Primary Care', 'Diagnostics', 'Lab Services', 'Imaging']],
    ['img' => 'c3.jfif', 'tag' => 'Specialty',   'name' => 'Yibera Specialty Clinic', 'email' => 'specialty@yibera.com',  'hours' => 'Mon–Fri 8AM–6PM · Sat 9AM–3PM', 'tags' => ['Cardiology', 'Neurology', 'Oncology', 'Orthopaedics']],
];

$directions = [
    ['icon' => 'fa-car',          'title' => 'By Car',          'desc' => 'Take the Medical District exit, turn onto Healthcare Avenue. Free parking in our 5-level garage.'],
    ['icon' => 'fa-bus',          'title' => 'Public Transit',  'desc' => 'Bus lines 15, 22 and 45 stop directly outside. Metro Rail Medical Center Station is two blocks away.'],
    ['icon' => 'fa-square-parking','title' => 'Parking & Access','desc' => 'Free patient parking, valet at the main entrance, EV charging and full wheelchair access.'],
];
?>
<?php /* Safelist for dynamically-built accent classes. */ ?>
<span class="hidden bg-yuki-50 bg-yuki-100 bg-yuki-600 text-yuki-600 border-yuki-600 bg-yuki-50 bg-yuki-100 bg-yuki-600 text-yuki-600 border-yuki-600"></span>

<!-- HERO : 50/50 split, full-height image with no padding -->
<section class="relative">
    <div class="grid lg:grid-cols-2 lg:min-h-[72vh]">
        <div class="bg-yuki-600 text-white flex items-center px-6 sm:px-10 lg:px-16 py-16 lg:py-20 order-2 lg:order-1">
            <div class="max-w-xl" data-aos="fade-right">
                <span class="inline-block bg-white/15 text-white text-sm font-medium px-4 py-1.5 rounded-md mb-5">We're Here to Help</span>
                <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold leading-tight mb-5">Contact <span class="text-secondary-300">Yibera</span></h1>
                <p class="text-lg md:text-xl text-white/85 mb-8">Questions, appointments or emergencies — our patient care team is available around the clock to support you.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="tel:+441902321000" class="bg-white text-yuki-700 hover:bg-gray-100 px-7 py-3.5 rounded-md font-semibold transition-colors text-center"><i class="fas fa-phone mr-2"></i> Call +44 (0)1902 321000</a>
                    <a href="#contact-form" class="border border-white/40 hover:bg-white/10 text-white px-7 py-3.5 rounded-md font-semibold transition-colors text-center">Send a Request</a>
                </div>
            </div>
        </div>
        <div class="relative min-h-[42vh] lg:min-h-0 order-1 lg:order-2">
            <img src="<?= asset('images/hero.jpg') ?>" alt="Contact Yibera" class="absolute inset-0 w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- QUICK CONTACT CARDS (count-up where numeric) -->
<section class="py-16 bg-gray-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $quick = [['fa-headset', '24/7', 'Patient Support', false], ['fa-stethoscope', '6', 'Departments', true], ['fa-location-dot', '3', 'Locations', true], ['fa-users', '100K+', 'Patients / Year', true]];
            foreach ($quick as $k => [$icon, $num, $label, $cu]): $accent = $k % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="bg-white rounded-md p-7 text-center shadow-sm border-b-4 border-<?= $accent ?>-600" data-aos="fade-up" data-aos-delay="<?= $k * 100 ?>">
                    <div class="w-14 h-14 mx-auto rounded-full bg-<?= $accent ?>-100 text-<?= $accent ?>-600 flex items-center justify-center mb-4"><i class="fas <?= $icon ?> text-2xl"></i></div>
                    <div class="text-3xl font-bold text-<?= $accent ?>-600 <?= $cu ? 'count-up' : '' ?>"><?= $num ?></div>
                    <div class="text-gray-500 mt-1"><?= $label ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CONTACT FORM + METHODS -->
<section id="contact-form" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Get in <span class="text-yuki-600 font-semibold">Touch</span></h2>
            <p class="text-lg text-gray-600">Request an appointment or send us a message — we'll get back to you promptly.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Form -->
            <div data-aos="fade-right">
                <div class="bg-gray-50 rounded-md p-8 border border-gray-100 shadow-sm">
                    <h3 class="text-xl font-bold text-gray-900 mb-6"><i class="fas fa-calendar-plus text-yuki-600 mr-2"></i> Request an Appointment</h3>

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

                    <form action="<?= url('appointment/store') ?>" method="POST" class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <input type="text" name="first_name" placeholder="First Name *" required class="form-input" value="<?= e($old['first_name'] ?? '') ?>">
                            <input type="text" name="last_name" placeholder="Last Name *" required class="form-input" value="<?= e($old['last_name'] ?? '') ?>">
                        </div>
                        <input type="email" name="email" placeholder="Email Address *" required class="form-input" value="<?= e($old['email'] ?? '') ?>">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <input type="tel" name="phone" placeholder="Phone Number *" required class="form-input" value="<?= e($old['phone'] ?? '') ?>">
                            <select name="gender" required class="form-input">
                                <option value="">Gender *</option>
                                <option value="male" <?= ($old['gender'] ?? '') === 'male' ? 'selected' : '' ?>>Male</option>
                                <option value="female" <?= ($old['gender'] ?? '') === 'female' ? 'selected' : '' ?>>Female</option>
                                <option value="other" <?= ($old['gender'] ?? '') === 'other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Date of Birth *</label>
                                <input type="date" name="date_of_birth" required class="form-input" value="<?= e($old['date_of_birth'] ?? '') ?>">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Preferred Date</label>
                                <input type="date" name="preferred_date" class="form-input" value="<?= e($old['preferred_date'] ?? '') ?>">
                            </div>
                        </div>
                        <input type="text" name="address" placeholder="Address *" required class="form-input" value="<?= e($old['address'] ?? '') ?>">
                        <textarea name="notes" rows="4" placeholder="Additional notes or concerns..." class="form-input"><?= e($old['notes'] ?? '') ?></textarea>
                        <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-3.5 rounded-md font-semibold transition-colors">
                            <i class="fas fa-paper-plane mr-2"></i> Submit Request
                        </button>
                    </form>
                </div>
            </div>

            <!-- Methods + departments -->
            <div data-aos="fade-left" class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <?php foreach ($methods as $i => $m): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                        <div class="bg-white rounded-md p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all">
                            <div class="w-12 h-12 rounded-md bg-<?= $accent ?>-100 text-<?= $accent ?>-600 flex items-center justify-center mb-4"><i class="fas <?= $m['icon'] ?> text-xl"></i></div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1"><?= e($m['title']) ?></h3>
                            <?php foreach ($m['lines'] as $line): ?>
                                <p class="text-gray-600 text-sm"><?= e($line) ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="bg-white rounded-md p-6 border border-gray-100 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Department Direct Lines</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2 text-sm">
                        <?php foreach (['Emergency Room' => '403852', 'Cardiology' => '403853', 'Neurology' => '403854', 'Pediatrics' => '403855', 'Orthopaedics' => '403856', 'Pharmacy' => '403857'] as $dept => $ext): ?>
                            <div class="flex justify-between border-b border-gray-100 py-1.5">
                                <span class="text-gray-600"><?= $dept ?></span>
                                <span class="font-medium text-gray-900">+44 (0)1902 321000</span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FIND US : bigger map -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Find <span class="text-yuki-600 font-semibold">Us</span></h2>
            <p class="text-lg text-gray-600">In the heart of the medical district with easy access and ample parking.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-md p-4 shadow-sm border border-gray-100" data-aos="fade-right">
                <iframe src="https://www.google.com/maps?q=University+of+Wolverhampton,+Wulfruna+Street,+Wolverhampton+WV1+1LY&output=embed"
                    width="100%" height="460" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-md"></iframe>
            </div>
            <div class="space-y-5" data-aos="fade-left">
                <?php foreach ($directions as $i => $d): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                    <div class="bg-white rounded-md p-5 border border-gray-100 shadow-sm">
                        <h4 class="font-bold text-gray-900 mb-1 flex items-center"><i class="fas <?= $d['icon'] ?> text-<?= $accent ?>-600 mr-2"></i><?= e($d['title']) ?></h4>
                        <p class="text-gray-600 text-sm leading-relaxed"><?= e($d['desc']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- LOCATIONS -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our <span class="text-yuki-600 font-semibold">Locations</span></h2>
            <p class="text-lg text-gray-600">Convenient locations to serve you with specialised care.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
            <?php foreach ($locations as $i => $loc): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="bg-white rounded-md border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                    <div class="relative h-56">
                        <img src="<?= asset('images/' . $loc['img']) ?>" alt="<?= e($loc['name']) ?>" class="w-full h-full object-cover">
                        <span class="absolute top-4 right-4 bg-<?= $accent ?>-600 text-white text-xs font-semibold px-3 py-1 rounded-md"><?= e($loc['tag']) ?></span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-3"><?= e($loc['name']) ?></h3>
                        <div class="space-y-2 text-sm mb-4">
                            <p class="flex items-center text-gray-600"><i class="fas fa-location-dot text-<?= $accent ?>-600 mr-2"></i> Wulfruna Street, Wolverhampton, WV1 1LY</p>
                            <p class="flex items-center text-gray-600"><i class="fas fa-phone text-<?= $accent ?>-600 mr-2"></i> +44 (0)1902 321000</p>
                            <p class="flex items-center text-gray-600"><i class="fas fa-envelope text-<?= $accent ?>-600 mr-2"></i> <?= e($loc['email']) ?></p>
                            <p class="flex items-start text-gray-600"><i class="fas fa-clock text-<?= $accent ?>-600 mr-2 mt-1"></i> <?= e($loc['hours']) ?></p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($loc['tags'] as $tg): ?>
                                <span class="bg-<?= $accent ?>-100 text-<?= $accent ?>-700 px-2.5 py-1 rounded-md text-xs font-medium"><?= e($tg) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA + emergency strip -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-yuki-600 rounded-md px-6 py-14 md:p-16 text-center text-white shadow-xl" data-aos="zoom-in">
            <h2 class="text-3xl md:text-5xl font-bold mb-5">Need to See a <span class="text-secondary-300">Specialist?</span></h2>
            <p class="text-lg md:text-xl text-white/85 max-w-2xl mx-auto mb-9">Book an appointment online and our team will confirm your visit within hours.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= url('book-appointment') ?>" class="bg-white text-yuki-700 hover:bg-gray-100 px-8 py-3.5 rounded-md font-semibold transition-colors"><i class="fas fa-calendar-plus mr-2"></i> Book Appointment</a>
                <a href="<?= url('services') ?>" class="border border-white/40 text-white hover:bg-white/10 px-8 py-3.5 rounded-md font-semibold transition-colors"><i class="fas fa-stethoscope mr-2"></i> View Services</a>
            </div>
        </div>

        <div class="mt-6 bg-white border border-red-200 rounded-md p-6 flex flex-col sm:flex-row items-center justify-between gap-4" data-aos="fade-up">
            <div class="flex items-center gap-3 text-center sm:text-left">
                <div class="w-12 h-12 rounded-md bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0"><i class="fas fa-triangle-exclamation text-xl"></i></div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Medical Emergency?</h3>
                    <p class="text-gray-600 text-sm">Our emergency hotline is open 24 hours a day, every day.</p>
                </div>
            </div>
            <a href="tel:+441902321000" class="bg-red-600 hover:bg-red-700 text-white px-7 py-3 rounded-md font-bold transition-colors whitespace-nowrap"><i class="fas fa-phone mr-2"></i> +44 (0)1902 321000</a>
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
