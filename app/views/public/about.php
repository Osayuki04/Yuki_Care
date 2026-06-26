<?php
/** About page. Rendered inside the public layout. */
$journey = [
    ['year' => '2020', 'icon' => 'fa-hospital',       'title' => 'Hospital Founded',       'desc' => 'Yibera established with a vision to provide world-class healthcare to the community.'],
    ['year' => '2021', 'icon' => 'fa-building',        'title' => 'Major Expansion',        'desc' => 'Added specialised wings for cardiology, neurology and advanced robotic surgery suites.'],
    ['year' => '2022', 'icon' => 'fa-robot',           'title' => 'Technology Integration', 'desc' => 'Implemented AI-powered diagnostics, telemedicine and electronic health records.'],
    ['year' => '2023', 'icon' => 'fa-award',           'title' => 'NABH Certification',     'desc' => 'Achieved NABH accreditation and ISO certification for quality healthcare.'],
    ['year' => '2024', 'icon' => 'fa-hand-holding-medical', 'title' => 'Community Outreach', 'desc' => 'Launched mobile clinics and free health camps serving 100,000+ patients a year.'],
];

$team = [
    ['img' => 'dr1.jpg',  'name' => 'Dr. Jane Doe',       'role' => 'Chief Medical Officer', 'exp' => '25+ years experience'],
    ['img' => 'dr3.png',  'name' => 'Dr. Riya Patel',     'role' => 'Head of Surgery',       'exp' => 'Robotic surgery expert'],
    ['img' => 'dr6.jpg',  'name' => 'Dr. Michael Chen',   'role' => 'Head of Emergency',     'exp' => 'Emergency medicine'],
    ['img' => 'd7.jpg',   'name' => 'Dr. Sarah Johnson',  'role' => 'Chief of Cardiology',   'exp' => 'Heart specialist'],
    ['img' => 'dr4.webp', 'name' => 'Dr. David Kim',      'role' => 'Head of Pediatrics',    'exp' => "Children's healthcare"],
    ['img' => 'd8.jpg',   'name' => 'Dr. Lisa Thompson',  'role' => 'Head of Neurology',     'exp' => 'Brain specialist'],
    ['img' => 'dr5.webp', 'name' => 'Dr. Robert Wilson',  'role' => 'Chief of Oncology',     'exp' => 'Cancer specialist'],
    ['img' => 'd9.jpg',   'name' => 'Dr. Emily Rodriguez','role' => 'Head of Radiology',     'exp' => 'Imaging expert'],
];

$values = [
    ['icon' => 'fa-heart',          'title' => 'Compassion',    'desc' => 'We treat every patient with empathy, kindness and understanding throughout their journey.'],
    ['icon' => 'fa-star',           'title' => 'Excellence',    'desc' => 'We pursue the highest standards in medical care, continually improving our outcomes.'],
    ['icon' => 'fa-shield-halved',  'title' => 'Integrity',     'desc' => 'We hold the highest ethical standards, building trust through transparency and honesty.'],
    ['icon' => 'fa-handshake',      'title' => 'Collaboration', 'desc' => 'We work as a unified team, fostering partnerships that enhance patient care.'],
    ['icon' => 'fa-graduation-cap', 'title' => 'Education',     'desc' => 'We promote continuous learning to advance medical science and patient care.'],
    ['icon' => 'fa-people-group',   'title' => 'Community',     'desc' => 'We are committed to serving our community and improving public health.'],
];

$facilities = [
    ['img' => 'icu.jfif',    'icon' => 'fa-heart-pulse',  'title' => 'ICU & Emergency Wing', 'desc' => '24/7 critical care with advanced life-support and rapid response capabilities.', 'items' => ['50-bed ICU with monitoring', 'Emergency trauma centre', 'Rapid response team']],
    ['img' => 'mission.jpg', 'icon' => 'fa-user-doctor',  'title' => 'Operation Theatres',   'desc' => '12 state-of-the-art operating suites with robotic surgery and advanced imaging.', 'items' => ['Robotic surgery systems', 'Minimally invasive procedures', 'Advanced surgical imaging']],
    ['img' => 'vision.jfif', 'icon' => 'fa-microscope',   'title' => 'Diagnostic Labs',      'desc' => 'Comprehensive diagnostics with advanced laboratory and imaging technology.', 'items' => ['MRI, CT and ultrasound', '24/7 laboratory services', 'Digital pathology']],
    ['img' => 'pr.jfif',     'icon' => 'fa-bed',          'title' => 'Patient Rooms',        'desc' => 'Comfortable, modern accommodation designed for healing and recovery.', 'items' => ['Private & semi-private rooms', 'Family accommodation', 'Modern amenities']],
];

