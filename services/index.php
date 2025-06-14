<?php
$page_title = "Medical Services";
include '../utility/header.php';
?>

    <!-- Hero Section - Side-by-side Layout -->
    <section class="relative bg-gradient-to-r from-yuki-600 to-primary-500 text-white py-20 min-h-[500px]">
        <div class="absolute inset-0 bg-primary-600/30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content Side -->
                <div class="text-center lg:text-left">
                    <div class="mb-6">
                        <img src="../images/logo.png" alt="Yuki Care Hospital Logo" class="w-20 h-20 mx-auto lg:mx-0 mb-4">
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6" data-aos="fade-up">
                        Our Medical Services
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto lg:mx-0" data-aos="fade-up" data-aos-delay="200">
                        Compassionate care. Comprehensive care.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8" data-aos="fade-up" data-aos-delay="400">
                        <a href="../book-appointment/" class="bg-secondary-500 hover:bg-secondary-600 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                            Book Appointment
                        </a>
                        <a href="../contact/index.php" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-8 py-4 rounded-lg font-semibold border border-white/30 transition-all duration-300">
                            Contact Us
                        </a>
                    </div>
                </div>

                <!-- Image Side -->
                <div class="relative" data-aos="fade-left" data-aos-delay="300">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img src="../images/s1.jpg" alt="Medical Services Hero" class="w-full h-[400px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-600/50 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6">
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-white/90 text-primary-600 px-3 py-1 rounded-full text-sm font-medium">24/7 Emergency Care</span>
                                <span class="bg-white/90 text-primary-600 px-3 py-1 rounded-full text-sm font-medium">Advanced Technology</span>
                                <span class="bg-white/90 text-primary-600 px-3 py-1 rounded-full text-sm font-medium">Expert Medical Team</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Categories Grid -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Comprehensive Medical Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Delivering exceptional healthcare across all specialties with cutting-edge technology and compassionate care</p>
            </div>

            <!-- Primary Care -->
            <div class="mb-16" data-aos="fade-up">
                <div class="bg-gradient-to-r from-yuki-600 to-primary-500 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-primary-600/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-user-md text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Primary Care</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Your first point of contact for comprehensive healthcare, preventive care, and ongoing health management.</p>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-stethoscope mr-2"></i>General Medicine
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-home mr-2"></i>Family Medicine
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-child mr-2"></i>Pediatrics
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-user-friends mr-2"></i>Geriatrics
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="../images/s2.jfif" alt="Primary Care Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-600/30 to-transparent rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Specialty Care -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-r from-secondary-500 to-secondary-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-secondary-600/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div class="order-2 lg:order-1 relative">
                            <img src="../images/s3.jfif" alt="Specialty Care Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-secondary-600/30 to-transparent rounded-2xl"></div>
                        </div>
                        <div class="order-1 lg:order-2">
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-heartbeat text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Specialty Care</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Advanced specialized medical care from expert physicians using the latest diagnostic and treatment technologies.</p>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-heart mr-2"></i>Cardiology
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-lungs mr-2"></i>Pulmonology
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-brain mr-2"></i>Neurology
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-dna mr-2"></i>Endocrinology
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-stomach mr-2"></i>Gastroenterology
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-bone mr-2"></i>Rheumatology
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Women's Health -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-pink-500 to-rose-500 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-pink-600/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-female text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Women's Health</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Comprehensive women's healthcare services from adolescence through menopause and beyond.</p>
                            <div class="grid grid-cols-1 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-baby mr-2"></i>Obstetrics & Gynecology
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-heart mr-2"></i>Maternity Care
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-ribbon mr-2"></i>Breast Health
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="../images/s4.jpg" alt="Women's Health Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-pink-600/30 to-transparent rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Surgical & Emergency Services -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-primary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Surgical Services -->
            <div class="mb-16" data-aos="fade-up">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-blue-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-scalpel text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Surgical Services</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Advanced surgical procedures performed by expert surgeons using state-of-the-art technology and minimally invasive techniques.</p>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-cut mr-2"></i>General Surgery
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-ear mr-2"></i>ENT Surgery
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-bone mr-2"></i>Orthopedic Surgery
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-brain mr-2"></i>Neurosurgery
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-magic mr-2"></i>Plastic Surgery
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-robot mr-2"></i>Robotic Surgery
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="../images/s4.jfif" alt="Surgical Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-700/30 to-transparent rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mental Health Services -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-r from-purple-600 to-violet-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-purple-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div class="order-2 lg:order-1 relative">
                            <img src="../images/s6.jpg" alt="Mental Health Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-700/30 to-transparent rounded-2xl"></div>
                        </div>
                        <div class="order-1 lg:order-2">
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-brain text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Mental Health Services</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Comprehensive mental health care with compassionate support for emotional well-being and psychological health.</p>
                            <div class="grid grid-cols-1 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-user-md mr-2"></i>Psychiatry
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-comments mr-2"></i>Counseling & Therapy
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-heart mr-2"></i>Addiction Treatment
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diagnostic Services -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-teal-600 to-cyan-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-teal-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-microscope text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Diagnostic Services</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Advanced diagnostic testing and medical imaging services for accurate diagnosis and treatment planning.</p>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-vial mr-2"></i>Laboratory Tests
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-x-ray mr-2"></i>X-ray Imaging
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-circle-notch mr-2"></i>CT Scans
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-magnet mr-2"></i>MRI Imaging
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-sound mr-2"></i>Ultrasound
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-heartbeat mr-2"></i>ECG/EEG/Endoscopy
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="../images/vision.jfif" alt="Diagnostic Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-teal-700/30 to-transparent rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency & Critical Care -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Emergency & Urgent Care -->
            <div class="mb-16" data-aos="fade-up">
                <div class="bg-gradient-to-r from-red-600 to-orange-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-red-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-ambulance text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Emergency & Urgent Care</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">24/7 emergency medical services with rapid response teams and advanced trauma care capabilities.</p>
                            <div class="grid grid-cols-1 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-hospital mr-2"></i>24/7 Emergency Room
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-ambulance mr-2"></i>Ambulance Services
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-user-injured mr-2"></i>Trauma Care
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="../images/s7.jfif" alt="Emergency Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-red-700/30 to-transparent rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inpatient & Outpatient Services -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-green-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div class="order-2 lg:order-1 relative">
                            <img src="../images/s8.webp" alt="Inpatient & Outpatient Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-green-700/30 to-transparent rounded-2xl"></div>
                        </div>
                        <div class="order-1 lg:order-2">
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-bed text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Inpatient & Outpatient Services</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Comprehensive care options from short-term outpatient visits to extended inpatient stays with comfortable accommodations.</p>
                            <div class="grid grid-cols-1 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-hospital-alt mr-2"></i>Hospital Wards
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-procedures mr-2"></i>Day Surgery Units
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-clinic-medical mr-2"></i>Outpatient Clinics
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pharmacy Services -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-orange-600 to-amber-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-orange-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-pills text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Pharmacy Services</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Full-service pharmacy with prescription management, medication counseling, and specialized pharmaceutical care.</p>
                            <div class="grid grid-cols-1 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-prescription mr-2"></i>In-House Pharmacy
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-clipboard-list mr-2"></i>Prescription Management
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-redo mr-2"></i>Medication Refills
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="../images/s9.jfif" alt="Pharmacy Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-orange-700/30 to-transparent rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Specialized Services -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-primary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Rehabilitation & Therapy -->
            <div class="mb-16" data-aos="fade-up">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-indigo-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-dumbbell text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Rehabilitation & Therapy</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Comprehensive rehabilitation services to help patients recover and regain independence after injury or illness.</p>
                            <div class="grid grid-cols-1 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-walking mr-2"></i>Physical Therapy
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-comments mr-2"></i>Speech Therapy
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-hands mr-2"></i>Occupational Therapy
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="../images/s10.jfif" alt="Rehabilitation Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-indigo-700/30 to-transparent rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Children's Services -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-r from-pink-600 to-rose-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-pink-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div class="order-2 lg:order-1 relative">
                            <img src="../images/s11.jpeg" alt="Children's Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-pink-700/30 to-transparent rounded-2xl"></div>
                        </div>
                        <div class="order-1 lg:order-2">
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-child text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Children's Services</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Specialized pediatric care designed specifically for infants, children, and adolescents in a child-friendly environment.</p>
                            <div class="grid grid-cols-1 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-ambulance mr-2"></i>Pediatric Emergency
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-baby mr-2"></i>NICU (Neonatal ICU)
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-user-md mr-2"></i>Pediatric Specialists
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support & Administrative Services -->
            <div class="mb-16" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-slate-600 to-gray-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[450px]">
                    <div class="absolute inset-0 bg-slate-700/20"></div>
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                    <i class="fas fa-hands-helping text-white text-2xl"></i>
                                </div>
                                <h3 class="text-3xl font-bold">Support & Administrative Services</h3>
                            </div>
                            <p class="text-xl mb-6 opacity-90">Comprehensive support services to ensure a smooth healthcare experience from admission to discharge and beyond.</p>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-apple-alt mr-2"></i>Nutrition & Dietetics
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-heart mr-2"></i>Palliative Care
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-users mr-2"></i>Social Work
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-file-invoice-dollar mr-2"></i>Insurance & Billing
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-clipboard-check mr-2"></i>Health Packages
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3">
                                    <i class="fas fa-concierge-bell mr-2"></i>Patient Services
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <img src="../images/s12.jfif" alt="Support Services" class="w-full h-[300px] object-cover rounded-2xl shadow-lg">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-700/30 to-transparent rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-20 bg-gradient-to-r from-yuki-600 to-primary-500 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-primary-600/30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-8">
                <img src="../images/logo.png" alt="Yuki Care Hospital Logo" class="w-24 h-24 mx-auto mb-6">
                <h2 class="text-4xl md:text-5xl font-bold mb-6" data-aos="fade-up">
                    Ready to Experience Excellence in Healthcare?
                </h2>
                <p class="text-xl md:text-2xl mb-12 max-w-3xl mx-auto opacity-90" data-aos="fade-up" data-aos-delay="200">
                    Take the first step towards better health with our comprehensive medical services and compassionate care team.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12" data-aos="fade-up" data-aos-delay="400">
                <!-- Find a Doctor -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-300 group">
                    <div class="bg-white/20 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-md text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Find a Doctor</h3>
                    <p class="text-white/80 mb-6">Connect with our expert physicians and specialists</p>
                    <a href="../contact/index.php" class="bg-secondary-500 hover:bg-secondary-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 inline-block transform hover:scale-105">
                        Search Doctors
                    </a>
                </div>

                <!-- Book Appointment -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-300 group">
                    <div class="bg-white/20 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-calendar-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Book Now</h3>
                    <p class="text-white/80 mb-6">Schedule your appointment online or by phone</p>
                    <a href="../book-appointment/" class="bg-secondary-500 hover:bg-secondary-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 inline-block transform hover:scale-105">
                        Book Appointment
                    </a>
                </div>

                <!-- Contact Us -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-300 group">
                    <div class="bg-white/20 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Contact</h3>
                    <p class="text-white/80 mb-6">Get in touch with our patient care team</p>
                    <a href="../contact/index.php" class="bg-secondary-500 hover:bg-secondary-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 inline-block transform hover:scale-105">
                        Contact Us
                    </a>
                </div>
            </div>

            <!-- Emergency Contact -->
            <div class="bg-red-600/20 backdrop-blur-sm rounded-2xl p-6 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="600">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-exclamation-triangle text-red-300 text-2xl mr-3"></i>
                    <h3 class="text-xl font-bold">Emergency Services</h3>
                </div>
                <p class="text-lg mb-4">For medical emergencies, call our 24/7 emergency hotline</p>
                <a href="tel:+1234567890" class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg font-bold text-xl transition-all duration-300 inline-block">
                    <i class="fas fa-phone mr-2"></i>Emergency: (123) 456-7890
                </a>
            </div>
        </div>
    </section>

    <?php include '../utility/footer.php'; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>
