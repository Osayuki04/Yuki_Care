<?php
$page_title = "About Us";
include '../utility/header.php';
?>

    <!-- Hero Section - Side-by-side Layout -->
    <section class="relative bg-gradient-to-r from-yuki-600 to-primary-500 text-white py-20 min-h-[600px]">
        <div class="absolute inset-0 bg-primary-600/30"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content Side -->
                <div class="text-center lg:text-left">
                    <div class="mb-8">
                        <img src="../images/logo.png" alt="Yuki Care Hospital Logo" class="w-24 h-24 mx-auto lg:mx-0 mb-6">
                    </div>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6" data-aos="fade-up">
                        About Us
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto lg:mx-0" data-aos="fade-up" data-aos-delay="200">
                        Excellence in Healthcare, Compassion in Service
                    </p>
                    <div class="flex flex-wrap gap-3 justify-center lg:justify-start mb-8" data-aos="fade-up" data-aos-delay="400">
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">Since 2020</span>
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">150+ Doctors</span>
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">100K+ Patients</span>
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">NABH Certified</span>
                    </div>
                </div>

                <!-- Image Side -->
                <div class="relative" data-aos="fade-left" data-aos-delay="300">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img src="../images/about2.jpeg" alt="About Yuki Care Hospital" class="w-full h-[500px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-600/50 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Our Commitment</h3>
                                <p class="text-gray-600">Delivering world-class healthcare with compassion, innovation, and excellence at every step of your journey.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Cards -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Foundation</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Built on strong values and unwavering commitment to healthcare excellence</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                <!-- Mission Card -->
                <div class="bg-gradient-to-br from-yuki-600 to-primary-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[400px]" data-aos="fade-right">
                    <div class="absolute inset-0 bg-primary-700/20"></div>
                    <div class="relative">
                        <div class="flex items-center mb-6">
                            <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                <i class="fas fa-bullseye text-white text-2xl"></i>
                            </div>
                            <h3 class="text-3xl font-bold">Our Mission</h3>
                        </div>
                        <p class="text-xl mb-8 opacity-90 leading-relaxed">
                            To provide exceptional healthcare services that combine cutting-edge medical technology
                            with compassionate, patient-centered care. We are committed to improving the health and
                            well-being of our community through innovation, excellence, and dedication.
                        </p>
                        <div class="grid grid-cols-1 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 flex items-center">
                                <i class="fas fa-heart text-white text-xl mr-4"></i>
                                <span class="text-lg">Compassionate Care</span>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 flex items-center">
                                <i class="fas fa-microscope text-white text-xl mr-4"></i>
                                <span class="text-lg">Advanced Technology</span>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 flex items-center">
                                <i class="fas fa-users text-white text-xl mr-4"></i>
                                <span class="text-lg">Community Focus</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-3xl p-8 text-white relative overflow-hidden min-h-[400px]" data-aos="fade-left">
                    <div class="absolute inset-0 bg-secondary-700/20"></div>
                    <div class="relative">
                        <div class="flex items-center mb-6">
                            <div class="bg-white/20 backdrop-blur-sm rounded-xl w-16 h-16 flex items-center justify-center mr-4">
                                <i class="fas fa-eye text-white text-2xl"></i>
                            </div>
                            <h3 class="text-3xl font-bold">Our Vision</h3>
                        </div>
                        <p class="text-xl mb-8 opacity-90 leading-relaxed">
                            To be the leading healthcare provider in the region, recognized for our clinical excellence,
                            innovative treatments, and exceptional patient experience that sets new standards in medical care.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                <div class="text-3xl font-bold mb-2">4+</div>
                                <div class="text-sm opacity-80">Years of Excellence</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                <div class="text-3xl font-bold mb-2">150+</div>
                                <div class="text-sm opacity-80">Medical Staff</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                <div class="text-3xl font-bold mb-2">100K+</div>
                                <div class="text-sm opacity-80">Patients Served</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                                <div class="text-3xl font-bold mb-2">24/7</div>
                                <div class="text-sm opacity-80">Emergency Care</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Journey Timeline -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-primary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Journey</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Milestones in our commitment to healthcare excellence</p>
            </div>

            <!-- Timeline Container -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute top-1/2 left-0 right-0 h-1 bg-gradient-to-r from-yuki-600 via-primary-500 to-secondary-500 transform -translate-y-1/2 hidden lg:block"></div>

                <!-- Timeline Items -->
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-4">
                    <!-- 2020: Hospital Founded -->
                    <div class="relative" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-yuki-600">
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 lg:block hidden">
                                <div class="w-8 h-8 bg-yuki-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-hospital text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-yuki-600 mb-2">2020</div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Hospital Founded</h3>
                                <p class="text-gray-600 text-sm">Yuki Care Hospital established with a vision to provide world-class healthcare services to the community.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2021: First Major Expansion -->
                    <div class="relative" data-aos="fade-up" data-aos-delay="200">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-primary-600">
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 lg:block hidden">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-building text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600 mb-2">2021</div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Major Expansion</h3>
                                <p class="text-gray-600 text-sm">Added specialized wings for cardiology, neurology, and advanced surgical suites with robotic capabilities.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2022: Technology Integration -->
                    <div class="relative" data-aos="fade-up" data-aos-delay="300">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-secondary-600">
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 lg:block hidden">
                                <div class="w-8 h-8 bg-secondary-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-robot text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-secondary-600 mb-2">2022</div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Technology Integration</h3>
                                <p class="text-gray-600 text-sm">Implemented AI-powered diagnostics, telemedicine services, and electronic health records system.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2023: NABH Certification -->
                    <div class="relative" data-aos="fade-up" data-aos-delay="400">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-green-600">
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 lg:block hidden">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-award text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600 mb-2">2023</div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3">NABH Certification</h3>
                                <p class="text-gray-600 text-sm">Achieved NABH accreditation and ISO certification, recognizing our commitment to quality healthcare.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2024: Community Outreach -->
                    <div class="relative" data-aos="fade-up" data-aos-delay="500">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-purple-600">
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 lg:block hidden">
                                <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-hands-helping text-white text-sm"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600 mb-2">2024</div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3">Community Outreach</h3>
                                <p class="text-gray-600 text-sm">Launched mobile health clinics and free health camps, serving over 100,000 patients annually.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Medical Team Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Medical Team</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Meet our distinguished leadership team of world-class physicians and healthcare professionals
                </p>
            </div>

            <!-- Leadership Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-12">
                <!-- Dr. Jane Doe - Chief Medical Officer -->
                <div class="bg-gradient-to-br from-yuki-50 to-primary-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/dr1.jpg" alt="Dr. Jane Doe" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-yuki-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-yuki-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-user-md text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Jane Doe</h3>
                        <p class="text-yuki-600 font-semibold text-sm mb-2">Chief Medical Officer</p>
                        <p class="text-gray-600 text-xs">25+ years experience</p>
                    </div>
                </div>

                <!-- Mr. John Smith - CEO -->
                <div class="bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="100">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/dr2.jpg" alt="Mr. John Smith" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-secondary-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-secondary-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Mr. John Smith</h3>
                        <p class="text-secondary-600 font-semibold text-sm mb-2">Chief Executive Officer</p>
                        <p class="text-gray-600 text-xs">Healthcare leadership</p>
                    </div>
                </div>

                <!-- Dr. Riya Patel - Head of Surgery -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/dr3.png" alt="Dr. Riya Patel" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-purple-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-purple-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-scalpel text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Riya Patel</h3>
                        <p class="text-purple-600 font-semibold text-sm mb-2">Head of Surgery</p>
                        <p class="text-gray-600 text-xs">Robotic surgery expert</p>
                    </div>
                </div>

                <!-- Dr. Michael Chen - Head of Emergency -->
                <div class="bg-gradient-to-br from-red-50 to-orange-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="300">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/dr6.jpg" alt="Dr. Michael Chen" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-red-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-red-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-ambulance text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Michael Chen</h3>
                        <p class="text-red-600 font-semibold text-sm mb-2">Head of Emergency</p>
                        <p class="text-gray-600 text-xs">Emergency medicine</p>
                    </div>
                </div>

                <!-- Dr. Sarah Johnson - Chief of Cardiology -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="400">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/d7.jpg" alt="Dr. Sarah Johnson" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-blue-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-blue-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-heartbeat text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Sarah Johnson</h3>
                        <p class="text-blue-600 font-semibold text-sm mb-2">Chief of Cardiology</p>
                        <p class="text-gray-600 text-xs">Heart specialist</p>
                    </div>
                </div>
            </div>

            <!-- Additional Team Members -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Dr. David Kim - Head of Pediatrics -->
                <div class="bg-gradient-to-br from-green-50 to-teal-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="500">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/dr4.webp" alt="Dr. David Kim" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-green-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-green-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-baby text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. David Kim</h3>
                        <p class="text-green-600 font-semibold text-sm mb-2">Head of Pediatrics</p>
                        <p class="text-gray-600 text-xs">Children's healthcare</p>
                    </div>
                </div>

                <!-- Dr. Lisa Thompson - Head of Neurology -->
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="600">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/d8.jpg" alt="Dr. Lisa Thompson" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-indigo-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-indigo-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-brain text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Lisa Thompson</h3>
                        <p class="text-indigo-600 font-semibold text-sm mb-2">Head of Neurology</p>
                        <p class="text-gray-600 text-xs">Brain specialist</p>
                    </div>
                </div>

                <!-- Dr. Robert Wilson - Chief of Oncology -->
                <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="700">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/dr5.webp" alt="Dr. Robert Wilson" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-pink-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-pink-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-ribbon text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Robert Wilson</h3>
                        <p class="text-pink-600 font-semibold text-sm mb-2">Chief of Oncology</p>
                        <p class="text-gray-600 text-xs">Cancer specialist</p>
                    </div>
                </div>

                <!-- Dr. Emily Rodriguez - Head of Radiology -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="800">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/d9.jpg" alt="Dr. Emily Rodriguez" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-yellow-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-yellow-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-x-ray text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Emily Rodriguez</h3>
                        <p class="text-yellow-600 font-semibold text-sm mb-2">Head of Radiology</p>
                        <p class="text-gray-600 text-xs">Imaging expert</p>
                    </div>
                </div>

                <!-- Dr. Amanda Foster - Chief Nursing Officer -->
                <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="zoom-in" data-aos-delay="900">
                    <div class="text-center">
                        <div class="relative mb-4">
                            <img src="../images/d10.webp" alt="Dr. Amanda Foster" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-teal-600">
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                <div class="bg-teal-600 rounded-full w-8 h-8 flex items-center justify-center">
                                    <i class="fas fa-user-nurse text-white text-sm"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Dr. Amanda Foster</h3>
                        <p class="text-teal-600 font-semibold text-sm mb-2">Chief Nursing Officer</p>
                        <p class="text-gray-600 text-xs">Nursing leadership</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Grid -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-primary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Core Values</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    The principles that guide everything we do in delivering exceptional healthcare
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Compassion -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up">
                    <div class="text-center">
                        <div class="bg-gradient-to-r from-red-500 to-pink-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-heart text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Compassion</h3>
                        <p class="text-gray-600 leading-relaxed">We treat every patient with empathy, kindness, and understanding, ensuring comfort during their healthcare journey.</p>
                    </div>
                </div>

                <!-- Excellence -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center">
                        <div class="bg-gradient-to-r from-yuki-600 to-primary-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Excellence</h3>
                        <p class="text-gray-600 leading-relaxed">We strive for the highest standards in medical care, continuously improving our services and outcomes.</p>
                    </div>
                </div>

                <!-- Integrity -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center">
                        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Integrity</h3>
                        <p class="text-gray-600 leading-relaxed">We maintain the highest ethical standards, building trust through transparency and honest communication.</p>
                    </div>
                </div>

                <!-- Collaboration -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-center">
                        <div class="bg-gradient-to-r from-green-500 to-teal-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-handshake text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Collaboration</h3>
                        <p class="text-gray-600 leading-relaxed">We work together as a unified team, fostering partnerships that enhance patient care and outcomes.</p>
                    </div>
                </div>

                <!-- Education -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-center">
                        <div class="bg-gradient-to-r from-secondary-500 to-yellow-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Education</h3>
                        <p class="text-gray-600 leading-relaxed">We promote continuous learning and knowledge sharing to advance medical science and patient care.</p>
                    </div>
                </div>

                <!-- Community -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="500">
                    <div class="text-center">
                        <div class="bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Community</h3>
                        <p class="text-gray-600 leading-relaxed">We are committed to serving our community and improving public health through outreach and education.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Stats -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Yuki Care</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our achievements and certifications reflect our commitment to excellence in healthcare
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- 20+ Specialties -->
                <div class="text-center p-8 bg-gradient-to-br from-yuki-50 to-primary-50 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up">
                    <div class="bg-yuki-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-stethoscope text-white text-2xl"></i>
                    </div>
                    <div class="text-4xl font-bold text-yuki-600 mb-2">20+</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Specialties</h3>
                    <p class="text-gray-600 text-sm">Comprehensive medical specialties under one roof</p>
                </div>

                <!-- 150+ Doctors -->
                <div class="text-center p-8 bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-secondary-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-md text-white text-2xl"></i>
                    </div>
                    <div class="text-4xl font-bold text-secondary-600 mb-2">150+</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Doctors</h3>
                    <p class="text-gray-600 text-sm">Expert physicians and specialists</p>
                </div>

                <!-- 100K+ Patients -->
                <div class="text-center p-8 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-blue-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <div class="text-4xl font-bold text-blue-600 mb-2">100K+</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Patients</h3>
                    <p class="text-gray-600 text-sm">Patients served annually with excellence</p>
                </div>

                <!-- NABH & ISO Certified -->
                <div class="text-center p-8 bg-gradient-to-br from-green-50 to-teal-50 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="bg-green-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-award text-white text-2xl"></i>
                    </div>
                    <div class="text-2xl font-bold text-green-600 mb-2">NABH</div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Certified</h3>
                    <p class="text-gray-600 text-sm">NABH & ISO certified for quality assurance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Infrastructure/Facilities -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-primary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">World-Class Infrastructure</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    State-of-the-art facilities designed for optimal patient care and comfort
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- ICU & Emergency Wing -->
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-right">
                    <div class="relative mb-6">
                        <img src="../images/icu.jfif" alt="ICU & Emergency Wing" class="w-full h-48 object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-600/30 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="bg-red-600 rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fas fa-ambulance text-white text-lg"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">ICU & Emergency Wing</h3>
                    <p class="text-gray-600 mb-4">24/7 critical care with advanced life support systems and rapid response capabilities.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• 50-bed ICU with monitoring systems</li>
                        <li>• Emergency trauma center</li>
                        <li>• Rapid response team</li>
                    </ul>
                </div>

                <!-- Operation Theaters -->
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-left">
                    <div class="relative mb-6">
                        <img src="../images/mission.jpg" alt="Operation Theaters" class="w-full h-48 object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-600/30 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="bg-blue-600 rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fas fa-cut text-white text-lg"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Operation Theaters</h3>
                    <p class="text-gray-600 mb-4">12 state-of-the-art operating suites with robotic surgery capabilities and advanced imaging.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Robotic surgery systems</li>
                        <li>• Minimally invasive procedures</li>
                        <li>• Advanced surgical imaging</li>
                    </ul>
                </div>

                <!-- Diagnostic Labs -->
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-right" data-aos-delay="200">
                    <div class="relative mb-6">
                        <img src="../images/vision.jfif" alt="Diagnostic Labs" class="w-full h-48 object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-green-600/30 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="bg-green-600 rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fas fa-microscope text-white text-lg"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Diagnostic Labs</h3>
                    <p class="text-gray-600 mb-4">Comprehensive diagnostic services with advanced laboratory equipment and imaging technology.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• MRI, CT, and ultrasound</li>
                        <li>• 24/7 laboratory services</li>
                        <li>• Digital pathology</li>
                    </ul>
                </div>

                <!-- Patient Rooms -->
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-left" data-aos-delay="200">
                    <div class="relative mb-6">
                        <img src="../images/pr.jfif" alt="Patient Rooms" class="w-full h-48 object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-600/30 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-4 left-4">
                            <div class="bg-purple-600 rounded-full w-12 h-12 flex items-center justify-center">
                                <i class="fas fa-bed text-white text-lg"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Patient Rooms</h3>
                    <p class="text-gray-600 mb-4">Comfortable and modern patient accommodations designed for healing and recovery.</p>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>• Private and semi-private rooms</li>
                        <li>• Family accommodation</li>
                        <li>• Modern amenities</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials/Patient Stories -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Patient Stories</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Hear from our patients about their experiences with our compassionate care
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gradient-to-br from-yuki-50 to-primary-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up">
                    <div class="flex items-center mb-6">
                        <img src="../images/pat1.jpg" alt="Patient" class="w-16 h-16 rounded-full object-cover border-4 border-yuki-600 mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Sarah Mitchell</h4>
                            <p class="text-yuki-600 text-sm">Cardiac Surgery Patient</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex text-secondary-500 mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-600 italic leading-relaxed">
                            "The cardiac team at Yuki Care saved my life. Their expertise, compassion, and state-of-the-art facilities made my recovery smooth and comfortable. I'm forever grateful."
                        </p>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fas fa-quote-left mr-2"></i>Treated in March 2024
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <img src="../images/pat2.jfif" alt="Patient" class="w-16 h-16 rounded-full object-cover border-4 border-secondary-600 mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Michael Rodriguez</h4>
                            <p class="text-secondary-600 text-sm">Orthopedic Patient</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex text-secondary-500 mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-600 italic leading-relaxed">
                            "After my knee replacement surgery, the rehabilitation team helped me get back to playing tennis. The robotic surgery was amazing - minimal pain and quick recovery!"
                        </p>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fas fa-quote-left mr-2"></i>Treated in February 2024
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <img src="../images/pat3.webp" alt="Patient" class="w-16 h-16 rounded-full object-cover border-4 border-blue-600 mr-4">
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">Emily Chen</h4>
                            <p class="text-blue-600 text-sm">Maternity Patient</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex text-secondary-500 mb-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-gray-600 italic leading-relaxed">
                            "The maternity ward staff made the birth of my daughter a beautiful experience. The NICU team was exceptional when we needed their care. Thank you, Yuki Care!"
                        </p>
                    </div>
                    <div class="text-xs text-gray-500">
                        <i class="fas fa-quote-left mr-2"></i>Treated in January 2024
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
                    Ready to Experience Excellence?
                </h2>
                <p class="text-xl md:text-2xl mb-12 max-w-3xl mx-auto opacity-90" data-aos="fade-up" data-aos-delay="200">
                    Join thousands of patients who trust Yuki Care for their healthcare needs. Let us be your partner in health and wellness.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                <!-- Meet Our Team -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-300 group">
                    <div class="bg-white/20 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">View Team</h3>
                    <p class="text-white/80 mb-6">Connect with our expert medical professionals</p>
                    <a href="../services/index.php#team" class="bg-secondary-500 hover:bg-secondary-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 inline-block transform hover:scale-105">
                        View Team
                    </a>
                </div>

                <!-- Contact -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-300 group">
                    <div class="bg-white/20 rounded-xl w-16 h-16 flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Contact Us</h3>
                    <p class="text-white/80 mb-6">Get in touch with our patient care team</p>
                    <a href="../contact/index.php" class="bg-secondary-500 hover:bg-secondary-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 inline-block transform hover:scale-105">
                        Contact Us
                    </a>
                </div>
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
