                <div class="max-w-4xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">
                            <?php echo $isEdit ? 'Modify Patient Information' : 'Register New Patient'; ?>
                        </h1>
                        <p class="text-gray-600 ">
                            <?php echo $isEdit ? 'Update patient information in the hospital management system' : 'Add a new patient to the hospital management system'; ?>
                        </p>
                    </div>

                    <!-- Success/Error Messages -->
                    <?php if (isset($_SESSION['register_success'])): ?>
                        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                <?php echo htmlspecialchars($_SESSION['register_success']); ?>
                            </div>
                        </div>
                        <?php unset($_SESSION['register_success']); ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['register_errors'])): ?>
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                                <div>
                                    <?php foreach ($_SESSION['register_errors'] as $error): ?>
                                        <p><?php echo htmlspecialchars($error); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['register_errors']); ?>
                    <?php endif; ?>

                    <!-- Registration Form -->
                    <div class="bg-white  rounded-md shadow-sm border border-gray-200 ">
                        <div class="p-6 border-b border-gray-200 ">
                            <h2 class="text-xl font-semibold text-gray-900 ">Patient Information</h2>
                        </div>
                        
                        <form action="<?= url('admin/patients/store') ?>" method="POST" class="p-6 space-y-6">
                            <?php if ($isEdit): ?>
                                <input type="hidden" name="edit_patient_id" value="<?php echo $editPatientId; ?>">
                            <?php endif; ?>
                            <!-- Personal Information -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700  mb-2">
                                        First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="first_name" name="first_name" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($patientData['FirstName'] ?? '') : ($_SESSION['register_data']['first_name'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="middle_name" class="block text-sm font-medium text-gray-700  mb-2">
                                        Middle Name
                                    </label>
                                    <input type="text" id="middle_name" name="middle_name"
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($patientData['MiddleName'] ?? '') : ($_SESSION['register_data']['middle_name'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700  mb-2">
                                        Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="last_name" name="last_name" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($patientData['Surname'] ?? '') : ($_SESSION['register_data']['last_name'] ?? '')); ?>">
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700  mb-2">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($patientData['Email'] ?? '') : ($_SESSION['register_data']['email'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700  mb-2">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" id="phone" name="phone" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($patientData['Contact'] ?? '') : ($_SESSION['register_data']['phone'] ?? '')); ?>">
                                </div>
                            </div>

                            <!-- Personal Details -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700  mb-2">
                                        Date of Birth <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($patientData['DateOfBirth'] ?? '') : ($_SESSION['register_data']['date_of_birth'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700  mb-2">
                                        Gender <span class="text-red-500">*</span>
                                    </label>
                                    <select id="gender" name="gender" required
                                            class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 ">
                                        <option value="">Select Gender</option>
                                        <?php
                                        $selectedGender = $isEdit ? ($patientData['Gender'] ?? '') : ($_SESSION['register_data']['gender'] ?? '');
                                        ?>
                                        <option value="male" <?php echo ($selectedGender === 'male') ? 'selected' : ''; ?>>Male</option>
                                        <option value="female" <?php echo ($selectedGender === 'female') ? 'selected' : ''; ?>>Female</option>
                                        <option value="other" <?php echo ($selectedGender === 'other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="emergency_contact" class="block text-sm font-medium text-gray-700  mb-2">
                                        Emergency Contact
                                    </label>
                                    <input type="tel" id="emergency_contact" name="emergency_contact"
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($patientData['EmergencyContact'] ?? '') : ($_SESSION['register_data']['emergency_contact'] ?? '')); ?>">
                                </div>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700  mb-2">
                                    Full Address <span class="text-red-500">*</span>
                                </label>
                                <textarea id="address" name="address" rows="3" required
                                          class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                          placeholder="Enter complete address including street, city, state, country"><?php echo htmlspecialchars($isEdit ? ($patientData['Address'] ?? '') : ($_SESSION['register_data']['address'] ?? '')); ?></textarea>
                            </div>

                            <!-- Medical Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="preferred_date" class="block text-sm font-medium text-gray-700  mb-2">
                                        Preferred Appointment Date
                                    </label>
                                    <input type="date" id="preferred_date" name="preferred_date"
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($patientData['PreferredDate'] ?? '') : ($_SESSION['register_data']['preferred_date'] ?? '')); ?>">
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700  mb-2">
                                    Patient Portal Password <?php echo $isEdit ? '' : '<span class="text-red-500">*</span>'; ?>
                                </label>
                                <input type="password" id="password" name="password" <?php echo $isEdit ? '' : 'required'; ?> minlength="6"
                                       class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                       placeholder="<?php echo $isEdit ? 'Leave blank to keep current password' : 'Minimum 6 characters'; ?>">
                                <p class="text-sm text-gray-500  mt-1">
                                    <?php echo $isEdit ? 'Leave blank to keep the current password, or enter a new password to change it' : 'This password will be used for patient portal access'; ?>
                                </p>
                            </div>

                            <!-- Notes -->
                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700  mb-2">
                                    Additional Notes
                                </label>
                                <textarea id="notes" name="notes" rows="3"
                                          class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                          placeholder="Any additional medical history or notes"><?php echo htmlspecialchars($isEdit ? ($patientData['Notes'] ?? '') : ($_SESSION['register_data']['notes'] ?? '')); ?></textarea>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200 ">
                                <a href="<?php echo $isEdit ? url('admin/patients/manage') : url('admin/dashboard'); ?>" class="px-6 py-3 border border-gray-300  text-gray-700  rounded-md hover:bg-gray-50  transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    <?php echo $isEdit ? 'Back to Manage Patients' : 'Back to Dashboard'; ?>
                                </a>
                                
                                <div class="flex space-x-3">
                                    <button type="reset" class="px-6 py-3 border border-gray-300  text-gray-700  rounded-md hover:bg-gray-50  transition-colors">
                                        <i class="fas fa-undo mr-2"></i>
                                        Reset Form
                                    </button>
                                    
                                    <button type="submit" class="px-6 py-3 bg-yuki-600  text-white rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                        <?php if ($isEdit): ?>
                                            <i class="fas fa-save mr-2"></i>
                                            Update Patient
                                        <?php else: ?>
                                            <i class="fas fa-user-plus mr-2"></i>
                                            Register Patient
                                        <?php endif; ?>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

    <script>
        // Clear form data from session
        <?php unset($_SESSION['register_data']); ?>
        
        // Set minimum date to today for preferred appointment date
        document.getElementById('preferred_date').min = new Date().toISOString().split('T')[0];
    </script>
