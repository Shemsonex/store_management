<?php     
    include('link.php');        
    $checkStmt = $conn->prepare("SELECT * FROM users,agents WHERE  users.agent_id = agents.id");
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
      foreach($checkResult as $result)
      {                     
        $id = $result['id'];
        $username = $result['username'];
        $role = $result['role'];
        $status = $result['status'];
        echo '
              <tr>
                <td><a href="./user-details.php?aid='.$id.'">'.$result['names'].'</td></a>
                <td><a href="./user-details.php?aid='.$id.'">'.$result['username'].'</td></a>
                <td><a href="./user-details.php?aid='.$id.'">'.$result['phone_number'].'</td></a>
                <td><a href="./user-details.php?aid='.$id.'">'; if($result['role']==1){ echo '<span class="badge bg-label-primary">Admin</span>'; }elseif($result['role']==2) {echo '<span class="badge bg-label-primary">Agent</span>'; }else{echo '<span class="badge bg-label-primary">Operator</span>'; } echo'</a></td>
                <td><a href="./user-details.php?aid='.$id.'">'; if($result['status']==1){ echo '<span class="badge bg-label-primary">Active</span>'; }else {echo '<span class="badge bg-label-danger">Not Active</span>'; } echo'
                </a></td><td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                          <button onclick="edit(' . $id . ',\'' . $username . '\', ' . $role . ', ' . $status . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                          <button onclick="del_user(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                          <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                    </div>
                  </div>
                </td>
              </tr>';
      }
    }
    

    $check21 = $conn->prepare("SELECT users.id,farmers.names,users.username,farmers.phone_number,users.status,users.role FROM users,farmers WHERE  users.farmer_id = farmers.id");
    $check21->execute();
    $checkRes23 = $check21->get_result();
    if ($checkRes23->num_rows > 0) {
      foreach($checkRes23 as $result24)
      {                     
        $id = $result24['id'];
        $names = $result24['names'];
        $phone_number = $result24['phone_number'];
        $status = $result24['status'];
        echo '
              <tr>
                <td><a href="./user-details.php?fid='.$id.'">'.$result24['names'].'</a></td>
                <td><a href="./user-details.php?fid='.$id.'">'.$result24['username'].'</a></td>
                <td><a href="./user-details.php?fid='.$id.'">'.$result24['phone_number'].'</a></td>
                <td><a href="./user-details.php?fid='.$id.'">'; if($result24['role']==1){ echo '<span class="badge bg-label-primary">Admin</span>'; }elseif($result24['role']==2) {echo '<span class="badge bg-label-primary">Agent</span>'; }else{echo '<span class="badge bg-label-primary">Operator</span>'; } echo'</a></td>
                <td><a href="./user-details.php?fid='.$id.'">'; if($result24['status']==1){ echo '<span class="badge bg-label-primary">Active</span>'; }else {echo '<span class="badge bg-label-danger">Not Active</span>'; } echo'
                </a></td><td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                          <button onclick="edit(' . $id . ',\'' . $names . '\', ' . $phone_number . ', ' . $status . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                          <button onclick="del_user(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                          <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                    </div>
                  </div>
                </td>
              </tr>';
      }
    }

    // $fid = 'NULL';
    // $aid = 'NULL';
    // $check212 = $conn->prepare("SELECT users.id,users.username,users.status,users.role FROM users WHERE users.farmer_id IS NULL AND users.agent_id IS NULL");
    // // $check212->bind_param("ss", $fid, $aid);
    // $check212->execute();
    // $checkRes232 = $check212->get_result();
    // if ($checkRes232->num_rows > 0) {
    //   foreach($checkRes232 as $result242)
    //   {                     
    //     $id = $result242['id'];
    //     $names = 'N/A';
    //     // $names = $result242['names'];
    //     // $phone_number = $result242['phone_number'];
    //     $phone_number = 'N/A';
    //     $status = $result242['status'];
    //     echo '
    //           <tr>
    //             <td><a href="./user-details.php?uid='.$id.'">'.$names.'</a></td>
    //             <td><a href="./user-details.php?uid='.$id.'">'.$result242['username'].'</a></td>
    //             <td><a href="./user-details.php?uid='.$id.'">'.$phone_number.'</a></td>
    //             <td><a href="./user-details.php?uid='.$id.'">'; if($result242['role']==1){ echo '<span class="badge bg-label-primary">Admin</span>'; }elseif($result242['role']==2) {echo '<span class="badge bg-label-primary">Agent</span>'; }else{echo '<span class="badge bg-label-primary">Operator</span>'; } echo'</a></td>
    //             <td><a href="./user-details.php?uid='.$id.'">'; if($result242['status']==1){ echo '<span class="badge bg-label-primary">Active</span>'; }else {echo '<span class="badge bg-label-danger">Not Active</span>'; } echo'
    //             </a></td><td>
    //               <div class="dropdown">
    //                 <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
    //                   <i class="bx bx-dots-vertical-rounded"></i>
    //                 </button>
    //                 <div class="dropdown-menu">
    //                       <button onclick="edit(' . $id . ',\'' . $names . '\', ' . $phone_number . ', ' . $status . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
    //                       <button onclick="del_user(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
    //                       <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
    //                 </div>
    //               </div>
    //             </td>
    //           </tr>';
    //   }
    // }
    // header('Content-Type: application/json');
    // echo json_encode($results);
?>