


    <section class="w-full px-4 sm:px-6 lg:px-8 py-8 flex items-center overflow-x-hidden">    
            <div class="w-full ">
                <!-- PC version heading -->
                <div class="relative hidden xl:grid grid-cols-2 gap-6 w-full mt-6 px-6">
                    <div>
                        <h1 class="relative   font-semibold inline-block text-4xl max-2xl:text-3xl font-semi-bold text-black scale-y-130">
                            Your Healthcare Hub  
                            <span class="absolute left-full top-0 -mt-5 -ml-42 max-2xl:-ml-36">
                                <!-- <LeagueFlash /> -->
                            </span>
                            <br />
                            For Quality <span class="italic text-yuki-600">Patients Care Worldwide</span>
                        </h1>
                    </div>
                    <div>
                        <p class="max-2xl:text-md md:text-xl text-gray-600 mt-4">
                            Experience the future of healthcare management with AI-powered diagnostics,
                            seamless patient care, and revolutionary medical technology that puts your health first.
                        </p>
                    </div>
                </div>

                <!-- Mobile version heading -->
                <div class="xl:hidden w-full text-center px-4 mt-2">
                    <h1 class="text-2xl sm:text-3xl font-bold text-black leading-snug">
                        Your Healthcare Hub<br class="hidden sm:block">
                        For Quality <span class="italic text-yuki-600">Patients Care Worldwide</span>
                    </h1>
                    <p class="text-sm sm:text-base text-gray-600 mt-3 max-w-xl mx-auto">
                        Experience the future of healthcare management with AI-powered diagnostics,
                        seamless patient care, and revolutionary medical technology that puts your health first.
                    </p>
                </div>

                <!-- Hero image (full). A notch is cut from the top-left of the image
                     with clip-path so the buttons read as part of the artwork. -->
                <div class="relative rounded-md overflow-hidden shadow-md mt-2 max-md:mt-3 h-[78vh] max-xl:h-[68vh] max-md:h-[60vh]">
                    <img src="<?= asset('images/newheroPicture.png') ?>"
                         alt="Yibera – Advanced Healthcare"
                         class="hero-notch absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105">

                    <!-- CTA buttons sitting inside the notch -->
                    <div class="absolute top-0 left-0 right-0 sm:right-auto md:ml-6 h-16 sm:h-[76px] flex items-center gap-3">
                        <a href="<?= url('login') ?>" class="bg-yuki-500 text-white hover:bg-yuki-400 px-5 sm:px-10 py-3 rounded-md font-semibold transition-all duration-300 text-center shadow-md hover:shadow-lg hover:scale-105 transform whitespace-nowrap text-sm sm:text-base flex-1 sm:flex-none">
                            Launch Portal
                        </a>
                        <a href="#services" class="bg-white text-gray-700 hover:text-yuki-600 px-5 sm:px-7 py-3 rounded-md font-semibold transition-all duration-300 text-center border-2 border-gray-200 hover:border-yuki-300 hover:shadow-md hover:scale-105 transform whitespace-nowrap text-sm sm:text-base flex-1 sm:flex-none">
                            Explore Services
                        </a>
                    </div>
                </div>
            </div>
        </section>
 




<section id="about" class="py-20 bg-white  relative overflow-hidden transition-colors duration-300 mt-12">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5 ">
        <div class="absolute top-0 left-0 w-full h-full bg-medical-pattern"></div>
    </div>

    <div class="relative  mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
     
            <h2 class="text-4xl md:text-5xl font-semibold font-display text-gray-900  mb-6">
                About <span class="text-yuki-600 font-semibold italic">Yibera</span>
            </h2>
            <p class="text-xl text-gray-600  max-w-3xl mx-auto">
                Pioneering the future of healthcare through innovation, compassion, and cutting-edge medical technology
            </p>
        </div>

        <!-- Clean 2-Column Layout: Image + Mission/Vision -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <!-- Left Column: Image -->
            <div class="relative" data-aos="fade-right">
                <div class="relative overflow-hidden rounded-md shadow-md">
                    <img src="<?= asset('images/') ?>about.webp" alt="Yibera Healthcare Facility" class="w-full h-[500px] object-cover">
                    <div class="absolute inset-0 bg-yuki-900/60 "></div>
                </div>
            </div>

            <!-- Right Column: Mission & Vision Content -->
            <div class="space-y-8" data-aos="fade-left">
                <!-- Mission -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class=" p-3 rounded-md bg-yuki-500 ">
                            <i class="fas fa-bullseye text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-900 ">Our Mission</h3>
                    </div>
                    <p class="text-gray-600  leading-relaxed text-lg">
                        To revolutionize healthcare delivery through innovative technology, compassionate care, and
                        evidence-based medicine. We strive to make quality healthcare accessible, efficient, and
                        patient-centered for every individual we serve.
                    </p>
                  
                </div>

                <!-- Vision -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yuki-500  p-3 rounded-md">
                            <i class="fas fa-eye text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-900 ">Our Vision</h3>
                    </div>
                    <p class="text-gray-600  leading-relaxed text-lg">
                        To be the leading healthcare institution that seamlessly integrates advanced medical technology
                        with human compassion, setting new standards for patient care and medical excellence globally.
                    </p>

                </div>
            </div>
        </div>

        <!-- Core Values -->
        
        
       
       
    </div>
</section>
<!-- About Hospital Section -->
<section class="py-20 pb-24 bg-yuki-600  text-white relative overflow-hidden">
    <div class="relative  mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center mb-12">
       <h2 class="text-3xl md:text-4xl font-bold font-display text-white justify-center flex">
                Our &nbsp; <span class="text-secondary-300"> Core Values</span>
            </h2>
    </div>
    <?php
    $core_values = [
        [
            'title' => 'Compassion',
            'description' => 'Every patient receives care with empathy, respect, and understanding.',
            'icon' => 'fa-heart',
            'icon_color' => 'text-yuki-600',
            'icon_dark' => '',
            'bg' => 'bg-yuki-100 ',
            'bg_dark' => '',
        ],
        [
            'title' => 'Integrity',
            'description' => 'Honest, transparent, and ethical practices in all our interactions at Yibera.',
            'icon' => 'fa-shield-alt',
            'icon_color' => 'text-yuki-600',
            'icon_dark' => '',
            'bg' => 'bg-yuki-100 ',
            'bg_dark' => '',
        ],
        [
            'title' => 'Excellence',
            'description' => 'Continuous improvement and the highest standards in medical care.',
            'icon' => 'fa-star',
            'icon_color' => 'text-yuki-600',
            'icon_dark' => '',
            'bg' => 'bg-yuki-100 ',
            'bg_dark' => '',
        ],
        [
            'title' => 'Innovation',
            'description' => 'We embrace new ideas and modern technology to improve outcomes.',
            'icon' => 'fa-lightbulb',
            'icon_color' => 'text-yuki-600',
            'icon_dark' => '',
            'bg' => 'bg-yuki-100 ',
            'bg_dark' => '',
        ],
        [
            'title' => 'Teamwork',
            'description' => 'Collaboration across teams ensures seamless care for every patient.',
            'icon' => 'fa-people-group',
            'icon_color' => 'text-yuki-600',
            'icon_dark' => '',
            'bg' => 'bg-yuki-100 ',
            'bg_dark' => '',
        ],
    ];
    ?>
    <div class="flex items-center justify-end mb-4" data-aos="fade-up">
        <div class="core-values-nav flex items-center gap-2">
            <button class="core-values-prev core-values-nav-btn w-10 h-10 rounded-md transition flex items-center justify-center" aria-label="Previous core value">
                <i class="fas fa-arrow-left"></i>
            </button>
            <button class="core-values-next core-values-nav-btn w-10 h-10 rounded-md transition flex items-center justify-center" aria-label="Next core value">
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
    <div class="swiper core-values-swiper" data-aos="fade-up">
        <div class="swiper-wrapper items-stretch">
            <?php foreach ($core_values as $value): ?>
                <div class="swiper-slide h-full flex self-stretch">
                    <div class="text-center group border border-white rounded-md p-6 w-full flex flex-col h-80 justify-between" data-aos="zoom-in">
                        <div class="relative mb-6">
                            <div class="relative <?php echo $value['bg']; ?> <?php echo $value['bg_dark']; ?> rounded-full w-20 h-20 flex items-center justify-center mx-auto group-hover:scale-110 transition-all duration-300">
                                <i class="fas <?php echo $value['icon']; ?> <?php echo $value['icon_color']; ?> <?php echo $value['icon_dark']; ?> text-3xl group-hover:animate-pulse"></i>
                            </div>
                        </div>
                        <h4 class="text-xl font-semibold mb-3"><?php echo htmlspecialchars($value['title'], ENT_QUOTES); ?></h4>
                        <p class="text-white/90 flex-1"><?php echo htmlspecialchars($value['description'], ENT_QUOTES); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
            </div> 
