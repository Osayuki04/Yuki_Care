<?php /** Patient prescriptions list. Rendered in patient layout. */ ?>

<div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
    <div class="p-6 pb-4">
        <h3 class="text-lg font-semibold text-gray-900">Prescriptions</h3>
        <p class="text-sm text-gray-500">Medications prescribed by your care team.</p>
    </div>

    <?php if (empty($prescriptions)): ?>
        <div class="text-center py-14">
            <div class="w-14 h-14 rounded-md bg-gray-50 text-gray-300 flex items-center justify-center mx-auto mb-3 text-2xl"><i class="fas fa-prescription"></i></div>
            <p class="text-gray-500">You have no prescriptions on record.</p>
        </div>
    <?php else: ?>
        <div class="divide-y divide-gray-100">
            <?php foreach ($prescriptions as $rx):
                $cls = match ($rx['Status']) { 'active' => 'bg-yuki-50 text-yuki-700', 'cancelled' => 'bg-gray-100 text-gray-500', default => 'bg-gray-100 text-gray-600' }; ?>
                <div class="px-6 py-4">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex items-start gap-4 min-w-0">
                            <span class="w-11 h-11 rounded-md bg-yuki-50 text-yuki-600 flex items-center justify-center flex-shrink-0"><i class="fas fa-pills"></i></span>
                            <div class="min-w-0">
                                <p class="font-semibold text-gray-900"><?= e($rx['Medication']) ?></p>
                                <div class="flex flex-wrap gap-x-4 gap-y-1 text-sm text-gray-600 mt-1">
                                    <?php if (!empty($rx['Dosage'])): ?><span><i class="fas fa-weight-scale text-gray-400 mr-1"></i><?= e($rx['Dosage']) ?></span><?php endif; ?>
                                    <?php if (!empty($rx['Frequency'])): ?><span><i class="fas fa-clock text-gray-400 mr-1"></i><?= e($rx['Frequency']) ?></span><?php endif; ?>
                                    <?php if (!empty($rx['Duration'])): ?><span><i class="fas fa-calendar-days text-gray-400 mr-1"></i><?= e($rx['Duration']) ?></span><?php endif; ?>
                                </div>
                                <?php if (!empty($rx['Instructions'])): ?><p class="text-sm text-gray-500 mt-1.5"><?= e($rx['Instructions']) ?></p><?php endif; ?>
                                <p class="text-xs text-gray-400 mt-1.5">
                                    <?= !empty($rx['PrescribedBy']) ? 'Prescribed by ' . e($rx['PrescribedBy']) . ' · ' : '' ?><?= date('M j, Y', strtotime($rx['created_at'])) ?>
                                </p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $cls ?> flex-shrink-0"><?= e(ucfirst($rx['Status'])) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
