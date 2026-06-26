<?php
/** Patient appointments: book new + manage existing. Rendered in patient layout. */
$today = date('Y-m-d');
$badge = fn(string $s) => match ($s) {
    'confirmed' => 'bg-medical-50 text-medical-700',
    'completed' => 'bg-yuki-50 text-yuki-700',
    'cancelled' => 'bg-gray-100 text-gray-500',
    default     => 'bg-secondary-50 text-secondary-700',
};
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Booking form -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm sticky top-0">
            <h3 class="text-lg font-semibold text-gray-900 mb-1">Book Appointment</h3>
            <p class="text-sm text-gray-500 mb-5">Request a new consultation.</p>
            <form action="<?= url('portal/appointments/store') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Department</label>
                    <select name="department" required class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                        <option value="">Select…</option>
                        <?php foreach ($departments as $d): ?><option value="<?= e($d) ?>"><?= e($d) ?></option><?php endforeach; ?>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Date</label>
                        <input type="date" name="date" required min="<?= $today ?>" class="w-full px-3 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Time</label>
                        <input type="time" name="time" class="w-full px-3 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Reason <span class="text-gray-400 font-normal">(optional)</span></label>
                    <textarea name="reason" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="Briefly describe your symptoms or reason for the visit"></textarea>
                </div>
                <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-2.5 rounded-md font-semibold text-sm transition-colors"><i class="fas fa-calendar-plus mr-2"></i>Request appointment</button>
            </form>
        </div>
    </div>

    <!-- Appointment list -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 pb-4"><h3 class="text-lg font-semibold text-gray-900">Your Appointments</h3></div>
            <?php if (empty($appointments)): ?>
                <div class="text-center py-12">
                    <div class="w-14 h-14 rounded-md bg-gray-50 text-gray-300 flex items-center justify-center mx-auto mb-3 text-2xl"><i class="fas fa-calendar-day"></i></div>
                    <p class="text-gray-500">No appointments yet. Book your first one on the left.</p>
                </div>
            <?php else: ?>
                <div class="divide-y divide-gray-100">
                    <?php foreach ($appointments as $a):
                        $canManage = in_array($a['Status'], ['pending', 'confirmed'], true) && strtotime($a['AppointmentDate']) >= strtotime('today'); ?>
                        <div class="px-6 py-4">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex items-start gap-4 min-w-0">
                                    <div class="text-center bg-yuki-50 rounded-md px-3 py-2 flex-shrink-0">
                                        <p class="text-xs font-medium text-yuki-600 uppercase"><?= date('M', strtotime($a['AppointmentDate'])) ?></p>
                                        <p class="text-2xl font-bold text-gray-900 leading-none"><?= date('d', strtotime($a['AppointmentDate'])) ?></p>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-semibold text-gray-900"><?= e($a['Department'] ?: 'General Medicine') ?></p>
                                        <p class="text-sm text-gray-600"><?= date('l, F j, Y', strtotime($a['AppointmentDate'])) ?><?= $a['AppointmentTime'] ? ' · ' . date('g:i A', strtotime($a['AppointmentTime'])) : '' ?></p>
                                        <?php if (!empty($a['Reason'])): ?><p class="text-sm text-gray-500 mt-1 truncate"><?= e($a['Reason']) ?></p><?php endif; ?>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $badge($a['Status']) ?> flex-shrink-0"><?= e(ucfirst($a['Status'])) ?></span>
                            </div>

                            <?php if ($canManage): ?>
                                <div class="flex items-center gap-3 mt-3 pl-0 sm:pl-16">
                                    <button type="button" onclick="document.getElementById('resched-<?= $a['ID'] ?>').classList.toggle('hidden')" class="text-sm font-medium text-yuki-600 hover:text-yuki-700"><i class="fas fa-clock-rotate-left mr-1"></i>Reschedule</button>
                                    <form action="<?= url('portal/appointments/cancel') ?>" method="POST" onsubmit="return confirm('Cancel this appointment?');">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= (int) $a['ID'] ?>">
                                        <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700"><i class="fas fa-xmark mr-1"></i>Cancel</button>
                                    </form>
                                </div>
                                <form id="resched-<?= $a['ID'] ?>" action="<?= url('portal/appointments/reschedule') ?>" method="POST" class="hidden mt-3 pl-0 sm:pl-16 flex flex-wrap items-end gap-3">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= (int) $a['ID'] ?>">
                                    <div><label class="block text-xs text-gray-500 mb-1">New date</label><input type="date" name="date" required min="<?= $today ?>" value="<?= e($a['AppointmentDate']) ?>" class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-yuki-500"></div>
                                    <div><label class="block text-xs text-gray-500 mb-1">New time</label><input type="time" name="time" value="<?= e($a['AppointmentTime'] ?? '') ?>" class="px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-yuki-500"></div>
                                    <button type="submit" class="bg-yuki-600 hover:bg-yuki-700 text-white px-4 py-2 rounded-md text-sm font-semibold">Save</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
