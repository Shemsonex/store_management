<?php     
    include('link.php');    
    $district_id = $_REQUEST['district_id'];
    $results = [];
    $checkStmt = $conn->prepare("SELECT * FROM sectors WHERE district_id = ?");
    $checkStmt->bind_param("i", $district_id);
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