$testimonials = [
    ['img' => 'pat1.jpg',  'name' => 'Sarah Mitchell',    'role' => 'Cardiac Surgery Patient', 'when' => 'March 2024',    'quote' => 'The cardiac team at Yibera saved my life. Their expertise, compassion and modern facilities made my recovery smooth and comfortable. I am forever grateful.'],
    ['img' => 'pat2.jfif', 'name' => 'Michael Rodriguez', 'role' => 'Orthopaedic Patient',     'when' => 'February 2024', 'quote' => 'After my knee replacement, the rehab team helped me get back to playing tennis. The robotic surgery meant minimal pain and a quick recovery!'],
    ['img' => 'pat3.webp', 'name' => 'Emily Chen',        'role' => 'Maternity Patient',       'when' => 'January 2024',  'quote' => 'The maternity ward staff made the birth of my daughter beautiful, and the NICU team was exceptional when we needed them. Thank you, Yibera!'],
    ['img' => 'pat1.jpg',  'name' => 'James Okoro',       'role' => 'Neurology Patient',       'when' => 'April 2024',    'quote' => 'From diagnosis to treatment, the neurology team explained everything clearly. I never felt like just another number — they genuinely cared.'],
    ['img' => 'pat2.jfif', 'name' => 'Amaka Eze',         'role' => 'Maternity Patient',       'when' => 'May 2024',      'quote' => 'World-class care close to home. The facilities are spotless and the nurses were kind and attentive day and night. Highly recommended.'],
    ['img' => 'pat3.webp', 'name' => 'Daniel Adeyemi',    'role' => 'Emergency Patient',       'when' => 'June 2024',     'quote' => 'The emergency team responded in minutes and stabilised me quickly. Their speed and professionalism made all the difference that night.'],
];
?>
<?php /* Safelist for dynamically-built accent classes. */ ?>
<span class="hidden bg-yuki-50 bg-yuki-100 bg-yuki-600 text-yuki-600 border-yuki-600 bg-yuki-50 bg-yuki-100 bg-yuki-600 text-yuki-600 border-yuki-600"></span>

