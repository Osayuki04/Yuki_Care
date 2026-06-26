<?php
/** Patient portal dashboard. Rendered inside the patient layout. */
$first = explode(' ', trim(PatientAuth::name()))[0] ?? 'there';

$stats = [
    ['label' => 'Upcoming Appointments', 'value' => $upcomingCount,  'icon' => 'fa-calendar-check', 'href' => 'portal/appointments', 'feature' => true],
    ['label' => 'Active Prescriptions',  'value' => $activeRx,       'icon' => 'fa-prescription',   'href' => 'portal/prescriptions'],
    ['label' => 'Pending Lab Results',   'value' => $pendingLabs,    'icon' => 'fa-flask',          'href' => 'portal/lab-results'],
    ['label' => 'Unpaid Invoices',       'value' => $unpaidInvoices, 'icon' => 'fa-file-invoice-dollar', 'href' => 'portal/invoices'],
];
?>

<div class="mb-6 bg-white rounded-md border border-gray-200 shadow-sm p-5 sm:p-6 flex items-center justify-between gap-4 overflow-hidden relative">
    <div class="absolute -right-10 -top-10 w-40 h-40 bg-yuki-50 rounded-full hidden sm:block"></div>
    <div class="relative">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Hello, <?= e($first) ?> 👋</h2>
        <p class="text-gray-500 mt-1 text-sm sm:text-base">Here's an overview of your care — <?= date('l, F j, Y') ?>.</p>
    </div>
    <img src="<?= e(avatar_url(PatientAuth::name(), $patient['Gender'] ?? null)) ?>"
         alt="Your avatar" loading="lazy"
         class="relative h-16 w-16 sm:h-20 sm:w-20 rounded-full ring-2 ring-yuki-100 bg-yuki-50 flex-shrink-0 animate-float-slow">
</div>