</section>

 <!-- Our Journey - Redesigned 2-Column Layout -->
<section id="about" class="py-20 bg-white  relative overflow-hidden transition-colors duration-300 mt-12">
 <div class="bg-gray-100    rounded-md p-8 md:p-12" data-aos="fade-up">
    <h2 class="text-4xl md:text-5xl flex justify-center font-semibold font-display text-gray-900  mb-6">
                Our <span class="text-yuki-600 font-semibold italic">Journey</span>
            </h2>

    <!-- 2-Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Left Column: Image Gallery -->
        <div class="space-y-6" data-aos="fade-right">
            <!-- 2x2 Image Grid with Enhanced Heights -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Foundation Image -->
                <div class="relative group overflow-hidden rounded-md shadow-lg mb-6" data-aos="fade-in" data-aos-delay="100">
                    <img src="<?= asset('images/') ?>2021.webp" alt="Foundation 2020" class="w-full h-40 sm:h-48 lg:h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-yuki-900/60 "></div>
                    <div class="absolute bottom-3 left-3 text-white text-base font-bold">2020</div>
                </div>

                <!-- Expansion Image -->
                <div class="relative group overflow-hidden rounded-md shadow-lg mb-6" data-aos="fade-in" data-aos-delay="200">
                    <img src="<?= asset('images/') ?>2021.jpg" alt="Expansion 2021" class="w-full h-40 sm:h-48 lg:h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-yuki-900/60 "></div>
                    <div class="absolute bottom-3 left-3 text-white text-base font-bold">2021</div>
                </div>

                <!-- Innovation Image -->
                <div class="relative group overflow-hidden rounded-md shadow-lg" data-aos="fade-in" data-aos-delay="300">
                    <img src="<?= asset('images/') ?>2022.png" alt="Innovation 2022" class="w-full h-40 sm:h-48 lg:h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-secondary-900/60 "></div>
                    <div class="absolute bottom-3 left-3 text-white text-base font-bold">2022</div>
                </div>

                <!-- Excellence Image -->
                <div class="relative group overflow-hidden rounded-md shadow-lg" data-aos="fade-in" data-aos-delay="400">
                    <img src="<?= asset('images/') ?>2024.webp" alt="Excellence 2024" class="w-full h-40 sm:h-48 lg:h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-yuki-900/60 "></div>
                    <div class="absolute bottom-3 left-3 text-white text-base font-bold">2024</div>
                </div>
            </div>
        </div>

        <!-- Right Column: Interactive Timeline -->
        <div class="relative" data-aos="fade-left">
            <!-- Timeline Steps with Enhanced Spacing -->
            <div>
                <!-- Step 1: Foundation -->
                <div class="relative flex items-start group hover:transform hover:scale-105 transition-all duration-300 mb-20" data-aos="slide-left" data-aos-delay="100">
                    <div class="relative z-10 bg-yuki-500  text-white rounded-full w-16 h-16 flex items-center justify-center font-bold text-lg shadow-lg group-hover:shadow-xl transition-all duration-300">
                        2020
                        <!-- Enhanced dotted line to next step -->
                        <div class="absolute top-16 left-1/2 transform -translate-x-1/2 w-1 h-20 border-l-4 border-dotted border-yuki-400  opacity-70"></div>
                    </div>
                    <div class="ml-6 bg-white  rounded-md p-6 shadow-lg group-hover:shadow-xl transition-all duration-300 flex-1 border border-gray-100 ">
                        <h4 class="font-bold text-gray-900  mb-2 text-lg">Foundation</h4>
                        <p class="text-gray-600 ">Yibera was established with a vision to transform healthcare</p>
                        <div class="mt-3 flex items-center text-yuki-600  text-sm font-medium">
                            <i class="fas fa-building mr-2"></i>
                            <span>Healthcare Vision</span>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Expansion -->
                <div class="relative flex items-start group hover:transform hover:scale-105 transition-all duration-300 mb-20" data-aos="slide-left" data-aos-delay="200">
                    <div class="relative z-10 bg-yuki-500  text-white rounded-full w-16 h-16 flex items-center justify-center font-bold text-lg shadow-lg group-hover:shadow-xl transition-all duration-300">
                        2021
                        <!-- Enhanced dotted line to next step -->
                        <div class="absolute top-16 left-1/2 transform -translate-x-1/2 w-1 h-20 border-l-4 border-dotted border-yuki-400  opacity-70"></div>
                    </div>
                    <div class="ml-6 bg-white  rounded-md p-6 shadow-lg group-hover:shadow-xl transition-all duration-300 flex-1 border border-gray-100 ">
                        <h4 class="font-bold text-gray-900  mb-2 text-lg">Expansion</h4>
                        <p class="text-gray-600 ">Opened specialized departments and advanced medical facilities</p>
                        <div class="mt-3 flex items-center text-yuki-600  text-sm font-medium">
                            <i class="fas fa-expand-arrows-alt mr-2"></i>
                            <span>Facility Growth</span>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Innovation -->
                <div class="relative flex items-start group hover:transform hover:scale-105 transition-all duration-300 mb-20" data-aos="slide-left" data-aos-delay="300">
                    <div class="relative z-10 bg-yuki-500  text-white rounded-full w-16 h-16 flex items-center justify-center font-bold text-lg shadow-lg group-hover:shadow-xl transition-all duration-300">
                        2022
                        <!-- Enhanced dotted line to next step -->
                        <div class="absolute top-16 left-1/2 transform -translate-x-1/2 w-1 h-20 border-l-4 border-dotted border-yuki-400  opacity-70"></div>
                    </div>
                    <div class="ml-6 bg-white  rounded-md p-6 shadow-lg group-hover:shadow-xl transition-all duration-300 flex-1 border border-gray-100 ">
                        <h4 class="font-bold text-gray-900  mb-2 text-lg">Innovation</h4>
                        <p class="text-gray-600 ">Integrated AI-powered diagnostics and telemedicine services</p>
                        <div class="mt-3 flex items-center text-yuki-600  text-sm font-medium">
                            <i class="fas fa-lightbulb mr-2"></i>
                            <span>Tech Integration</span>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Excellence -->
                <div class="relative flex items-start group hover:transform hover:scale-105 transition-all duration-300" data-aos="slide-left" data-aos-delay="400">
                    <div class="relative z-10 bg-yuki-600  text-white rounded-full w-16 h-16 flex items-center justify-center font-bold text-lg shadow-lg group-hover:shadow-xl transition-all duration-300">
                        2024
                        <!-- No dotted line for final step -->
                    </div>
                    <div class="ml-6 bg-white  rounded-md p-6 shadow-lg group-hover:shadow-xl transition-all duration-300 flex-1 border border-gray-100 ">
                        <h4 class="font-bold text-gray-900  mb-2 text-lg">Excellence</h4>
                        <p class="text-gray-600 ">Recognized as a leading healthcare institution with 50K+ patients served</p>
                        <div class="mt-3 flex items-center text-yuki-600  text-sm font-medium">
                            <i class="fas fa-trophy mr-2"></i>
                            <span>Industry Recognition</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>



