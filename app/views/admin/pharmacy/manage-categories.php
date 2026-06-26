                <div class="max-w-6xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">Manage Categories</h1>
                        <p class="text-gray-600 ">Organize and manage medication categories</p>
                    </div>

                    <!-- Coming Soon Card -->
                    <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="bg-blue-100    rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-list-ul text-blue-600  text-3xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900  mb-4">Category Management</h2>
                            <p class="text-gray-600  mb-8">
                                This feature is currently under development. You can add medications with categories using the Add Medication form.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="<?= url('admin/pharmacy/add-category') ?>" class="bg-yuki-600  text-white px-6 py-3 rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-pills mr-2"></i>
                                    Add Medication
                                </a>
                                <a href="<?= url('admin/pharmacy/medications') ?>" class="bg-secondary-600  text-white px-6 py-3 rounded-md hover:bg-secondary-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-prescription-bottle-alt mr-2"></i>
                                    View Medications
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Available Categories -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900  mb-6">Medication Categories</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-shield-virus text-red-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Antibiotics</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Medications to treat bacterial infections</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-hand-holding-medical text-blue-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Pain Relief</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Analgesics and pain management medications</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-heartbeat text-red-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Cardiovascular</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Heart and blood pressure medications</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-green-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-tint text-green-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Diabetes</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Blood sugar management medications</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-cyan-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-lungs text-cyan-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Respiratory</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Breathing and lung-related medications</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-purple-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-brain text-purple-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Neurological</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Brain and nervous system medications</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-yellow-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-capsules text-yellow-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Vitamins</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Vitamins and dietary supplements</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-gray-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-pills text-gray-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Other</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Miscellaneous medications and treatments</p>
                            </div>
                        </div>
                    </div>
                </div>
