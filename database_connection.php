<?php
// Student ID: 2135XXXX
// Name: Rayan [Your Last Name]
// CPIT-405 Lab 10 - Assessment 3

echo "<h2>MariaDB Database Connection</h2>";

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";  // Change if you set a password

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("<p style='color: red;'>Connection failed: " . $conn->connect_error . "</p>");
}

echo "<p style='color: green;'>✓ Connected successfully to MariaDB</p>";

// Execute SHOW DATABASES query
$sql = "SHOW DATABASES";
$result = $conn->query($sql);

if ($result) {
    echo "<h3>Available Databases:</h3>";
    echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
    echo "<tr style='background-color: #4CAF50; color: white;'><th>Database Name</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Database"] . "</td></tr>";
    }
    
    echo "</table>";
    echo "<p>Total databases: " . $result->num_rows . "</p>";
} else {
    echo "<p style='color: red;'>Error executing query: " . $conn->error . "</p>";
}

// Close connection
$conn->close();
echo "<p>Connection closed.</p>";
?>