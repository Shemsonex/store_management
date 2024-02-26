<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "raymond1";
$dbname = "livestock";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>