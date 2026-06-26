<?php
/** Admin dashboard content (rendered inside the admin layout's <main>). */
$totalAppointments = $pendingCount + $confirmedCount + $completedCount + $cancelledCount;
$completedPct = $totalAppointments > 0 ? round($completedCount / $totalAppointments * 100) : 0;

$stats = [
    [
        'label'   => 'Total Patients',
        'value'   => $totalPatients,
        'icon'    => 'fa-users',
        'note'    => 'All registered patients',
        'feature' => true,
    ],
    [
        'label'   => 'Active Staff',
        'value'   => $totalStaff,
        'icon'    => 'fa-user-doctor',
        'note'    => 'Across all departments',
        'feature' => false,
    ],
    [
        'label'   => "Today's Appointments",
        'value'   => $todayAppointments,
        'icon'    => 'fa-calendar-check',
        'note'    => date('M d, Y'),
        'feature' => false,
    ],
    [
        'label'   => 'Upcoming',
        'value'   => $upcomingAppointments,
        'icon'    => 'fa-calendar-alt',
        'note'    => 'Future appointments',
        'feature' => false,
    ],
];
?>

<!-- Greeting / action bar -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div class="flex items-center gap-4">
        <img src="<?= e(avatar_url(Auth::name(), null)) ?>"
             alt="Your avatar" loading="lazy"
             class="h-14 w-14 rounded-full ring-2 ring-yuki-100 bg-yuki-50 flex-shrink-0 hidden sm:block animate-float-slow">
        <div>
        <h2 class="text-2xl font-bold text-gray-900">Welcome back, <?= e(Auth::name()) ?> 👋</h2>
        <p class="text-gray-500 mt-1">Here's what's happening at Yibera today — <?= date('l, F j, Y') ?>.</p>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <a href="<?= url('admin/patients/register') ?>" class="inline-flex items-center gap-2 bg-yuki-600 hover:bg-yuki-700 text-white px-4 py-2.5 rounded-md font-semibold text-sm transition-colors shadow-sm">
            <i class="fas fa-plus"></i> Register Patient
        </a>
        <a href="<?= url('admin/reports') ?>" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-4 py-2.5 rounded-md font-semibold text-sm transition-colors">
            <i class="fas fa-file-export"></i> Reports
        </a>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
    <?php foreach ($stats as $s): ?>
        <?php if ($s['feature']): ?>
            <div class="bg-yuki-600 rounded-md p-6 text-white shadow-sm relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-28 h-28 bg-white/10 rounded-full"></div>
                <div class="relative">
                    <div class="flex items-start justify-between">
                        <p class="text-sm font-medium text-yuki-50"><?= e($s['label']) ?></p>
                        <span class="w-9 h-9 rounded-md bg-white/15 flex items-center justify-center"><i class="fas <?= $s['icon'] ?>"></i></span>
                    </div>
                    <p class="text-4xl font-bold mt-3 count-up"><?= number_format($s['value']) ?></p>
                    <p class="text-xs text-yuki-100 mt-2 flex items-center gap-1"><i class="fas fa-arrow-trend-up"></i> <?= e($s['note']) ?></p>
                </div>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
                <div class="flex items-start justify-between">
                    <p class="text-sm font-medium text-gray-500"><?= e($s['label']) ?></p>
                    <span class="w-9 h-9 rounded-md bg-yuki-50 text-yuki-600 flex items-center justify-center"><i class="fas <?= $s['icon'] ?>"></i></span>
                </div>
                <p class="text-4xl font-bold text-gray-900 mt-3 count-up"><?= number_format($s['value']) ?></p>
                <p class="text-xs text-gray-400 mt-2"><?= e($s['note']) ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<!-- Analytics + Appointment status -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Patient Analytics (bar chart) -->
    <div class="lg:col-span-2 bg-white rounded-md p-6 border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Patient Analytics</h3>
                <p class="text-sm text-gray-500">New registrations over the last 7 days</p>
            </div>
            <span class="text-xs font-medium text-yuki-700 bg-yuki-50 px-3 py-1.5 rounded-md">This week</span>
        </div>
        <div class="h-72"><canvas id="patientChart"></canvas></div>
    </div>

    <!-- Appointment status (doughnut) -->
    <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm flex flex-col">
        <h3 class="text-lg font-semibold text-gray-900 mb-1">Appointment Status</h3>
        <p class="text-sm text-gray-500 mb-4">Breakdown of all appointments</p>
        <div class="relative flex-1 flex items-center justify-center min-h-[180px]">
            <canvas id="statusChart"></canvas>
            <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                <span class="text-3xl font-bold text-gray-900"><?= $completedPct ?>%</span>
                <span class="text-xs text-gray-500">Completed</span>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 mt-5 text-sm">
            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-yuki-500"></span><span class="text-gray-600">Completed</span><span class="ml-auto font-semibold text-gray-900"><?= $completedCount ?></span></div>
            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-secondary-400"></span><span class="text-gray-600">Pending</span><span class="ml-auto font-semibold text-gray-900"><?= $pendingCount ?></span></div>
            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-medical-400"></span><span class="text-gray-600">Confirmed</span><span class="ml-auto font-semibold text-gray-900"><?= $confirmedCount ?></span></div>
            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span><span class="text-gray-600">Cancelled</span><span class="ml-auto font-semibold text-gray-900"><?= $cancelledCount ?></span></div>
        </div>
    </div>
