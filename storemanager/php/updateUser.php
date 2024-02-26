<?php
include('link.php');
// error_reporting(1|0);

if(isset($_POST['id'])){
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$role = $_POST['role'];

// Check if the farmer already exists
$checkSql = "SELECT id FROM users WHERE id = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("i", $id);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    $row = $checkResult->fetch_assoc();    
    // $id = $row['id'];
    $stmt = $conn->prepare("UPDATE users SET username = ?, role = ?, password = ? WHERE id = ?");
    $stmt->bind_param("sisi",$username,$role,$password,$id);
    if ($stmt->execute()) {
        $successMessage = "Update successfully!";        
        header("Location: ../all-users.php?success=" . urlencode($successMessage));
    }else{
        $errorMessage = "Error: " . $stmt->error;
        header("Location: ../all-users.php?error=" . urlencode($errorMessage));
    }
        $stmt->close();
        // $conn->close();
}else{
    $errorMessage = "Error: No Data ";
    header("Location: ../all-users.php?error=" . urlencode($errorMessage));
    // echo $id;
}

$checkStmt->close();
$conn->close();
}

if(isset($_POST['del_id'])){
    $id = $_POST['del_id'];
    $stmt11 = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt11->bind_param("i", $id);
    if ($stmt11->execute()) {
        $successMessage = "Deleted successfully!";        
        // echo $successMessage;
        header("Location: ../all-users.php?success=" . urlencode($successMessage));
    }else{
        $errorMessage = "Error: " . $stmt11->error;
        // echo $errorMessage;
        header("Location: ../all-users.php?error=" . urlencode($errorMessage));
    }
        $stmt11->close();
        $conn->close();
}
?>