<!-- Statistics Section -->
<section class="py-20 bg-yuki-600  text-white relative overflow-hidden flex justify-center">
    <div class="absolute inset-0 bg-yuki-400  rounded-full blur-lg opacity-30"></div>

    <div class="relative  mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold font-display mb-4">
                Trusted by <span class="text-secondary-300">Thousands</span>
            </h2>
            <p class="text-xl text-white/80">Our commitment to excellence in numbers</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center group" data-aos="zoom-in" data-aos-delay="100">
                <div class="relative">
                 
                    <div class="relative bg-transparent rounded-md p-6 group-hover:scale-105 transition-all duration-300 border border-white">
                        <div class="text-5xl font-semibold mb-2 count-up">
                            500+
                        </div>
                        <div class="text-white/80 font-medium">Hospital Beds</div>
                        <div class="text-sm text-white/60 mt-1">Available 24/7</div>
                    </div>
                </div>
            </div>

            <div class="text-center group" data-aos="zoom-in" data-aos-delay="200">
                <div class="relative">
                   
                    <div class="relative bg-transparent rounded-md p-6 group-hover:scale-105 transition-all duration-300 border border-white">
                        <div class="text-5xl font-semibold mb-2 count-up">
                            150+
                        </div>
                        <div class="text-white/80 font-medium">Medical Experts</div>
                        <div class="text-sm text-white/60 mt-1">Board Certified</div>
                    </div>
                </div>
            </div>

            <div class="text-center group" data-aos="zoom-in" data-aos-delay="300">
                <div class="relative">
                   
                    <div class="relative bg-transparent rounded-md p-6 group-hover:scale-105 transition-all duration-300 border border-white">
                        <div class="text-5xl font-semibold mb-2 count-up">
                            50K+
                        </div>
                        <div class="text-white/80 font-medium">Patients Served</div>
                        <div class="text-sm text-white/60 mt-1">This Year</div>
                    </div>
                </div>
            </div>

            <div class="text-center group" data-aos="zoom-in" data-aos-delay="400">
                <div class="relative">
                   
                    <div class="relative bg-transparent rounded-md p-6 group-hover:scale-105 transition-all duration-300 border border-white">
                        <div class="text-5xl font-semibold mb-2 ">
                            24/7
                        </div>
                        <div class="text-white/80 font-medium">Emergency Care</div>
                        <div class="text-sm text-white/60 mt-1">Always Ready</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="500">
            <div class="text-center">
                <div class="text-2xl font-bold text-white mb-1 count-up">98.5%</div>
                <div class="text-sm text-white/70">Patient Satisfaction</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-white mb-1 count-up">15min</div>
                <div class="text-sm text-white/70">Avg. Wait Time</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-white mb-1 count-up">99.9%</div>
                <div class="text-sm text-white/70">System Uptime</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-white mb-1">ISO</div>
                <div class="text-sm text-white/70">Certified Quality</div>
            </div>
        </div>
    </div>
</section>

<!-- Core Services/Departments Section -->
<section id="departments" class="py-20 bg-gray-50      relative overflow-hidden transition-colors duration-300">
   
    <div class="relative  mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
         
            <h2 class="text-4xl md:text-5xl font-semibold font-display text-gray-900  mb-6">
                Comprehensive <span class="text-yuki-600 font-semibold">Healthcare</span> Services
            </h2>
            <p class="text-xl text-gray-600  max-w-3xl mx-auto">
                State-of-the-art medical departments staffed by world-class specialists and equipped with cutting-edge technology
            </p>
        </div>

        <!-- Key Services Slider -->
        <?php
        $department_services = [
            [
                'title' => 'Primary Care',
                'description' => 'Your first point of contact for comprehensive healthcare, preventive care, and ongoing health management.',
                'image' => asset('images/s2.jfif'),
                'alt' => 'Primary Care Services',
                'gradient' => 'bg-yuki-500 ',
                'items' => ['General Medicine', 'Family Medicine', 'Pediatrics'],
            ],
            [
                'title' => 'Specialty Care',
                'description' => 'Advanced specialized medical care from expert physicians using the latest diagnostic and treatment technologies.',
                'image' => asset('images/s3.jfif'),
                'alt' => 'Specialty Care Services',
                'gradient' => 'bg-yuki-500 ',
                'items' => ['Cardiology', 'Pulmonology', 'Neurology'],
            ],
            [
                'title' => "Women's Health",
                'description' => "Comprehensive women's healthcare services from adolescence through menopause and beyond.",
                'image' => asset('images/s4.jpg'),
                'alt' => "Women's Health Services",
               'gradient' => 'bg-yuki-500 ',
                'items' => ['Obstetrics & Gynecology', 'Maternity Care', 'Breast Health'],
            ],
            [
                'title' => 'Surgical Services',
                'description' => 'Advanced surgical procedures performed by expert surgeons using state-of-the-art technology and minimally invasive techniques.',
                'image' => asset('images/s4.jfif'),
                'alt' => 'Surgical Services',
               'gradient' => 'bg-yuki-500 ',
                'items' => ['General Surgery', 'ENT Surgery', 'Orthopedic Surgery'],
            ],
            [
                'title' => 'Mental Health Services',
                'description' => 'Comprehensive mental health care with compassionate support for emotional well-being and psychological health.',
                'image' => asset('images/s6.jpg'),
                'alt' => 'Mental Health Services',
               'gradient' => 'bg-yuki-500 ',
                'items' => ['Psychiatry', 'Counseling & Therapy', 'Addiction Treatment'],
            ],
            [
                'title' => 'Diagnostic Services',
                'description' => 'Advanced diagnostic testing and medical imaging services for accurate diagnosis and treatment planning.',
                'image' => asset('images/vision.jfif'),
                'alt' => 'Diagnostic Services',
             'gradient' => 'bg-yuki-500 ',
                'items' => ['Laboratory Tests', 'X-ray Imaging', 'CT Scans'],
            ],
            [
                'title' => 'Emergency & Urgent Care',
                'description' => '24/7 emergency medical services with rapid response teams and advanced trauma care capabilities.',
                'image' => asset('images/s7.jfif'),
                'alt' => 'Emergency Services',
              'gradient' => 'bg-yuki-500 ',
                'items' => ['24/7 Emergency Room', 'Ambulance Services', 'Trauma Care'],
            ],
            [
                'title' => 'Inpatient & Outpatient Services',
                'description' => 'Comprehensive care options from short-term outpatient visits to extended inpatient stays with comfortable accommodations.',
                'image' => asset('images/s8.webp'),
                'alt' => 'Inpatient & Outpatient Services',
               'gradient' => 'bg-yuki-500 ',
                'items' => ['Hospital Wards', 'Day Surgery Units', 'Outpatient Clinics'],
            ],
            [
                'title' => 'Pharmacy Services',
                'description' => 'Full-service pharmacy with prescription management, medication counseling, and specialized pharmaceutical care.',
                'image' => asset('images/s9.jfif'),
                'alt' => 'Pharmacy Services',
               'gradient' => 'bg-yuki-500 ',
                'items' => ['In-House Pharmacy', 'Prescription Management', 'Medication Refills'],
            ],
            [
                'title' => 'Rehabilitation & Therapy',
                'description' => 'Comprehensive rehabilitation services to help patients recover and regain independence after injury or illness.',
                'image' => asset('images/s10.jfif'),
                'alt' => 'Rehabilitation Services',
                'gradient' => 'bg-yuki-500 ',
                'items' => ['Physical Therapy', 'Speech Therapy', 'Occupational Therapy'],
            ],
            [
                'title' => "Children's Services",
                'description' => 'Specialized pediatric care designed specifically for infants, children, and adolescents in a child-friendly environment.',
                'image' => asset('images/s11.jpeg'),
                'alt' => "Children's Services",
'gradient' => 'bg-yuki-500 ',
                'items' => ['Pediatric Emergency', 'NICU (Neonatal ICU)', 'Pediatric Specialists'],
            ],
            [
                'title' => 'Support & Administrative Services',
                'description' => 'Comprehensive support services to ensure a smooth healthcare experience from admission to discharge and beyond.',
                'image' => asset('images/s12.jfif'),
                'alt' => 'Support Services',
                'gradient' => 'bg-yuki-500 ',
                'items' => ['Nutrition & Dietetics', 'Palliative Care', 'Social Work'],
            ],
        ];
        ?>
        <div class="flex items-center justify-end mb-4" data-aos="fade-up">
            <div class="home-services-nav flex items-center gap-2">
                <button class="home-services-prev home-services-nav-btn home-swiper-nav-btn w-10 h-10 rounded-md transition flex items-center justify-center" aria-label="Previous services">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button class="home-services-next home-services-nav-btn home-swiper-nav-btn w-10 h-10 rounded-md transition flex items-center justify-center" aria-label="Next services">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="swiper home-services-swiper" data-aos="fade-up">
            <div class="swiper-wrapper items-stretch">
                <?php foreach ($department_services as $service): ?>
                    <div class="swiper-slide h-full flex self-stretch">
                        <div class="bg-white  rounded-md shadow-lg border border-gray-100  h-full flex flex-col overflow-hidden">
                            <div class="h-48 overflow-hidden">
                                <img src="<?php echo $service['image']; ?>" alt="<?php echo htmlspecialchars($service['alt'], ENT_QUOTES); ?>" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="p-6 flex flex-col flex-1">
                                <h3 class="text-lg font-bold text-gray-900  mb-2">
                                    <?php echo htmlspecialchars($service['title'], ENT_QUOTES); ?>
                                </h3>
                                <p class="text-gray-600  text-sm mb-4">
                                    <?php echo htmlspecialchars($service['description'], ENT_QUOTES); ?>
                                </p>
                                <div class="grid grid-cols-1 gap-2 text-sm mb-4">
                                    <?php foreach ($service['items'] as $item): ?>
                                        <div class="bg-gray-50  text-gray-700  rounded-md px-3 py-2">
                                            <?php echo htmlspecialchars($item, ENT_QUOTES); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button class="<?php echo $service['gradient']; ?> text-white px-4 py-2 rounded-md text-sm font-medium hover:scale-105 transition-transform duration-200 mt-auto">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- View All Services CTA -->
        <div class="text-center mt-6" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-gray-50    rounded-md p-8 inline-block">
                <h3 class="text-2xl font-bold text-gray-900  mb-4">
                    Explore All Our <span class="text-yuki-600 font-semibold">Medical Services</span>
                </h3>
                <p class="text-gray-600  mb-6 max-w-2xl">
                    Discover our complete range of specialized medical departments, including Laboratory, Radiology, Pharmacy, and many more specialized services.
                </p>
                <a href="<?= url('services') ?>" class="inline-block bg-yuki-500  text-white hover:bg-yuki-600 hover: px-8 py-4 rounded-md font-semibold transition-all duration-300 shadow-lg hover:shadow-2xl hover:scale-105 transform">
                    <i class="fas fa-hospital mr-2"></i> View All Services
                </a>
            </div>
        </div>
    </div>
