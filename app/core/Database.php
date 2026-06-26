<?php
/**
 * Database
 *
 * Thin wrapper around a single shared MySQLi connection plus a couple of
 * convenience helpers used by the models. Credentials live in config/database.php.
 */
class Database
{
    private static ?mysqli $connection = null;

    /**
     * Return the shared MySQLi connection, creating it on first use.
     */
    public static function connection(): mysqli
    {
        if (self::$connection instanceof mysqli) {
            return self::$connection;
        }

        $config = self::config();
        $port   = (int) ($config['port'] ?? 3306);

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            // Preferred path: connect straight to the existing database. This is
            // what shared hosting needs, where the DB user usually can't CREATE.
            $mysqli = new mysqli($config['host'], $config['username'], $config['password'], $config['database'], $port);
        } catch (mysqli_sql_exception $e) {
            // The database doesn't exist yet (typical on a fresh local box):
            // connect without it, create it, then select it.
            try {
                $mysqli = new mysqli($config['host'], $config['username'], $config['password'], '', $port);
                $mysqli->query("CREATE DATABASE IF NOT EXISTS `" . $config['database']
                    . "` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                $mysqli->select_db($config['database']);
            } catch (mysqli_sql_exception $e2) {
                error_log('Database connection failed: ' . $e2->getMessage());
                throw new RuntimeException(
                    'Database connection failed. Check config/database.php (or database.local.php) and that MySQL is running.',
                    0,
                    $e2
                );
            }
        }

        $mysqli->set_charset($config['charset'] ?? 'utf8mb4');

        return self::$connection = $mysqli;
    }

    /** Load DB settings, preferring a gitignored local override so secrets stay out of git. */
    private static function config(): array
    {
        foreach (['/config/database.local.php', '/config/database.php'] as $path) {
            if (is_file(BASE_PATH . $path)) {
                return require BASE_PATH . $path;
            }
        }
        throw new RuntimeException(
            'Database config missing. Copy config/database.example.php to config/database.local.php and add your credentials.'
        );
    }

