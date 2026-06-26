<?php
/** Services page. Rendered inside the public layout. */
$services = [
    ['icon' => 'fa-user-md',        'img' => 's2.jfif',   'title' => 'Primary Care',         'desc' => 'Your first point of contact for preventive care, routine check-ups and ongoing health management.', 'items' => ['General Medicine', 'Family Medicine', 'Pediatrics', 'Geriatrics']],
    ['icon' => 'fa-heart-pulse',    'img' => 's3.jfif',   'title' => 'Specialty Care',       'desc' => 'Advanced specialist care using the latest diagnostic and treatment technology.', 'items' => ['Cardiology', 'Pulmonology', 'Neurology', 'Endocrinology', 'Gastroenterology']],
    ['icon' => 'fa-venus',          'img' => 's4.jpg',    'title' => "Women's Health",        'desc' => 'Comprehensive care for women from adolescence through every stage of life.', 'items' => ['Obstetrics & Gynaecology', 'Maternity Care', 'Breast Health']],
    ['icon' => 'fa-user-doctor',    'img' => 's4.jfif',   'title' => 'Surgical Services',    'desc' => 'Expert surgeons performing minimally-invasive and complex procedures safely.', 'items' => ['General Surgery', 'Orthopaedic Surgery', 'Neurosurgery', 'Robotic Surgery']],
    ['icon' => 'fa-brain',          'img' => 's6.jpg',    'title' => 'Mental Health',        'desc' => 'Compassionate, confidential support for emotional and psychological well-being.', 'items' => ['Psychiatry', 'Counselling & Therapy', 'Addiction Treatment']],
    ['icon' => 'fa-microscope',     'img' => 'vision.jfif','title' => 'Diagnostics & Imaging','desc' => 'Accurate, fast diagnostics with modern laboratory and imaging technology.', 'items' => ['Laboratory Tests', 'X-ray & CT', 'MRI & Ultrasound', 'ECG / EEG']],
    ['icon' => 'fa-truck-medical',  'img' => 's7.jfif',   'title' => 'Emergency & Urgent',   'desc' => '24/7 emergency response with rapid trauma teams and ambulance services.', 'items' => ['24/7 Emergency Room', 'Ambulance Services', 'Trauma Care']],
    ['icon' => 'fa-bed-pulse',      'img' => 's8.webp',   'title' => 'Inpatient & Outpatient','desc' => 'Flexible care from short outpatient visits to comfortable inpatient stays.', 'items' => ['Hospital Wards', 'Day Surgery Units', 'Outpatient Clinics']],
    ['icon' => 'fa-pills',          'img' => 's9.jfif',   'title' => 'Pharmacy',             'desc' => 'A full-service pharmacy with prescription management and medication counselling.', 'items' => ['In-House Pharmacy', 'Prescription Management', 'Medication Refills']],
    ['icon' => 'fa-dumbbell',       'img' => 's10.jfif',  'title' => 'Rehabilitation',       'desc' => 'Therapy programmes that help patients recover strength and independence.', 'items' => ['Physical Therapy', 'Speech Therapy', 'Occupational Therapy']],
    ['icon' => 'fa-child-reaching', 'img' => 's11.jpeg',  'title' => "Children's Services",   'desc' => 'Specialist paediatric care in a safe, child-friendly environment.', 'items' => ['Paediatric Emergency', 'NICU', 'Paediatric Specialists']],
    ['icon' => 'fa-hands-holding-circle', 'img' => 's12.jfif', 'title' => 'Patient Support',  'desc' => 'End-to-end support services for a smooth healthcare journey.', 'items' => ['Nutrition & Dietetics', 'Palliative Care', 'Insurance & Billing']],
];

$benefits = [
    ['icon' => 'fa-award',        'title' => 'Accredited Care',     'desc' => 'Internationally benchmarked standards and quality-assured clinical practice.'],
    ['icon' => 'fa-microchip',    'title' => 'Modern Technology',   'desc' => 'Advanced diagnostic and treatment equipment for precise, effective care.'],
    ['icon' => 'fa-user-doctor',  'title' => 'Expert Specialists',  'desc' => 'Board-certified doctors across every major medical discipline.'],
    ['icon' => 'fa-heart',        'title' => 'Patient-Centred',     'desc' => 'Care designed around your comfort, dignity and personal needs.'],
];

