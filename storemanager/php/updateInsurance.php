<?php
include('link.php');
// error_reporting(1|0);

if(isset($_POST['lvst_id'])){
$id = $_POST['lvst_id'];
$category = $_POST['category'];
$microchip_number = $_POST['microchip_number'];
$insurance_delivery_date = $_POST['insurance_delivery_date'];
$contract_number = $_POST['contract_number'];
$farmer_id = 1;
$agent_id = 1;
$mode_of_payment = $_POST['mode_of_payment'];
    switch($mode_of_payment){
        case 1: $company_name = 'Cash'; break;
        case 2: $company_name = 'MoMo'; $account_number = $_POST['momo_number']; break;
        case 3: $company_name = 'AirtelMoney'; $account_number =  $_POST['airtelMoney_number']; break;
        case 4: $company_name = $_POST['company_name']; $account_number =  $_POST['account_number']; break;
        default : $company_name = 'tt';
    }
$price = $_POST['price'];
$insurance_amount = ($price * 5.5) / 100 ;
$solektra_commission = ($insurance_amount * 13.5) / 100;
$agent_commission = ($solektra_commission * 7) / 13.5;
$client_commission = ($insurance_amount * 60)  / 100;
$successMessage = '';
$errorMessage = '';

// Check if the farmer already exists
$checkSql = "SELECT id FROM livestocks WHERE id = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("i", $id);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    $row = $checkResult->fetch_assoc();    
    // $id = $row['id'];
    $stmt = $conn->prepare("UPDATE livestocks SET category_id = ?, price = ?, insurance_amount = ?, client_commission = ?, mode_of_payment = ?, contract_number = ?, farmer_id = ?, microchip_number = ?, insurance_delivery_date = ? WHERE id = ?");
    $stmt->bind_param("iissisissi",$category, $price, $insurance_amount, $client_commission, $mode_of_payment, $contract_number, $farmer_id, $microchip_number, $insurance_delivery_date, $id);
    if ($stmt->execute()) {
        $successMessage = "Update successfully!";        
        header("Location: ../all-insurances.php?success=" . urlencode($successMessage));
    }else{
        $errorMessage = "Error: " . $stmt->error;
        header("Location: ../all-insurances.php?error=" . urlencode($errorMessage));
    }
        $stmt->close();
        // $conn->close();
}else{
    $errorMessage = "Error: No Data ";
    header("Location: ../all-insurances.php?error=" . urlencode($errorMessage));
    // echo $id;
}

$checkStmt->close();
$conn->close();
}


if(isset($_POST['del_id'])){
    $id = $_POST['del_id'];
    $stmt11 = $conn->prepare("DELETE FROM livestocks WHERE id = ?");
    $stmt11->bind_param("i", $id);
    if ($stmt11->execute()) {
        $successMessage = "Deleted successfully!";        
        // echo $successMessage;
        header("Location: ../all-insurances.php?success=" . urlencode($successMessage));
    }else{
        $errorMessage = "Error: " . $stmt11->error;
        // echo $errorMessage;
        header("Location: ../all-insurances.php?error=" . urlencode($errorMessage));
    }
        $stmt11->close();
        $conn->close();
}
?>