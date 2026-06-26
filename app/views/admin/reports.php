<?php
/** Analytics & Reports content (rendered inside the admin layout's <main>). */

$kpis = [
    ['label' => 'Total Patients',     'value' => $totalPatients,    'icon' => 'fa-users',          'note' => $upcoming . ' upcoming appointments', 'feature' => true],
    ['label' => 'Active Staff',       'value' => $activeStaff,      'icon' => 'fa-user-doctor',    'note' => $totalStaff . ' total staff'],
    ['label' => 'Medications',        'value' => $totalMedications, 'icon' => 'fa-pills',          'note' => number_format($totalStock) . ' units in stock'],
    ['label' => "Today's Appointments",'value' => $todayAppointments,'icon' => 'fa-calendar-check', 'note' => $lowStock . ' meds low on stock'],
];

/** Sum a [label => count] map, treating values as ints. */
$sum = fn(array $a): int => array_sum(array_map('intval', $a));
?>

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 print:mb-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Analytics &amp; Reports</h2>
        <p class="text-gray-500 mt-1">Hospital-wide insights · generated <?= date('l, F j, Y \a\t g:i A') ?></p>
    </div>
    <div class="flex items-center gap-3 print:hidden">
        <button onclick="window.print()" class="inline-flex items-center gap-2 bg-yuki-600 hover:bg-yuki-700 text-white px-4 py-2.5 rounded-md font-semibold text-sm transition-colors shadow-sm">
            <i class="fas fa-print"></i> Print / Export PDF
        </button>
        <a href="<?= url('admin/dashboard') ?>" class="inline-flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-4 py-2.5 rounded-md font-semibold text-sm transition-colors">
            <i class="fas fa-gauge-high"></i> Dashboard
        </a>
    </div>
</div>

<!-- KPI cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
    <?php foreach ($kpis as $k): ?>
        <?php if (!empty($k['feature'])): ?>
            <div class="bg-yuki-600 rounded-md p-6 text-white shadow-sm relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-28 h-28 bg-white/10 rounded-full"></div>
                <div class="relative">
                    <div class="flex items-start justify-between">
                        <p class="text-sm font-medium text-yuki-50"><?= e($k['label']) ?></p>
                        <span class="w-9 h-9 rounded-md bg-white/15 flex items-center justify-center"><i class="fas <?= $k['icon'] ?>"></i></span>
                    </div>
                    <p class="text-4xl font-bold mt-3"><?= number_format($k['value']) ?></p>
                    <p class="text-xs text-yuki-100 mt-2"><?= e($k['note']) ?></p>
                </div>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
                <div class="flex items-start justify-between">
                    <p class="text-sm font-medium text-gray-500"><?= e($k['label']) ?></p>
                    <span class="w-9 h-9 rounded-md bg-yuki-50 text-yuki-600 flex items-center justify-center"><i class="fas <?= $k['icon'] ?>"></i></span>
                </div>
                <p class="text-4xl font-bold text-gray-900 mt-3"><?= number_format($k['value']) ?></p>
                <p class="text-xs text-gray-400 mt-2"><?= e($k['note']) ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<!-- Row: registration trend + appointment status -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="lg:col-span-2 bg-white rounded-md p-6 border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Patient Registration Trend</h3>
                <p class="text-sm text-gray-500">New patients registered over the last 6 months</p>
            </div>
            <span class="text-xs font-medium text-yuki-700 bg-yuki-50 px-3 py-1.5 rounded-md print:hidden">6 months</span>
        </div>
        <div class="h-72"><canvas id="trendChart"></canvas></div>
    </div>

    <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-900 mb-1">Appointment Status</h3>
        <p class="text-sm text-gray-500 mb-4">All appointments by status</p>
        <?php if ($sum($statusBreakdown) === 0): ?>
            <p class="text-gray-400 text-center py-16">No appointment data yet</p>
        <?php else: ?>
            <div class="h-56 flex items-center justify-center"><canvas id="statusChart"></canvas></div>
            <div class="mt-4 space-y-2 text-sm">
                <?php
                $statusColors = ['pending' => 'bg-secondary-400', 'confirmed' => 'bg-medical-400', 'completed' => 'bg-yuki-500', 'cancelled' => 'bg-gray-300'];
                foreach (['pending', 'confirmed', 'completed', 'cancelled'] as $st): ?>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full <?= $statusColors[$st] ?>"></span>
                        <span class="text-gray-600 capitalize"><?= $st ?></span>
                        <span class="ml-auto font-semibold text-gray-900"><?= (int) ($statusBreakdown[$st] ?? 0) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Row: patients by department + by gender -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <div class="lg:col-span-2 bg-white rounded-md p-6 border border-gray-200 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-900 mb-1">Patients by Department</h3>
        <p class="text-sm text-gray-500 mb-4">Distribution of patients across departments</p>
        <?php if ($sum($patientsByDept) === 0): ?>
            <p class="text-gray-400 text-center py-16">No patient data yet</p>
        <?php else: ?>
            <div class="h-72"><canvas id="deptChart"></canvas></div>
        <?php endif; ?>
    </div>

    <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-900 mb-1">Patients by Gender</h3>
        <p class="text-sm text-gray-500 mb-4">Gender distribution</p>
        <?php if ($sum($patientsByGender) === 0): ?>
            <p class="text-gray-400 text-center py-16">No patient data yet</p>
        <?php else: ?>
            <div class="h-56 flex items-center justify-center"><canvas id="genderChart"></canvas></div>
        <?php endif; ?>
    </div>
