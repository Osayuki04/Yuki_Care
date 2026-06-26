<?php /** Patient lab results list. Rendered in patient layout. */ ?>

<div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
    <div class="p-6 pb-4">
        <h3 class="text-lg font-semibold text-gray-900">Lab Results</h3>
        <p class="text-sm text-gray-500">Your laboratory test requests and results.</p>
    </div>

    <?php if (empty($reports)): ?>
        <div class="text-center py-14">
            <div class="w-14 h-14 rounded-md bg-gray-50 text-gray-300 flex items-center justify-center mx-auto mb-3 text-2xl"><i class="fas fa-flask"></i></div>
            <p class="text-gray-500">No lab results on record yet.</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-y border-gray-100 bg-gray-50">
                        <th class="px-6 py-3 font-medium">Test</th>
                        <th class="px-6 py-3 font-medium">Result</th>
                        <th class="px-6 py-3 font-medium">Reference</th>
                        <th class="px-6 py-3 font-medium">Date</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($reports as $r):
                        $done = $r['Status'] === 'completed';
                        $cls = $done ? 'bg-yuki-50 text-yuki-700' : ($r['Status'] === 'in_progress' ? 'bg-medical-50 text-medical-700' : 'bg-secondary-50 text-secondary-700'); ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-3">
                                <p class="font-medium text-gray-900"><?= e($r['TestName']) ?></p>
                                <?php if (!empty($r['Category'])): ?><p class="text-xs text-gray-400"><?= e($r['Category']) ?></p><?php endif; ?>
                            </td>
                            <td class="px-6 py-3 text-gray-700"><?= $done && $r['Result'] !== '' && $r['Result'] !== null ? e($r['Result']) : '<span class="text-gray-400">Awaiting</span>' ?></td>
                            <td class="px-6 py-3 text-gray-500"><?= e($r['ReferenceRange'] ?? '') ?: '—' ?></td>
                            <td class="px-6 py-3 text-gray-500"><?= date('M j, Y', strtotime($r['created_at'])) ?></td>
                            <td class="px-6 py-3"><span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $cls ?>"><?= e(ucfirst(str_replace('_', ' ', $r['Status']))) ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
