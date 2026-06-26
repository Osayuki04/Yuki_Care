                <div class="max-w-6xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">Assign Department</h1>
                        <p class="text-gray-600 ">Assign staff members to departments and manage organizational structure</p>
                    </div>

                    <!-- Coming Soon Card -->
                    <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="bg-yellow-100    rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-sitemap text-yellow-600  text-3xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900  mb-4">Department Assignment</h2>
                            <p class="text-gray-600  mb-8">
                                This feature is currently under development. You can add staff members with department assignments using the Add Employee form.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="<?= url('admin/staff/add') ?>" class="bg-yuki-600  text-white px-6 py-3 rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Add Employee
                                </a>
                                <a href="<?= url('admin/staff/view') ?>" class="bg-secondary-600  text-white px-6 py-3 rounded-md hover:bg-secondary-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-users mr-2"></i>
                                    View Staff
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Department Overview -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900  mb-6">Hospital Departments</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-heart text-red-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Cardiology</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Heart and cardiovascular system specialists</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-purple-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-brain text-purple-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Neurology</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Brain and nervous system specialists</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-pink-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-baby text-pink-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Maternity</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Maternal and newborn care specialists</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-ambulance text-red-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Emergency</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Emergency and trauma care specialists</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-stethoscope text-blue-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">General Medicine</h4>
                                </div>
                                <p class="text-gray-600  text-sm">General practice and internal medicine</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-green-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-child text-green-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Pediatrics</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Children's health and development</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-orange-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-bone text-orange-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Orthopedics</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Bone, joint, and muscle specialists</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-yellow-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-pills text-yellow-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Pharmacy</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Medication management and dispensing</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-indigo-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-flask text-indigo-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Laboratory</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Diagnostic testing and analysis</p>
                            </div>
                        </div>
                    </div>
                </div>
