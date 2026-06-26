                <div class="max-w-6xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">Pharmacy Management</h1>
                        <p class="text-gray-600 ">Add and manage medications in the pharmacy inventory</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Add Medication Form -->
                        <div class="bg-white  rounded-md shadow-sm border border-gray-200 ">
                            <div class="p-6 border-b border-gray-200 ">
                                <h2 class="text-xl font-semibold text-gray-900 ">Add New Medication</h2>
                            </div>
                            
                            <!-- Success/Error Messages -->
                            <?php if (isset($_SESSION['medication_success'])): ?>
                                <div class="m-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        <?php echo htmlspecialchars($_SESSION['medication_success']); ?>
                                    </div>
                                </div>
                                <?php unset($_SESSION['medication_success']); ?>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['medication_errors'])): ?>
                                <div class="m-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md">
                                    <div class="flex items-start">
                                        <i class="fas fa-exclamation-triangle mr-2 mt-1"></i>
                                        <div>
                                            <?php foreach ($_SESSION['medication_errors'] as $error): ?>
                                                <p><?php echo htmlspecialchars($error); ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php unset($_SESSION['medication_errors']); ?>
                            <?php endif; ?>
                            
                            <form method="POST" class="p-6 space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700  mb-2">
                                        Medication Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" required
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($_SESSION['medication_data']['name'] ?? ''); ?>"
                                           placeholder="Enter medication name">
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="dosage" class="block text-sm font-medium text-gray-700  mb-2">
                                            Dosage <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="dosage" name="dosage" required
                                               class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                               value="<?php echo htmlspecialchars($_SESSION['medication_data']['dosage'] ?? ''); ?>"
                                               placeholder="e.g., 500mg">
                                    </div>
                                    
                                    <div>
                                        <label for="quantity" class="block text-sm font-medium text-gray-700  mb-2">
                                            Quantity
                                        </label>
                                        <input type="number" id="quantity" name="quantity" min="0"
                                               class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                               value="<?php echo htmlspecialchars($_SESSION['medication_data']['quantity'] ?? '0'); ?>"
                                               placeholder="0">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700  mb-2">
                                        Category <span class="text-red-500">*</span>
                                    </label>
                                    <select id="category" name="category" required
                                            class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 ">
                                        <option value="">Select Category</option>
                                        <option value="Antibiotics" <?php echo (($_SESSION['medication_data']['category'] ?? '') === 'Antibiotics') ? 'selected' : ''; ?>>Antibiotics</option>
                                        <option value="Pain Relief" <?php echo (($_SESSION['medication_data']['category'] ?? '') === 'Pain Relief') ? 'selected' : ''; ?>>Pain Relief</option>
                                        <option value="Cardiovascular" <?php echo (($_SESSION['medication_data']['category'] ?? '') === 'Cardiovascular') ? 'selected' : ''; ?>>Cardiovascular</option>
                                        <option value="Diabetes" <?php echo (($_SESSION['medication_data']['category'] ?? '') === 'Diabetes') ? 'selected' : ''; ?>>Diabetes</option>
                                        <option value="Respiratory" <?php echo (($_SESSION['medication_data']['category'] ?? '') === 'Respiratory') ? 'selected' : ''; ?>>Respiratory</option>
                                        <option value="Neurological" <?php echo (($_SESSION['medication_data']['category'] ?? '') === 'Neurological') ? 'selected' : ''; ?>>Neurological</option>
                                        <option value="Vitamins" <?php echo (($_SESSION['medication_data']['category'] ?? '') === 'Vitamins') ? 'selected' : ''; ?>>Vitamins & Supplements</option>
                                        <option value="Other" <?php echo (($_SESSION['medication_data']['category'] ?? '') === 'Other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="company" class="block text-sm font-medium text-gray-700  mb-2">
                                        Manufacturer/Company
                                    </label>
                                    <input type="text" id="company" name="company"
                                           class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                           value="<?php echo htmlspecialchars($_SESSION['medication_data']['company'] ?? ''); ?>"
                                           placeholder="Enter manufacturer name">
                                </div>
                                
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700  mb-2">
                                        Description
                                    </label>
                                    <textarea id="description" name="description" rows="3"
                                              class="w-full px-4 py-3 border border-gray-300  rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent bg-white  text-gray-900 "
                                              placeholder="Enter medication description or notes"><?php echo htmlspecialchars($_SESSION['medication_data']['description'] ?? ''); ?></textarea>
                                </div>
                                
                                <div class="flex space-x-3 pt-4">
                                    <button type="reset" class="flex-1 px-4 py-3 border border-gray-300  text-gray-700  rounded-md hover:bg-gray-50  transition-colors">
                                        <i class="fas fa-undo mr-2"></i>
                                        Reset
                                    </button>
                                    
                                    <button type="submit" class="flex-1 px-4 py-3 bg-yuki-600  text-white rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                        <i class="fas fa-plus mr-2"></i>
                                        Add Medication
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Recent Medications -->
                        <div class="bg-white  rounded-md shadow-sm border border-gray-200 ">
                            <div class="p-6 border-b border-gray-200 ">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-xl font-semibold text-gray-900 ">Recent Medications</h2>
                                    <a href="<?= url('admin/pharmacy/medications') ?>" class="text-yuki-600 hover:text-yuki-700   text-sm font-medium">
                                        View All <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <?php if (empty($medications)): ?>
                                    <div class="text-center py-8">
                                        <i class="fas fa-pills text-gray-300  text-4xl mb-4"></i>
                                        <p class="text-gray-500 ">No medications added yet</p>
                                    </div>
                                <?php else: ?>
                                    <div class="space-y-4">
                                        <?php foreach ($medications as $medication): ?>
                                            <div class="flex items-center justify-between p-4 bg-gray-50  rounded-md">
                                                <div class="flex items-center">
                                                    <div class="bg-yuki-400  rounded-full w-10 h-10 flex items-center justify-center mr-3">
                                                        <i class="fas fa-pills text-white text-sm"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-900 ">
                                                            <?php echo htmlspecialchars($medication['Name']); ?>
                                                        </p>
                                                        <p class="text-sm text-gray-500 ">
                                                            <?php echo htmlspecialchars($medication['Dosage']); ?> | 
                                                            <?php echo htmlspecialchars($medication['Category']); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-sm font-medium text-gray-900 ">
                                                        Qty: <?php echo $medication['Quantity']; ?>
                                                    </p>
                                                    <p class="text-xs text-gray-500 ">
                                                        <?php echo date('M d', strtotime($medication['created_at'])); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

    <script>
        // Clear form data from session
        <?php unset($_SESSION['medication_data']); ?>
    </script>