<!-- HERO : 50/50 split, full-height image with no padding -->
<section class="relative">
    <div class="grid lg:grid-cols-2 lg:min-h-[80vh]">
        <div class="bg-yuki-600 text-white flex items-center px-6 sm:px-10 lg:px-16 py-16 lg:py-20 order-2 lg:order-1">
            <div class="max-w-xl" data-aos="fade-right">
                <span class="inline-block bg-white/15 text-white text-sm font-medium px-4 py-1.5 rounded-md mb-5">Since 2020</span>
                <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold leading-tight mb-5">About <span class="text-secondary-300">Yibera</span></h1>
                <p class="text-lg md:text-xl text-white/85 mb-8">
                    Excellence in healthcare, compassion in service. For over four years we've combined world-class medical expertise with genuine, patient-first care.
                </p>
                <div class="flex flex-wrap gap-3 mb-8">
                    <span class="bg-white/15 px-4 py-2 rounded-md text-sm font-medium"><span class="count-up">150+</span> Doctors</span>
                    <span class="bg-white/15 px-4 py-2 rounded-md text-sm font-medium"><span class="count-up">100K+</span> Patients</span>
                    <span class="bg-white/15 px-4 py-2 rounded-md text-sm font-medium">NABH Certified</span>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?= url('book-appointment') ?>" class="bg-white text-yuki-700 hover:bg-gray-100 px-7 py-3.5 rounded-md font-semibold transition-colors text-center"><i class="fas fa-calendar-plus mr-2"></i> Book Appointment</a>
                    <a href="#team" class="border border-white/40 hover:bg-white/10 text-white px-7 py-3.5 rounded-md font-semibold transition-colors text-center">Meet the Team</a>
                </div>
            </div>
        </div>
        <div class="relative min-h-[42vh] lg:min-h-0 order-1 lg:order-2">
            <img src="<?= asset('images/about2.jpeg') ?>" alt="About Yibera" class="absolute inset-0 w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- MISSION & VISION -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-yuki-600 text-white rounded-md p-10" data-aos="fade-right">
                <div class="w-16 h-16 rounded-md bg-white/15 flex items-center justify-center mb-6"><i class="fas fa-bullseye text-2xl"></i></div>
                <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                <p class="text-white/85 text-lg leading-relaxed mb-6">To provide exceptional healthcare that combines advanced medical technology with compassionate, patient-centred care — improving the health and well-being of our community.</p>
                <div class="space-y-3">
                    <div class="bg-white/10 rounded-md p-4 flex items-center"><i class="fas fa-heart mr-3"></i> Compassionate Care</div>
                    <div class="bg-white/10 rounded-md p-4 flex items-center"><i class="fas fa-microscope mr-3"></i> Advanced Technology</div>
                    <div class="bg-white/10 rounded-md p-4 flex items-center"><i class="fas fa-users mr-3"></i> Community Focus</div>
                </div>
            </div>
            <div class="bg-yuki-500 text-white rounded-md p-10" data-aos="fade-left">
                <div class="w-16 h-16 rounded-md bg-white/15 flex items-center justify-center mb-6"><i class="fas fa-eye text-2xl"></i></div>
                <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                <p class="text-white/85 text-lg leading-relaxed mb-6">To be the leading healthcare provider in the region — recognised for clinical excellence, innovative treatment and an exceptional patient experience that sets new standards.</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white/10 rounded-md p-4 text-center"><div class="text-3xl font-bold count-up">4+</div><div class="text-sm text-white/80">Years of Excellence</div></div>
                    <div class="bg-white/10 rounded-md p-4 text-center"><div class="text-3xl font-bold count-up">150+</div><div class="text-sm text-white/80">Medical Staff</div></div>
                    <div class="bg-white/10 rounded-md p-4 text-center"><div class="text-3xl font-bold count-up">100K+</div><div class="text-sm text-white/80">Patients Served</div></div>
                    <div class="bg-white/10 rounded-md p-4 text-center"><div class="text-3xl font-bold">24/7</div><div class="text-sm text-white/80">Emergency Care</div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- OUR JOURNEY -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our <span class="text-yuki-600 font-semibold">Journey</span></h2>
            <p class="text-lg text-gray-600">Key milestones in our commitment to healthcare excellence.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <?php foreach ($journey as $i => $j): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="bg-white rounded-md p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border-t-4 border-<?= $accent ?>-600" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                    <div class="w-14 h-14 rounded-md bg-<?= $accent ?>-600 text-white flex items-center justify-center mb-5"><i class="fas <?= $j['icon'] ?> text-xl"></i></div>
                    <div class="text-3xl font-bold text-<?= $accent ?>-600 mb-2"><?= $j['year'] ?></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2"><?= e($j['title']) ?></h3>
                    <p class="text-gray-600 text-sm leading-relaxed"><?= e($j['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- MEDICAL TEAM (bigger cards, no role-icon badges) -->
<section id="team" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Meet Our <span class="text-yuki-600 font-semibold">Medical Team</span></h2>
            <p class="text-lg text-gray-600">A distinguished team of world-class physicians and healthcare professionals.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7">
            <?php foreach ($team as $i => $m): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="group bg-white rounded-md border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden" data-aos="zoom-in" data-aos-delay="<?= ($i % 4) * 100 ?>">
                    <div class="relative h-60 overflow-hidden">
                        <img src="<?= asset('images/' . $m['img']) ?>" alt="<?= e($m['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-<?= $accent ?>-600 text-white text-xs font-semibold px-3 py-1 rounded-md"><?= e($m['exp']) ?></span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900"><?= e($m['name']) ?></h3>
                        <p class="text-<?= $accent ?>-600 font-semibold text-sm"><?= e($m['role']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CORE VALUES -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Core <span class="text-yuki-600 font-semibold">Values</span></h2>
            <p class="text-lg text-gray-600">The principles that guide everything we do.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($values as $i => $v): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="bg-white rounded-md p-8 border border-gray-100 shadow-sm hover:shadow-md transition-all group" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 100 ?>">
                    <div class="w-16 h-16 rounded-full bg-<?= $accent ?>-100 text-<?= $accent ?>-600 flex items-center justify-center mb-5 group-hover:bg-<?= $accent ?>-600 group-hover:text-white transition-colors"><i class="fas <?= $v['icon'] ?> text-2xl"></i></div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?= e($v['title']) ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?= e($v['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- WHY CHOOSE / STATS -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose <span class="text-yuki-600 font-semibold">Yibera</span></h2>
            <p class="text-lg text-gray-600">Achievements and certifications that reflect our commitment to excellence.</p>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $stats = [['fa-stethoscope', '20+', 'Specialties', true], ['fa-user-md', '150+', 'Doctors', true], ['fa-users', '100K+', 'Patients / Year', true], ['fa-award', 'NABH', 'Certified', false]];
            foreach ($stats as $k => [$icon, $num, $label, $cu]): $accent = $k % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="text-center p-8 bg-gray-50 rounded-md border-b-4 border-<?= $accent ?>-600 shadow-sm" data-aos="fade-up" data-aos-delay="<?= $k * 100 ?>">
                    <div class="w-16 h-16 mx-auto rounded-full bg-<?= $accent ?>-600 text-white flex items-center justify-center mb-5"><i class="fas <?= $icon ?> text-2xl"></i></div>
                    <div class="text-4xl font-bold text-<?= $accent ?>-600 mb-1 <?= $cu ? 'count-up' : '' ?>"><?= $num ?></div>
                    <h3 class="text-base font-bold text-gray-900"><?= $label ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- INFRASTRUCTURE (taller images) -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">World-Class <span class="text-yuki-600 font-semibold">Infrastructure</span></h2>
            <p class="text-lg text-gray-600">State-of-the-art facilities designed for optimal patient care and comfort.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($facilities as $i => $fac): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                <div class="bg-white rounded-md shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="<?= ($i % 2) * 100 ?>">
                    <div class="relative h-72">
                        <img src="<?= asset('images/' . $fac['img']) ?>" alt="<?= e($fac['title']) ?>" class="w-full h-full object-cover">
                        <div class="absolute bottom-4 left-4 w-12 h-12 rounded-md bg-<?= $accent ?>-600 text-white flex items-center justify-center shadow-lg"><i class="fas <?= $fac['icon'] ?> text-lg"></i></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-3"><?= e($fac['title']) ?></h3>
                        <p class="text-gray-600 mb-4"><?= e($fac['desc']) ?></p>
                        <ul class="space-y-2">
                            <?php foreach ($fac['items'] as $it): ?>
                                <li class="flex items-center text-sm text-gray-700"><i class="fas fa-circle-check text-<?= $accent ?>-500 mr-2"></i><?= e($it) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PATIENT STORIES (swiper) -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Patient <span class="text-yuki-600 font-semibold">Stories</span></h2>
            <p class="text-lg text-gray-600">Real experiences from the people at the heart of everything we do.</p>
        </div>

        <div class="swiper about-testimonials pb-14" style="--swiper-pagination-color:#059669" data-aos="fade-up">
            <div class="swiper-wrapper">
                <?php foreach ($testimonials as $i => $t): $accent = $i % 2 === 0 ? 'yuki' : 'yuki'; ?>
                    <div class="swiper-slide h-auto">
                        <div class="bg-gray-50 rounded-md p-8 border border-gray-100 h-full flex flex-col">
                            <div class="flex items-center mb-5">
                                <img src="<?= asset('images/' . $t['img']) ?>" alt="<?= e($t['name']) ?>" class="w-14 h-14 rounded-full object-cover border-2 border-<?= $accent ?>-500 mr-4">
                                <div>
                                    <h4 class="text-base font-bold text-gray-900"><?= e($t['name']) ?></h4>
                                    <p class="text-<?= $accent ?>-600 text-sm"><?= e($t['role']) ?></p>
                                </div>
                            </div>
                            <div class="flex text-yuki-500 mb-3"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                            <p class="text-gray-600 italic leading-relaxed flex-1">"<?= e($t['quote']) ?>"</p>
                            <div class="text-xs text-gray-500 mt-5"><i class="fas fa-quote-left mr-2 text-<?= $accent ?>-500"></i>Treated in <?= e($t['when']) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-yuki-600 rounded-md px-6 py-14 md:p-16 text-center text-white shadow-xl" data-aos="zoom-in">
            <h2 class="text-3xl md:text-5xl font-bold mb-5">Ready to Experience <span class="text-secondary-300">Excellence?</span></h2>
            <p class="text-lg md:text-xl text-white/85 max-w-2xl mx-auto mb-9">Join thousands of patients who trust Yibera for their healthcare needs.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= url('book-appointment') ?>" class="bg-white text-yuki-700 hover:bg-gray-100 px-8 py-3.5 rounded-md font-semibold transition-colors"><i class="fas fa-calendar-plus mr-2"></i> Book Appointment</a>
                <a href="<?= url('contact') ?>" class="border border-white/40 text-white hover:bg-white/10 px-8 py-3.5 rounded-md font-semibold transition-colors"><i class="fas fa-phone mr-2"></i> Contact Our Team</a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.Swiper) {
            new Swiper('.about-testimonials', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                autoplay: { delay: 4500, disableOnInteraction: false },
                pagination: { el: '.about-testimonials .swiper-pagination', clickable: true },
                breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
            });
        }
    });
</script>
