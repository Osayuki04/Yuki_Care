<?php
/**
 * Mail / SMTP settings.
 *
 * Leave `smtp.enabled` = false to keep the development behaviour (messages are
 * written to storage/mail.log). To send real email (e.g. patient/staff OTP
 * codes), fill in your SMTP provider's details and set `enabled` => true.
 *
 * Common providers:
 *   - Gmail:      host smtp.gmail.com, port 587, encryption 'tls'  (use an App Password)
 *   - Outlook:    host smtp.office365.com, port 587, encryption 'tls'
 *   - Mailtrap:   host sandbox.smtp.mailtrap.io, port 587, encryption 'tls'
 *   - SendGrid:   host smtp.sendgrid.net, port 587, encryption 'tls' (username "apikey")
 *
 * Tip: keep real credentials out of git — copy this file to config/mail.local.php
 * (already gitignored) and it will be used automatically if present.
 */

return [
    'smtp' => [
        'enabled'    => false,
        'host'       => '',          // e.g. smtp.gmail.com
        'port'       => 587,         // 587 = STARTTLS, 465 = SSL
        'encryption' => 'tls',       // 'tls' | 'ssl' | '' (none)
        'username'   => '',
        'password'   => '',
        'timeout'    => 15,
    ],
    'from'      => 'no-reply@yibera.local',
    'from_name' => 'Yibera',
];
