                <div class="max-w-7xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-12">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">Staff Profile</h1>
                        <p class="text-gray-600 ">Complete staff member information</p>
                    </div>

                    <!-- Staff Profile Card -->
                    <div class="bg-white  rounded-md shadow-lg border border-gray-200  overflow-hidden">
                        <!-- Staff Header with Plain Green Background -->
                        <div class="bg-yuki-600 p-8 text-white">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-full w-24 h-24 flex items-center justify-center shadow-lg flex-shrink-0">
                                        <i class="fas fa-user-tie text-white text-4xl"></i>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 break-words">
                                            <?php
                                            $fullName = $staff['FirstName'];
                                            if (!empty($staff['MiddleName'])) $fullName .= ' ' . $staff['MiddleName'];
                                            $fullName .= ' ' . $staff['Surname'];
                                            echo htmlspecialchars($fullName);
                                            ?>
                                        </h2>
                                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-white/90">
                                            <span class="flex items-center">
                                                <i class="fas fa-id-badge mr-3"></i>
                                                <span class="font-medium">ID: <?php echo $staff['ID']; ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-venus-mars mr-3"></i>
                                                <span class="font-medium"><?php echo ucfirst($staff['Gender']); ?></span>
                                            </span>
                                            <span class="hidden sm:block text-white/60">•</span>
                                            <span class="flex items-center">
                                                <i class="fas fa-birthday-cake mr-3"></i>
                                                <span class="font-medium"><?php echo $age; ?> years old</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="bg-white/20 backdrop-blur-sm rounded-md px-6 py-4 text-center">
                                        <div class="text-sm text-white/80 mb-1">Department</div>
                                        <div class="text-lg font-semibold text-white">
                                            <?php echo !empty($staff['Department']) ? ucfirst($staff['Department']) : 'General'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-12">
                            <!-- Information Grid -->
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                                <!-- Personal Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-blue-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-user text-blue-600  text-lg"></i>
                                        </div>
                                        Personal Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Full Name</span>
                                            <span class="text-gray-900  font-medium">
                                                <?php
                                                $fullName = $staff['FirstName'];
                                                if (!empty($staff['MiddleName'])) $fullName .= ' ' . $staff['MiddleName'];
                                                $fullName .= ' ' . $staff['Surname'];
                                                echo htmlspecialchars($fullName);
                                                ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Date of Birth</span>
                                            <span class="text-gray-900  font-medium"><?php echo date('F j, Y', strtotime($staff['DateOfBirth'])); ?></span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Age</span>
                                            <span class="text-gray-900  font-medium"><?php echo $age; ?> years old</span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Gender</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-<?php echo $staff['Gender'] === 'male' ? 'mars' : 'venus'; ?> mr-2 text-<?php echo $staff['Gender'] === 'male' ? 'blue' : 'pink'; ?>-500"></i>
                                                <?php echo ucfirst($staff['Gender']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-green-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-address-book text-green-600  text-lg"></i>
                                        </div>
                                        Contact Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Email Address</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-envelope mr-2 text-gray-400"></i>
                                                <?php echo htmlspecialchars($staff['Email']); ?>
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Phone Number</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-phone mr-2 text-gray-400"></i>
                                                <?php echo htmlspecialchars($staff['Contact']); ?>
                                            </span>
                                        </div>

                                        <?php if (!empty($staff['EmergencyContact'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Emergency Contact</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-exclamation-triangle mr-2 text-red-500"></i>
                                                <?php echo htmlspecialchars($staff['EmergencyContact']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['Address'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Address</span>
                                            <span class="text-gray-900  font-medium flex items-start">
                                                <i class="fas fa-map-marker-alt mr-2 text-gray-400 mt-1"></i>
                                                <span><?php echo nl2br(htmlspecialchars($staff['Address'])); ?></span>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Employment Information -->
                                <div class="bg-gray-50  rounded-md p-8">
                                    <h3 class="text-xl font-semibold text-gray-900  mb-8 flex items-center">
                                        <div class="bg-purple-100  rounded-md p-3 mr-4">
                                            <i class="fas fa-briefcase text-purple-600  text-lg"></i>
                                        </div>
                                        Employment Information
                                    </h3>

                                    <div class="space-y-6">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Department</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800   w-fit">
                                                <i class="fas fa-hospital-alt mr-2"></i>
                                                <?php echo !empty($staff['Department']) ? ucfirst($staff['Department']) : 'General'; ?>
                                            </span>
                                        </div>

                                        <?php if (!empty($staff['StaffType'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Staff Type</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800   w-fit">
                                                <i class="fas fa-user-tie mr-2"></i>
                                                <?php echo ucfirst($staff['StaffType']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['StaffCategory'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Category</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800   w-fit">
                                                <i class="fas fa-tags mr-2"></i>
                                                <?php echo ucfirst($staff['StaffCategory']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['StaffGrade'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Grade</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800   w-fit">
                                                <i class="fas fa-star mr-2"></i>
                                                <?php echo ucfirst($staff['StaffGrade']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['HireDate'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Hire Date</span>
                                            <span class="text-gray-900  font-medium flex items-center">
                                                <i class="fas fa-calendar-plus mr-2 text-gray-400"></i>
                                                <?php echo date('F j, Y', strtotime($staff['HireDate'])); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>

                                        <?php if (!empty($staff['Status'])): ?>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500  mb-1">Status</span>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800   w-fit">
                                                <i class="fas fa-check-circle mr-2"></i>
                                                <?php echo ucfirst($staff['Status']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-12 pt-8 border-t border-gray-200 ">
                                <div class="flex flex-wrap gap-6">
                                    <a href="<?= url('admin/staff/view') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Back to Staff List
                                    </a>
                                    <a href="<?= url('admin/staff/register') ?>&edit=<?php echo $staff['ID']; ?>" class="bg-yuki-600 text-white px-6 py-3 rounded-md hover:bg-yuki-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Staff
                                    </a>
                                    <button onclick="window.print()" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-print mr-2"></i>
                                        Print Profile
                                    </button>
                                    <a href="<?= url('admin/staff/manage') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-users mr-2"></i>
                                        Manage Staff
                                    </a>
                                    <button class="bg-purple-600 text-white px-6 py-3 rounded-md hover:bg-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center">
                                        <i class="fas fa-clock mr-2"></i>
                                        Work Schedule
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