</div>

<!-- Recent patients + Highlight cards -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Recent Patients -->
    <div class="lg:col-span-2 bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between p-6 pb-4">
            <h3 class="text-lg font-semibold text-gray-900">Recent Patients</h3>
            <a href="<?= url('admin/patients/view') ?>" class="text-yuki-600 hover:text-yuki-700 text-sm font-medium">View All <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
        </div>
        <div class="divide-y divide-gray-100">
            <?php if (empty($recentPatients)): ?>
                <p class="text-gray-500 text-center py-10">No recent patients</p>
            <?php else: ?>
                <?php foreach ($recentPatients as $patient): ?>
                    <?php
                    $status = strtolower($patient['Status'] ?? 'pending');
                    $badge = match ($status) {
                        'confirmed' => 'bg-medical-50 text-medical-700',
                        'completed' => 'bg-yuki-50 text-yuki-700',
                        'cancelled' => 'bg-gray-100 text-gray-600',
                        default     => 'bg-secondary-50 text-secondary-700',
                    };
                    ?>
                    <div class="flex items-center justify-between px-6 py-3.5 hover:bg-gray-50 transition-colors">
                        <div class="flex items-center min-w-0">
                            <div class="bg-yuki-100 text-yuki-700 rounded-full w-10 h-10 flex items-center justify-center mr-3 font-semibold text-sm flex-shrink-0">
                                <?= e(strtoupper(substr($patient['FirstName'] ?? 'P', 0, 1) . substr($patient['Surname'] ?? '', 0, 1))) ?>
                            </div>
                            <div class="min-w-0">
                                <p class="font-medium text-gray-900 truncate"><?= e(Patient::fullName($patient)) ?></p>
                                <p class="text-sm text-gray-500 truncate"><?= e($patient['Department'] ?? 'General Medicine') ?></p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $badge ?> flex-shrink-0"><?= e(ucfirst($status)) ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Side highlight cards -->
    <div class="space-y-6">
        <!-- Pharmacy snapshot (dark green, like Time Tracker) -->
        <div class="bg-yuki-700 rounded-md p-6 text-white shadow-sm relative overflow-hidden">
            <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-white/5 rounded-full"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">Pharmacy</h3>
                    <span class="w-9 h-9 rounded-md bg-white/15 flex items-center justify-center"><i class="fas fa-pills"></i></span>
                </div>
                <p class="text-4xl font-bold"><?= number_format($totalMedications) ?></p>
                <p class="text-sm text-yuki-100">Medications in inventory</p>
                <?php if ($lowStock > 0): ?>
                    <div class="mt-4 flex items-center gap-2 bg-white/10 rounded-md px-3 py-2 text-sm">
                        <i class="fas fa-triangle-exclamation text-secondary-300"></i>
                        <span><?= $lowStock ?> item<?= $lowStock === 1 ? '' : 's' ?> low on stock</span>
                    </div>
                <?php endif; ?>
                <a href="<?= url('admin/pharmacy/manage') ?>" class="mt-5 block text-center bg-white text-yuki-700 hover:bg-gray-100 px-4 py-2.5 rounded-md font-semibold text-sm transition-colors">Manage Inventory</a>
            </div>
        </div>

        <!-- Quick reminder card -->
        <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 mb-1">Reminder</h3>
            <p class="text-sm text-gray-500 mb-4">Appointments waiting for review</p>
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-md bg-secondary-50 text-secondary-600 flex items-center justify-center text-2xl font-bold flex-shrink-0">
                    <?= $pendingCount ?>
                </div>
                <p class="text-sm text-gray-600">pending request<?= $pendingCount === 1 ? '' : 's' ?> need your confirmation.</p>
            </div>
            <a href="<?= url('admin/patients/manage') ?>" class="mt-5 block text-center bg-yuki-600 hover:bg-yuki-700 text-white px-4 py-2.5 rounded-md font-semibold text-sm transition-colors">Review Now</a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
    <h3 class="text-lg font-semibold text-gray-900 mb-5">Quick Actions</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php
        $actions = [
            ['url' => 'admin/patients/register', 'icon' => 'fa-user-plus',  'title' => 'Register Patient', 'sub' => 'Add new patient'],
            ['url' => 'admin/staff/register',    'icon' => 'fa-user-doctor','title' => 'Register Staff',   'sub' => 'New staff member'],
            ['url' => 'admin/pharmacy/register', 'icon' => 'fa-prescription-bottle-medical', 'title' => 'Add Medication', 'sub' => 'Pharmacy inventory'],
            ['url' => 'admin/patients/view',     'icon' => 'fa-users',      'title' => 'View Patients',    'sub' => 'Patient records'],
        ];
        foreach ($actions as $a): ?>
            <a href="<?= url($a['url']) ?>" class="group flex items-center p-4 bg-gray-50 hover:bg-yuki-50 rounded-md border border-gray-100 hover:border-yuki-200 transition-all duration-200">
                <div class="w-11 h-11 bg-white group-hover:bg-yuki-100 text-yuki-600 rounded-md flex items-center justify-center mr-3 shadow-sm group-hover:scale-105 transition-all duration-200"><i class="fas <?= $a['icon'] ?> text-lg"></i></div>
                <div>
                    <span class="font-semibold text-gray-900 block text-sm"><?= e($a['title']) ?></span>
                    <span class="text-xs text-gray-500"><?= e($a['sub']) ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<script>
    const yuki = '#059669', yukiSoft = 'rgba(5, 150, 105, 0.12)';

    const barCanvas = document.getElementById('patientChart');
    if (barCanvas && window.Chart) {
        const daily = <?= json_encode($dailyPatients) ?>;
        const labels = Object.keys(daily).map(d =>
            new Date(d + 'T00:00:00').toLocaleDateString('en-US', { weekday: 'short' }));
        new Chart(barCanvas.getContext('2d'), {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    label: 'New Patients',
                    data: Object.values(daily),
                    backgroundColor: yuki,
                    hoverBackgroundColor: '#047857',
                    borderRadius: 6,
                    maxBarThickness: 38,
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { precision: 0 } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    const statusCanvas = document.getElementById('statusChart');
    if (statusCanvas && window.Chart) {
        new Chart(statusCanvas.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Pending', 'Confirmed', 'Cancelled'],
                datasets: [{
                    data: [<?= $completedCount ?>, <?= $pendingCount ?>, <?= $confirmedCount ?>, <?= $cancelledCount ?>, <?= $totalAppointments === 0 ? 1 : 0 ?>],
                    backgroundColor: [yuki, '#fbbf24', '#38bdf8', '#d1d5db', '#f1f5f9'],
                    borderWidth: 0,
                }]
            },
            options: {
                responsive: true, maintainAspectRatio: true, cutout: '72%',
                plugins: { legend: { display: false }, tooltip: { enabled: <?= $totalAppointments === 0 ? 'false' : 'true' ?> } }
            }
        });
    }
</script>
