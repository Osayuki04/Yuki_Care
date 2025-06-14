<?php
require_once '../../config/database.php';

// Get database connection
$db_handle = getDatabaseConnection();

// Check if Company column exists and rename it to Manufacturer
$check_sql = "SHOW COLUMNS FROM medication LIKE 'Company'";
$check_result = mysqli_query($db_handle, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    // Company column exists, rename it to Manufacturer
    $rename_sql = "ALTER TABLE medication CHANGE COLUMN Company Manufacturer VARCHAR(255)";
    $rename_result = mysqli_query($db_handle, $rename_sql);
    
    if ($rename_result) {
        echo "✅ Successfully renamed 'Company' column to 'Manufacturer'<br>";
    } else {
        echo "❌ Error renaming column: " . mysqli_error($db_handle) . "<br>";
    }
} else {
    // Check if Manufacturer column already exists
    $check_manufacturer_sql = "SHOW COLUMNS FROM medication LIKE 'Manufacturer'";
    $check_manufacturer_result = mysqli_query($db_handle, $check_manufacturer_sql);
    
    if (mysqli_num_rows($check_manufacturer_result) > 0) {
        echo "✅ 'Manufacturer' column already exists<br>";
    } else {
        // Neither Company nor Manufacturer exists, add Manufacturer column
        $add_sql = "ALTER TABLE medication ADD COLUMN Manufacturer VARCHAR(255)";
        $add_result = mysqli_query($db_handle, $add_sql);
        
        if ($add_result) {
            echo "✅ Successfully added 'Manufacturer' column<br>";
        } else {
            echo "❌ Error adding column: " . mysqli_error($db_handle) . "<br>";
        }
    }
}

// Show current table structure
echo "<br><strong>Current medication table structure:</strong><br>";
$structure_sql = "DESCRIBE medication";
$structure_result = mysqli_query($db_handle, $structure_sql);

if ($structure_result) {
    echo "<table border='1' style='border-collapse: collapse; margin: 10px 0;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    
    while ($row = mysqli_fetch_array($structure_result)) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . $row['Default'] . "</td>";
        echo "<td>" . $row['Extra'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "❌ Error showing table structure: " . mysqli_error($db_handle);
}

mysqli_close($db_handle);

echo "<br><a href='view.php'>← Back to Medications</a>";
?>
