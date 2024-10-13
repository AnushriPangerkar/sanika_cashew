<?php
// Database connection credentials
$host = 'localhost'; // Change to your database host
$username = 'root';  // Replace with your MySQL username
$password = '';      // Replace with your MySQL password
$dbname = 'sanika_cashew';  // Replace with your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
