<?php
include('link.php');
// error_reporting(1|0);

if(isset($_POST['id'])){
$id = $_POST['id'];
$code = $_POST['code'];
$names = $_POST['names'];
$id_number = $_POST['id_number'];
$phone_number = $_POST['phone_number'];
// $email = $_POST['email'];
$email = 'test@test.test';
// echo $email;
// $farmer_id = 1;
// $agent_id = 1;
$districts = $_POST['districts'];
$sectors = $_POST['sectors'];
$cells = $_POST['cells'];
$villages = $_POST['villages'];


// Check if the farmer already exists
$checkSql = "SELECT id FROM agents WHERE id_number = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("i", $id_number);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    $row = $checkResult->fetch_assoc();    
    $id = $row['id'];
    $stmt = $conn->prepare("UPDATE agents SET code = ?, names = ?, phone_number = ?, email = ?, id = ?, village_id = ? WHERE id_number = ?");
    $stmt->bind_param("ssssiii", $code, $names, $phone_number, $email, $id, $villages, $id_number);
    if ($stmt->execute()) {
        $successMessage = "Update successfully!";        
        // echo $successMessage;
        header("Location: ../all-agents.php?success=" . urlencode($successMessage));
    }else{
        $errorMessage = "Error: " . $stmt->error;
        // echo $errorMessage;
        header("Location: ../all-agents.php?error=" . urlencode($errorMessage));
    }
        $stmt->close();
        // $conn->close();
}else{
    $errorMessage = "Error: No Data ";
    header("Location: ../all-agents.php?error=" . urlencode($errorMessage));
    // echo $errorMessage;
}

$checkStmt->close();
$conn->close();
}

if(isset($_POST['del_id'])){
    $code = $_POST['del_id'];
    $stmt11 = $conn->prepare("DELETE FROM agents WHERE id = ?");
    $stmt11->bind_param("i", $code);
    if ($stmt11->execute()) {
        $successMessage = "Deleted successfully!";        
        // echo $successMessage;
        header("Location: ../all-agents.php?success=" . urlencode($successMessage));
    }else{
        $errorMessage = "Error: " . $stmt11->error;
        // echo $errorMessage;
        header("Location: ../all-agents.php?error=" . urlencode($errorMessage));
    }
        $stmt11->close();
        $conn->close();
}
?>