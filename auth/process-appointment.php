<?php
session_start();
require_once '../config/database.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../home/');
    exit();
}

// Determine redirect location based on referrer
$redirectLocation = '../home/#appointment';
if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'contact') !== false) {
    $redirectLocation = '../contact/';
}

// Sanitize and validate input data
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePhone($phone) {
    return preg_match('/^[\+]?[1-9][\d]{0,15}$/', $phone);
}

// Get form data
$firstName = sanitizeInput($_POST['first_name'] ?? '');
$lastName = sanitizeInput($_POST['last_name'] ?? '');
$middleName = sanitizeInput($_POST['middle_name'] ?? '');
$dateOfBirth = sanitizeInput($_POST['date_of_birth'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$phone = sanitizeInput($_POST['phone'] ?? '');
$gender = sanitizeInput($_POST['gender'] ?? '');
$emergencyContact = sanitizeInput($_POST['emergency_contact'] ?? '');
$address = sanitizeInput($_POST['address'] ?? '');
$preferredDate = sanitizeInput($_POST['preferred_date'] ?? '');
$password = $_POST['password'] ?? '';
$notes = sanitizeInput($_POST['notes'] ?? '');

// Validation
$errors = [];

if (empty($firstName)) $errors[] = "First name is required";
if (empty($lastName)) $errors[] = "Last name is required";
if (empty($dateOfBirth)) $errors[] = "Date of birth is required";
if (empty($email) || !validateEmail($email)) $errors[] = "Valid email is required";
if (empty($phone) || !validatePhone($phone)) $errors[] = "Valid phone number is required";
if (empty($gender)) $errors[] = "Gender is required";
if (empty($address)) $errors[] = "Address is required";
// Make password optional for contact form submissions
if (!empty($password) && strlen($password) < 6) $errors[] = "Password must be at least 6 characters";

// Check if preferred date is in the future (only if provided)
if (!empty($preferredDate) && strtotime($preferredDate) <= time()) {
    $errors[] = "Preferred appointment date must be in the future";
}

// If there are validation errors, redirect back with errors
if (!empty($errors)) {
    $_SESSION['appointment_errors'] = $errors;
    $_SESSION['appointment_data'] = $_POST;
    header('Location: ' . $redirectLocation);
    exit();
}

try {
    $mysqli = getDatabaseConnection();
    $mysqli->autocommit(false);

    // Parse address (simple parsing - you might want to enhance this)
    $addressParts = explode(',', $address);
    $street = trim($addressParts[0] ?? '');
    $city = trim($addressParts[1] ?? 'Unknown');
    $state = trim($addressParts[2] ?? 'Unknown');
    $country = trim($addressParts[3] ?? 'Unknown');
    $houseNumber = ''; // Extract if needed

    // Insert address
    $stmt = $mysqli->prepare("INSERT INTO address (Country, State, City, Street, HouseNumber) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $country, $state, $city, $street, $houseNumber);
    $stmt->execute();
    $addressId = $mysqli->insert_id;
    $stmt->close();

    // Hash password (only if provided)
    $passwordHash = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

    // Check if email already exists
    $stmt = $mysqli->prepare("SELECT ID FROM person WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingPerson = $result->fetch_assoc();
    $stmt->close();
    
    if ($existingPerson) {
        $personId = $existingPerson['ID'];
        // Update existing person record
        if ($passwordHash) {
            $stmt = $mysqli->prepare("UPDATE person SET FirstName = ?, MiddleName = ?, Surname = ?, Contact = ?, DateOfBirth = ?, Gender = ?, EmergencyContact = ?, AddressId = ?, password_hash = ? WHERE ID = ?");
            $stmt->bind_param("sssssssssi", $firstName, $middleName, $lastName, $phone, $dateOfBirth, $gender, $emergencyContact, $addressId, $passwordHash, $personId);
        } else {
            $stmt = $mysqli->prepare("UPDATE person SET FirstName = ?, MiddleName = ?, Surname = ?, Contact = ?, DateOfBirth = ?, Gender = ?, EmergencyContact = ?, AddressId = ? WHERE ID = ?");
            $stmt->bind_param("ssssssssi", $firstName, $middleName, $lastName, $phone, $dateOfBirth, $gender, $emergencyContact, $addressId, $personId);
        }
        $stmt->execute();
        $stmt->close();
    } else {
        // Insert new person
        $stmt = $mysqli->prepare("INSERT INTO person (FirstName, MiddleName, Surname, Email, Contact, DateOfBirth, Gender, EmergencyContact, AddressId, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $firstName, $middleName, $lastName, $email, $phone, $dateOfBirth, $gender, $emergencyContact, $addressId, $passwordHash);
        $stmt->execute();
        $personId = $mysqli->insert_id;
        $stmt->close();
    }

    // Calculate age
    $age = date_diff(date_create($dateOfBirth), date_create('today'))->y;

    // Insert patient record
    $status = 'pending';
    $stmt = $mysqli->prepare("INSERT INTO patient (PersonID, PreferredDate, Notes, AGE, Status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $personId, $preferredDate, $notes, $age, $status);
    $stmt->execute();
    $patientId = $mysqli->insert_id;
    $stmt->close();

    $mysqli->commit();
    $mysqli->autocommit(true);
    $mysqli->close();
    
    // Set success message
    $_SESSION['appointment_success'] = "Your patient registration has been submitted successfully! You will receive a confirmation email shortly. Your patient ID is: " . $patientId;

    // Clear any previous form data
    unset($_SESSION['appointment_data']);
    unset($_SESSION['appointment_errors']);

    header('Location: ' . $redirectLocation);
    exit();
    
} catch (mysqli_sql_exception $e) {
    if (isset($mysqli)) {
        $mysqli->rollback();
        $mysqli->autocommit(true);
        $mysqli->close();
    }
    error_log("Appointment booking MySQLi error: " . $e->getMessage());
    $_SESSION['appointment_errors'] = ["An error occurred while processing your registration. Please try again."];
    $_SESSION['appointment_data'] = $_POST;
    header('Location: ' . $redirectLocation);
    exit();
} catch (Exception $e) {
    if (isset($mysqli)) {
        $mysqli->rollback();
        $mysqli->autocommit(true);
        $mysqli->close();
    }
    error_log("Appointment booking general error: " . $e->getMessage());
    $_SESSION['appointment_errors'] = ["An error occurred while processing your registration. Please try again."];
    $_SESSION['appointment_data'] = $_POST;
    header('Location: ' . $redirectLocation);
    exit();
}
?>
