<?php
/** Patient portal — self-service account creation. Standalone page. */
$o = fn(string $k) => e($old[$k] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($page_title ?? 'Create Account') ?> - Yibera</title>
    <link rel="icon" type="image/png" href="<?= asset('images/yiberalogo2.png') ?>">
    <link href="<?= asset('dist/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Brand panel -->
        <div class="relative hidden lg:flex flex-col justify-between p-12 overflow-hidden bg-cover bg-center" style="background-image:url('<?= asset('images/loginbackgrounds.png') ?>')">
            <div class="absolute inset-0 bg-yuki-950/80"></div>
            <a href="<?= url('home') ?>" class="relative flex items-center gap-3">
                <img src="<?= asset('images/yiberalogo1.png') ?>" alt="Yibera" class="h-16 w-auto object-contain">
                <div><p class="text-lg font-bold leading-tight text-white">Yibera</p><p class="text-sm text-yuki-100">Patient Portal</p></div>
            </a>
            <div class="relative max-w-md">
                <h1 class="text-4xl xl:text-5xl font-bold leading-tight mb-4 text-white">Create your <span class="text-secondary-300">account</span></h1>
                <p class="text-lg text-white/85">One secure account to book appointments, view prescriptions and lab results, and manage your bills.</p>
            </div>
            <p class="relative text-sm text-white/70">&copy; <?= date('Y') ?> Yibera Medical Center.</p>
        </div>

        <!-- Form -->
        <div class="flex items-center justify-center p-6 sm:p-10">
            <div class="w-full max-w-md">
                <a href="<?= url('home') ?>" class="lg:hidden flex items-center justify-center mb-8">
                    <span class="text-xl font-bold text-gray-900">Yibera</span>
                </a>

                <div class="mb-6 text-center lg:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Create account</h2>
                    <p class="text-gray-500">Join the patient portal in a couple of steps.</p>
                </div>

                <?php if (!empty($error)): ?>
                    <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md flex items-start text-sm"><i class="fas fa-circle-exclamation mr-2 mt-0.5"></i><span><?= e($error) ?></span></div>
                <?php endif; ?>

                <form action="<?= url('portal/register/submit') ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">First name</label>
                            <input type="text" name="first_name" required value="<?= $o('first_name') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="Jane">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Last name</label>
                            <input type="text" name="last_name" required value="<?= $o('last_name') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="Doe">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                        <input type="email" name="email" required value="<?= $o('email') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="you@example.com">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone</label>
                            <input type="tel" name="phone" required value="<?= $o('phone') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="080…">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Gender</label>
                            <select name="gender" required class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                                <option value="">Select…</option>
                                <?php foreach (['male' => 'Male', 'female' => 'Female', 'other' => 'Other'] as $val => $lbl): ?>
                                    <option value="<?= $val ?>" <?= ($old['gender'] ?? '') === $val ? 'selected' : '' ?>><?= $lbl ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Date of birth</label>
                        <input type="date" name="date_of_birth" required max="<?= date('Y-m-d') ?>" value="<?= $o('date_of_birth') ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                            <input type="password" name="password" required minlength="8" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="••••••••">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Confirm</label>
                            <input type="password" name="confirm_password" required minlength="8" class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-yuki-500 focus:border-transparent" placeholder="••••••••">
                        </div>
                    </div>
                    <p class="text-xs text-gray-400">Password needs 8+ characters with an upper-case letter, a lower-case letter, a number and a symbol.</p>

                    <label class="flex items-start gap-2 text-sm text-gray-600">
                        <input type="checkbox" name="terms" value="1" class="mt-0.5 h-4 w-4 text-yuki-600 focus:ring-yuki-500 border-gray-300 rounded">
                        <span>I agree to the <a href="#" class="text-yuki-600 hover:text-yuki-700 font-medium">Terms</a> and <a href="#" class="text-yuki-600 hover:text-yuki-700 font-medium">Privacy Policy</a>.</span>
                    </label>

                    <button type="submit" class="w-full bg-yuki-600 hover:bg-yuki-700 text-white py-3 rounded-md font-semibold transition-colors shadow-sm">
                        <i class="fas fa-user-plus mr-2"></i> Create account
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-500">
                    Already have an account? <a href="<?= url('portal/login') ?>" class="font-medium text-yuki-600 hover:text-yuki-700">Sign in</a>
                </p>
                <div class="mt-4 text-center">
                    <a href="<?= url('home') ?>" class="inline-flex items-center text-sm text-gray-500 hover:text-yuki-600 font-medium"><i class="fas fa-arrow-left mr-2"></i> Back to homepage</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
