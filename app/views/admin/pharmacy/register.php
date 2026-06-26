                <div class="max-w-4xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">
                            <?php echo $isEdit ? 'Modify Medication Information' : 'Add New Medication'; ?>
                        </h1>
                        <p class="text-gray-600 ">
                            <?php echo $isEdit ? 'Update medication information in the pharmacy system' : 'Add a new medication to the pharmacy inventory'; ?>
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
                            <h2 class="text-xl font-semibold text-gray-900 ">Medication Information</h2>
                        </div>
                        
                        <form action="<?= url('admin/pharmacy/store') ?>" method="POST" class="p-6 space-y-6">
                            <?php if ($isEdit): ?>
                                <input type="hidden" name="edit_medication_id" value="<?php echo $editMedicationId; ?>">
                            <?php endif; ?>
                            
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700  mb-2">
                                        Medication Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($medicationData['Name'] ?? '') : ($_SESSION['register_data']['name'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="dosage" class="block text-sm font-medium text-gray-700  mb-2">
                                        Dosage <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="dosage" name="dosage" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           placeholder="e.g., 500mg, 10ml, 1 tablet"
                                           value="<?php echo htmlspecialchars($isEdit ? ($medicationData['Dosage'] ?? '') : ($_SESSION['register_data']['dosage'] ?? '')); ?>">
                                </div>
                            </div>

                            <!-- Quantity and Category -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="quantity" class="block text-sm font-medium text-gray-700  mb-2">
                                        Quantity <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" id="quantity" name="quantity" required min="0"
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($isEdit ? ($medicationData['Quantity'] ?? '') : ($_SESSION['register_data']['quantity'] ?? '')); ?>">
                                </div>
                                
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700  mb-2">
                                        Category <span class="text-red-500">*</span>
                                    </label>
                                    <select id="category" name="category" required
                                            class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 ">
                                        <option value="">Select Category</option>
                                        <?php 
                                        $selectedCategory = $isEdit ? ($medicationData['Category'] ?? '') : ($_SESSION['register_data']['category'] ?? '');
                                        ?>
                                        <option value="Antibiotics" <?php echo ($selectedCategory === 'Antibiotics') ? 'selected' : ''; ?>>Antibiotics</option>
                                        <option value="Pain Relief" <?php echo ($selectedCategory === 'Pain Relief') ? 'selected' : ''; ?>>Pain Relief</option>
                                        <option value="Cardiovascular" <?php echo ($selectedCategory === 'Cardiovascular') ? 'selected' : ''; ?>>Cardiovascular</option>
                                        <option value="Diabetes" <?php echo ($selectedCategory === 'Diabetes') ? 'selected' : ''; ?>>Diabetes</option>
                                        <option value="Respiratory" <?php echo ($selectedCategory === 'Respiratory') ? 'selected' : ''; ?>>Respiratory</option>
                                        <option value="Gastrointestinal" <?php echo ($selectedCategory === 'Gastrointestinal') ? 'selected' : ''; ?>>Gastrointestinal</option>
                                        <option value="Neurological" <?php echo ($selectedCategory === 'Neurological') ? 'selected' : ''; ?>>Neurological</option>
                                        <option value="Vitamins" <?php echo ($selectedCategory === 'Vitamins') ? 'selected' : ''; ?>>Vitamins & Supplements</option>
                                        <option value="Topical" <?php echo ($selectedCategory === 'Topical') ? 'selected' : ''; ?>>Topical</option>
                                        <option value="Emergency" <?php echo ($selectedCategory === 'Emergency') ? 'selected' : ''; ?>>Emergency</option>
                                        <option value="Other" <?php echo ($selectedCategory === 'Other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Manufacturer -->
                            <div>
                                <label for="manufacturer" class="block text-sm font-medium text-gray-700  mb-2">
                                    Manufacturer <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="manufacturer" name="manufacturer" required
                                       class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                       placeholder="Enter manufacturer name"
                                       value="<?php echo htmlspecialchars($isEdit ? ($medicationData['Manufacturer'] ?? '') : ($_SESSION['register_data']['manufacturer'] ?? '')); ?>">
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700  mb-2">
                                    Description
                                </label>
                                <textarea id="description" name="description" rows="4"
                                          class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                          placeholder="Enter medication description, usage instructions, side effects, etc."><?php echo htmlspecialchars($isEdit ? ($medicationData['Description'] ?? '') : ($_SESSION['register_data']['description'] ?? '')); ?></textarea>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-between pt-6 border-t border-gray-200 ">
                                <a href="<?php echo $isEdit ? url('admin/pharmacy/manage') : url('admin/pharmacy/view'); ?>" class="px-6 py-3 border border-gray-300  text-gray-700  rounded-md hover:bg-gray-50  transition-colors">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    <?php echo $isEdit ? 'Back to Manage Medications' : 'Back to Medications'; ?>
                                </a>

                                <div class="flex space-x-3">
                                    <button type="reset" class="px-6 py-3 border border-gray-300  text-gray-700  rounded-md hover:bg-gray-50  transition-colors">
                                        <i class="fas fa-undo mr-2"></i>
                                        Reset Form
                                    </button>

                                    <button type="submit" class="px-6 py-3 bg-yuki-600  text-white rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                        <?php if ($isEdit): ?>
                                            <i class="fas fa-save mr-2"></i>
                                            Update Medication
                                        <?php else: ?>
                                            <i class="fas fa-plus mr-2"></i>
                                            Add Medication
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
    </script>
