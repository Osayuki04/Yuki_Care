<?php
/**
 * Front controller.
 *
 * Every request enters here. It boots the application, then hands the requested
 * "page" to the router which invokes the matching controller.
 */

require __DIR__ . '/config/config.php';

// Harden the session cookie (applies to every authenticated area).
session_set_cookie_params([
    'lifetime' => 0,
    'path'     => '/',
    'httponly' => true,                                              // not readable from JS
    'samesite' => 'Lax',                                             // mitigates CSRF on navigations
    'secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
]);
session_start();

// --- Class autoloading (core, models, controllers) -----------------------
spl_autoload_register(function (string $class): void {
    static $map = null;

    if ($map === null) {
        $map = [];
        $dirs = [
            BASE_PATH . '/app/core',
            BASE_PATH . '/app/models',
            BASE_PATH . '/app/controllers',
        ];
        foreach ($dirs as $dir) {
            if (!is_dir($dir)) {
                continue;
            }
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS));
            foreach ($iterator as $file) {
                if ($file->getExtension() === 'php') {
                    $map[$file->getBasename('.php')] = $file->getPathname();
                }
            }
        }
    }

    if (isset($map[$class])) {
        require $map[$class];
    }
});

require BASE_PATH . '/app/core/helpers.php';

// --- One-time database schema setup --------------------------------------
try {
    if (!isset($_SESSION['schema_ready'])) {
        Database::migrate();
        $_SESSION['schema_ready'] = true;
    }
} catch (Throwable $e) {
    error_log('Schema setup failed: ' . $e->getMessage());
}

// --- Dispatch ------------------------------------------------------------
$page = $_GET['page'] ?? 'home';

$router = new Router(require BASE_PATH . '/app/routes.php');
$router->dispatch($page);
