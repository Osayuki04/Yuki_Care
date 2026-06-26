                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900  mb-2">Manage Staff</h1>
                                <p class="text-gray-600 ">Update, delete, and manage staff records</p>
                            </div>
                            <a href="<?= url('admin/staff/register') ?>" class="bg-yuki-600  text-white px-6 py-3 rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                <i class="fas fa-user-plus mr-2"></i>
                                Register New Staff
                            </a>
                        </div>
                    </div>

                    <!-- Simple staff management without search for now -->

                    <!-- Staff Table -->
                    <div class="bg-white  rounded-md shadow-sm border border-gray-200 ">
                        <div class="p-6 border-b border-gray-200 ">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900 ">
                                    Staff Management 
                                    <span class="text-sm font-normal text-gray-500 ">
                                        (<?php echo number_format($totalRecords); ?> total)
                                    </span>
                                </h2>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <?php if (empty($staff)): ?>
                                <div class="text-center py-12">
                                    <i class="fas fa-users text-gray-300  text-6xl mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-900  mb-2">No staff found</h3>
                                    <p class="text-gray-500  mb-6">Get started by registering your first staff member.</p>
                                    <a href="<?= url('admin/staff/register') ?>" class="bg-yuki-600 text-white px-6 py-3 rounded-md hover:bg-yuki-700 transition-colors">
                                        <i class="fas fa-user-plus mr-2"></i>
                                        Register Staff
                                    </a>
                                </div>
                            <?php else: ?>
                                <table class="min-w-full divide-y divide-gray-200 ">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Staff Member</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Contact</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Department</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Age</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white  divide-y divide-gray-200 ">
                                        <?php foreach ($staff as $staffMember): ?>
                                            <tr class="hover:bg-gray-50  transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="bg-yuki-400  rounded-full w-10 h-10 flex items-center justify-center mr-4">
                                                            <i class="fas fa-user-tie text-white text-sm"></i>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-medium text-gray-900 ">
                                                                <?php 
                                                                $name = '';
                                                                if (isset($staffMember['FirstName'])) $name .= $staffMember['FirstName'];
                                                                if (isset($staffMember['MiddleName']) && $staffMember['MiddleName']) $name .= ' ' . $staffMember['MiddleName'];
                                                                if (isset($staffMember['Surname'])) $name .= ' ' . $staffMember['Surname'];
                                                                echo htmlspecialchars($name);
                                                                ?>
                                                            </div>
                                                            <div class="text-sm text-gray-500 ">
                                                                Staff ID: <?php echo $staffMember['ID']; ?> 
                                                                <?php if (isset($staffMember['Gender'])): ?>
                                                                    | <?php echo ucfirst($staffMember['Gender']); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 ">
                                                        <?php echo isset($staffMember['Email']) ? htmlspecialchars($staffMember['Email']) : 'N/A'; ?>
                                                    </div>
                                                    <div class="text-sm text-gray-500 ">
                                                        <?php echo isset($staffMember['Contact']) ? htmlspecialchars($staffMember['Contact']) : 'N/A'; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800  ">
                                                        <?php echo isset($staffMember['Department']) ? ucfirst($staffMember['Department']) : 'General'; ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                                    <?php 
                                                    $age = calculateAge($staffMember['DateOfBirth']);
                                                    echo $age !== 'N/A' ? $age . ' years' : 'N/A';
                                                    ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                                        <?php echo isset($staffMember['Status']) ? ucfirst($staffMember['Status']) : 'Active'; ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <!-- Modify Button - goes to register.php with staff data -->
                                                        <a href="<?= url('admin/staff/register') ?>&edit=<?php echo $staffMember['ID']; ?>" 
                                                           class="bg-yellow-100 text-yellow-700 hover:bg-yellow-200    px-3 py-2 rounded-md transition-colors">
                                                            <i class="fas fa-edit mr-1"></i>
                                                            Modify
                                                        </a>
                                                        <!-- View Button - goes to profile.php -->
                                                        <a href="<?= url('admin/staff/profile') ?>&id=<?php echo $staffMember['ID']; ?>" 
                                                           class="bg-blue-100 text-blue-700 hover:bg-blue-200    px-3 py-2 rounded-md transition-colors">
                                                            <i class="fas fa-eye mr-1"></i>
                                                            View
                                                        </a>
                                                        <!-- Delete Button - with confirmation -->
                                                        <button onclick="deleteStaff(<?php echo $staffMember['ID']; ?>)" 
                                                                class="bg-red-100 text-red-700 hover:bg-red-200    px-3 py-2 rounded-md transition-colors">
                                                            <i class="fas fa-trash mr-1"></i>
                                                            Delete
                                                        </button>
                                                    </div>
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

    <script>
        function deleteStaff(staffId) {
            if (confirm('Are you sure you want to delete this staff member? This action cannot be undone.')) {
                // Send request to delete the staff member
                window.location.href = '<?= url('admin/staff/manage') ?>&delete=' + staffId;
            }
        }
    </script>
