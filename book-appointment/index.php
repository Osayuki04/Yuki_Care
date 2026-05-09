<?php
session_start();
$page_title = "Book Appointment";
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
                        Book Your Appointment
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto lg:mx-0" data-aos="fade-up" data-aos-delay="200">
                        Schedule your consultation with our expert medical team. Quick, easy, and secure online booking available 24/7.
                    </p>
                    <div class="flex flex-wrap gap-3 justify-center lg:justify-start mb-8" data-aos="fade-up" data-aos-delay="400">
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">24/7 Booking</span>
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">Expert Doctors</span>
                        <span class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">Instant Confirmation</span>
                    </div>
                </div>

                <!-- Image Side -->
                <div class="relative" data-aos="fade-left" data-aos-delay="300">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img src="../images/hero.jpg" alt="Book Appointment at Yuki Care Hospital" class="w-full h-[500px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-600/50 to-transparent"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Quick & Easy Booking</h3>
                                <p class="text-gray-600 mb-4">Schedule your appointment in just a few minutes with our streamlined booking system.</p>
                                <div class="flex items-center text-primary-600 font-semibold">
                                    <i class="fas fa-clock mr-2"></i>
                                    <span>Available 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comprehensive Booking Form Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="relative inline-block mb-6">
                    <img src="../images/logo.png" alt="Yuki Care Hospital Logo" class="w-16 h-16 mx-auto">
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Complete Your Booking</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Fill out the form below to schedule your appointment and create your patient profile
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Booking Form -->
                <div data-aos="fade-right">
                    <div class="bg-gradient-to-br from-yuki-50 to-primary-50 rounded-3xl p-8 shadow-lg">
                        <div class="relative mb-6">
                            <img src="../images/vision.jfif" alt="Patient Registration" class="w-full h-48 object-cover rounded-2xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-yuki-600/30 to-transparent rounded-2xl"></div>
                            <div class="absolute bottom-4 left-4">
                                <div class="bg-white/90 backdrop-blur-sm rounded-lg px-4 py-2">
                                    <h3 class="text-lg font-bold text-gray-900">Patient Registration & Booking</h3>
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
                            <!-- Personal Information Section -->
                            <div class="bg-white/50 rounded-xl p-6">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-user mr-2 text-yuki-600"></i>
                                    Personal Information
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            First Name <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="first_name" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" 
                                               value="<?php echo htmlspecialchars($_SESSION['appointment_data']['first_name'] ?? ''); ?>">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Middle Name
                                        </label>
                                        <input type="text" name="middle_name" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" 
                                               value="<?php echo htmlspecialchars($_SESSION['appointment_data']['middle_name'] ?? ''); ?>">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Last Name <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" name="last_name" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" 
                                               value="<?php echo htmlspecialchars($_SESSION['appointment_data']['last_name'] ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Date of Birth <span class="text-red-500">*</span>
                                        </label>
                                        <input type="date" name="date_of_birth" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" 
                                               value="<?php echo htmlspecialchars($_SESSION['appointment_data']['date_of_birth'] ?? ''); ?>">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Gender <span class="text-red-500">*</span>
                                        </label>
                                        <select name="gender" required 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300">
                                            <option value="">Select Gender</option>
                                            <?php $selectedGender = $_SESSION['appointment_data']['gender'] ?? ''; ?>
                                            <option value="male" <?php echo ($selectedGender === 'male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="female" <?php echo ($selectedGender === 'female') ? 'selected' : ''; ?>>Female</option>
                                            <option value="other" <?php echo ($selectedGender === 'other') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information Section -->
                            <div class="bg-white/50 rounded-xl p-6">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-phone mr-2 text-yuki-600"></i>
                                    Contact Information
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Email Address <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" name="email" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" 
                                               value="<?php echo htmlspecialchars($_SESSION['appointment_data']['email'] ?? ''); ?>">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Phone Number <span class="text-red-500">*</span>
                                        </label>
                                        <input type="tel" name="phone" required 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" 
                                               value="<?php echo htmlspecialchars($_SESSION['appointment_data']['phone'] ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Emergency Contact
                                    </label>
                                    <input type="tel" name="emergency_contact" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" 
                                           value="<?php echo htmlspecialchars($_SESSION['appointment_data']['emergency_contact'] ?? ''); ?>">
                                </div>
                            </div>

                            <!-- Address Section -->
                            <div class="bg-white/50 rounded-xl p-6">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-yuki-600"></i>
                                    Address Information
                                </h4>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Full Address <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="address" rows="3" required 
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300" 
                                              placeholder="Enter complete address including street, city, state, country"><?php echo htmlspecialchars($_SESSION['appointment_data']['address'] ?? ''); ?></textarea>
                                </div>
                            </div>

                            <!-- Medical Information Section -->
                            <div class="bg-white/50 rounded-xl p-6">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-stethoscope mr-2 text-yuki-600"></i>
                                    Medical Information
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Preferred Appointment Date
                                        </label>
                                        <input type="date" name="preferred_date"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300"
                                               value="<?php echo htmlspecialchars($_SESSION['appointment_data']['preferred_date'] ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Medical Notes/Concerns
                                    </label>
                                    <textarea name="notes" rows="4"
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300"
                                              placeholder="Please describe any symptoms, medical history, or specific concerns..."><?php echo htmlspecialchars($_SESSION['appointment_data']['notes'] ?? ''); ?></textarea>
                                </div>
                            </div>

                            <!-- Patient Portal Access Section -->
                            <div class="bg-white/50 rounded-xl p-6">
                                <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-key mr-2 text-yuki-600"></i>
                                    Patient Portal Access (Optional)
                                </h4>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Password for Patient Portal
                                    </label>
                                    <input type="password" name="password"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yuki-500 focus:border-transparent transition-all duration-300"
                                           placeholder="Create a password for your patient portal (minimum 6 characters)">
                                    <p class="text-sm text-gray-500 mt-1">Leave blank if you don't want to create a patient portal account</p>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-gradient-to-r from-yuki-600 to-primary-600 text-white py-4 px-6 rounded-lg font-semibold hover:from-yuki-700 hover:to-primary-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-calendar-check mr-2"></i>Book Appointment & Register
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Information & Benefits Column -->
                <div data-aos="fade-left">
                    <div class="space-y-8">
                        <!-- Booking Benefits -->
                        <div class="bg-white rounded-3xl p-8 shadow-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-star mr-3 text-yuki-600"></i>
                                Why Book With Us?
                            </h3>
                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="bg-yuki-100 rounded-full p-3 mr-4 flex-shrink-0">
                                        <i class="fas fa-clock text-yuki-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold mb-2">24/7 Online Booking</h4>
                                        <p class="text-gray-600">Schedule your appointment anytime, anywhere with our convenient online booking system.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-primary-100 rounded-full p-3 mr-4 flex-shrink-0">
                                        <i class="fas fa-user-md text-primary-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold mb-2">Expert Medical Team</h4>
                                        <p class="text-gray-600">Access to highly qualified doctors and specialists across all medical departments.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-secondary-100 rounded-full p-3 mr-4 flex-shrink-0">
                                        <i class="fas fa-shield-alt text-secondary-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold mb-2">Secure & Confidential</h4>
                                        <p class="text-gray-600">Your personal and medical information is protected with the highest security standards.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-accent-100 rounded-full p-3 mr-4 flex-shrink-0">
                                        <i class="fas fa-mobile-alt text-accent-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold mb-2">Instant Confirmation</h4>
                                        <p class="text-gray-600">Receive immediate confirmation and reminders for your scheduled appointments.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="bg-gradient-to-br from-yuki-600 to-primary-600 text-white rounded-3xl p-8">
                            <h3 class="text-2xl font-bold mb-6 flex items-center">
                                <i class="fas fa-phone mr-3"></i>
                                Need Help?
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="fas fa-phone-alt mr-3 text-white/80"></i>
                                    <div>
                                        <p class="font-semibold">Emergency Hotline</p>
                                        <p class="text-white/90">+234 7062 403852</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-envelope mr-3 text-white/80"></i>
                                    <div>
                                        <p class="font-semibold">Email Support</p>
                                        <p class="text-white/90">appointments@yukicare.com</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-3 text-white/80"></i>
                                    <div>
                                        <p class="font-semibold">Operating Hours</p>
                                        <p class="text-white/90">24/7 Emergency Services</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 pt-6 border-t border-white/20">
                                <p class="text-sm text-white/80">
                                    For urgent medical emergencies, please call our emergency hotline or visit our emergency department immediately.
                                </p>
                            </div>
                        </div>

                        <!-- Department Information -->
                        <div class="bg-white rounded-3xl p-8 shadow-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <i class="fas fa-hospital mr-3 text-yuki-600"></i>
                                Our Departments
                            </h3>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center">
                                    <i class="fas fa-heart text-red-500 mr-2"></i>
                                    <span>Cardiology</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-brain text-purple-500 mr-2"></i>
                                    <span>Neurology</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-baby text-pink-500 mr-2"></i>
                                    <span>Pediatrics</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-bone text-orange-500 mr-2"></i>
                                    <span>Orthopedics</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-female text-pink-600 mr-2"></i>
                                    <span>Maternity</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-eye text-blue-500 mr-2"></i>
                                    <span>Dermatology</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-ambulance text-red-600 mr-2"></i>
                                    <span>Emergency</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-stethoscope text-green-500 mr-2"></i>
                                    <span>General Medicine</span>
                                </div>
                            </div>
                        </div>
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
