<?php
/**
 * TEMPLATE — safe to commit (no real credentials).
 *
 * Copy this file to config/database.local.php (which is gitignored) and fill in
 * your real database credentials. The app loads database.local.php automatically.
 *
 *   cp config/database.example.php config/database.local.php
 */

return [
    'host'     => 'localhost',   // 'localhost' on most shared hosting; '127.0.0.1' for local XAMPP
    'port'     => 3306,
    'username' => 'your_db_user',
    'password' => 'your_db_password',
    'database' => 'your_db_name',
    'charset'  => 'utf8mb4',
];
