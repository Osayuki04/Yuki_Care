                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-12">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">Medication Profile</h1>
                        <p class="text-gray-600 ">Complete medication information</p>
                    </div>

                    <!-- Medication Profile Card -->
                    <div class="bg-white  rounded-md shadow-lg border border-gray-200  overflow-hidden">
                        <!-- Medication Header with Plain Green Background -->
                        <div class="bg-yuki-600 p-8 text-white">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-full w-24 h-24 flex items-center justify-center shadow-lg flex-shrink-0">
                                        <i class="fas fa-pills text-white text-4xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 break-words">
                                            <?php echo htmlspecialchars($medication['Name']); ?>
                                        </h2>
                                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-white/90">
                                            <span class="flex items-center">
                                                <i class="fas fa-barcode mr-3"></i>
                                                <span class="font-medium">ID: <?php echo $medication['ID']; ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-tag mr-3"></i>
                                                <span class="font-medium"><?php echo htmlspecialchars($medication['Category']); ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-prescription-bottle mr-3"></i>
                                                <span class="font-medium"><?php echo htmlspecialchars($medication['Dosage']); ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-md px-6 py-4 text-center">
                                        <div class="text-sm text-white/80 mb-1">Stock Status</div>
                                        <div class="text-lg font-semibold text-white">
                                            <?php
                                            $quantity = (int)$medication['Quantity'];
                                            if ($quantity <= 10): ?>
                                                <span class="flex items-center justify-center">
                                                    <i class="fas fa-exclamation-triangle mr-2 text-red-300"></i>
                                                    Low Stock
                                                </span>
                                            <?php elseif ($quantity <= 50): ?>
                                                <span class="flex items-center justify-center">
                                                    <i class="fas fa-minus-circle mr-2 text-yellow-300"></i>
                                                    Medium Stock
                                                </span>
                                            <?php else: ?>
                                                <span class="flex items-center justify-center">
                                                    <i class="fas fa-check-circle mr-2 text-green-300"></i>
                                                    In Stock
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-12">
                            <!-- Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                                <!-- Basic Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-purple-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-info-circle text-purple-600  text-lg"></i>
                                        </div>
                                        Basic Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Medication Name</span>
                                            <span class="text-gray-900  font-medium text-lg">
                                                <?php echo htmlspecialchars($medication['Name']); ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Dosage</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-prescription-bottle mr-2 text-gray-400"></i>
                                                <?php echo htmlspecialchars($medication['Dosage']); ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Category</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800   w-fit">
                                                <i class="fas fa-tag mr-2"></i>
                                                <?php echo htmlspecialchars($medication['Category']); ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Manufacturer</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-industry mr-2 text-gray-400"></i>
                                                <?php echo htmlspecialchars($medication['Manufacturer']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Inventory Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-blue-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-warehouse text-blue-600  text-lg"></i>
                                        </div>
                                        Inventory Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Current Quantity</span>
                                            <span class="text-gray-900  font-bold text-2xl flex items-center">
                                                <i class="fas fa-boxes mr-2 text-gray-400"></i>
                                                <?php echo $medication['Quantity']; ?> units
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Stock Status</span>
                                            <?php if ($quantity <= 10): ?>
                                                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800   w-fit">
                                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                                    Low Stock - Reorder Required
                                                </span>
                                            <?php elseif ($quantity <= 50): ?>
                                                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800   w-fit">
                                                    <i class="fas fa-minus-circle mr-2"></i>
                                                    Medium Stock - Monitor Levels
                                                </span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800   w-fit">
                                                    <i class="fas fa-check-circle mr-2"></i>
                                                    Well Stocked
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Stock Level</span>
                                            <div class="w-full bg-gray-200 rounded-full h-3">
                                                <?php
                                                $percentage = min(100, ($quantity / 100) * 100); // Assuming 100 is max stock
                                                $colorClass = $quantity <= 10 ? 'bg-red-500' : ($quantity <= 50 ? 'bg-yellow-500' : 'bg-green-500');
                                                ?>
                                                <div class="<?php echo $colorClass; ?> h-3 rounded-full transition-all duration-300" style="width: <?php echo $percentage; ?>%"></div>
                                            </div>
                                            <span class="text-xs text-gray-500 mt-1"><?php echo round($percentage); ?>% of capacity</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-green-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-clipboard-list text-green-600  text-lg"></i>
                                        </div>
                                        Additional Details
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Medication ID</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-barcode mr-2 text-gray-400"></i>
                                                <?php echo $medication['ID']; ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Last Updated</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-clock mr-2 text-gray-400"></i>
                                                <?php
                                                if (!empty($medication['created_at'])) {
                                                    echo date('M j, Y', strtotime($medication['created_at']));
                                                } else {
                                                    echo 'Not available';
                                                }
                                                ?>
                                            </span>
                                        </div>

                                        <?php if ($quantity <= 10): ?>
                                        <div class="bg-red-50  border border-red-200  rounded-md p-3">
                                            <div class="flex items-center">
                                                <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                                <span class="text-sm font-medium text-red-800 ">Low Stock Alert</span>
                                            </div>
                                            <p class="text-xs text-red-600  mt-1">This medication needs to be restocked soon.</p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Description Section -->
                            <?php if (!empty($medication['Description'])): ?>
                            <div class="mt-12">
                                <div class="bg-blue-50  border border-blue-200  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-6 flex items-center">
                                        <div class="bg-blue-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-file-alt text-blue-600  text-lg"></i>
                                        </div>
                                        Description & Usage Information
                                    </h3>
                                    <div class="text-gray-900  leading-relaxed text-base">
                                        <?php echo nl2br(htmlspecialchars($medication['Description'])); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Action Buttons -->
                            <div class="mt-12 pt-8 border-t border-gray-200 ">
                                <div class="flex flex-wrap gap-6">
                                    <a href="<?= url('admin/pharmacy/view') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Back to Medications
                                    </a>
                                    <a href="<?= url('admin/pharmacy/register') ?>&edit=<?php echo $medication['ID']; ?>" class="bg-yuki-600 text-white px-6 py-3 rounded-md hover:bg-yuki-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Medication
                                    </a>
                                    <button onclick="window.print()" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-print mr-2"></i>
                                        Print Details
                                    </button>
                                    <a href="<?= url('admin/pharmacy/manage') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-cogs mr-2"></i>
                                        Manage Medications
                                    </a>
                                    <?php if ($quantity <= 10): ?>
                                    <button class="bg-orange-600 text-white px-6 py-3 rounded-md hover:bg-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-plus mr-2"></i>
                                        Restock Alert
                                    </button>
                                    <?php endif; ?>
                                    <button class="bg-purple-600 text-white px-6 py-3 rounded-md hover:bg-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-chart-line mr-2"></i>
                                        Usage Analytics
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