</section>


<!-- Doctor/Staff Highlights Section -->
<section id="doctors" class="py-20 bg-yuki-50      relative overflow-hidden transition-colors duration-300">


    <div class="relative  mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
        
            <h2 class="text-4xl md:text-5xl font-semibold font-display text-gray-900  mb-6">
                Meet Our <span class="text-yuki-600 font-semibold">Expert</span> Team
            </h2>
            <p class="text-xl text-gray-600  max-w-3xl mx-auto">
                World-renowned specialists dedicated to providing exceptional healthcare with compassion and expertise
            </p>
        </div>

        <!-- Featured Doctors Grid -->
        <?php
        $doctors = [
            [
                'name' => 'Dr. Sarah Chen',
                'title' => 'Chief of Cardiology',
                'bio' => 'Board-certified cardiologist with 15+ years of experience in interventional cardiology and heart surgery.',
                'image' => asset('images/dr3.png'),
                'alt' => 'Dr. Sarah Chen - Chief of Cardiology',
                'glow' => 'bg-yuki-400 ',
                'avatar_gradient' => 'bg-yuki-400 ',
               'badge_gradient' => 'bg-yuki-500 ',
                'cta_gradient' => 'bg-yuki-500 ',
                'credentials' => [
                    ['label' => 'MD, PhD', 'class' => 'text-yuki-600 font-semibold '],
                    ['label' => 'Harvard Medical', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => '15+ Years', 'class' => 'bg-yuki-100  text-yuki-700 '],
                ],
            ],
            [
                'name' => 'Dr. Michael Rodriguez',
                'title' => 'Head of Neurology',
                'bio' => 'Renowned neurologist specializing in brain surgery, stroke treatment, and neurological disorders.',
                'image' => asset('images/dr2.jpg'),
                'alt' => 'Dr. Michael Rodriguez - Head of Neurology',
               'glow' => 'bg-yuki-400 ',
                'avatar_gradient' => 'bg-yuki-400 ',
                 'badge_gradient' => 'bg-yuki-500 ',
                'cta_gradient' => 'bg-yuki-500 ',
                'credentials' => [
                    ['label' => 'MD, FAANS', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => 'Johns Hopkins', 'class' => 'text-yuki-600 font-semibold '],
                    ['label' => '20+ Years', 'class' => 'bg-yuki-100  text-yuki-700 '],
                ],
            ],
            [
                'name' => 'Dr. Emily Watson',
                'title' => 'Maternity Specialist',
                'bio' => 'Expert in maternal-fetal medicine, high-risk pregnancies, and comprehensive women\'s health.',
                'image' => asset('images/dr1.jpg'),
                'alt' => 'Dr. Emily Watson - Maternity Specialist',
              'glow' => 'bg-yuki-400 ',
                'avatar_gradient' => 'bg-yuki-400 ',
                'badge_gradient' => 'bg-yuki-500 ',
                'cta_gradient' => 'bg-yuki-500 ',
                'credentials' => [
                    ['label' => 'MD, FACOG', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => 'Stanford Medical', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => '12+ Years', 'class' => 'bg-yuki-100  text-yuki-700 '],
                ],
            ],
            [
                'name' => 'Dr. Jane Doe',
                'title' => 'Chief Medical Officer',
                'bio' => 'Leads clinical excellence across all departments with 25+ years of leadership and patient care experience.',
                'image' => asset('images/dr1.jpg'),
                'alt' => 'Dr. Jane Doe - Chief Medical Officer',
                'glow' => 'bg-yuki-400 ',
                'avatar_gradient' => 'bg-yuki-400 ',
                'badge_gradient' => 'bg-yuki-500 ',
                'cta_gradient' => 'bg-yuki-500 ',
                'credentials' => [
                    ['label' => 'MD, MBA', 'class' => 'text-yuki-600 font-semibold '],
                    ['label' => 'Clinical Leadership', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => '25+ Years', 'class' => 'bg-yuki-100  text-yuki-700 '],
                ],
            ],
            [
                'name' => 'Mr. John Smith',
                'title' => 'Chief Executive Officer',
                'bio' => 'Guides hospital strategy and growth with a focus on patient-first innovation and operational excellence.',
                'image' => asset('images/dr2.jpg'),
                'alt' => 'Mr. John Smith - Chief Executive Officer',
                'glow' => 'bg-yuki-400 ',
                'avatar_gradient' => 'bg-yuki-400 ',
                'badge_gradient' => 'bg-yuki-500 ',
                'cta_gradient' => 'bg-yuki-500 ',
                'credentials' => [
                    ['label' => 'Healthcare Leadership', 'class' => 'text-yuki-600 font-semibold '],
                    ['label' => 'Operations', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => '15+ Years', 'class' => 'bg-yuki-100  text-yuki-700 '],
                ],
            ],
            [
                'name' => 'Dr. Riya Patel',
                'title' => 'Head of Surgery',
                'bio' => 'Robotic surgery expert specializing in complex procedures and minimally invasive techniques.',
                'image' => asset('images/dr3.png'),
                'alt' => 'Dr. Riya Patel - Head of Surgery',
                'glow' => 'bg-yuki-400 ',
                'avatar_gradient' => 'bg-yuki-400 ',
                'badge_gradient' => 'bg-yuki-500 ',
                'cta_gradient' => 'bg-yuki-500 ',
                'credentials' => [
                    ['label' => 'MD, FRCS', 'class' => 'text-yuki-600 font-semibold '],
                    ['label' => 'Robotic Surgery', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => '18+ Years', 'class' => 'bg-yuki-100  text-yuki-700 '],
                ],
            ],
            [
                'name' => 'Dr. Michael Chen',
                'title' => 'Head of Emergency',
                'bio' => 'Emergency medicine specialist leading rapid-response teams and critical care services.',
                'image' => asset('images/dr6.jpg'),
                'alt' => 'Dr. Michael Chen - Head of Emergency',
                'glow' => 'bg-yuki-400 ',
                'avatar_gradient' => 'bg-yuki-400 ',
                'badge_gradient' => 'bg-yuki-500 ',
                'cta_gradient' => 'bg-yuki-500 ',
                'credentials' => [
                    ['label' => 'MD, FACEP', 'class' => 'text-yuki-600 font-semibold '],
                    ['label' => 'Critical Care', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => '14+ Years', 'class' => 'bg-yuki-100  text-yuki-700 '],
                ],
            ],
            [
                'name' => 'Dr. Sarah Johnson',
                'title' => 'Chief of Cardiology',
                'bio' => 'Cardiology leader focused on advanced diagnostics, cardiac imaging, and patient education.',
                'image' => asset('images/d7.jpg'),
                'alt' => 'Dr. Sarah Johnson - Chief of Cardiology',
                'glow' => 'bg-yuki-400 ',
                'avatar_gradient' => 'bg-yuki-400 ',
                'badge_gradient' => 'bg-yuki-500 ',
                'cta_gradient' => 'bg-yuki-500 ',
                'credentials' => [
                    ['label' => 'MD, FACC', 'class' => 'text-yuki-600 font-semibold '],
                    ['label' => 'Heart Health', 'class' => 'bg-yuki-100  text-yuki-700 '],
                    ['label' => '13+ Years', 'class' => 'bg-yuki-100  text-yuki-700 '],
                ],
            ],
        ];
        ?>
        <div class="flex items-center justify-end mb-4" data-aos="fade-up">
            <div class="home-team-nav flex items-center gap-2">
                <button class="home-team-prev home-swiper-nav-btn w-10 h-10 rounded-md transition flex items-center justify-center" aria-label="Previous team members">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button class="home-team-next home-swiper-nav-btn w-10 h-10 rounded-md transition flex items-center justify-center" aria-label="Next team members">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="swiper home-team-swiper mb-12" data-aos="fade-up">
            <div class="swiper-wrapper items-stretch">
                <?php foreach ($doctors as $index => $doctor): ?>
                    <?php $delay = 100 + ($index * 100); ?>
                    <div class="swiper-slide h-full flex self-stretch" data-aos-delay="<?php echo $delay; ?>">
                        <div class="group h-full w-full">
                            <div class="relative h-full">
                                <div class="absolute inset-0 <?php echo $doctor['glow']; ?> rounded-md blur-lg opacity-0 group-hover:opacity-20 transition-all duration-500"></div>
                                <div class="relative bg-white  rounded-md p-6 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100  h-full flex flex-col">
                                    <div class="relative mb-6">
                                        <div class="w-24 h-24 <?php echo $doctor['avatar_gradient']; ?> rounded-md mx-auto group-hover:scale-110 transition-transform duration-300 overflow-hidden">
                                            <img src="<?php echo $doctor['image']; ?>" alt="<?php echo htmlspecialchars($doctor['alt'], ENT_QUOTES); ?>" class="w-full h-full object-cover object-center">
                                        </div>
                                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                            <span class="<?php echo $doctor['badge_gradient']; ?> text-white px-3 py-1 rounded-md text-xs font-medium">
                                                <?php echo htmlspecialchars($doctor['title'], ENT_QUOTES); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="text-center flex flex-col flex-1">
                                        <h3 class="text-xl font-bold text-gray-900  mb-2">
                                            <?php echo htmlspecialchars($doctor['name'], ENT_QUOTES); ?>
                                        </h3>
                                        <p class="text-gray-600  text-sm mb-4">
                                            <?php echo htmlspecialchars($doctor['bio'], ENT_QUOTES); ?>
                                        </p>

                                        <div class="flex flex-wrap justify-center gap-2 mb-4">
                                            <?php foreach ($doctor['credentials'] as $credential): ?>
                                                <span class="<?php echo $credential['class']; ?> px-2 py-1 rounded-md text-xs">
                                                    <?php echo htmlspecialchars($credential['label'], ENT_QUOTES); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>

                                        <a href="<?= url('book-appointment') ?>" class="<?php echo $doctor['cta_gradient']; ?> text-white px-6 py-2 rounded-md text-sm font-medium hover:scale-105 transition-transform duration-200 w-full inline-block text-center mt-auto">
                                            <i class="fas fa-calendar-alt mr-2"></i> Book Appointment
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- View All Doctors CTA -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-gray-50    rounded-md p-8 inline-block">
                <h3 class="text-2xl font-bold text-gray-900  mb-4">
                    Meet Our Complete <span class="text-yuki-600 font-semibold">Medical Team</span>
                </h3>
                <p class="text-gray-600  mb-6 max-w-2xl">
                    Our hospital is home to over 150 board-certified physicians and specialists across all medical disciplines,
                    each committed to providing exceptional patient care.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-yuki-500  text-white hover:bg-yuki-600 hover: px-8 py-4 rounded-md font-semibold transition-all duration-300 shadow-lg hover:shadow-2xl hover:scale-105 transform">
                        <i class="fas fa-users mr-2"></i> View All Doctors
                    </button>
                    <button class="bg-white  text-gray-700  border-2 border-gray-200  hover:border-yuki-500  px-8 py-4 rounded-md font-semibold transition-all duration-300 hover:scale-105 transform">
                        <i class="fas fa-search mr-2"></i> Find a Specialist
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Appointment Booking Section -->
<section class="py-20 bg-yuki-600  text-white relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-yuki-500/20  animate-gradient bg-300%"></div>
        <div class="absolute top-20 left-20 w-40 h-40 bg-white/10 rounded-full blur-xl animate-float"></div>
        <div class="absolute bottom-20 right-20 w-32 h-32 bg-white/10 rounded-full blur-xl animate-float" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold font-display mb-6">
                Book Your <span class="text-secondary-300">Appointment</span> Today
            </h2>
            <p class="text-xl text-white/80 max-w-3xl mx-auto">
                Schedule your consultation with our expert medical team. Quick, easy, and secure online booking available 24/7.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Booking Form -->
            <div data-aos="fade-right">
                <div class="bg-white/10 backdrop-blur-sm rounded-md p-8 border border-white/20">
                    <h3 class="text-2xl font-bold mb-6">Quick Appointment Request</h3>

                    <!-- Success/Error Messages -->
                    <?php if (isset($_SESSION['appointment_success'])): ?>
                        <div class="mb-6 bg-yuki-500/20 border border-yuki-400/30 text-white px-4 py-3 rounded-md backdrop-blur-sm">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <?php echo htmlspecialchars($_SESSION['appointment_success']); ?>
                            </div>
                        </div>
                        <?php unset($_SESSION['appointment_success']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['appointment_errors'])): ?>
                        <div class="mb-6 bg-red-500/20 border border-red-400/30 text-white px-4 py-3 rounded-md backdrop-blur-sm">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                                <div>
                                    <?php foreach ($_SESSION['appointment_errors'] as $error): ?>
                                        <p><?php echo htmlspecialchars($error); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['appointment_errors']); ?>
                    <?php endif; ?>
                    <form action="<?= url('appointment/store') ?>" method="POST" class="space-y-4" id="appointmentForm">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="first_name" placeholder="First Name" required
                                   class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                            <input type="text" name="last_name" placeholder="Last Name" required
                                   class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="middle_name" placeholder="Middle Name (Optional)"
                                   class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                            <input type="date" name="date_of_birth" placeholder="Date of Birth" required
                                   class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                        </div>
                        <input type="email" name="email" placeholder="Email Address" required
                               class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="tel" name="phone" placeholder="Phone Number" required
                                   class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                            <select name="gender" required class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <input type="tel" name="emergency_contact" placeholder="Emergency Contact Number"
                               class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                        <input type="text" name="address" placeholder="Full Address" required
                               class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                        <select name="department" required class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                            <option value="">Select Department</option>
                            <option value="cardiology">Cardiology</option>
                            <option value="neurology">Neurology</option>
                            <option value="maternity">Maternity</option>
                            <option value="emergency">Emergency</option>
                            <option value="general">General Medicine</option>
                            <option value="pediatrics">Pediatrics</option>
                            <option value="orthopedics">Orthopedics</option>
                            <option value="dermatology">Dermatology</option>
                        </select>
                        <input type="date" name="preferred_date" placeholder="Preferred Appointment Date" required
                               class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                        <input type="password" name="password" placeholder="Create Password for Patient Portal" required
                               class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400">
                        <textarea name="notes" placeholder="Additional Notes (Optional)" rows="3"
                                  class="w-full px-4 py-3 bg-white border border-gray-200 rounded-md text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yuki-400 resize-none"></textarea>
                        <button type="submit" class="w-full bg-white text-yuki-600 hover:bg-gray-100 px-6 py-4 rounded-md font-semibold transition-all duration-300 hover:scale-105 transform shadow-lg">
                            <i class="fas fa-calendar-check mr-2"></i> Request Appointment
                        </button>
                    </form>
                </div>
            </div>

            <!-- Booking Benefits -->
            <div data-aos="fade-left">
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="bg-white/20 rounded-full p-3 mr-4 flex-shrink-0">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2">Quick & Easy Booking</h4>
                            <p class="text-white/80">Schedule your appointment in just a few clicks. Our online system is available 24/7 for your convenience.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-white/20 rounded-full p-3 mr-4 flex-shrink-0">
                            <i class="fas fa-user-md text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2">Expert Specialists</h4>
                            <p class="text-white/80">Connect with board-certified specialists across all medical disciplines for comprehensive care.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-white/20 rounded-full p-3 mr-4 flex-shrink-0">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold mb-2">Secure & Private</h4>
                            <p class="text-white/80">Your personal information is protected with industry-leading security and HIPAA compliance.</p>
                        </div>
                    </div>

                    <div class="bg-white/10 rounded-md p-6 mt-8">
                        <h4 class="text-lg font-bold mb-3">Already a Patient?</h4>
                        <p class="text-white/80 mb-4">Access your patient portal for faster booking and medical records.</p>
                        <a href="<?= url('book-appointment') ?>" class="bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-md font-medium transition-all duration-200 inline-block">
                            <i class="fas fa-sign-in-alt mr-2"></i> Patient Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Patient Testimonials Section -->
