<?php
/** Staff profile (read-only — managed by admin). Rendered in staff layout. */
$s = $staff ?? [];
$v = fn(string $k, string $d = '—') => e(($s[$k] ?? '') !== '' ? $s[$k] : $d);
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Identity -->
    <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm text-center">
        <div class="w-20 h-20 rounded-full bg-yuki-100 text-yuki-700 flex items-center justify-center mx-auto mb-3 text-2xl font-bold">
            <?= e(strtoupper(substr($s['FirstName'] ?? 'S', 0, 1) . substr($s['Surname'] ?? '', 0, 1))) ?>
        </div>
        <h3 class="text-lg font-bold text-gray-900"><?= e(Staff::fullName($s)) ?></h3>
        <p class="text-sm text-gray-500"><?= $v('Email') ?></p>
        <?php if (!empty($s['Department'])): ?>
            <span class="inline-flex items-center gap-2 mt-3 bg-yuki-50 text-yuki-700 px-3 py-1.5 rounded-md text-sm font-medium"><i class="fas fa-hospital"></i><?= e($s['Department']) ?></span>
        <?php endif; ?>
        <?php $active = ($s['Status'] ?? '') === 'active'; ?>
        <div class="mt-3">
            <span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $active ? 'bg-yuki-50 text-yuki-700' : 'bg-gray-100 text-gray-500' ?>"><?= e(ucfirst($s['Status'] ?? 'unknown')) ?></span>
        </div>
    </div>

    <!-- Details -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-lg font-semibold text-gray-900">Staff Details</h3>
                <span class="text-xs text-gray-400"><i class="fas fa-lock mr-1"></i>Managed by admin</span>
            </div>
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-5">
                <?php
                $fields = [
                    'Phone'           => $s['Contact'] ?? '',
                    'Gender'          => ucfirst($s['Gender'] ?? ''),
                    'Date of Birth'   => !empty($s['DateOfBirth']) ? date('M j, Y', strtotime($s['DateOfBirth'])) : '',
                    'Hire Date'       => !empty($s['HireDate']) ? date('M j, Y', strtotime($s['HireDate'])) : '',
                    'Category'        => $s['StaffCategory'] ?? '',
                    'Type'            => $s['StaffType'] ?? '',
                    'Grade'           => $s['StaffGrade'] ?? '',
                    'Emergency'       => $s['EmergencyContact'] ?? '',
                ];
                foreach ($fields as $label => $value): ?>
                    <div>
                        <dt class="text-xs font-medium text-gray-400 uppercase tracking-wide"><?= e($label) ?></dt>
                        <dd class="mt-1 font-medium text-gray-900"><?= e($value !== '' ? $value : '—') ?></dd>
                    </div>
                <?php endforeach; ?>
                <div class="sm:col-span-2">
                    <dt class="text-xs font-medium text-gray-400 uppercase tracking-wide">Address</dt>
                    <dd class="mt-1 font-medium text-gray-900"><?= $v('Address') ?></dd>
                </div>
            </dl>
        </div>

        <div class="bg-gray-50 border border-gray-200 rounded-md p-5 flex items-start gap-3">
            <span class="w-9 h-9 rounded-md bg-white text-gray-500 flex items-center justify-center flex-shrink-0 shadow-sm"><i class="fas fa-circle-info"></i></span>
            <p class="text-sm text-gray-600">Need to update your details or password? Please contact the administrator — staff records are managed from the admin portal.</p>
        </div>
    </div>
</div>