</div>

<!-- Row: staff by department + medication stock -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-900 mb-1">Staff by Department</h3>
        <p class="text-sm text-gray-500 mb-4">Workforce distribution</p>
        <?php if ($sum($staffByDept) === 0): ?>
            <p class="text-gray-400 text-center py-16">No staff data yet</p>
        <?php else: ?>
            <div class="h-72"><canvas id="staffChart"></canvas></div>
        <?php endif; ?>
    </div>

    <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-900 mb-1">Medication Stock by Category</h3>
        <p class="text-sm text-gray-500 mb-4">Units in stock per category</p>
        <?php if ($sum($medsByCategory) === 0): ?>
            <p class="text-gray-400 text-center py-16">No medication data yet</p>
        <?php else: ?>
            <div class="h-72"><canvas id="medChart"></canvas></div>
        <?php endif; ?>
    </div>
</div>

<!-- Low stock table -->
<div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden mb-6">
    <div class="flex items-center justify-between p-6 pb-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Low Stock Alert</h3>
            <p class="text-sm text-gray-500">Medications at or below 10 units</p>
        </div>
        <span class="text-xs font-medium <?= $lowStock > 0 ? 'text-secondary-700 bg-secondary-50' : 'text-yuki-700 bg-yuki-50' ?> px-3 py-1.5 rounded-md"><?= (int) $lowStock ?> item<?= $lowStock === 1 ? '' : 's' ?></span>
    </div>
    <?php if (empty($lowStockList)): ?>
        <p class="text-gray-400 text-center py-10"><i class="fas fa-circle-check text-yuki-500 mr-2"></i>All medications are well stocked.</p>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-y border-gray-100 bg-gray-50">
                        <th class="px-6 py-3 font-medium">Medication</th>
                        <th class="px-6 py-3 font-medium">Category</th>
                        <th class="px-6 py-3 font-medium">Dosage</th>
                        <th class="px-6 py-3 font-medium">Manufacturer</th>
                        <th class="px-6 py-3 font-medium text-right">Quantity</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($lowStockList as $med): ?>
                        <?php $qty = (int) ($med['Quantity'] ?? 0); ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-3 font-medium text-gray-900"><?= e($med['Name'] ?? '') ?></td>
                            <td class="px-6 py-3 text-gray-600"><?= e($med['Category'] ?? '—') ?></td>
                            <td class="px-6 py-3 text-gray-600"><?= e($med['Dosage'] ?? '—') ?></td>
                            <td class="px-6 py-3 text-gray-600"><?= e($med['Manufacturer'] ?? '—') ?></td>
                            <td class="px-6 py-3 text-right">
                                <span class="px-2.5 py-1 rounded-md font-semibold <?= $qty === 0 ? 'bg-red-50 text-red-600' : 'bg-secondary-50 text-secondary-700' ?>"><?= $qty ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<style>
    @media print {
        #adminSidebar, #adminSidebarOverlay, header { display: none !important; }
        main { overflow: visible !important; padding: 0 !important; }
        .shadow-sm { box-shadow: none !important; }
        body { background: #fff !important; }
    }
</style>

<script>
    (function () {
        if (!window.Chart) return;

        const yuki = '#059669', yukiDark = '#047857';
        const palette = ['#059669', '#fbbf24', '#38bdf8', '#34d399', '#f59e0b', '#0ea5e9', '#10b981', '#d97706'];
        Chart.defaults.font.family = "'Raleway', sans-serif";
        Chart.defaults.color = '#6b7280';

        const make = (id, config) => {
            const el = document.getElementById(id);
            if (el) new Chart(el.getContext('2d'), config);
        };

        const noLegend = { legend: { display: false } };
        const gridY = { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { precision: 0 } };
        const gridXnone = { grid: { display: false } };

        // Registration trend (line)
        const monthly = <?= json_encode($monthlyPatients) ?>;
        make('trendChart', {
            type: 'line',
            data: {
                labels: Object.keys(monthly),
                datasets: [{
                    label: 'New Patients', data: Object.values(monthly),
                    borderColor: yuki, backgroundColor: 'rgba(5,150,105,0.10)',
                    fill: true, tension: 0.4, borderWidth: 2, pointRadius: 4,
                    pointBackgroundColor: yuki, pointHoverRadius: 6,
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: noLegend, scales: { y: gridY, x: gridXnone } }
        });

        // Appointment status (doughnut)
        const status = <?= json_encode($statusBreakdown) ?>;
        if (Object.keys(status).length) {
            const order = ['pending', 'confirmed', 'completed', 'cancelled'];
            const colorMap = { pending: '#fbbf24', confirmed: '#38bdf8', completed: yuki, cancelled: '#d1d5db' };
            make('statusChart', {
                type: 'doughnut',
                data: {
                    labels: order.map(s => s[0].toUpperCase() + s.slice(1)),
                    datasets: [{ data: order.map(s => status[s] || 0), backgroundColor: order.map(s => colorMap[s]), borderWidth: 0 }]
                },
                options: { responsive: true, maintainAspectRatio: false, cutout: '68%', plugins: noLegend }
            });
        }

        // Patients by department (horizontal bar)
        const dept = <?= json_encode($patientsByDept) ?>;
        make('deptChart', {
            type: 'bar',
            data: {
                labels: Object.keys(dept),
                datasets: [{ label: 'Patients', data: Object.values(dept), backgroundColor: yuki, hoverBackgroundColor: yukiDark, borderRadius: 6, maxBarThickness: 26 }]
            },
            options: { indexAxis: 'y', responsive: true, maintainAspectRatio: false, plugins: noLegend, scales: { x: gridY, y: gridXnone } }
        });

        // Patients by gender (doughnut)
        const gender = <?= json_encode($patientsByGender) ?>;
        if (Object.keys(gender).length) {
            make('genderChart', {
                type: 'doughnut',
                data: {
                    labels: Object.keys(gender).map(g => g[0].toUpperCase() + g.slice(1)),
                    datasets: [{ data: Object.values(gender), backgroundColor: ['#38bdf8', '#f472b6', '#a78bfa'], borderWidth: 0 }]
                },
                options: { responsive: true, maintainAspectRatio: false, cutout: '60%', plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, padding: 14 } } } }
            });
        }

        // Staff by department (bar)
        const staff = <?= json_encode($staffByDept) ?>;
        make('staffChart', {
            type: 'bar',
            data: {
                labels: Object.keys(staff),
                datasets: [{ label: 'Staff', data: Object.values(staff), backgroundColor: '#38bdf8', hoverBackgroundColor: '#0ea5e9', borderRadius: 6, maxBarThickness: 38 }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: noLegend, scales: { y: gridY, x: gridXnone } }
        });

        // Medication stock by category (bar)
        const meds = <?= json_encode($medsByCategory) ?>;
        make('medChart', {
            type: 'bar',
            data: {
                labels: Object.keys(meds),
                datasets: [{ label: 'Units', data: Object.values(meds).map(Number), backgroundColor: palette, borderRadius: 6, maxBarThickness: 38 }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: noLegend, scales: { y: gridY, x: gridXnone } }
        });
    })();
</script>
