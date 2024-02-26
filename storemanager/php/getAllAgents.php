<?php     
    include('link.php');        
    $checkStmt = $conn->prepare("SELECT * FROM agents");
    // $checkStmt->bind_param("i", $sector_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
        foreach($checkResult as $result)
        {                     
          $id = $result['id'];
          $code = $result['code'];
          $id_number = $result['id_number'];
          $names = $result['names'];
          $phone_number = $result['phone_number'];
          $village_id = $result['village_id'];
          $status = $result['status'];
            echo '
                  <tr>
                    <td>'.$result['code'].'</td>
                    <td>'.$result['names'].'</td>
                    <td>'.$result['id_number'].'</td>
                    <td>'.$result['email'].'</td>           
                    <td>'.$result['phone_number'].'</td>';
                        $chkStmt = $conn->prepare("SELECT * FROM villages WHERE village_id = ?");
                        $chkStmt->bind_param("i", $result['village_id']);
                        $chkStmt->execute();
                        $chRes = $chkStmt->get_result();
                        if ($chRes->num_rows > 0) {
                          foreach($chRes as $res)
                          { 
                            $village = $res['village'];
                            $cell_id = $res['cell_id'];
                                $ckStt = $conn->prepare("SELECT * FROM cells WHERE cell_id = ?");
                                $ckStt->bind_param("i", $cell_id);
                                $ckStt->execute();
                                $chRe = $ckStt->get_result();
                                if ($chRe->num_rows > 0) {
                                  foreach($chRe as $rs)
                                  { 
                                    $cell = $rs['cell'];
                                    $sector_id = $rs['sector_id'];
                                      $cSt = $conn->prepare("SELECT * FROM sectors WHERE sector_id = ?");
                                      $cSt->bind_param("i", $sector_id);
                                      $cSt->execute();
                                      $chp = $cSt->get_result();
                                      if ($chp->num_rows > 0) {
                                        foreach($chp as $r)
                                        { 
                                          $sector = $r['sector'];
                                          $district_id = $r['district_id'];
                                            $ct = $conn->prepare("SELECT * FROM districts WHERE district_id = ?");
                                            $ct->bind_param("i", $district_id);
                                            $ct->execute();
                                            $cp = $ct->get_result();
                                            if ($cp->num_rows > 0) {
                                              foreach($cp as $rt)
                                              { 
                                                $district = $rt['district'];
                                                $province_id = $rt['province_id'];
                                                echo '
                                                      <td><a href="./agent-details.php?fid='.$id.'">'.$district.'</td></a>
                                                      <td><a href="./agent-details.php?fid='.$id.'">'.$sector.'</td></a>
                                                      <td><a href="./agent-details.php?fid='.$id.'">'.$cell.'</td></a>
                                                      <td><a href="./agent-details.php?fid='.$id.'">'.$village.'</td></a>';
                                              }
                                            }
                                        }
                                      }
                                  }
                                }
                          }
                        }
              echo '
                    <!-- <td><span class="badge bg-label-success me-1">Livestock Insurance</span></td> -->
                    <td>'; if($result['status']){ echo '<span class="badge bg-label-primary">Active</span>'; }else {echo '<span class="badge bg-label-danger">Not Active</span>'; } echo'</td>
                    <td>'.$result['date'].'</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <button onclick="edit(' . $id . ',' . $id_number . ', \'' . $code . '\', \'' . $phone_number . '\', \'' . $names . '\', ' . $village_id . ', ' . $status . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                          <button onclick="del_agent(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                          <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                        </div>
                      </div>
                    </td>
                  </tr>';
        }
    }
    
    // header('Content-Type: application/json');
    // echo json_encode($results);
?>