<section class="py-20 bg-yuki-50      relative overflow-hidden transition-colors duration-300">
   

    <div class="relative  mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
           
            <h2 class="text-4xl md:text-5xl font-semibold font-display text-gray-900  mb-6">
                What Our <span class="text-yuki-600 font-semibold">Patients</span> Say
            </h2>
            <p class="text-xl text-gray-600  max-w-3xl mx-auto">
                Real stories from real patients who have experienced exceptional care at Yibera Healthcare
            </p>
        </div>

        <!-- Testimonials Grid -->
        <?php
        $testimonials = [
            [
                'name' => 'Robert Johnson',
                'role' => 'Cardiac Patient',
                'quote' => '"The emergency team at Yibera saved my life. Their quick response and professional care during my heart attack was exceptional. I\'m forever grateful to Dr. Chen and her team."',
                'image' => asset('images/pat1.jpg'),
                'alt' => 'Robert Johnson - Cardiac Patient',
                'glow' => 'bg-yuki-400 ',
                'quote_color' => 'text-yuki-200 ',
            ],
            [
                'name' => 'Maria Rodriguez',
                'role' => 'New Mother',
                'quote' => '"Dr. Watson and the maternity team made my pregnancy journey beautiful. From prenatal care to delivery, every step was handled with such care and professionalism."',
                'image' => asset('images/pat2.jfif'),
                'alt' => 'Maria Rodriguez - New Mother',
                               'glow' => 'bg-yuki-400 ',
                'quote_color' => 'text-yuki-200 ',
            ],
            [
                'name' => 'David Thompson',
                'role' => 'Stroke Recovery Patient',
                'quote' => '"The neurology department helped me recover from my stroke. Dr. Rodriguez\'s expertise and the rehabilitation team\'s dedication gave me my life back."',
                'image' => asset('images/pat3.webp'),
                'alt' => 'David Thompson - Stroke Recovery Patient',
                'glow' => 'bg-yuki-400 ',
                'quote_color' => 'text-yuki-200 ',
            ],
            [
                'name' => 'Amina Yusuf',
                'role' => 'Outpatient Services',
                'quote' => '"From check-in to consultation, the outpatient team made everything seamless. The staff were kind, attentive, and truly listened to my concerns."',
                'image' => asset('images/s1.jpg'),
                'alt' => 'Amina Yusuf - Outpatient Services',
                'glow' => 'bg-yuki-400 ',
                'quote_color' => 'text-yuki-200 ',
            ],
            [
                'name' => 'Chinwe Okafor',
                'role' => 'Women\'s Health Patient',
                'quote' => '"The women\'s health team guided me with so much care and respect. Every appointment felt personal and supportive."',
                'image' => asset('images/s2.jfif'),
                'alt' => 'Chinwe Okafor - Women\'s Health Patient',
                'glow' => 'bg-yuki-400 ',
                'quote_color' => 'text-yuki-200 ',
            ],
            [
                'name' => 'Samuel Adeyemi',
                'role' => 'Rehabilitation Patient',
                'quote' => '"The rehab specialists gave me a clear plan and constant encouragement. I\'m back on my feet thanks to their dedication."',
                'image' => asset('images/s3.jfif'),
                'alt' => 'Samuel Adeyemi - Rehabilitation Patient',
                'glow' => 'bg-yuki-400 ',
                'quote_color' => 'text-yuki-200 ',
            ],
        ];
        ?>
        <div class="flex items-center justify-end mb-4" data-aos="fade-up">
            <div class="home-testimonials-nav flex items-center gap-2">
                <button class="home-testimonials-prev home-swiper-nav-btn w-10 h-10 rounded-md transition flex items-center justify-center" aria-label="Previous testimonials">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button class="home-testimonials-next home-swiper-nav-btn w-10 h-10 rounded-md transition flex items-center justify-center" aria-label="Next testimonials">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="swiper home-testimonials-swiper mb-12" data-aos="fade-up">
            <div class="swiper-wrapper items-stretch">
                <?php foreach ($testimonials as $index => $testimonial): ?>
                    <?php $delay = 100 + ($index * 100); ?>
                    <div class="swiper-slide h-full flex self-stretch" data-aos-delay="<?php echo $delay; ?>">
                        <div class="group h-full w-full">
                            <div class="relative h-full">
                                <div class="absolute inset-0 <?php echo $testimonial['glow']; ?> rounded-md blur-lg opacity-0 group-hover:opacity-20 transition-all duration-500"></div>
                                <div class="relative bg-white  rounded-md p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100  h-full flex flex-col">
                                    <div class="absolute top-6 right-6">
                                        <i class="fas fa-quote-right <?php echo $testimonial['quote_color']; ?> text-3xl"></i>
                                    </div>
                                    <div class="flex mb-4">
                                        <?php for ($star = 0; $star < 5; $star++): ?>
                                            <i class="fas fa-star text-yuki-400 text-lg"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <p class="text-gray-600  mb-6 leading-relaxed italic">
                                        <?php echo htmlspecialchars($testimonial['quote'], ENT_QUOTES); ?>
                                    </p>
                                    <div class="flex items-center mt-auto">
                                        <div class="<?php echo $testimonial['glow']; ?> rounded-full w-12 h-12 mr-4 overflow-hidden">
                                            <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo htmlspecialchars($testimonial['alt'], ENT_QUOTES); ?>" class="w-full h-full object-cover object-center">
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-gray-900 ">
                                                <?php echo htmlspecialchars($testimonial['name'], ENT_QUOTES); ?>
                                            </h4>
                                            <p class="text-sm text-gray-500 ">
                                                <?php echo htmlspecialchars($testimonial['role'], ENT_QUOTES); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Overall Rating CTA -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-gray-50    rounded-md p-8 inline-block">
                <div class="flex items-center justify-center mb-4">
                    <div class="flex mr-4">
                        <i class="fas fa-star text-yuki-400 text-2xl"></i>
                        <i class="fas fa-star text-yuki-400 text-2xl"></i>
                        <i class="fas fa-star text-yuki-400 text-2xl"></i>
                        <i class="fas fa-star text-yuki-400 text-2xl"></i>
                        <i class="fas fa-star text-yuki-400 text-2xl"></i>
                    </div>
                    <span class="text-3xl font-bold text-gray-900 ">4.9/5</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900  mb-4">
                    Trusted by <span class="text-yuki-600 font-semibold count-up">10,000+</span> Patients
                </h3>
                <p class="text-gray-600  mb-6 max-w-2xl">
                    Join thousands of satisfied patients who have experienced exceptional healthcare at Yibera. Your health and satisfaction are our top priorities.
                </p>
                <button class="bg-yuki-500  text-white hover:bg-yuki-600 hover: px-8 py-4 rounded-md font-semibold transition-all duration-300 shadow-lg hover:shadow-md hover:scale-105 transform">
                    <i class="fas fa-calendar-check mr-2"></i> Share Your Experience
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Community Outreach & Charity Section -->
<section class="py-20 bg-yuki-50      relative overflow-hidden transition-colors duration-300">
    <!-- Background Elements -->
        <div class="relative mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
          
            <h2 class="text-4xl md:text-5xl font-semibold font-display text-gray-900  mb-6">
                Giving Back to Our <span class="text-yuki-600 font-semibold">Community</span>
            </h2>
            <p class="text-xl text-gray-600  max-w-3xl mx-auto">
                Beyond healthcare, we're committed to making a positive impact through charitable initiatives, medical missions, and community outreach programs
            </p>
        </div>

        <!-- Charity Initiatives Grid -->
        <?php
        $charity_cards = [
            [
                'title' => 'Global Medical Missions',
                'description' => 'Our medical teams travel to underserved communities worldwide, providing free healthcare and medical training to local practitioners.',
                'image' => asset('images/gmm.jpg'),
                'alt' => 'Global Medical Missions - Healthcare volunteers in underserved communities',
                'stat' => '15 Countries Served',
                'icon' => 'fas fa-heart',
                'icon_color' => 'text-yuki-600 ',
                'glow' => 'bg-yuki-400 ',
            ],
            [
                'title' => 'Community Health Screenings',
                'description' => 'Monthly free health screenings in local communities, focusing on early detection and preventive care for all ages.',
                'image' => asset('images/chs.jpg'),
                'alt' => 'Community Health Screenings - Free health checkups for local residents',
                'stat' => '5,000+ People Screened',
                'icon' => 'fas fa-users',
                'icon_color' => 'text-yuki-600 ',
                'glow' => 'bg-yuki-400 ',
            ],
            [
                'title' => 'Health Education Programs',
                'description' => 'Comprehensive health education workshops in schools and community centers, promoting wellness and disease prevention.',
                'image' => asset('images/hep.jfif'),
                'alt' => 'Health Education Programs - Teaching wellness in schools and community centers',
                'stat' => '50+ Schools Reached',
                'icon' => 'fas fa-school',
                'icon_color' => 'text-yuki-600 ',
                'glow' => 'bg-yuki-400 ',
            ],
            [
                'title' => 'Disaster Relief Support',
                'description' => 'Rapid response medical teams deployed during natural disasters, providing emergency care and medical supplies to affected areas.',
                'image' => asset('images/drs.jpg'),
                'alt' => 'Disaster Relief Support - Emergency medical response teams helping disaster victims',
                'stat' => '24/7 Emergency Response',
                'icon' => 'fas fa-ambulance',
                'icon_color' => 'text-yuki-600 ',
                'glow' => 'bg-yuki-400 ',
            ],
            [
                'title' => 'Senior Care Outreach',
                'description' => 'Dedicated programs for elderly care including home visits, medication management, and social support services.',
                'image' => asset('images/sco.jpg'),
                'alt' => 'Senior Care Outreach - Healthcare professionals providing home care for elderly patients',
                'stat' => '1,000+ Seniors Supported',
                'icon' => 'fas fa-home',
                'icon_color' => 'text-yuki-600 ',
                'glow' => 'bg-yuki-400 ',
            ],
            [
                'title' => 'Mental Health Awareness',
                'description' => 'Free mental health counseling, support groups, and awareness campaigns to break stigma and promote mental wellness.',
                'image' => asset('images/mh.jfif'),
                'alt' => 'Mental Health Awareness - Support groups and counseling sessions for mental wellness',
                'stat' => 'Free Counseling Available',
                'icon' => 'fas fa-comments',
               'icon_color' => 'text-yuki-600 ',
                'glow' => 'bg-yuki-400 ',
            ],
        ];
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16 items-stretch">
            <?php foreach ($charity_cards as $index => $card): ?>
                <?php $delay = 100 + ($index * 100); ?>
                <div class="group" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="relative h-full">
                        <div class="absolute inset-0 <?php echo $card['glow']; ?> rounded-md blur-lg opacity-0 group-hover:opacity-20 transition-all duration-500"></div>
                        <div class="relative bg-white  rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100  h-full flex flex-col">
                            <div class="h-48 overflow-hidden">
                                <img src="<?php echo $card['image']; ?>" alt="<?php echo htmlspecialchars($card['alt'], ENT_QUOTES); ?>" class="w-full h-full object-cover object-center">
                            </div>
                            <div class="p-6 flex flex-col flex-1">
                                <h3 class="text-xl font-bold text-gray-900  mb-3">
                                    <?php echo htmlspecialchars($card['title'], ENT_QUOTES); ?>
                                </h3>
                                <p class="text-gray-600  mb-4 leading-relaxed">
                                    <?php echo htmlspecialchars($card['description'], ENT_QUOTES); ?>
                                </p>
                                <div class="flex items-center text-sm font-medium mt-auto <?php echo $card['icon_color']; ?>">
                                    <i class="<?php echo $card['icon']; ?> mr-2"></i>
                                    <span><?php echo htmlspecialchars($card['stat'], ENT_QUOTES); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Get Involved CTA -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="700">
            <div class="bg-gray-50    rounded-md p-8 inline-block">
                <h3 class="text-2xl font-bold text-gray-900  mb-4">
                    Join Our <span class="text-yuki-600 font-semibold">Mission</span>
                </h3>
                <p class="text-gray-600  mb-6 max-w-2xl">
                    Be part of our community impact initiatives. Whether through volunteering, donations, or spreading awareness, every contribution makes a difference.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-yuki-500  text-white hover:bg-yuki-600 hover: px-8 py-4 rounded-md font-semibold transition-all duration-300 shadow-lg hover:shadow-2xl hover:scale-105 transform">
                        <i class="fas fa-hands-helping mr-2"></i> Volunteer With Us
                    </button>
                    <button class="bg-white  text-gray-700  border-2 border-gray-200  hover:border-yuki-300  px-8 py-4 rounded-md font-semibold transition-all duration-300 hover:scale-105 transform">
                        <i class="fas fa-donate mr-2"></i> Make a Donation
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50      relative overflow-hidden transition-colors duration-300">
   
   
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
           
            <h2 class="text-4xl md:text-5xl font-semibold font-display text-gray-900  mb-6">
                Common Questions About Our <span class="text-yuki-600 font-semibold">Healthcare Services</span>
            </h2>
            <p class="text-xl text-gray-600  max-w-3xl mx-auto">
                Find quick answers to the most common questions about our services, appointments, policies, and patient care
            </p>
        </div>

        <!-- FAQ Items -->
        <?php
        $faq_items = [
            [
                'question' => 'How do I schedule an appointment with a specialist?',
                'answer' => 'You can schedule an appointment through our online patient portal, by calling our main number at +44 (0)1902 321000, or by visiting our reception desk. For specialist appointments, you may need a referral from your primary care physician. Our scheduling team will help coordinate with the appropriate department and find the earliest available appointment that fits your schedule.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 100,
            ],
            [
                'question' => 'What insurance plans do you accept?',
                'answer' => 'We accept most major insurance plans including Blue Cross Blue Shield, Aetna, Cigna, UnitedHealthcare, Medicare, and Medicaid. We also offer self-pay options and payment plans for uninsured patients. Please contact our billing department at (555) 123-4568 to verify your specific coverage or discuss payment options before your visit.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 150,
            ],
            [
                'question' => 'What should I do in case of a medical emergency?',
                'answer' => 'For life-threatening emergencies, call 911 immediately. Our Emergency Department is open 24/7 and equipped to handle all types of medical emergencies. For urgent but non-life-threatening conditions, you can visit our Urgent Care center or call our nurse hotline at (555) 123-4569 for guidance on whether you need immediate care.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 200,
            ],
            [
                'question' => 'How do I access my medical records and test results?',
                'answer' => 'You can access your medical records, test results, and appointment history through our secure patient portal. Simply log in with your credentials at our website or mobile app. If you need help setting up your account, visit our registration desk or call (555) 123-4567. Test results are typically available within 24-48 hours of completion.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 250,
            ],
            [
                'question' => 'What are your visiting hours and policies?',
                'answer' => 'General visiting hours are 8:00 AM to 8:00 PM daily. ICU visiting hours are 10:00 AM to 2:00 PM and 4:00 PM to 8:00 PM. We allow up to 2 visitors per patient at a time. All visitors must check in at the main reception and may be required to show ID. Special accommodations can be made for family members of critically ill patients.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 300,
            ],
            [
                'question' => 'Do you offer specialized services like cardiology and neurology?',
                'answer' => 'Yes, we offer comprehensive specialized services including Cardiology, Neurology, Orthopedics, Oncology, Pediatrics, Maternity Care, and more. Our specialists are board-certified and use the latest medical technology. We also have advanced diagnostic imaging, laboratory services, and surgical facilities on-site for complete patient care.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 350,
            ],
            [
                'question' => 'How can I prepare for my upcoming surgery or procedure?',
                'answer' => 'Pre-operative instructions will be provided by your surgeon and our pre-surgical team. Generally, this includes fasting guidelines, medication adjustments, and what to bring on the day of surgery. You\'ll receive detailed written instructions and have a pre-operative consultation to address any questions. Our patient coordinators will guide you through the entire process.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 400,
            ],
            [
                'question' => 'Where is the hospital located and what parking options are available?',
                'answer' => 'We\'re located at 123 Healthcare Avenue, easily accessible from major highways. We offer free parking in our main garage with over 500 spaces, plus valet parking services during peak hours. The hospital is also accessible by public transportation with bus stops directly in front of the main entrance. Detailed directions and maps are available on our website.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 450,
            ],
            [
                'question' => 'Can I get a second opinion or transfer my care to your facility?',
                'answer' => 'Absolutely! We welcome patients seeking second opinions and care transfers. Our specialists can review your medical records and provide expert consultation. To transfer care, contact our patient services team who will help coordinate with your previous healthcare providers to obtain your medical records and ensure a smooth transition of care.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 500,
            ],
            [
                'question' => 'Do you offer telemedicine or virtual consultations?',
                'answer' => 'Yes, we offer telemedicine services for follow-up appointments, routine consultations, and certain specialist visits. Virtual consultations are available through our secure patient portal and mobile app. This service is perfect for medication reviews, post-operative check-ins, and consultations that don\'t require physical examination. Contact us to see if your appointment qualifies for virtual care.',
                'icon_class' => 'text-yuki-600 ',
                'delay' => 550,
            ],
        ];
        ?>
        <div class="space-y-4 mb-12">
            <?php foreach ($faq_items as $index => $item): ?>
                <?php $faq_id = 'faq-' . ($index + 1); ?>
                <div class="group" data-aos="fade-up" data-aos-delay="<?php echo $item['delay']; ?>">
                    <div class="bg-white  rounded-md shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 ">
                        <button class="w-full px-6 py-6 text-left focus:outline-none focus:ring-2 focus:ring-yuki-500 focus:ring-offset-2  rounded-md"
                                onclick="toggleFAQ(this)"
                                aria-expanded="false"
                                aria-controls="<?php echo $faq_id; ?>">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900  pr-4">
                                    <?php echo htmlspecialchars($item['question'], ENT_QUOTES); ?>
                                </h3>
                                <div class="flex-shrink-0">
                                    <i class="fas fa-chevron-down <?php echo $item['icon_class']; ?> transition-transform duration-300 transform"></i>
                                </div>
                            </div>
                        </button>
                        <div id="<?php echo $faq_id; ?>" class="faq-content hidden px-6 pb-6">
                            <div class="pt-4 border-t border-gray-100 ">
                                <p class="text-gray-600  leading-relaxed">
                                    <?php echo htmlspecialchars($item['answer'], ENT_QUOTES); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- FAQ CTA Section -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="bg-gray-50    rounded-md p-8 inline-block">
                <h3 class="text-2xl font-semibold text-gray-900  mb-4">
                    Still Have <span class="text-yuki-600 font-semibold">Questions?</span>
                </h3>
                <p class="text-gray-600  mb-6 max-w-2xl">
                    Our patient care team is here to help. Contact us for personalized assistance with any questions about our services, appointments, or patient care.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?= url('contact') ?>" class="bg-yuki-500  text-white hover:bg-yuki-600 hover: px-8 py-4 rounded-md font-semibold transition-all duration-300 shadow-lg hover:shadow-md hover:scale-105 transform">
                        <i class="fas fa-phone mr-2"></i> Contact Us
                    </a>
                    <a href="tel:+441902321000" class="bg-white  text-gray-700  border-2 border-gray-200  hover:border-yuki-300  px-8 py-4 rounded-md font-semibold transition-all duration-300 hover:scale-105 transform">
                        <i class="fas fa-phone-alt mr-2"></i> Call +44 (0)1902 321000
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
const homeServicesSwiper = new Swiper('.home-services-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    navigation: {
        nextEl: '.home-services-next',
        prevEl: '.home-services-prev'
    },
    breakpoints: {
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        }
    }
});

