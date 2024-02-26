<?php
include('link.php');
// error_reporting(1|0);
session_start();
$user = $_SESSION['name'];
$names = $_POST['names'];
$id_number = $_POST['id_number'];
$phone_number = $_POST['phone_number'];
$village_id = $_POST['village_id'];
$email = $_POST['email'];
$successMessage = '';
$errorMessage = '';


// Check if the farmer already exists
$checkSql = "SELECT id FROM farmers WHERE id_number = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $id_number);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {    
    $checkStmt->close();
    $conn->close();
    $errorMessage = "Farmer with ID number $id_number already exists!";
    header("Location: ../all-clients.php?error=" . urlencode($errorMessage));
    exit;
}


// Prepare the SQL statement
$sql = "INSERT INTO farmers (names, id_number, phone_number, email, village_id, user) VALUES (?, ?, ?, ?, ?, ?)";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind the parameters to the statement
$stmt->bind_param("ssssis", $names, $id_number, $phone_number, $email, $village_id, $user);

// Execute the statement
if ($stmt->execute()) {        
    $successMessage = "Farmer Registered successfully!";
    header("Location: ../all-clients.php?success=" . urlencode($successMessage));
} else {
    $errorMessage = "Error: " . $stmt->error;
    header("Location: ../all-clients.php?error=" . urlencode($errorMessage));
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>
