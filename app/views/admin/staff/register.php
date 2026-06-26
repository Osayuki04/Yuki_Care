                <div class="max-w-4xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">
                            <?php echo $isEdit ? 'Modify Staff Information' : 'Register New Staff'; ?>
                        </h1>
                        <p class="text-gray-600 ">
                            <?php echo $isEdit ? 'Update staff information in the hospital management system' : 'Add a new staff member to the hospital management system'; ?>
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
                            <h2 class="text-xl font-semibold text-gray-900 ">Staff Information</h2>
                        </div>
                        
                        <form action="<?= url('admin/staff/store') ?>" method="POST" class="p-6 space-y-6">
                            <?php if ($isEdit): ?>
                                <input type="hidden" name="edit_staff_id" value="<?php echo $editStaffId; ?>">
                            <?php endif; ?>
                            
                            <!-- Personal Information -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700  mb-2">
                                        First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="first_name" name="first_name" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($staffData['FirstName'] ?? '') : ($_SESSION['register_data']['first_name'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="middle_name" class="block text-sm font-medium text-gray-700  mb-2">
                                        Middle Name
                                    </label>
                                    <input type="text" id="middle_name" name="middle_name"
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($staffData['MiddleName'] ?? '') : ($_SESSION['register_data']['middle_name'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700  mb-2">
                                        Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="last_name" name="last_name" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($staffData['Surname'] ?? '') : ($_SESSION['register_data']['last_name'] ?? '')); ?>">
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
                                           value="<?php echo htmlspecialchars($isEdit ? ($staffData['Email'] ?? '') : ($_SESSION['register_data']['email'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700  mb-2">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" id="phone" name="phone" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($staffData['Contact'] ?? '') : ($_SESSION['register_data']['phone'] ?? '')); ?>">
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
                                           value="<?php echo htmlspecialchars($isEdit ? ($staffData['DateOfBirth'] ?? '') : ($_SESSION['register_data']['date_of_birth'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700  mb-2">
                                        Gender <span class="text-red-500">*</span>
                                    </label>
                                    <select id="gender" name="gender" required
                                            class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 ">
                                        <option value="">Select Gender</option>
                                        <?php 
                                        $selectedGender = $isEdit ? ($staffData['Gender'] ?? '') : ($_SESSION['register_data']['gender'] ?? '');
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
                                           value="<?php echo htmlspecialchars($isEdit ? ($staffData['EmergencyContact'] ?? '') : ($_SESSION['register_data']['emergency_contact'] ?? '')); ?>">
                                </div>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700  mb-2">
                                    Full Address <span class="text-red-500">*</span>
                                </label>
                                <textarea id="address" name="address" rows="3" required
                                          class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                          placeholder="Enter complete address including street, city, state, country"><?php echo htmlspecialchars($isEdit ? ($staffData['Address'] ?? '') : ($_SESSION['register_data']['address'] ?? '')); ?></textarea>
                            </div>

                            <!-- Staff Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="department" class="block text-sm font-medium text-gray-700  mb-2">
                                        Department <span class="text-red-500">*</span>
                                    </label>
                                    <select id="department" name="department" required
                                            class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 ">
                                        <option value="">Select Department</option>
                                        <?php 
                                        $selectedDepartment = $isEdit ? ($staffData['Department'] ?? '') : ($_SESSION['register_data']['department'] ?? '');
                                        ?>
                                        <option value="administration" <?php echo ($selectedDepartment === 'administration') ? 'selected' : ''; ?>>Administration</option>
                                        <option value="cardiology" <?php echo ($selectedDepartment === 'cardiology') ? 'selected' : ''; ?>>Cardiology</option>
                                        <option value="neurology" <?php echo ($selectedDepartment === 'neurology') ? 'selected' : ''; ?>>Neurology</option>
                                        <option value="maternity" <?php echo ($selectedDepartment === 'maternity') ? 'selected' : ''; ?>>Maternity</option>
                                        <option value="emergency" <?php echo ($selectedDepartment === 'emergency') ? 'selected' : ''; ?>>Emergency</option>
                                        <option value="general" <?php echo ($selectedDepartment === 'general') ? 'selected' : ''; ?>>General Medicine</option>
                                        <option value="pediatrics" <?php echo ($selectedDepartment === 'pediatrics') ? 'selected' : ''; ?>>Pediatrics</option>
                                        <option value="orthopedics" <?php echo ($selectedDepartment === 'orthopedics') ? 'selected' : ''; ?>>Orthopedics</option>
                                        <option value="dermatology" <?php echo ($selectedDepartment === 'dermatology') ? 'selected' : ''; ?>>Dermatology</option>
                                        <option value="nursing" <?php echo ($selectedDepartment === 'nursing') ? 'selected' : ''; ?>>Nursing</option>
                                        <option value="pharmacy" <?php echo ($selectedDepartment === 'pharmacy') ? 'selected' : ''; ?>>Pharmacy</option>
                                        <option value="laboratory" <?php echo ($selectedDepartment === 'laboratory') ? 'selected' : ''; ?>>Laboratory</option>
                                        <option value="radiology" <?php echo ($selectedDepartment === 'radiology') ? 'selected' : ''; ?>>Radiology</option>
                                        <option value="maintenance" <?php echo ($selectedDepartment === 'maintenance') ? 'selected' : ''; ?>>Maintenance</option>
                                        <option value="security" <?php echo ($selectedDepartment === 'security') ? 'selected' : ''; ?>>Security</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="hire_date" class="block text-sm font-medium text-gray-700  mb-2">
                                        Hire Date <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" id="hire_date" name="hire_date" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($staffData['HireDate'] ?? '') : ($_SESSION['register_data']['hire_date'] ?? '')); ?>">
                                </div>
                            </div>

                            <!-- Staff Details -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="staff_category" class="block text-sm font-medium text-gray-700  mb-2">
                                        Staff Category <span class="text-red-500">*</span>
                                    </label>
                                    <select id="staff_category" name="staff_category" required
                                            class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 ">
                                        <option value="">Select Category</option>
                                        <?php 
                                        $selectedCategory = $isEdit ? ($staffData['StaffCategory'] ?? '') : ($_SESSION['register_data']['staff_category'] ?? '');
                                        ?>
                                        <option value="medical" <?php echo ($selectedCategory === 'medical') ? 'selected' : ''; ?>>Medical</option>
                                        <option value="nursing" <?php echo ($selectedCategory === 'nursing') ? 'selected' : ''; ?>>Nursing</option>
                                        <option value="administrative" <?php echo ($selectedCategory === 'administrative') ? 'selected' : ''; ?>>Administrative</option>
                                        <option value="technical" <?php echo ($selectedCategory === 'technical') ? 'selected' : ''; ?>>Technical</option>
                                        <option value="support" <?php echo ($selectedCategory === 'support') ? 'selected' : ''; ?>>Support</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="staff_type" class="block text-sm font-medium text-gray-700  mb-2">
                                        Staff Type <span class="text-red-500">*</span>
                                    </label>
                                    <select id="staff_type" name="staff_type" required
                                            class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 ">
                                        <option value="">Select Type</option>
                                        <?php 
                                        $selectedType = $isEdit ? ($staffData['StaffType'] ?? '') : ($_SESSION['register_data']['staff_type'] ?? '');
                                        ?>
                                        <option value="full-time" <?php echo ($selectedType === 'full-time') ? 'selected' : ''; ?>>Full-time</option>
                                        <option value="part-time" <?php echo ($selectedType === 'part-time') ? 'selected' : ''; ?>>Part-time</option>
                                        <option value="contract" <?php echo ($selectedType === 'contract') ? 'selected' : ''; ?>>Contract</option>
                                        <option value="temporary" <?php echo ($selectedType === 'temporary') ? 'selected' : ''; ?>>Temporary</option>
                                        <option value="intern" <?php echo ($selectedType === 'intern') ? 'selected' : ''; ?>>Intern</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="staff_grade" class="block text-sm font-medium text-gray-700  mb-2">
                                        Staff Grade <span class="text-red-500">*</span>
                                    </label>
                                    <select id="staff_grade" name="staff_grade" required
                                            class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 ">
                                        <option value="">Select Grade</option>
                                        <?php 
                                        $selectedGrade = $isEdit ? ($staffData['StaffGrade'] ?? '') : ($_SESSION['register_data']['staff_grade'] ?? '');
                                        ?>
                                        <option value="junior" <?php echo ($selectedGrade === 'junior') ? 'selected' : ''; ?>>Junior</option>
                                        <option value="senior" <?php echo ($selectedGrade === 'senior') ? 'selected' : ''; ?>>Senior</option>
                                        <option value="lead" <?php echo ($selectedGrade === 'lead') ? 'selected' : ''; ?>>Lead</option>
                                        <option value="supervisor" <?php echo ($selectedGrade === 'supervisor') ? 'selected' : ''; ?>>Supervisor</option>
                                        <option value="manager" <?php echo ($selectedGrade === 'manager') ? 'selected' : ''; ?>>Manager</option>
                                        <option value="director" <?php echo ($selectedGrade === 'director') ? 'selected' : ''; ?>>Director</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700  mb-2">
                                    Staff Portal Password <?php echo $isEdit ? '' : '<span class="text-red-500">*</span>'; ?>
                                </label>
                                <input type="password" id="password" name="password" <?php echo $isEdit ? '' : 'required'; ?> minlength="6"
                                       class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                       placeholder="<?php echo $isEdit ? 'Leave blank to keep current password' : 'Minimum 6 characters'; ?>">
                                <p class="text-sm text-gray-500  mt-1">
                                    <?php echo $isEdit ? 'Leave blank to keep the current password, or enter a new password to change it' : 'This password will be used for staff portal access'; ?>
                                </p>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200 ">
                                <a href="<?php echo $isEdit ? url('admin/staff/manage') : url('admin/dashboard'); ?>" class="px-6 py-3 border border-gray-300  text-gray-700  rounded-md hover:bg-gray-50  transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    <?php echo $isEdit ? 'Back to Manage Staff' : 'Back to Dashboard'; ?>
                                </a>
                                
                                <div class="flex space-x-3">
                                    <button type="reset" class="px-6 py-3 border border-gray-300  text-gray-700  rounded-md hover:bg-gray-50  transition-colors">
                                        <i class="fas fa-undo mr-2"></i>
                                        Reset Form
                                    </button>
                                    
                                    <button type="submit" class="px-6 py-3 bg-yuki-600  text-white rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                        <?php if ($isEdit): ?>
                                            <i class="fas fa-save mr-2"></i>
                                            Update Staff
                                        <?php else: ?>
                                            <i class="fas fa-user-plus mr-2"></i>
                                            Register Staff
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
        
        // Set maximum date to today for hire date and date of birth
        document.getElementById('hire_date').max = new Date().toISOString().split('T')[0];
        document.getElementById('date_of_birth').max = new Date().toISOString().split('T')[0];
    </script>
