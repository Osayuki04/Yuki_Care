<?php
/**
 * OTP email (HTML). Email-safe: tables + inline styles only.
 * Expects: $code, $minutes, $logoUrl, $contactUrl. Optional: $subtext.
 */
$digits  = str_split((string) $code);
$subtext = $subtext ?? 'Use the code below to continue signing in to your Yibera account.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Yibera verification code</title>
</head>
<body style="margin:0; padding:0; background-color:#f0fdf4;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f0fdf4; padding:32px 16px; font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">
        <tr>
            <td align="center">
                <!-- Card -->
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:520px; background-color:#ffffff; border:1px solid #e5e7eb; border-radius:16px;">
                    <!-- Brand -->
                    <tr>
                        <td align="center" style="padding:36px 40px 4px;">
                            <img src="<?= e($logoUrl) ?>" alt="Yibera" width="46" height="46" style="display:block; border:0; outline:none; margin:0 auto 8px;">
                            <div style="font-size:20px; font-weight:800; color:#059669; letter-spacing:.4px;">Yibera</div>
                        </td>
                    </tr>

                    <!-- Heading -->
                    <tr>
                        <td align="center" style="padding:16px 40px 0;">
                            <h1 style="margin:0; font-size:24px; line-height:1.3; font-weight:800; color:#111827;">Your one-time password</h1>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:8px 44px 26px;">
                            <p style="margin:0; font-size:15px; line-height:1.55; color:#6b7280;"><?= e($subtext) ?></p>
                        </td>
                    </tr>

                    <!-- Code boxes -->
                    <tr>
                        <td align="center" style="padding:0 20px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" align="center">
                                <tr>
                                    <?php foreach ($digits as $d): ?>
                                        <td style="padding:0 5px;">
                                            <div style="width:46px; height:58px; line-height:58px; text-align:center; border:2px solid #a7f3d0; border-radius:10px; background-color:#ecfdf5; color:#059669; font-size:26px; font-weight:800; font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;"><?= e($d) ?></div>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Validity note -->
                    <tr>
                        <td align="center" style="padding:24px 44px 0;">
                            <p style="margin:0; font-size:13.5px; line-height:1.6; color:#6b7280;">
                                This code is valid for <strong style="color:#111827;"><?= (int) $minutes ?> minutes</strong>. Please do not share it with anyone.
                            </p>
                        </td>
                    </tr>

                    <!-- Divider + contact -->
                    <tr>
                        <td style="padding:26px 40px 0;">
                            <div style="border-top:1px solid #f1f5f4; font-size:0; line-height:0;">&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:18px 40px 36px;">
                            <p style="margin:0; font-size:13px; color:#9ca3af;">
                                Didn't request this, or need help?
                                <a href="<?= e($contactUrl) ?>" style="color:#059669; text-decoration:none; font-weight:600;">Contact us</a>
                            </p>
                        </td>
                    </tr>
                </table>

                <!-- Footer -->
                <p style="max-width:520px; margin:18px auto 0; font-size:11px; color:#9ca3af; text-align:center; font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">
                    &copy; <?= date('Y') ?> Yibera Medical Center
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
