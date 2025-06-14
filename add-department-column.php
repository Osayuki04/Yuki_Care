<?php
require_once 'config/database.php';

try {
    $mysqli = getDatabaseConnection();
    
    echo "<h2>Adding Department Column to Patient Table</h2>";
    
    // Check if Department column exists
    $result = $mysqli->query("SHOW COLUMNS FROM patient LIKE 'Department'");
    
    if ($result->num_rows == 0) {
        // Column doesn't exist, add it
        $mysqli->query("ALTER TABLE patient ADD COLUMN Department VARCHAR(100) AFTER AGE");
        echo "<p style='color: green;'>✓ Department column added successfully!</p>";
    } else {
        echo "<p style='color: blue;'>ℹ Department column already exists.</p>";
    }
    
    // Show updated table structure
    echo "<h3>Updated Patient Table Structure:</h3>";
    $result = $mysqli->query("DESCRIBE patient");
    
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr style='background: #f0f0f0;'><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        $highlight = ($row['Field'] == 'Department') ? "style='background: #ffffcc;'" : "";
        echo "<tr $highlight>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . ($row['Default'] ?? 'NULL') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    $mysqli->close();
    
    echo "<p><a href='admin/patients/register.php'>← Back to Patient Registration</a></p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
}
?>
