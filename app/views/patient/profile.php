<?php
/** Patient profile, medical history, insurance & password. Rendered in patient layout. */
$p = $patient ?? [];
$v = fn(string $k, string $d = '') => e($p[$k] ?? $d);
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Identity card -->
    <div class="space-y-6">
        <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm text-center">
            <img src="<?= e(avatar_url(Patient::fullName($p), $p['Gender'] ?? null)) ?>" alt="Your avatar"
                 class="w-24 h-24 rounded-full ring-4 ring-yuki-100 bg-yuki-50 mx-auto mb-3 object-cover">
            <h3 class="text-lg font-bold text-gray-900"><?= e(Patient::fullName($p)) ?></h3>
            <p class="text-sm text-gray-500"><?= $v('Email') ?></p>
            <div class="grid grid-cols-2 gap-3 mt-5 text-left">
                <div class="bg-gray-50 rounded-md p-3"><p class="text-xs text-gray-400">Age</p><p class="font-semibold text-gray-900"><?= e((string)($p['AGE'] ?? '—')) ?></p></div>
                <div class="bg-gray-50 rounded-md p-3"><p class="text-xs text-gray-400">Gender</p><p class="font-semibold text-gray-900 capitalize"><?= $v('Gender', '—') ?></p></div>
                <div class="bg-gray-50 rounded-md p-3"><p class="text-xs text-gray-400">Blood Group</p><p class="font-semibold text-gray-900"><?= $v('BloodGroup', '—') ?></p></div>
                <div class="bg-gray-50 rounded-md p-3"><p class="text-xs text-gray-400">DOB</p><p class="font-semibold text-gray-900 text-sm"><?= $p['DateOfBirth'] ? date('M j, Y', strtotime($p['DateOfBirth'])) : '—' ?></p></div>
            </div>
        </div>

        <!-- Change password -->
        <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 mb-1">Security</h3>
            <p class="text-sm text-gray-500 mb-4">Change your portal password.</p>
            <form action="<?= url('portal/profile/password') ?>" method="POST" class="space-y-3">
                <?= csrf_field() ?>
                <input type="password" name="current_password" required placeholder="Current password" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-sm">
                <input type="password" name="new_password" required minlength="8" placeholder="New password" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-sm">
                <input type="password" name="confirm_password" required minlength="8" placeholder="Confirm new password" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent text-sm">
                <p class="text-xs text-gray-400">8+ chars with upper, lower, number &amp; symbol.</p>
                <button type="submit" class="w-full bg-gray-900 hover:bg-gray-800 text-white py-2.5 rounded-md font-semibold text-sm transition-colors">Update password</button>
            </form>
        </div>

        <!-- Two-factor authentication -->
        <?php $twofa = !empty($p['twofa_enabled']); ?>
        <div class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
            <div class="flex items-start justify-between gap-3 mb-3">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Two-factor sign-in</h3>
                    <p class="text-sm text-gray-500">An emailed code in addition to your password.</p>
                </div>
                <span class="px-2.5 py-1 text-xs font-medium rounded-md flex-shrink-0 <?= $twofa ? 'bg-yuki-50 text-yuki-700' : 'bg-gray-100 text-gray-500' ?>">
                    <i class="fas <?= $twofa ? 'fa-shield-halved' : 'fa-shield' ?> mr-1"></i><?= $twofa ? 'On' : 'Off' ?>
                </span>
            </div>
            <?php if ($twofa): ?>
                <p class="text-sm text-gray-600 mb-4">Your account is protected with two-factor sign-in.</p>
                <form action="<?= url('portal/2fa/disable') ?>" method="POST" onsubmit="return confirm('Turn off two-factor sign-in?');">
                    <?= csrf_field() ?>
                    <button type="submit" class="w-full border border-gray-300 text-gray-700 hover:bg-gray-50 py-2.5 rounded-md font-semibold text-sm transition-colors">Turn off</button>
                </form>
            <?php else: ?>
                <p class="text-sm text-gray-600 mb-4">Add an extra layer of security. We'll email you a code to confirm before turning it on.</p>
                <form action="<?= url('portal/2fa/enable') ?>" method="POST">
                    <?= csrf_field() ?>
                    <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-2.5 rounded-md font-semibold text-sm transition-colors"><i class="fas fa-shield-halved mr-2"></i>Enable two-factor</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <!-- Editable details — each section is its own form -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Personal & contact -->
        <form action="<?= url('portal/profile/contact') ?>" method="POST" class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
            <?= csrf_field() ?>
            <div class="flex items-center gap-3 mb-1">
                <span class="w-9 h-9 rounded-md bg-yuki-50 text-yuki-600 flex items-center justify-center"><i class="fas fa-address-card"></i></span>
                <h3 class="text-lg font-semibold text-gray-900">Personal &amp; Contact</h3>
            </div>
            <p class="text-sm text-gray-500 mb-5">Keep these up to date so we can reach you.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone</label>
                    <input type="tel" name="contact" value="<?= $v('Contact') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Emergency contact</label>
                    <input type="tel" name="emergency_contact" value="<?= $v('EmergencyContact') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Address</label>
                    <input type="text" name="address" value="<?= $v('Address') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                </div>
            </div>
            <div class="mt-5 flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 bg-yuki-600 hover:bg-yuki-700 text-white px-5 py-2.5 rounded-md font-semibold text-sm transition-colors"><i class="fas fa-floppy-disk"></i> Save contact</button>
            </div>
        </form>

        <!-- Insurance -->
        <form action="<?= url('portal/profile/insurance') ?>" method="POST" class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
            <?= csrf_field() ?>
            <div class="flex items-center gap-3 mb-1">
                <span class="w-9 h-9 rounded-md bg-medical-50 text-medical-600 flex items-center justify-center"><i class="fas fa-shield-heart"></i></span>
                <h3 class="text-lg font-semibold text-gray-900">Insurance</h3>
            </div>
            <p class="text-sm text-gray-500 mb-5">Your health insurance information.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Provider</label>
                    <input type="text" name="insurance_provider" value="<?= $v('InsuranceProvider') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="e.g. AXA Mansard">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Policy number</label>
                    <input type="text" name="insurance_number" value="<?= $v('InsuranceNumber') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                </div>
            </div>
            <div class="mt-5 flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 bg-yuki-600 hover:bg-yuki-700 text-white px-5 py-2.5 rounded-md font-semibold text-sm transition-colors"><i class="fas fa-floppy-disk"></i> Save insurance</button>
            </div>
        </form>

        <!-- Medical -->
        <form action="<?= url('portal/profile/medical') ?>" method="POST" class="bg-white rounded-md p-6 border border-gray-200 shadow-sm">
            <?= csrf_field() ?>
            <div class="flex items-center gap-3 mb-1">
                <span class="w-9 h-9 rounded-md bg-secondary-50 text-secondary-600 flex items-center justify-center"><i class="fas fa-notes-medical"></i></span>
                <h3 class="text-lg font-semibold text-gray-900">Medical Information</h3>
            </div>
            <p class="text-sm text-gray-500 mb-5">Help our clinicians care for you safely.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Blood group</label>
                    <select name="blood_group" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                        <option value="">Select…</option>
                        <?php foreach (['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg): ?>
                            <option value="<?= $bg ?>" <?= ($p['BloodGroup'] ?? '') === $bg ? 'selected' : '' ?>><?= $bg ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Known allergies</label>
                    <textarea name="allergies" rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="e.g. Penicillin, peanuts… (leave blank if none)"><?= $v('Allergies') ?></textarea>
                </div>
            </div>
            <div class="mt-5 flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 bg-yuki-600 hover:bg-yuki-700 text-white px-5 py-2.5 rounded-md font-semibold text-sm transition-colors"><i class="fas fa-floppy-disk"></i> Save medical info</button>
            </div>
        </form>
    </div>
</div>
