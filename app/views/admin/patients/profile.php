                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-12">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900  mb-2">Patient Profile</h1>
                                <p class="text-gray-600 ">Detailed information for patient ID: <?php echo $patient['ID']; ?></p>
                            </div>
                            <a href="<?= url('admin/patients/view') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back to Patients
                            </a>
                        </div>
                    </div>

                    <!-- Patient Information Card -->
                    <div class="bg-white  rounded-md shadow-lg border border-gray-200  overflow-hidden">
                        <!-- Card Header with Plain Green Background -->
                        <div class="bg-yuki-600 p-8 text-white">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-full w-24 h-24 flex items-center justify-center shadow-lg flex-shrink-0">
                                        <i class="fas fa-user text-white text-4xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 break-words">
                                            <?php
                                            echo htmlspecialchars($patient['FirstName']);
                                            if (!empty($patient['MiddleName'])) echo ' ' . htmlspecialchars($patient['MiddleName']);
                                            echo ' ' . htmlspecialchars($patient['Surname']);
                                            ?>
                                        </h2>
                                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-white/90">
                                            <span class="flex items-center">
                                                <i class="fas fa-id-card mr-3"></i>
                                                <span class="font-medium">ID: <?php echo $patient['ID']; ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-venus-mars mr-3"></i>
                                                <span class="font-medium"><?php echo ucfirst($patient['Gender']); ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-birthday-cake mr-3"></i>
                                                <span class="font-medium"><?php echo $age; ?> years old</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-12">
                            <!-- Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                                <!-- Personal Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-yuki-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-user-circle text-yuki-600  text-lg"></i>
                                        </div>
                                        Personal Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-2">Full Name</span>
                                            <span class="text-gray-900  font-medium text-lg">
                                                <?php
                                                echo htmlspecialchars($patient['FirstName']);
                                                if (!empty($patient['MiddleName'])) echo ' ' . htmlspecialchars($patient['MiddleName']);
                                                echo ' ' . htmlspecialchars($patient['Surname']);
                                                ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-2">Date of Birth</span>
                                            <span class="text-gray-900  font-medium"><?php echo date('F j, Y', strtotime($patient['DateOfBirth'])); ?></span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-2">Age</span>
                                            <span class="text-gray-900  font-medium"><?php echo $age; ?> years old</span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-2">Gender</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-<?php echo $patient['Gender'] === 'male' ? 'mars' : 'venus'; ?> mr-3 text-<?php echo $patient['Gender'] === 'male' ? 'blue' : 'pink'; ?>-500"></i>
                                                <?php echo ucfirst($patient['Gender']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-blue-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-phone text-blue-600  text-lg"></i>
                                        </div>
                                        Contact Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-2">Email Address</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-envelope mr-3 text-gray-400"></i>
                                                <?php echo isset($patient['Email']) ? htmlspecialchars($patient['Email']) : 'Not provided'; ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-2">Phone Number</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-phone mr-3 text-gray-400"></i>
                                                <?php echo isset($patient['Contact']) ? htmlspecialchars($patient['Contact']) : 'Not provided'; ?>
                                            </span>
                                        </div>

                                        <?php if (!empty($patient['EmergencyContact'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-2">Emergency Contact</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-exclamation-triangle mr-3 text-red-500"></i>
                                                <?php echo htmlspecialchars($patient['EmergencyContact']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($patient['Address'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-2">Address</span>
                                            <span class="text-gray-900  font-medium flex items-start">
                                                <i class="fas fa-map-marker-alt mr-3 text-gray-400 mt-1"></i>
                                                <span><?php echo nl2br(htmlspecialchars($patient['Address'])); ?></span>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Medical Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-green-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-stethoscope text-green-600  text-lg"></i>
                                        </div>
                                        Medical Information
                                    </h3>

                                    <div class="space-y-6">


                                        <?php if (!empty($patient['PreferredDate'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Preferred Appointment Date</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-calendar-alt mr-2 text-gray-400"></i>
                                                <?php echo date('F j, Y', strtotime($patient['PreferredDate'])); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($patient['Status'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Status</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800   w-fit">
                                                <i class="fas fa-check-circle mr-2"></i>
                                                <?php echo ucfirst($patient['Status']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Registration Date</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-calendar-plus mr-2 text-gray-400"></i>
                                                <?php
                                                if (!empty($patient['created_at'])) {
                                                    echo date('M j, Y', strtotime($patient['created_at']));
                                                } else {
                                                    echo 'Not available';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notes Section -->
                            <?php if (!empty($patient['Notes'])): ?>
                            <div class="mt-12">
                                <div class="bg-amber-50  border border-amber-200  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-6 flex items-center">
                                        <div class="bg-amber-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-sticky-note text-amber-600  text-lg"></i>
                                        </div>
                                        Patient Notes
                                    </h3>
                                    <div class="text-gray-900  leading-relaxed text-base">
                                        <?php echo nl2br(htmlspecialchars($patient['Notes'])); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Action Buttons -->
                            <div class="mt-12 pt-8 border-t border-gray-200 ">
                                <div class="flex flex-wrap gap-6">
                                    <a href="<?= url('admin/patients/view') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Back to Patients List
                                    </a>
                                    <a href="<?= url('admin/patients/register') ?>&edit=<?php echo $patient['ID']; ?>" class="bg-yuki-600 text-white px-6 py-3 rounded-md hover:bg-yuki-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Patient
                                    </a>
                                    <button onclick="window.print()" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-print mr-2"></i>
                                        Print Profile
                                    </button>
                                    <a href="<?= url('admin/patients/manage') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-users mr-2"></i>
                                        Manage Patients
                                    </a>
                                    <button class="bg-purple-600 text-white px-6 py-3 rounded-md hover:bg-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-file-medical mr-2"></i>
                                        Medical History
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


