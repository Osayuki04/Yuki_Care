                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">Medication List</h1>
                        <p class="text-gray-600 ">View all pharmacy medications</p>
                    </div>

                    <!-- Simple medication list without search for now -->

                    <!-- Medications Table -->
                    <div class="bg-white  rounded-md shadow-sm border border-gray-200 ">
                        <div class="p-6 border-b border-gray-200 ">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900 ">
                                    Medication Inventory 
                                    <span class="text-sm font-normal text-gray-500 ">
                                        (<?php echo number_format($totalRecords); ?> total)
                                    </span>
                                </h2>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <?php if (empty($medications)): ?>
                                <div class="text-center py-12">
                                    <i class="fas fa-pills text-gray-300  text-6xl mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-900  mb-2">No medications found</h3>
                                    <p class="text-gray-500  mb-6">Get started by adding your first medication.</p>
                                    <a href="<?= url('admin/pharmacy/register') ?>" class="bg-yuki-600 text-white px-6 py-3 rounded-md hover:bg-yuki-700 transition-colors">
                                        <i class="fas fa-plus mr-2"></i>
                                        Add Medication
                                    </a>
                                </div>
                            <?php else: ?>
                                <table class="min-w-full divide-y divide-gray-200 ">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Medication</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Category</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Dosage</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Quantity</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Manufacturer</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white  divide-y divide-gray-200 ">
                                        <?php foreach ($medications as $medication): ?>
                                            <tr class="hover:bg-gray-50  transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="bg-yuki-400  rounded-full w-10 h-10 flex items-center justify-center mr-4">
                                                            <i class="fas fa-pills text-white text-sm"></i>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-medium text-gray-900 ">
                                                                <?php echo htmlspecialchars($medication['Name']); ?>
                                                            </div>
                                                            <div class="text-sm text-gray-500 ">
                                                                Medication ID: <?php echo $medication['ID']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-800  ">
                                                        <?php echo isset($medication['Category']) ? htmlspecialchars($medication['Category']) : 'Uncategorized'; ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                                    <?php echo isset($medication['Dosage']) ? htmlspecialchars($medication['Dosage']) : 'N/A'; ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <span class="text-sm font-medium text-gray-900  mr-2">
                                                            <?php echo isset($medication['Quantity']) ? $medication['Quantity'] : '0'; ?>
                                                        </span>
                                                        <?php 
                                                        $quantity = isset($medication['Quantity']) ? (int)$medication['Quantity'] : 0;
                                                        if ($quantity <= 10): ?>
                                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800  ">
                                                                Low Stock
                                                            </span>
                                                        <?php elseif ($quantity <= 50): ?>
                                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800  ">
                                                                Medium
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800  ">
                                                                In Stock
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                                    <?php echo isset($medication['Manufacturer']) ? htmlspecialchars($medication['Manufacturer']) : 'N/A'; ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="<?= url('admin/pharmacy/profile') ?>&id=<?php echo $medication['ID']; ?>" 
                                                       class="bg-blue-100 text-blue-700 hover:bg-blue-200    px-3 py-2 rounded-md transition-colors mr-2">
                                                        <i class="fas fa-eye mr-1"></i>
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                            
                            <!-- Simple display - no pagination needed -->
                        </div>
                    </div>
                </div>