const homeTestimonialsSwiper = new Swiper('.home-testimonials-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    navigation: {
        nextEl: '.home-testimonials-next',
        prevEl: '.home-testimonials-prev'
    },
    breakpoints: {
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        }
    }
});

const homeTeamSwiper = new Swiper('.home-team-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    navigation: {
        nextEl: '.home-team-next',
        prevEl: '.home-team-prev'
    },
    breakpoints: {
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        }
    }
});

const coreValuesSwiper = new Swiper('.core-values-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    navigation: {
        nextEl: '.core-values-next',
        prevEl: '.core-values-prev'
    },
    breakpoints: {
        768: {
            slidesPerView: 2
        },
        1024: {
            slidesPerView: 3
        }
    }
});

const swiperNavActiveClasses = [
    '',
    'bg-yuki-500',
    '',
    'text-white',
    'hover:bg-yuki-600',
    'hover:',
    'shadow-md'
];
const swiperNavDisabledClasses = [
    'bg-white',
    '',
    'text-gray-700',
    '',
    'border',
    'border-gray-200',
    '',
    'opacity-60',
    'cursor-not-allowed'
];

function setSwiperNavState(button, isDisabled) {
    if (!button) {
        return;
    }

    if (isDisabled) {
        button.classList.remove(...swiperNavActiveClasses);
        button.classList.add(...swiperNavDisabledClasses);
        button.setAttribute('disabled', 'disabled');
        button.setAttribute('aria-disabled', 'true');
    } else {
        button.classList.remove(...swiperNavDisabledClasses);
        button.classList.add(...swiperNavActiveClasses);
        button.removeAttribute('disabled');
        button.setAttribute('aria-disabled', 'false');
    }
}

