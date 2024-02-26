<?php
include('link.php');
// error_reporting(1|0);
session_start();
$user = $_SESSION['name'];
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
        default : echo 'Error !!!';
    }
$price = $_POST['price'];
$insurance_amount = ($price * 5.5) / 100 ;
$solektra_commission = ($insurance_amount * 13.5) / 100;
$agent_commission = ($solektra_commission * 7) / 13.5;
$client_commission = ($insurance_amount * 60)  / 100;
$successMessage = '';
$errorMessage = '';

// Check if the farmer already exists
$checkSql = "SELECT id FROM livestocks WHERE microchip_number = ? AND insurance_delivery_date = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("ss", $microchip_number, $insurance_delivery_date);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    $checkStmt->close();
    $conn->close();
    $errorMessage = "Livestock with Microchip number $microchip_number already exists!";
    header("Location: ../all-insurances.php?error=" . urlencode($errorMessage));
    exit;
}



$stmt = $conn->prepare("INSERT INTO payments (payment_mode, account_company, account_number, account_owner, amount, farmer_id, agent_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssii",$mode_of_payment, $company_name, $account_number, $account_owner, $client_commission, $farmer_id, $agent_id);

if ($stmt->execute()) {  

    $tre = $conn->prepare("SELECT id FROM payments ORDER BY id DESC LIMIT 1");    
    $tre->execute();
    $rst = $tre->get_result();    
    if ($rst->num_rows > 0) {     
        foreach($rst as $lt){
        $payment_id = $lt['id'];
            $st = $conn->prepare("INSERT INTO livestocks (category_id, microchip_number, insurance_delivery_date, price, insurance_amount, client_commission, mode_of_payment, contract_number, payment_id, farmer_id, agent_id, user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $st->bind_param("isssssisiiis",$category, $microchip_number, $insurance_delivery_date, $price, $insurance_amount, $client_commission, $mode_of_payment, $contract_number, $payment_id, $farmer_id, $agent_id, $user);

            if ($st->execute()) {        
                $successMessage = "Registered successfully!";
                header("Location: ../all-insurances.php?success=" . urlencode($successMessage));
            } else {
                $errorMessage = "Error: " . $st->error;
                header("Location: ../all-insurances.php?error=" . urlencode($errorMessage));
            }
            $st->close();
            $tre->close();
            $conn->close();
        }
        }
} else {
    $errorMessage = "Error: " . $stmt->error;    
    header("Location: ../all-insurances.php?error=" . urlencode($errorMessage));
}
$stmt->close();
$conn->close();
?>