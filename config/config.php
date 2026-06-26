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

// Toggle verbose errors. Set to false in production.
define('APP_DEBUG', true);

if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

date_default_timezone_set('Africa/Lagos');