function setupSwiperNav(swiper, prevSelector, nextSelector) {
    const prevButton = document.querySelector(prevSelector);
    const nextButton = document.querySelector(nextSelector);

    const updateNav = () => {
        setSwiperNavState(prevButton, swiper.isBeginning);
        setSwiperNavState(nextButton, swiper.isEnd);
    };

    swiper.on('init', updateNav);
    swiper.on('slideChange', updateNav);
    swiper.on('reachBeginning', updateNav);
    swiper.on('reachEnd', updateNav);
    updateNav();
}

setupSwiperNav(homeServicesSwiper, '.home-services-prev', '.home-services-next');
setupSwiperNav(homeTestimonialsSwiper, '.home-testimonials-prev', '.home-testimonials-next');
setupSwiperNav(homeTeamSwiper, '.home-team-prev', '.home-team-next');
setupSwiperNav(coreValuesSwiper, '.core-values-prev', '.core-values-next');

function toggleFAQ(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('i');
    const isExpanded = button.getAttribute('aria-expanded') === 'true';

    // Close all other FAQ items
    document.querySelectorAll('.faq-content').forEach(item => {
        if (item !== content) {
            item.classList.add('hidden');
            const otherButton = item.previousElementSibling;
            const otherIcon = otherButton.querySelector('i');
            otherButton.setAttribute('aria-expanded', 'false');
            otherIcon.classList.remove('rotate-180');
        }
    });

    // Toggle current FAQ item
    if (isExpanded) {
        content.classList.add('hidden');
        button.setAttribute('aria-expanded', 'false');
        icon.classList.remove('rotate-180');
    } else {
        content.classList.remove('hidden');
        button.setAttribute('aria-expanded', 'true');
        icon.classList.add('rotate-180');
    }
}

// Keyboard navigation support
document.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' || e.key === ' ') {
        if (e.target.closest('button[onclick*="toggleFAQ"]')) {
            e.preventDefault();
            e.target.click();
        }
    }
});
</script>

