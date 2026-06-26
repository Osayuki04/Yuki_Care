<?php
/** Staff portal dashboard. Rendered inside the staff layout. */
$first = explode(' ', trim(StaffAuth::name()))[0] ?? 'there';

$stats = [
    ['label' => 'Total Patients',      'value' => $totalPatients,     'icon' => 'fa-users',           'feature' => true],
    ['label' => "Appointments Today",  'value' => $appointmentsToday, 'icon' => 'fa-calendar-day'],
    ['label' => 'Pending Requests',    'value' => $pendingRequests,   'icon' => 'fa-hourglass-half'],
    ['label' => 'Staff Members',       'value' => $totalStaff,        'icon' => 'fa-user-doctor'],
];

$badge = fn(string $s) => match ($s) {
    'confirmed' => 'bg-yuki-50 text-yuki-700',
    'cancelled' => 'bg-gray-100 text-gray-500',
    default     => 'bg-secondary-50 text-secondary-700',
};
$name = fn(array $r) => trim(($r['FirstName'] ?? '') . ' ' . ($r['Surname'] ?? ''));
?>

<div class="mb-6 bg-white rounded-md border border-gray-200 shadow-sm p-5 sm:p-6 flex items-center justify-between gap-4 overflow-hidden relative">
    <div class="absolute -right-10 -top-10 w-40 h-40 bg-yuki-50 rounded-full hidden sm:block"></div>
    <div class="relative">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Welcome, <?= e($first) ?> 👋</h2>
        <p class="text-gray-500 mt-1 text-sm sm:text-base">
            <?= StaffAuth::department() ? e(StaffAuth::department()) . ' · ' : '' ?><?= date('l, F j, Y') ?>
        </p>
    </div>
    <img src="<?= e(avatar_url(StaffAuth::name(), $staff['Gender'] ?? null)) ?>"
         alt="Your avatar" loading="lazy"
         class="relative h-16 w-16 sm:h-20 sm:w-20 rounded-full ring-2 ring-yuki-100 bg-yuki-50 flex-shrink-0 animate-float-slow">
</div>

<!-- Stat cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
    <?php foreach ($stats as $s): ?>
        <div class="<?= !empty($s['feature']) ? 'bg-yuki-600 text-white' : 'bg-white border border-gray-200 text-gray-900' ?> rounded-md p-6 shadow-sm relative overflow-hidden transition-all duration-200 hover:shadow-md hover:-translate-y-0.5">
            <?php if (!empty($s['feature'])): ?><div class="absolute -right-6 -top-6 w-28 h-28 bg-white/10 rounded-full"></div><?php endif; ?>
            <div class="relative flex items-start justify-between">
                <p class="text-sm font-medium <?= !empty($s['feature']) ? 'text-yuki-50' : 'text-gray-500' ?>"><?= e($s['label']) ?></p>
                <span class="w-9 h-9 rounded-md <?= !empty($s['feature']) ? 'bg-white/15' : 'bg-yuki-50 text-yuki-600' ?> flex items-center justify-center"><i class="fas <?= $s['icon'] ?>"></i></span>
            </div>
            <p class="relative text-4xl font-bold mt-3 count-up"><?= number_format($s['value']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Upcoming appointments -->
    <div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-6 pb-4"><h3 class="text-lg font-semibold text-gray-900">Upcoming Appointments</h3></div>
        <?php if (empty($upcoming)): ?>
            <p class="text-gray-400 text-center py-10">No upcoming appointments.</p>
        <?php else: ?>
            <div class="divide-y divide-gray-100">
                <?php foreach ($upcoming as $a): ?>
                    <div class="flex items-center gap-4 px-6 py-3.5">
                        <div class="text-center bg-yuki-50 rounded-md px-3 py-2 flex-shrink-0">
                            <p class="text-xs font-medium text-yuki-600 uppercase"><?= date('M', strtotime($a['AppointmentDate'])) ?></p>
                            <p class="text-xl font-bold text-gray-900 leading-none"><?= date('d', strtotime($a['AppointmentDate'])) ?></p>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="font-medium text-gray-900 truncate"><?= e($name($a)) ?></p>
                            <p class="text-sm text-gray-500 truncate"><?= e($a['Department'] ?: 'General Medicine') ?><?= $a['AppointmentTime'] ? ' · ' . date('g:i A', strtotime($a['AppointmentTime'])) : '' ?></p>
                        </div>
                        <span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $badge($a['Status']) ?> flex-shrink-0"><?= e(ucfirst($a['Status'])) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Recent patients -->
    <div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-6 pb-4"><h3 class="text-lg font-semibold text-gray-900">Recent Patients</h3></div>
        <?php if (empty($recentPatients)): ?>
            <p class="text-gray-400 text-center py-10">No patients yet.</p>
        <?php else: ?>
            <div class="divide-y divide-gray-100">
                <?php foreach ($recentPatients as $p): ?>
                    <div class="flex items-center gap-3 px-6 py-3.5">
                        <div class="bg-yuki-100 text-yuki-700 rounded-full w-10 h-10 flex items-center justify-center font-semibold text-sm flex-shrink-0">
                            <?= e(strtoupper(substr($p['FirstName'] ?? 'P', 0, 1) . substr($p['Surname'] ?? '', 0, 1))) ?>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="font-medium text-gray-900 truncate"><?= e(Patient::fullName($p)) ?></p>
                            <p class="text-sm text-gray-500 truncate"><?= e($p['Department'] ?? 'General Medicine') ?></p>
                        </div>
                        <?php $st = strtolower($p['Status'] ?? 'pending'); ?>
                        <span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $badge($st) ?> flex-shrink-0"><?= e(ucfirst($st)) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="mt-6 bg-yuki-50 border border-yuki-100 rounded-md p-5 flex items-start gap-3">
    <span class="w-9 h-9 rounded-md bg-white text-yuki-600 flex items-center justify-center flex-shrink-0 shadow-sm"><i class="fas fa-circle-info"></i></span>
    <p class="text-sm text-yuki-800">Clinical tools — writing prescriptions, requesting lab tests and managing your schedule — are coming next. For now you can review patients and appointments here.</p>
</div>
