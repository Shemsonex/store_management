<?php     
    include('link.php');    
    $sector_id = $_REQUEST['sector_id'];
    $results = [];
    $checkStmt = $conn->prepare("SELECT * FROM cells WHERE sector_id = ?");
    $checkStmt->bind_param("i", $sector_id);
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