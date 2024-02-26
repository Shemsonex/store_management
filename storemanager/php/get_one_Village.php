<?php     
    include('link.php');    
    $village_id = $_REQUEST['village_id'];
    $results = [];
    $checkStmt = $conn->prepare("SELECT * FROM villages WHERE village_id = ?");
    $checkStmt->bind_param("i", $village_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
        foreach($checkResult as $result)
        {                     
            $results[] = $result;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($results);
?>