<?php
session_start();
require_once '../config/database.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admin-login.php');
    exit();
}

// Get form data
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

// Validation
if (empty($username) || empty($password)) {
    $_SESSION['login_error'] = "Please enter both username and password.";
    $_SESSION['login_username'] = $username;
    header('Location: admin-login.php');
    exit();
}

try {
    $mysqli = getDatabaseConnection();

    // Get admin user
    $stmt = $mysqli->prepare("SELECT * FROM admin_users WHERE username = ? AND status = 'active'");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    $stmt->close();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        // Login successful
        $_SESSION['admin_id'] = $admin['ID'];
        $_SESSION['admin_username'] = $admin['username'];
        $_SESSION['admin_name'] = $admin['full_name'];
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['admin_role'] = $admin['role'];
        $_SESSION['login_time'] = time();

        // Update last login
        $stmt = $mysqli->prepare("UPDATE admin_users SET last_login = NOW() WHERE ID = ?");
        $stmt->bind_param("i", $admin['ID']);
        $stmt->execute();
        $stmt->close();

        // Set remember me cookie if requested
        if ($remember) {
            $token = bin2hex(random_bytes(32));
            setcookie('admin_remember', $token, time() + (30 * 24 * 60 * 60), '/', '', true, true); // 30 days

            // Store token in database (you might want to create a remember_tokens table)
            $stmt = $mysqli->prepare("UPDATE admin_users SET remember_token = ? WHERE ID = ?");
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $stmt->bind_param("si", $hashedToken, $admin['ID']);
            $stmt->execute();
            $stmt->close();
        }
        
        // Close database connection
        $mysqli->close();

        // Redirect to dashboard
        header('Location: ../admin/dashboard.php');
        exit();

    } else {
        // Login failed
        $_SESSION['login_error'] = "Invalid username or password.";
        $_SESSION['login_username'] = $username;

        // Log failed login attempt
        error_log("Failed login attempt for username: " . $username . " from IP: " . $_SERVER['REMOTE_ADDR']);

        // Close database connection
        $mysqli->close();

        header('Location: admin-login.php');
        exit();
    }

} catch (mysqli_sql_exception $e) {
    if (isset($mysqli)) {
        $mysqli->close();
    }
    error_log("Login MySQLi error: " . $e->getMessage());
    $_SESSION['login_error'] = "An error occurred during login. Please try again.";
    $_SESSION['login_username'] = $username;
    header('Location: admin-login.php');
    exit();
} catch (Exception $e) {
    if (isset($mysqli)) {
        $mysqli->close();
    }
    error_log("Login general error: " . $e->getMessage());
    $_SESSION['login_error'] = "An error occurred during login. Please try again.";
    $_SESSION['login_username'] = $username;
    header('Location: admin-login.php');
    exit();
}
?>
