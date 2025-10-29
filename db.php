<?php
// db.php - Database connection settings
$host = 'localhost';       // Database host
$db = 'minibase';    // Database name
$user = 'root';   // Database username
$pass = '';   // Database password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
