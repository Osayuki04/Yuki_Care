<?php
/**
 * Database Configuration File
 * Hospital Management System
 * Updated to use MySQLi instead of PDO
 */

// Database connection parameters
$db_config = [
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'database' => 'hospitaldb',
    'charset' => 'utf8mb4'
];

// Create database connection using MySQLi
function getDatabaseConnection() {
    global $db_config;

    // Enable MySQLi error reporting
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $mysqli = new mysqli(
            $db_config['host'],
            $db_config['username'],
            $db_config['password'],
            $db_config['database']
        );

        // Set charset
        $mysqli->set_charset($db_config['charset']);

        return $mysqli;
    } catch (mysqli_sql_exception $e) {
        error_log("Database connection failed: " . $e->getMessage());
        die("Database connection failed. Please try again later.");
    }
}

// Alternative procedural MySQLi connection function
function getMysqliConnection() {
    global $db_config;

    $connection = mysqli_connect(
        $db_config['host'],
        $db_config['username'],
        $db_config['password'],
        $db_config['database']
    );

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_set_charset($connection, $db_config['charset']);
    return $connection;
}

// Test database connection
function testDatabaseConnection() {
    try {
        $mysqli = getDatabaseConnection();
        $mysqli->close();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Helper function to bind parameters dynamically
function bindParameters($stmt, $params) {
    if (empty($params)) {
        return;
    }

    $types = '';
    $values = [];

    foreach ($params as $param) {
        if (is_int($param)) {
            $types .= 'i';
        } elseif (is_float($param)) {
            $types .= 'd';
        } else {
            $types .= 's';
        }
        $values[] = $param;
    }

    $stmt->bind_param($types, ...$values);
}

// Create tables if they don't exist
function initializeTables() {
    $mysqli = getDatabaseConnection();

    // Patient table with all information (simplified structure)
    $mysqli->query("CREATE TABLE IF NOT EXISTS patient (
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

    // Staff table with all information (simplified structure)
    $mysqli->query("CREATE TABLE IF NOT EXISTS staff (
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

    // Add password column to staff table if it doesn't exist
    $mysqli->query("ALTER TABLE staff ADD COLUMN IF NOT EXISTS password VARCHAR(255)");

    // Admin users table
    $mysqli->query("CREATE TABLE IF NOT EXISTS admin_users (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) UNIQUE NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        full_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        role ENUM('admin', 'super_admin') DEFAULT 'admin',
        status ENUM('active', 'inactive') DEFAULT 'active',
        last_login TIMESTAMP NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Insert default admin user if not exists
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $username = 'admin';
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        $defaultPassword = password_hash('admin123', PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("INSERT INTO admin_users (username, password_hash, full_name, email, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $defaultPassword, $fullName, $email, $role);
        $username = 'admin';
        $fullName = 'System Administrator';
        $email = 'admin@hospital.com';
        $role = 'super_admin';
        $stmt->execute();
        $stmt->close();
    }

    $mysqli->close();
}

// Initialize tables on first load
try {
    if (!isset($_SESSION['tables_initialized'])) {
        initializeTables();
        $_SESSION['tables_initialized'] = true;
    }
} catch (Exception $e) {
    error_log("Database initialization error: " . $e->getMessage());
}
?>