$steps = [
    ['no' => '01', 'icon' => 'fa-calendar-check', 'title' => 'Book',      'desc' => 'Request an appointment online in minutes, 24/7.'],
    ['no' => '02', 'icon' => 'fa-user-doctor',    'title' => 'Consult',   'desc' => 'Meet the right specialist for a thorough assessment.'],
    ['no' => '03', 'icon' => 'fa-notes-medical',  'title' => 'Treatment', 'desc' => 'Receive a personalised, evidence-based care plan.'],
    ['no' => '04', 'icon' => 'fa-heart-circle-check', 'title' => 'Follow-up', 'desc' => 'Ongoing support to keep you healthy and recovering well.'],
];
?>
<?php /* Safelist for dynamically-built accent classes so Tailwind keeps them. */ ?>
<span class="hidden bg-yuki-100 bg-yuki-600 text-yuki-600 text-yuki-500 group-hover:bg-yuki-600 hover:border-yuki-200 border-yuki-500 bg-yuki-100 bg-yuki-600 text-yuki-600 text-yuki-500 group-hover:bg-yuki-600 hover:border-secondary-200 border-yuki-500"></span>

<!-- HERO : 50/50 split, full-height image with no padding -->
<section class="relative">
    <div class="grid lg:grid-cols-2 lg:min-h-[78vh]">
        <div class="bg-yuki-600 text-white flex items-center px-6 sm:px-10 lg:px-16 py-16 lg:py-20 order-2 lg:order-1">
            <div class="max-w-xl" data-aos="fade-right">
                <span class="inline-block bg-white/15 text-white text-sm font-medium px-4 py-1.5 rounded-md mb-5">Comprehensive Healthcare</span>
                <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold leading-tight mb-5">
                    Our Medical <span class="text-secondary-300">Services</span>
                </h1>
                <p class="text-lg md:text-xl text-white/85 mb-8">
                    From everyday care to advanced specialist treatment — compassionate, comprehensive medicine for you and your family, all under one roof.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?= url('book-appointment') ?>" class="bg-white text-yuki-700 hover:bg-gray-100 px-7 py-3.5 rounded-md font-semibold transition-colors text-center">
                        <i class="fas fa-calendar-plus mr-2"></i> Book Appointment
                    </a>
                    <a href="<?= url('contact') ?>" class="border border-white/40 hover:bg-white/10 text-white px-7 py-3.5 rounded-md font-semibold transition-colors text-center">
                        Talk to Us
                    </a>
                </div>
            </div>
        </div>
        <div class="relative min-h-[42vh] lg:min-h-0 order-1 lg:order-2">
            <img src="<?= asset('images/s1.jpg') ?>" alt="Yibera medical services" class="absolute inset-0 w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- STATS BAR (green bottom border) -->
