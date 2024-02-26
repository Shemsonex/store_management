<?php
include('php/link.php');
// error_reporting(1|0);

// Retrieve form data
$agent_id = $_POST['agent_id'];
$username = $_POST['username'];
$role = $_POST['role'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$successMessage = '';
$errorMessage = '';


// Check if the farmer already exists
$checkSql = "SELECT id FROM users WHERE username = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $username);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    $checkStmt->close();
    $conn->close();
    $errorMessage = "User with Username $username already exists!";
    header("Location: ./login.php?error=" . urlencode($errorMessage));
    exit;
}


if($password!==$confirm_password){
    $errorMessage = "Passwords don't match !!";
    header("Location: ./login.php?error=" . urlencode($errorMessage));
}else{
    $password1 = md5($password);
    $status = 1;
    if(substr($agent_id, 0, 6)==='farmer'){
        $agent_id=substr($agent_id, 6);
        $stmt = $conn->prepare("INSERT INTO users (username, role, password, status, farmer_id) VALUES (?, ?, ?, ?, ?)");
    }else{
        $stmt = $conn->prepare("INSERT INTO users (username, role, password, status, agent_id) VALUES (?, ?, ?, ?, ?)");
    }
    $stmt->bind_param("sisii",$username, $role, $password1, $status, $agent_id);
    if ($stmt->execute()) {        
        $successMessage = "User Registered successfully!";
        header("Location: ./login.php?success=" . urlencode($successMessage));
    } else {
        $errorMessage = "Error: " . $stmt->error;
        header("Location: ./login.php?error=" . urlencode($errorMessage));
    }
    $stmt->close();
    $conn->close();
}
?>
