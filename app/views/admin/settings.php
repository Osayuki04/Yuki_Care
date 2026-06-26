                <div class="max-w-6xl mx-auto">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900  mb-2">Settings</h1>
                        <p class="text-gray-600 ">Configure system settings and preferences</p>
                    </div>

                    <!-- Coming Soon Card -->
                    <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-12 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="bg-gray-100    rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-cog text-gray-600  text-3xl"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900  mb-4">System Settings</h2>
                            <p class="text-gray-600  mb-8">
                                Settings and configuration options are currently under development. The system is fully functional with default settings.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="<?= url('admin/dashboard') ?>" class="bg-yuki-600  text-white px-6 py-3 rounded-md hover:bg-yuki-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    Back to Dashboard
                                </a>
                                <a href="<?= url('admin/reports') ?>" class="bg-secondary-600  text-white px-6 py-3 rounded-md hover:bg-secondary-700 hover: transition-colors shadow-lg hover:shadow-xl">
                                    <i class="fas fa-chart-bar mr-2"></i>
                                    View Reports
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Available Settings Preview -->
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-900  mb-6">Available Settings (Coming Soon)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-user-cog text-blue-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">User Management</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Manage admin users, roles, and permissions</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-green-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-hospital text-green-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Hospital Info</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Update hospital details and contact information</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-purple-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-envelope text-purple-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Email Settings</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Configure email notifications and SMTP settings</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-yellow-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-shield-alt text-yellow-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Security</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Password policies and security configurations</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-red-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-database text-red-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Backup</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Database backup and restore options</p>
                            </div>

                            <div class="bg-white  rounded-md shadow-sm border border-gray-200  p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-indigo-100  rounded-md w-12 h-12 flex items-center justify-center mr-4">
                                        <i class="fas fa-palette text-indigo-600 "></i>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 ">Appearance</h4>
                                </div>
                                <p class="text-gray-600  text-sm">Theme customization and branding options</p>
                            </div>
                        </div>
                    </div>
                </div>
