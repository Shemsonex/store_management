<?php     
    include('link.php');    
    $cell_id = $_REQUEST['cell_id'];
    $results = [];
    $checkStmt = $conn->prepare("SELECT * FROM villages WHERE cell_id = ?");
    $checkStmt->bind_param("i", $cell_id);
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