<section class="bg-gray-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $stats = [['25+', 'Specialties', true], ['150+', 'Expert Doctors', true], ['50K+', 'Patients / Year', true], ['24/7', 'Emergency Care', false]];
            foreach ($stats as [$num, $label, $countup]): ?>
                <div class="bg-white rounded-md shadow-sm border-b-4 border-yuki-600 py-7 text-center">
                    <div class="text-3xl md:text-4xl font-bold text-yuki-600 <?= $countup ? 'count-up' : '' ?>"><?= $num ?></div>
                    <div class="text-gray-500 mt-1"><?= $label ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SERVICES GRID (image + icon) -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Explore Our <span class="text-yuki-600 font-semibold">Specialties</span></h2>
            <p class="text-lg text-gray-600">A full spectrum of medical services delivered by experienced specialists with a focus on outcomes and patient comfort.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
            <?php foreach ($services as $i => $s): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="group bg-white rounded-md border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 100 ?>">
                    <div class="relative h-44">
                        <img src="<?= asset('images/' . $s['img']) ?>" alt="<?= e($s['title']) ?>" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gray-900/15"></div>
                        <div class="absolute -bottom-6 left-6 w-14 h-14 rounded-md bg-<?= $accent ?>-600 text-white flex items-center justify-center shadow-lg">
                            <i class="fas <?= $s['icon'] ?> text-2xl"></i>
                        </div>
                    </div>
                    <div class="p-7 pt-9">
                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?= e($s['title']) ?></h3>
                        <p class="text-gray-600 mb-5 leading-relaxed"><?= e($s['desc']) ?></p>
                        <ul class="space-y-2 mb-6">
                            <?php foreach ($s['items'] as $item): ?>
                                <li class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-circle-check text-<?= $accent ?>-500 mr-2"></i><?= e($item) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?= url('book-appointment') ?>" class="inline-flex items-center text-<?= $accent ?>-600 font-semibold text-sm hover:gap-2 transition-all">
                            Book this service <i class="fas fa-arrow-right ml-1.5"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Patients <span class="text-yuki-600 font-semibold">Choose Yibera</span></h2>
            <p class="text-lg text-gray-600">Quality, technology and genuine compassion — the foundations of every treatment we deliver.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($benefits as $i => $b): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="bg-white text-center p-7 rounded-md border border-gray-100 hover:shadow-md transition-all" data-aos="zoom-in" data-aos-delay="<?= $i * 100 ?>">
                    <div class="w-16 h-16 mx-auto rounded-full bg-<?= $accent ?>-100 text-<?= $accent ?>-600 flex items-center justify-center mb-5">
                        <i class="fas <?= $b['icon'] ?> text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2"><?= e($b['title']) ?></h3>
                    <p class="text-gray-600 text-sm leading-relaxed"><?= e($b['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- HOW IT WORKS (visible numbered badges) -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Getting Care is <span class="text-yuki-600 font-semibold">Simple</span></h2>
            <p class="text-lg text-gray-600">Four easy steps from booking to recovery.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($steps as $i => $st): ?>
                <div class="relative bg-gray-50 rounded-md border border-gray-100 p-7" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                    <div class="flex items-center gap-4 mb-5">
                        <span class="w-12 h-12 rounded-md bg-yuki-600 text-white font-bold text-lg flex items-center justify-center shadow-sm"><?= $st['no'] ?></span>
                        <i class="fas <?= $st['icon'] ?> text-yuki-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2"><?= e($st['title']) ?></h3>
                    <p class="text-gray-600 text-sm leading-relaxed"><?= e($st['desc']) ?></p>
                    <?php if ($i < count($steps) - 1): ?>
                        <i class="fas fa-arrow-right text-gray-300 text-xl absolute top-9 -right-3 hidden lg:block"></i>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA : contained green panel on white (no clashing background) -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-yuki-600 rounded-md px-6 py-14 md:p-16 text-center text-white shadow-xl" data-aos="zoom-in">
            <span class="inline-block bg-white/15 text-white text-sm font-medium px-4 py-1.5 rounded-md mb-5">Start Your Journey</span>
            <h2 class="text-3xl md:text-5xl font-bold mb-5">Ready to Experience <span class="text-secondary-300">Excellence</span> in Healthcare?</h2>
            <p class="text-lg md:text-xl text-white/85 max-w-2xl mx-auto mb-9">
                Booking takes less than two minutes. Our care team will be in touch to confirm your visit.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= url('book-appointment') ?>" class="bg-white text-yuki-700 hover:bg-gray-100 px-8 py-3.5 rounded-md font-semibold transition-colors">
                    <i class="fas fa-calendar-plus mr-2"></i> Book Appointment
                </a>
                <a href="<?= url('contact') ?>" class="border border-white/40 text-white hover:bg-white/10 px-8 py-3.5 rounded-md font-semibold transition-colors">
                    <i class="fas fa-phone mr-2"></i> Contact Our Team
                </a>
            </div>
        </div>

        <!-- Emergency strip (separate, clean) -->
        <div class="mt-6 bg-white border border-red-200 rounded-md p-6 flex flex-col sm:flex-row items-center justify-between gap-4" data-aos="fade-up">
            <div class="flex items-center gap-3 text-center sm:text-left">
                <div class="w-12 h-12 rounded-md bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-triangle-exclamation text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Medical Emergency?</h3>
                    <p class="text-gray-600 text-sm">Our hotline is open 24 hours a day, every day.</p>
                </div>
            </div>
            <a href="tel:+441902321000" class="bg-red-600 hover:bg-red-700 text-white px-7 py-3 rounded-md font-bold transition-colors whitespace-nowrap">
                <i class="fas fa-phone mr-2"></i> +44 (0)1902 321000
            </a>
        </div>
    </div>
</section>
