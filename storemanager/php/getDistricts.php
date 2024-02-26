<?php     
    include('link.php');    
    $results = [];
    $checkStmt = $conn->prepare("SELECT * FROM districts");
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
        foreach($checkResult as $result)
        {         
            // echo'<option value="'.$result['district_id'].'">'.$result['district'].'</option>'; 
            $results[] = $result;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($results);
?>