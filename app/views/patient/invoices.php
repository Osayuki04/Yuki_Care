<?php /** Patient billing & invoices. Rendered in patient layout. */ ?>

<!-- Outstanding summary -->
<div class="bg-yuki-600 rounded-md p-6 text-white shadow-sm mb-6 relative overflow-hidden">
    <div class="absolute -right-6 -top-6 w-28 h-28 bg-white/10 rounded-full"></div>
    <div class="relative flex items-center justify-between">
        <div>
            <p class="text-sm text-yuki-50">Total outstanding balance</p>
            <p class="text-4xl font-bold mt-1"><?= money($outstanding) ?></p>
        </div>
        <span class="w-12 h-12 rounded-md bg-white/15 flex items-center justify-center text-xl"><i class="fas fa-file-invoice-dollar"></i></span>
    </div>
</div>

<div class="bg-white rounded-md border border-gray-200 shadow-sm overflow-hidden">
    <div class="p-6 pb-4">
        <h3 class="text-lg font-semibold text-gray-900">Invoices</h3>
        <p class="text-sm text-gray-500">Your billing history and payments.</p>
    </div>

    <?php if (empty($invoices)): ?>
        <div class="text-center py-14">
            <div class="w-14 h-14 rounded-md bg-gray-50 text-gray-300 flex items-center justify-center mx-auto mb-3 text-2xl"><i class="fas fa-receipt"></i></div>
            <p class="text-gray-500">You have no invoices.</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-y border-gray-100 bg-gray-50">
                        <th class="px-6 py-3 font-medium">Description</th>
                        <th class="px-6 py-3 font-medium">Date</th>
                        <th class="px-6 py-3 font-medium">Due</th>
                        <th class="px-6 py-3 font-medium text-right">Amount</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                        <th class="px-6 py-3 font-medium text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($invoices as $inv):
                        $cls = match ($inv['Status']) { 'paid' => 'bg-yuki-50 text-yuki-700', 'cancelled' => 'bg-gray-100 text-gray-500', default => 'bg-secondary-50 text-secondary-700' }; ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-3">
                                <p class="font-medium text-gray-900"><?= e($inv['Description']) ?></p>
                                <?php if (!empty($inv['Category'])): ?><p class="text-xs text-gray-400"><?= e($inv['Category']) ?></p><?php endif; ?>
                            </td>
                            <td class="px-6 py-3 text-gray-500"><?= date('M j, Y', strtotime($inv['created_at'])) ?></td>
                            <td class="px-6 py-3 text-gray-500"><?= !empty($inv['DueDate']) ? date('M j, Y', strtotime($inv['DueDate'])) : '—' ?></td>
                            <td class="px-6 py-3 text-right font-semibold text-gray-900"><?= money($inv['Amount']) ?></td>
                            <td class="px-6 py-3"><span class="px-2.5 py-1 text-xs font-medium rounded-md <?= $cls ?>"><?= e(ucfirst($inv['Status'])) ?></span></td>
                            <td class="px-6 py-3 text-right">
                                <?php if ($inv['Status'] === 'unpaid'): ?>
                                    <form action="<?= url('portal/invoices/pay') ?>" method="POST" onsubmit="return confirm('Pay <?= money($inv['Amount']) ?> for this invoice?');">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= (int) $inv['ID'] ?>">
                                        <button type="submit" class="bg-yuki-600 hover:bg-yuki-700 text-white px-3 py-1.5 rounded-md text-xs font-semibold transition-colors">Pay now</button>
                                    </form>
                                <?php elseif ($inv['Status'] === 'paid'): ?>
                                    <span class="text-xs text-gray-400"><i class="fas fa-check mr-1"></i><?= !empty($inv['PaidAt']) ? date('M j, Y', strtotime($inv['PaidAt'])) : 'Paid' ?></span>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400">—</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
