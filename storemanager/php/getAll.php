<?php     
    include('link.php');  
    $anim = []      ;
    $chicken=[];
    $cow=[];
    $pig=[];
    $results=[];
    $checkStmt = $conn->prepare("SELECT COUNT(*) AS cnt FROM livestocks WHERE category_id=1");
    // $checkStmt->bind_param("i", $sector_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
        foreach($checkResult as $result)
        {                     
            $chicken[] = $result;            
        }
    }

    $checkStmtcow = $conn->prepare("SELECT  COUNT(*) AS cnt FROM livestocks WHERE category_id=2");
    // $checkStmt->bind_param("i", $sector_id);
    $checkStmtcow->execute();
    $checkResultcow = $checkStmtcow->get_result();
    if ($checkResultcow->num_rows > 0) {
        foreach($checkResultcow as $resultcow)
        {                     
            $cow[] = $resultcow;            
        }
    }
    
    $checkStmtpig = $conn->prepare("SELECT  COUNT(*) AS cnt FROM livestocks WHERE category_id=5");
    // $checkStmt->bind_param("i", $sector_id);
    $checkStmtpig->execute();
    $checkResultpig = $checkStmtpig->get_result();
    if ($checkResultpig->num_rows > 0) {
        foreach($checkResultpig as $resultpig)
        {                     
            $pig[] = $resultpig;            
        }
    }
    $results = [
        'chicken' => $chicken,
        'cow' => $cow,
        'pig' => $pig
    ];
    $data = json_encode($results);
    header('Content-Type: application/json');
    echo $data;
?>