<?php
/**
 * Friendly 500 page. Receives $debug (bool) and $e (Throwable) from ErrorHandler.
 * Self-contained inline styles so it renders even if the stylesheet/DB is down.
 */
$debug = $debug ?? false;
$home  = (defined('FRONT_CONTROLLER') ? FRONT_CONTROLLER : '/index.php') . '?page=home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Something went wrong — Yibera</title>
    <style>
        *{box-sizing:border-box} body{margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;background:#f0fdf4;color:#1f2937;display:flex;min-height:100vh;align-items:center;justify-content:center;padding:24px}
        .card{background:#fff;border:1px solid #e5e7eb;border-radius:12px;box-shadow:0 10px 30px rgba(0,0,0,.06);max-width:560px;width:100%;padding:40px;text-align:center}
        .icon{width:72px;height:72px;border-radius:50%;background:#d1fae5;color:#059669;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;font-size:34px}
        h1{font-size:24px;margin:0 0 8px} p{color:#6b7280;margin:0 0 24px;line-height:1.6}
        .btn{display:inline-block;background:#059669;color:#fff;text-decoration:none;font-weight:600;padding:12px 24px;border-radius:8px;transition:background .2s}
        .btn:hover{background:#047857}
        pre{text-align:left;background:#111827;color:#f3f4f6;padding:16px;border-radius:8px;overflow:auto;font-size:12.5px;line-height:1.5;margin-top:24px;max-height:340px}
        .ref{margin-top:18px;font-size:12px;color:#9ca3af}
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">&#9888;</div>
        <h1>Something went wrong</h1>
        <p>We hit an unexpected problem and couldn't complete your request. Our team has been notified — please try again in a moment.</p>
        <a class="btn" href="<?= htmlspecialchars($home, ENT_QUOTES) ?>">Back to homepage</a>

        <?php if ($debug && isset($e) && $e instanceof Throwable): ?>
            <pre><?= htmlspecialchars(
                get_class($e) . ': ' . $e->getMessage()
                . "\n\nin " . $e->getFile() . ':' . $e->getLine()
                . "\n\n" . $e->getTraceAsString(),
                ENT_QUOTES
            ) ?></pre>
            <p class="ref">Debug view (local only) — hidden automatically in production.</p>
        <?php else: ?>
            <p class="ref">Error reference: <?= htmlspecialchars(date('YmdHis') . '-' . substr(md5((string)($_SERVER['REQUEST_URI'] ?? '')), 0, 6), ENT_QUOTES) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
