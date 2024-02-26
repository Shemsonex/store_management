<?php
include('link.php');
session_start();
$user = $_SESSION['name'];
// error_reporting(1|0);

if(isset($_POST['id'])){
$id = $_POST['id'];
// $code = $_POST['code'];
$names = $_POST['names'];
$id_number = $_POST['id_number'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
// $farmer_id = 1;
// $agent_id = 1;
$districts = $_POST['districts'];
$sectors = $_POST['sectors'];
$cells = $_POST['cells'];
$village_id = $_POST['villages'];


// Check if the farmer already exists
$checkSql = "SELECT id FROM farmers WHERE id = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("i", $id);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    $row = $checkResult->fetch_assoc();    
    // $id = $row['id'];
    $stmt = $conn->prepare("UPDATE farmers SET names = ?, id_number = ?, phone_number = ?, email = ?, village_id = ?, user = ? WHERE id = ?");
    $stmt->bind_param("sissisi",$names, $id_number, $phone_number, $email, $village_id, $user, $id);
    if ($stmt->execute()) {
        $successMessage = "Update successfully!";        
        header("Location: ../all-clients.php?success=" . urlencode($successMessage));
    }else{
        $errorMessage = "Error: " . $stmt->error;
        header("Location: ../all-clients.php?error=" . urlencode($errorMessage));
    }
        $stmt->close();
        // $conn->close();
}else{
    $errorMessage = "Error: No Data ";
    header("Location: ../all-clients.php?error=" . urlencode($errorMessage));
    // echo $id;
}

$checkStmt->close();
$conn->close();
}

if(isset($_POST['del_id'])){
    $id = $_POST['del_id'];
    $stmt11 = $conn->prepare("DELETE FROM farmers WHERE id = ?");
    $stmt11->bind_param("i", $id);
    if ($stmt11->execute()) {
        $successMessage = "Deleted successfully!";        
        // echo $successMessage;
        header("Location: ../all-clients.php?success=" . urlencode($successMessage));
    }else{
        $errorMessage = "Error: " . $stmt11->error;
        // echo $errorMessage;
        header("Location: ../all-clients.php?error=" . urlencode($errorMessage));
    }
        $stmt11->close();
        $conn->close();
}
?>