    /**
     * Run a prepared statement and return the mysqli_stmt.
     *
     * @param string $sql    SQL with ? placeholders.
     * @param array  $params Values to bind.
     */
    public static function run(string $sql, array $params = []): mysqli_stmt
    {
        $stmt = self::connection()->prepare($sql);

        if ($params) {
            $types = '';
            foreach ($params as $param) {
                if (is_int($param)) {
                    $types .= 'i';
                } elseif (is_float($param)) {
                    $types .= 'd';
                } else {
                    $types .= 's';
                }
            }
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        return $stmt;
    }

    /**
     * Fetch all rows for a query as associative arrays.
     */
    public static function select(string $sql, array $params = []): array
    {
        $stmt = self::run($sql, $params);
        $result = $stmt->get_result();
        $rows = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        $stmt->close();
        return $rows;
    }

    /**
     * Fetch a single row (or null).
     */
    public static function first(string $sql, array $params = []): ?array
    {
        $stmt = self::run($sql, $params);
        $result = $stmt->get_result();
        $row = $result ? $result->fetch_assoc() : null;
        $stmt->close();
        return $row;
    }

    /**
     * Fetch a single scalar value from the first column of the first row.
     */
    public static function scalar(string $sql, array $params = [])
    {
        $row = self::first($sql, $params);
        return $row ? array_values($row)[0] : null;
    }

    /**
     * Run an INSERT/UPDATE/DELETE and return affected rows (or insert id for inserts).
     */
    public static function execute(string $sql, array $params = []): int
    {
        $stmt = self::run($sql, $params);
        $id = self::connection()->insert_id;
        $affected = $stmt->affected_rows;
        $stmt->close();
        return $id ?: $affected;
    }

    /**
     * Add a column to a table only if it does not already exist.
     * (MySQL has no portable "ADD COLUMN IF NOT EXISTS", so we check first.)
     */
    private static function addColumn(string $table, string $column, string $definition): void
    {
        $exists = (int) self::scalar(
            "SELECT COUNT(*) FROM information_schema.COLUMNS
             WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?",
            [$table, $column]
        );

        if ($exists === 0) {
            self::connection()->query("ALTER TABLE `$table` ADD COLUMN `$column` $definition");
        }
    }

    /**
     * Create the schema and seed the default admin account if needed.
     * Safe to call repeatedly (everything uses IF NOT EXISTS).
     */
    public static function migrate(): void
    {
        $db = self::connection();

        $db->query("CREATE TABLE IF NOT EXISTS patient (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            FirstName VARCHAR(100) NOT NULL,
            MiddleName VARCHAR(100),
            Surname VARCHAR(100) NOT NULL,
            Email VARCHAR(255) UNIQUE NOT NULL,
            Contact VARCHAR(20) NOT NULL,
            DateOfBirth DATE NOT NULL,
            Gender ENUM('male', 'female', 'other') NOT NULL,
            EmergencyContact VARCHAR(20),
            Address TEXT,
            Department VARCHAR(100),
            PreferredDate DATE,
            Notes TEXT,
            AGE INT,
            password VARCHAR(255),
            Status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $db->query("CREATE TABLE IF NOT EXISTS staff (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            FirstName VARCHAR(100) NOT NULL,
            MiddleName VARCHAR(100),
            Surname VARCHAR(100) NOT NULL,
            Email VARCHAR(255) UNIQUE NOT NULL,
            Contact VARCHAR(20) NOT NULL,
            DateOfBirth DATE NOT NULL,
            Gender ENUM('male', 'female', 'other') NOT NULL,
            EmergencyContact VARCHAR(20),
            Address TEXT,
            Department VARCHAR(100),
            HireDate DATE,
            StaffCategory VARCHAR(100),
            StaffType VARCHAR(100),
            StaffGrade VARCHAR(100),
            password VARCHAR(255),
            Status ENUM('active', 'inactive', 'terminated') DEFAULT 'active',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $db->query("CREATE TABLE IF NOT EXISTS medication (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(200) NOT NULL,
            Category VARCHAR(100),
            Dosage VARCHAR(100),
            Quantity INT DEFAULT 0,
            Manufacturer VARCHAR(200),
            Description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        $db->query("CREATE TABLE IF NOT EXISTS admin_users (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) UNIQUE NOT NULL,
            password_hash VARCHAR(255) NOT NULL,
            full_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            role ENUM('admin', 'super_admin') DEFAULT 'admin',
            status ENUM('active', 'inactive') DEFAULT 'active',
            remember_token VARCHAR(255) NULL,
            last_login TIMESTAMP NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        // ---- Patient portal: appointments ---------------------------------
        $db->query("CREATE TABLE IF NOT EXISTS appointment (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT NOT NULL,
            Department VARCHAR(100),
            Doctor VARCHAR(150),
            AppointmentDate DATE NOT NULL,
            AppointmentTime TIME,
            Reason TEXT,
            Status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX (patient_id)
        )");

        // ---- EMR: prescriptions -------------------------------------------
        $db->query("CREATE TABLE IF NOT EXISTS prescription (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT NOT NULL,
            Medication VARCHAR(200) NOT NULL,
            Dosage VARCHAR(100),
            Frequency VARCHAR(100),
            Duration VARCHAR(100),
            Instructions TEXT,
            PrescribedBy VARCHAR(150),
            Status ENUM('active', 'completed', 'cancelled') DEFAULT 'active',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX (patient_id)
        )");

        // ---- EMR: lab reports ---------------------------------------------
        $db->query("CREATE TABLE IF NOT EXISTS lab_report (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT NOT NULL,
            TestName VARCHAR(200) NOT NULL,
            Category VARCHAR(100),
            Result TEXT,
            ReferenceRange VARCHAR(150),
            Status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
            RequestedBy VARCHAR(150),
            Notes TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX (patient_id)
        )");

        // ---- Billing: invoices --------------------------------------------
        $db->query("CREATE TABLE IF NOT EXISTS invoice (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            patient_id INT NOT NULL,
            Description VARCHAR(255) NOT NULL,
            Category VARCHAR(100),
            Amount DECIMAL(10,2) NOT NULL DEFAULT 0,
            Status ENUM('unpaid', 'paid', 'cancelled') DEFAULT 'unpaid',
            DueDate DATE,
            PaidAt DATETIME NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX (patient_id)
        )");

        // ---- Auth: brute-force throttle -----------------------------------
        $db->query("CREATE TABLE IF NOT EXISTS login_attempts (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            identifier VARCHAR(255) NOT NULL,
            ip VARCHAR(45) NOT NULL,
            scope VARCHAR(20) NOT NULL DEFAULT 'patient',
            attempts INT NOT NULL DEFAULT 0,
            locked_until DATETIME NULL,
            last_attempt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            UNIQUE KEY uniq_attempt (identifier, ip, scope)
        )");

        // ---- Patient portal columns (insurance + OTP 2FA) -----------------
        self::addColumn('patient', 'InsuranceProvider', "VARCHAR(150) NULL");
        self::addColumn('patient', 'InsuranceNumber',   "VARCHAR(100) NULL");
        self::addColumn('patient', 'BloodGroup',        "VARCHAR(10) NULL");
        self::addColumn('patient', 'Allergies',         "TEXT NULL");
        self::addColumn('patient', 'otp_hash',          "VARCHAR(255) NULL");
        self::addColumn('patient', 'otp_expires_at',    "DATETIME NULL");
        self::addColumn('patient', 'otp_attempts',      "INT NOT NULL DEFAULT 0");
        self::addColumn('patient', 'twofa_enabled',     "TINYINT(1) NOT NULL DEFAULT 0");
        self::addColumn('patient', 'last_login',        "TIMESTAMP NULL");
        self::addColumn('patient', 'onboarded',         "TINYINT(1) NOT NULL DEFAULT 0");

        // Staff portal columns.
        self::addColumn('staff', 'last_login', "TIMESTAMP NULL");
        self::addColumn('staff', 'onboarded',  "TINYINT(1) NOT NULL DEFAULT 0");

        $count = (int) self::scalar("SELECT COUNT(*) FROM admin_users WHERE username = ?", ['admin']);
        if ($count === 0) {
            self::execute(
                "INSERT INTO admin_users (username, password_hash, full_name, email, role)
                 VALUES (?, ?, ?, ?, ?)",
                [
                    'admin',
                    password_hash('admin123', PASSWORD_DEFAULT),
                    'System Administrator',
                    'admin@hospital.com',
                    'super_admin',
                ]
            );
        }
    }
}