<!-- Stat cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
    <?php foreach ($stats as $s): ?>
        <a href="<?= url($s['href']) ?>" class="<?= !empty($s['feature']) ? 'bg-yuki-600 text-white' : 'bg-white border border-gray-200 text-gray-900' ?> rounded-md p-6 shadow-sm relative overflow-hidden group transition-all duration-200 hover:shadow-md hover:-translate-y-0.5">
            <?php if (!empty($s['feature'])): ?><div class="absolute -right-6 -top-6 w-28 h-28 bg-white/10 rounded-full"></div><?php endif; ?>
            <div class="relative flex items-start justify-between">
                <p class="text-sm font-medium <?= !empty($s['feature']) ? 'text-yuki-50' : 'text-gray-500' ?>"><?= e($s['label']) ?></p>
                <span class="w-9 h-9 rounded-md <?= !empty($s['feature']) ? 'bg-white/15' : 'bg-yuki-50 text-yuki-600' ?> flex items-center justify-center"><i class="fas <?= $s['icon'] ?>"></i></span>
            </div>
            <p class="relative text-4xl font-bold mt-3 count-up"><?= number_format($s['value']) ?></p>
            <p class="relative text-xs <?= !empty($s['feature']) ? 'text-yuki-100' : 'text-gray-400' ?> mt-2 group-hover:underline">View details <i class="fas fa-arrow-right ml-1"></i></p>
        </a>
    <?php endforeach; ?>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Next appointment -->
    <div class="lg:col-span-2 bg-white rounded-md p-6 border border-gray-200 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Next Appointment</h3>
            <a href="<?= url('portal/appointments') ?>" class="text-yuki-600 hover:text-yuki-700 text-sm font-medium">Manage <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
        </div>
        <?php if (!$nextAppointment): ?>
            <div class="text-center py-10">
                <div class="w-14 h-14 rounded-md bg-gray-50 text-gray-300 flex items-center justify-center mx-auto mb-3 text-2xl"><i class="fas fa-calendar-day"></i></div>
                <p class="text-gray-500 mb-4">You have no upcoming appointments.</p>
                <a href="<?= url('portal/appointments') ?>" class="inline-flex items-center gap-2 bg-yuki-600 hover:bg-yuki-700 text-white px-4 py-2.5 rounded-md font-semibold text-sm transition-colors"><i class="fas fa-plus"></i> Book an appointment</a>
            </div>
        <?php else: ?>
            <div class="flex items-center gap-5 bg-yuki-50 rounded-md p-5">
                <div class="text-center bg-white rounded-md px-4 py-3 shadow-sm flex-shrink-0">
                    <p class="text-xs font-medium text-yuki-600 uppercase"><?= date('M', strtotime($nextAppointment['AppointmentDate'])) ?></p>
                    <p class="text-3xl font-bold text-gray-900 leading-none"><?= date('d', strtotime($nextAppointment['AppointmentDate'])) ?></p>
                </div>
                <div class="min-w-0">
                    <p class="font-semibold text-gray-900"><?= e($nextAppointment['Department'] ?: 'General Medicine') ?></p>
                    <p class="text-sm text-gray-600"><i class="far fa-calendar mr-1"></i><?= date('l, F j, Y', strtotime($nextAppointment['AppointmentDate'])) ?><?= $nextAppointment['AppointmentTime'] ? ' · ' . date('g:i A', strtotime($nextAppointment['AppointmentTime'])) : '' ?></p>
                    <?php $st = $nextAppointment['Status']; $cls = $st === 'confirmed' ? 'bg-medical-50 text-medical-700' : 'bg-secondary-50 text-secondary-700'; ?>
                    <span class="inline-block mt-2 px-2.5 py-1 text-xs font-medium rounded-md <?= $cls ?>"><?= e(ucfirst($st)) ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Billing summary -->
    <div class="bg-yuki-700 rounded-md p-6 text-white shadow-sm relative overflow-hidden">
        <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-white/5 rounded-full"></div>
        <div class="relative">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold">Outstanding Balance</h3>
                <span class="w-9 h-9 rounded-md bg-white/15 flex items-center justify-center"><i class="fas fa-wallet"></i></span>
            </div>
            <p class="text-4xl font-bold"><?= money($outstanding) ?></p>
            <p class="text-sm text-yuki-100"><?= (int) $unpaidInvoices ?> unpaid invoice<?= $unpaidInvoices === 1 ? '' : 's' ?></p>
            <a href="<?= url('portal/invoices') ?>" class="mt-5 block text-center bg-white text-yuki-700 hover:bg-gray-100 px-4 py-2.5 rounded-md font-semibold text-sm transition-colors">View billing</a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent prescriptions -->
    <div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between p-6 pb-4">
            <h3 class="text-lg font-semibold text-gray-900">Recent Prescriptions</h3>
            <a href="<?= url('portal/prescriptions') ?>" class="text-yuki-600 hover:text-yuki-700 text-sm font-medium">View all</a>
        </div>
        <?php if (empty($recentRx)): ?>
            <p class="text-gray-400 text-center py-8">No prescriptions yet.</p>
        <?php else: ?>
            <div class="divide-y divide-gray-100">
                <?php foreach ($recentRx as $rx): ?>
                    <div class="flex items-center gap-3 px-6 py-3.5">
                        <span class="w-9 h-9 rounded-md bg-yuki-50 text-yuki-600 flex items-center justify-center flex-shrink-0"><i class="fas fa-pills"></i></span>
                        <div class="min-w-0 flex-1">
                            <p class="font-medium text-gray-900 truncate"><?= e($rx['Medication']) ?></p>
                            <p class="text-sm text-gray-500 truncate"><?= e(trim(($rx['Dosage'] ?? '') . ' · ' . ($rx['Frequency'] ?? ''), ' ·')) ?: 'See details' ?></p>
                        </div>
                        <?php $a = $rx['Status'] === 'active'; ?>
                        <span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $a ? 'bg-yuki-50 text-yuki-700' : 'bg-gray-100 text-gray-600' ?>"><?= e(ucfirst($rx['Status'])) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Recent invoices -->
    <div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between p-6 pb-4">
            <h3 class="text-lg font-semibold text-gray-900">Recent Invoices</h3>
            <a href="<?= url('portal/invoices') ?>" class="text-yuki-600 hover:text-yuki-700 text-sm font-medium">View all</a>
        </div>
        <?php if (empty($recentInvoices)): ?>
            <p class="text-gray-400 text-center py-8">No invoices yet.</p>
        <?php else: ?>
            <div class="divide-y divide-gray-100">
                <?php foreach ($recentInvoices as $inv): ?>
                    <div class="flex items-center gap-3 px-6 py-3.5">
                        <div class="min-w-0 flex-1">
                            <p class="font-medium text-gray-900 truncate"><?= e($inv['Description']) ?></p>
                            <p class="text-sm text-gray-500"><?= date('M j, Y', strtotime($inv['created_at'])) ?></p>
                        </div>
                        <span class="font-semibold text-gray-900"><?= money($inv['Amount']) ?></span>
                        <?php $paid = $inv['Status'] === 'paid'; ?>
                        <span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $paid ? 'bg-yuki-50 text-yuki-700' : ($inv['Status'] === 'cancelled' ? 'bg-gray-100 text-gray-600' : 'bg-secondary-50 text-secondary-700') ?>"><?= e(ucfirst($inv['Status'])) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
