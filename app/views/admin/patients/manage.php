                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900  mb-2">Manage Patients</h1>
                                <p class="text-gray-600 ">Update, delete, and manage patient records</p>
                            </div>
                            <a href="<?= url('admin/patients/register') ?>" class="bg-yuki-600  text-white px-6 py-3 rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                <i class="fas fa-user-plus mr-2"></i>
                                Register New Patient
                            </a>
                        </div>
                    </div>

                    <!-- Simple patient management without search for now -->

                    <!-- Patients Table -->
                    <div class="bg-white  rounded-md shadow-sm border border-gray-200 ">
                        <div class="p-6 border-b border-gray-200 ">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-900 ">
                                    Patient Management
                                    <span class="text-sm font-normal text-gray-500 ">
                                        (<?php echo number_format($totalRecords); ?> total)
                                    </span>
                                </h2>
                            </div>
                        </div>
                        
                        <?php if (empty($patients)): ?>
                            <div class="p-12 text-center">
                                <i class="fas fa-users text-gray-300  text-6xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-900  mb-2">No patients found</h3>
                                <p class="text-gray-500  mb-6">
                                    <?php echo !empty($search) ? 'No patients match your search criteria.' : 'Get started by registering your first patient.'; ?>
                                </p>
                                <a href="<?= url('admin/patients/register') ?>" class="bg-yuki-600  text-white px-6 py-3 rounded-md hover:bg-yuki-700 hover: transition-colors">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Register First Patient
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Patient</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Contact</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Age</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500  uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white  divide-y divide-gray-200 ">
                                        <?php foreach ($patients as $patient): ?>
                                            <tr class="hover:bg-gray-50  transition-colors">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="bg-yuki-400  rounded-full w-10 h-10 flex items-center justify-center mr-4">
                                                            <i class="fas fa-user text-white text-sm"></i>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm font-medium text-gray-900 ">
                                                                <?php
                                                                $name = '';
                                                                if (isset($patient['FirstName'])) $name .= $patient['FirstName'];
                                                                if (isset($patient['MiddleName']) && $patient['MiddleName']) $name .= ' ' . $patient['MiddleName'];
                                                                if (isset($patient['Surname'])) $name .= ' ' . $patient['Surname'];
                                                                echo htmlspecialchars($name);
                                                                ?>
                                                            </div>
                                                            <div class="text-sm text-gray-500 ">
                                                                Patient ID: <?php echo $patient['ID']; ?>
                                                                <?php if (isset($patient['Gender'])): ?>
                                                                    | <?php echo ucfirst($patient['Gender']); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900 ">
                                                        <?php echo isset($patient['Email']) ? htmlspecialchars($patient['Email']) : 'N/A'; ?>
                                                    </div>
                                                    <div class="text-sm text-gray-500 ">
                                                        <?php echo isset($patient['Contact']) ? htmlspecialchars($patient['Contact']) : 'N/A'; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 ">
                                                    <?php
                                                    $age = calculateAge($patient['DateOfBirth']);
                                                    echo $age !== 'N/A' ? $age . ' years' : 'N/A';
                                                    ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                                        <?php echo isset($patient['Status']) ? ucfirst($patient['Status']) : 'Active'; ?>
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex space-x-2">
                                                        <!-- Modify Button - goes to register.php with patient data -->
                                                        <a href="<?= url('admin/patients/register') ?>&edit=<?php echo $patient['ID']; ?>"
                                                           class="bg-yellow-100 text-yellow-700 hover:bg-yellow-200    px-3 py-2 rounded-md transition-colors">
                                                            <i class="fas fa-edit mr-1"></i>
                                                            Modify
                                                        </a>
                                                        <!-- View Button - goes to profile.php -->
                                                        <a href="<?= url('admin/patients/profile') ?>&id=<?php echo $patient['ID']; ?>"
                                                           class="bg-blue-100 text-blue-700 hover:bg-blue-200    px-3 py-2 rounded-md transition-colors">
                                                            <i class="fas fa-eye mr-1"></i>
                                                            View
                                                        </a>
                                                        <!-- Delete Button - with confirmation -->
                                                        <button onclick="deletePatient(<?php echo $patient['ID']; ?>)"
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
                            </div>

                            <!-- Simple display - no pagination needed -->
                        <?php endif; ?>
                    </div>
                </div>

    <script>
        function deletePatient(patientId) {
            if (confirm('Are you sure you want to delete this patient? This action cannot be undone.')) {
                // Send request to delete the patient
                window.location.href = '<?= url('admin/patients/manage') ?>&delete=' + patientId;
            }
        }
    </script>
