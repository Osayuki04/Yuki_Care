<?php
session_start();
$page_title = "Contact Us";
include '../utility/header.php';
?>

    <!-- Enhanced Hero Section - Side-by-side Layout -->
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
                        Contact Us
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto lg:mx-0" data-aos="fade-up" data-aos-delay="200">
                        We're here to help you with all your healthcare needs. Reach out to us anytime.
                    </p>
                    <div class="flex flex-wrap gap-3 justify-center lg:justify-start mb-8" data-aos="fade-up" data-aos-delay="400">
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">24/7 Support</span>
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">Multiple Locations</span>
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">Expert Care</span>
                    </div>
                </div>

                <!-- Image Side -->
                <div class="relative" data-aos="fade-left" data-aos-delay="300">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img src="../images/hero.jpg" alt="Contact Yuki Care Hospital" class="w-full h-[500px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-600/50 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Get in Touch</h3>
                                <p class="text-gray-600 mb-4">Our patient care team is available 24/7 to assist you with appointments, inquiries, and emergency support.</p>
                                <div class="flex items-center text-primary-600 font-semibold">
                                    <i class="fas fa-phone mr-2"></i>
                                    <span>Emergency: +234 7062 403852</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Emergency Contact -->
    <section class="py-16 bg-gradient-to-r from-red-600 to-red-700 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-red-800/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Emergency Info -->
                <div class="text-center lg:text-left">
                    <div class="flex items-center justify-center lg:justify-start mb-6">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full p-4 mr-4">
                            <i class="fas fa-exclamation-triangle text-3xl"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold mb-2">Medical Emergency?</h2>
                            <p class="text-xl opacity-90">Call our emergency hotline immediately</p>
                        </div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 mb-6">
                        <div class="text-center">
                            <div class="text-4xl font-bold mb-2">+234 7062 403852</div>
                            <p class="text-lg opacity-90">24/7 Emergency Room Direct Line</p>
                        </div>
                    </div>
                    <p class="text-lg opacity-80">Our emergency team is standing by to provide immediate medical attention when you need it most.</p>
                </div>

                <!-- Emergency Image -->
                <div class="relative" data-aos="fade-left">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl">
                        <img src="../images/s7.jfif" alt="Emergency Medical Care" class="w-full h-[300px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-700/40 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Contact Information -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header with Image -->
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="relative inline-block mb-6">
                    <img src="../images/logo.png" alt="Yuki Care Hospital Logo" class="w-16 h-16 mx-auto">
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Get in Touch</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    We're here to assist you with appointments, inquiries, and all your healthcare needs
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Enhanced Contact Form -->
                <div data-aos="fade-right">
                    <div class="bg-gradient-to-br from-yuki-50 to-primary-50 rounded-3xl p-8 shadow-lg">
                        <div class="relative mb-6">
                            <img src="../images/vision.jfif" alt="Contact Us" class="w-full h-48 object-cover rounded-2xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-yuki-600/30 to-transparent rounded-2xl"></div>
                            <div class="absolute bottom-4 left-4">
                                <div class="bg-white/90 backdrop-blur-sm rounded-lg px-4 py-2">
                                    <h3 class="text-lg font-bold text-gray-900">Patient Registration</h3>
                                </div>
                            </div>
                        </div>
                        <!-- Success/Error Messages -->
                        <?php if (isset($_SESSION['appointment_success'])): ?>
                            <div class="mb-6 bg-green-500/20 border border-green-400/30 text-green-800 px-4 py-3 rounded-xl backdrop-blur-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    <?php echo htmlspecialchars($_SESSION['appointment_success']); ?>
                                </div>
                            </div>
                            <?php unset($_SESSION['appointment_success']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['appointment_errors'])): ?>
                            <div class="mb-6 bg-red-500/20 border border-red-400/30 text-red-800 px-4 py-3 rounded-xl backdrop-blur-sm">
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

                        <form action="../auth/process-appointment.php" method="POST" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-user mr-2 text-yuki-600"></i>First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="first_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" value="<?php echo htmlspecialchars($_SESSION['appointment_data']['first_name'] ?? ''); ?>">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-user mr-2 text-yuki-600"></i>Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="last_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" value="<?php echo htmlspecialchars($_SESSION['appointment_data']['last_name'] ?? ''); ?>">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-envelope mr-2 text-yuki-600"></i>Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" value="<?php echo htmlspecialchars($_SESSION['appointment_data']['email'] ?? ''); ?>">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-phone mr-2 text-yuki-600"></i>Phone <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" value="<?php echo htmlspecialchars($_SESSION['appointment_data']['phone'] ?? ''); ?>">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-calendar mr-2 text-yuki-600"></i>Date of Birth <span class="text-red-500">*</span>
                                </label>
                                <input type="date" name="date_of_birth" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" value="<?php echo htmlspecialchars($_SESSION['appointment_data']['date_of_birth'] ?? ''); ?>">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-calendar-check mr-2 text-yuki-600"></i>Preferred Appointment Date
                                </label>
                                <input type="date" name="preferred_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" value="<?php echo htmlspecialchars($_SESSION['appointment_data']['preferred_date'] ?? ''); ?>">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-comment mr-2 text-yuki-600"></i>Additional Notes
                                </label>
                                <textarea name="notes" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" placeholder="Any additional medical history or specific concerns..."><?php echo htmlspecialchars($_SESSION['appointment_data']['notes'] ?? ''); ?></textarea>
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-yuki-600 to-primary-600 text-white py-4 px-6 rounded-lg font-semibold hover:from-yuki-700 hover:to-primary-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-user-plus mr-2"></i>Register Patient
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Enhanced Contact Details -->
                <div data-aos="fade-left">
                    <div class="relative mb-6">
                        <img src="../images/hero.jpg" alt="Hospital Contact" class="w-full h-48 object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-600/50 to-transparent rounded-2xl"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="bg-white/90 backdrop-blur-sm rounded-lg p-4">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Contact Information</h2>
                                <p class="text-gray-600">Multiple ways to reach our care team</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Main Hospital -->
                        <div class="bg-gradient-to-br from-yuki-50 to-primary-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <div class="bg-yuki-600 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                    <i class="fas fa-hospital text-white text-lg"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Main Hospital</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-yuki-600 mr-3"></i>
                                    <span class="text-gray-700">Gra Benin City, Edo State</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-yuki-600 mr-3"></i>
                                    <span class="text-gray-700">+234 7062 403852</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-yuki-600 mr-3"></i>
                                    <span class="text-gray-700">info@yukicare.com</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-globe text-yuki-600 mr-3"></i>
                                    <span class="text-gray-700">www.yukicare.com</span>
                                </div>
                            </div>
                        </div>

                        <!-- Departments -->
                        <div class="bg-white border border-gray-200 rounded-2xl p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Department Direct Lines</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Emergency Room:</span>
                                    <span class="font-medium">+234 7062 403852</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Cardiology:</span>
                                    <span class="font-medium">+234 7062 403853</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Neurology:</span>
                                    <span class="font-medium">+234 7062 403854</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pediatrics:</span>
                                    <span class="font-medium">+234 7062 403855</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Orthopedics:</span>
                                    <span class="font-medium">+234 7062 403856</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pharmacy:</span>
                                    <span class="font-medium">+234 7062 403857</span>
                                </div>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="bg-gradient-to-br from-accent-50 to-primary-50 rounded-2xl p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Hours of Operation</h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Emergency Room:</span>
                                    <span class="font-medium text-red-600">24/7</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Outpatient Services:</span>
                                    <span class="font-medium">6:00 AM - 10:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pharmacy:</span>
                                    <span class="font-medium">24/7</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Laboratory:</span>
                                    <span class="font-medium">24/7</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Imaging Center:</span>
                                    <span class="font-medium">6:00 AM - 11:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Map Integration -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-primary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Find Us</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Located in the heart of the medical district with easy access and ample parking
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Interactive Map -->
                <div class="bg-white rounded-3xl p-6 shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-right">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Interactive Map</h3>
                        <p class="text-gray-600">Click and drag to explore our location</p>
                    </div>
                    <!-- Google Maps Embed -->
                    <div class="relative rounded-2xl overflow-hidden shadow-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.0123456789!2d5.6037!3d6.3350!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMjAnMDYuMCJOIDXCsDM2JzEzLjMiRQ!5e0!3m2!1sen!2sng!4v1234567890123"
                            width="100%"
                            height="300"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-2xl">
                        </iframe>
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-yuki-600 mr-2"></i>
                                <span class="text-sm font-medium text-gray-900">Main Hospital</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Directions -->
                <div data-aos="fade-left">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Directions & Parking</h3>
                    
                    <div class="space-y-6">
                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <h4 class="font-semibold text-gray-900 mb-2">
                                <i class="fas fa-car text-primary-600 mr-2"></i>
                                By Car
                            </h4>
                            <p class="text-gray-600 text-sm">
                                Take Highway 101 to Medical District exit. Turn right on Healthcare Ave. 
                                Hospital will be on your left. Free parking available in our 5-level garage.
                            </p>
                        </div>

                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <h4 class="font-semibold text-gray-900 mb-2">
                                <i class="fas fa-bus text-secondary-600 mr-2"></i>
                                Public Transit
                            </h4>
                            <p class="text-gray-600 text-sm">
                                Metro Bus Lines 15, 22, and 45 stop directly in front of the hospital. 
                                Metro Rail Blue Line - Medical Center Station (2 blocks away).
                            </p>
                        </div>

                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <h4 class="font-semibold text-gray-900 mb-2">
                                <i class="fas fa-parking text-accent-600 mr-2"></i>
                                Parking Information
                            </h4>
                            <ul class="text-gray-600 text-sm space-y-1">
                                <li>• Free parking for patients and visitors</li>
                                <li>• Valet parking available (Main entrance)</li>
                                <li>• Electric vehicle charging stations</li>
                                <li>• Accessible parking on all levels</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comprehensive Locations Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="relative inline-block mb-6">
                    <img src="../images/logo.png" alt="Yuki Care Hospital Logo" class="w-16 h-16 mx-auto">
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Locations</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Multiple convenient locations to serve you better with specialized care and services
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Main Hospital Campus -->
                <div class="bg-gradient-to-br from-yuki-50 to-primary-50 rounded-3xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up">
                    <div class="relative mb-6">
                        <img src="../images/c.jfif" alt="Main Hospital Campus" class="w-full h-48 object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-yuki-600/30 to-transparent rounded-2xl"></div>
                        <div class="absolute top-4 right-4">
                            <div class="bg-yuki-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Main Campus
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Yuki Care Main Hospital</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-yuki-600 mr-3 mt-1"></i>
                            <div>
                                <p class="text-gray-700 font-medium">Gra Benin City</p>
                                <p class="text-gray-600 text-sm">Edo State, Nigeria</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-yuki-600 mr-3"></i>
                            <span class="text-gray-700">+234 7062 403852</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-yuki-600 mr-3"></i>
                            <span class="text-gray-700">main@yukicare.com</span>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4 mb-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Operating Hours:</h4>
                        <div class="text-sm text-gray-600 space-y-1">
                            <div class="flex justify-between">
                                <span>Emergency Room:</span>
                                <span class="font-medium text-red-600">24/7</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Outpatient:</span>
                                <span class="font-medium">6:00 AM - 10:00 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4 mb-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Specialties:</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-yuki-100 text-yuki-700 px-2 py-1 rounded text-xs">Emergency Care</span>
                            <span class="bg-yuki-100 text-yuki-700 px-2 py-1 rounded text-xs">Surgery</span>
                            <span class="bg-yuki-100 text-yuki-700 px-2 py-1 rounded text-xs">ICU</span>
                            <span class="bg-yuki-100 text-yuki-700 px-2 py-1 rounded text-xs">All Specialties</span>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Parking & Access:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Free 5-level parking garage</li>
                            <li>• Valet parking available</li>
                            <li>• Wheelchair accessible</li>
                            <li>• EV charging stations</li>
                        </ul>
                    </div>
                </div>

                <!-- Outpatient Center -->
                <div class="bg-gradient-to-br from-secondary-50 to-secondary-100 rounded-3xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative mb-6">
                        <img src="../images/c1.jpg" alt="Outpatient Center" class="w-full h-48 object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary-600/30 to-transparent rounded-2xl"></div>
                        <div class="absolute top-4 right-4">
                            <div class="bg-secondary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Outpatient
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Yuki Care Outpatient Center</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-secondary-600 mr-3 mt-1"></i>
                            <div>
                                <p class="text-gray-700 font-medium">Gra Benin City</p>
                                <p class="text-gray-600 text-sm">Edo State, Nigeria</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-secondary-600 mr-3"></i>
                            <span class="text-gray-700">+234 7062 403852</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-secondary-600 mr-3"></i>
                            <span class="text-gray-700">outpatient@yukicare.com</span>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4 mb-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Operating Hours:</h4>
                        <div class="text-sm text-gray-600 space-y-1">
                            <div class="flex justify-between">
                                <span>Mon-Fri:</span>
                                <span class="font-medium">7:00 AM - 8:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Weekends:</span>
                                <span class="font-medium">8:00 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4 mb-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Specialties:</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-secondary-100 text-secondary-700 px-2 py-1 rounded text-xs">Primary Care</span>
                            <span class="bg-secondary-100 text-secondary-700 px-2 py-1 rounded text-xs">Diagnostics</span>
                            <span class="bg-secondary-100 text-secondary-700 px-2 py-1 rounded text-xs">Lab Services</span>
                            <span class="bg-secondary-100 text-secondary-700 px-2 py-1 rounded text-xs">Imaging</span>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Parking & Access:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Free surface parking</li>
                            <li>• Ground floor access</li>
                            <li>• Public transit nearby</li>
                            <li>• Fully accessible</li>
                        </ul>
                    </div>
                </div>

                <!-- Specialty Clinic -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-3xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative mb-6">
                        <img src="../images/c3.jfif" alt="Specialty Clinic" class="w-full h-48 object-cover rounded-2xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-600/30 to-transparent rounded-2xl"></div>
                        <div class="absolute top-4 right-4">
                            <div class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                Specialty
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Yuki Care Specialty Clinic</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-blue-600 mr-3 mt-1"></i>
                            <div>
                                <p class="text-gray-700 font-medium">Gra Benin City</p>
                                <p class="text-gray-600 text-sm">Edo State, Nigeria</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-blue-600 mr-3"></i>
                            <span class="text-gray-700">+234 7062 403852</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-blue-600 mr-3"></i>
                            <span class="text-gray-700">specialty@yukicare.com</span>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4 mb-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Operating Hours:</h4>
                        <div class="text-sm text-gray-600 space-y-1">
                            <div class="flex justify-between">
                                <span>Mon-Fri:</span>
                                <span class="font-medium">8:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Saturday:</span>
                                <span class="font-medium">9:00 AM - 3:00 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4 mb-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Specialties:</h4>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Cardiology</span>
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Neurology</span>
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Oncology</span>
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Orthopedics</span>
                        </div>
                    </div>
                    <div class="bg-white/50 rounded-xl p-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Parking & Access:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Covered parking garage</li>
                            <li>• Elevator access</li>
                            <li>• Reserved patient parking</li>
                            <li>• Accessible entrances</li>
                        </ul>
                    </div>
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

        // Set minimum date to today for preferred appointment date
        document.addEventListener('DOMContentLoaded', function() {
            const preferredDateInput = document.querySelector('input[name="preferred_date"]');
            if (preferredDateInput) {
                preferredDateInput.min = new Date().toISOString().split('T')[0];
            }
        });

        // Clear form data from session
        <?php unset($_SESSION['appointment_data']); ?>
    </script>
</body>
</html>
