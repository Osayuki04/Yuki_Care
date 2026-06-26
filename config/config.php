<?php
/**
 * Application configuration.
 */

// Absolute path to the application root (the folder that holds this config dir).
define('BASE_PATH', dirname(__DIR__));

/*
 * Public URL the app is served from (no trailing slash).
 *
 * This is auto-detected from the request so the app works no matter which
 * folder it lives in (http://localhost/, http://localhost/hospital/,
 * http://localhost/anything/hospital/, a virtual host, etc.).
 *
 * If you ever need to force it, just replace the line below with e.g.:
 *     define('BASE_URL', '/hospital');
 */
if (!defined('BASE_URL')) {
    $script = $_SERVER['SCRIPT_NAME'] ?? '/index.php';   // e.g. /hospital/index.php
    $dir = str_replace('\\', '/', dirname($script));      // e.g. /hospital  (or "/" at web root)
    define('BASE_URL', $dir === '/' ? '' : rtrim($dir, '/'));
}

// Where the front controller lives, used to build links.
define('FRONT_CONTROLLER', BASE_URL . '/index.php');

/*
 * Verbose errors are auto-enabled only on local development hosts. On any real
 * domain (e.g. yibera.com) APP_DEBUG is false, so visitors NEVER see stack
 * traces, file paths or SQL — those are logged instead.
 *
 * Force it if you ever need to: define('APP_DEBUG', false); before this file.
 */
if (!defined('APP_DEBUG')) {
    $host = $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? '');
    $isLocal = (bool) preg_match('/^(localhost|127\.0\.0\.1|\[::1\]|.*\.test|.*\.local)(:\d+)?$/i', $host)
        || PHP_SAPI === 'cli';
    define('APP_DEBUG', $isLocal);
}

if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    // Report everything (so it lands in the logs) but show nothing to the user.
    error_reporting(E_ALL);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
}

date_default_timezone_set('Africa/Lagos');
