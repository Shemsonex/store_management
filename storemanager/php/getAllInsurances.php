<?php     
    include('link.php');        
    $stock='';
    $checkStmt = $conn->prepare("SELECT * FROM livestocks");
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
        foreach($checkResult as $result)
        {                   
          $id = $result['id'];
          $category_id = $result['category_id'];
          $microchip_number = $result['microchip_number'];
          $price = $result['price'];
          $insurance_delivery_date = $result['insurance_delivery_date'];
          $mode_of_payment = $result['mode_of_payment'];
          $contract_number = $result['contract_number'];

            echo '
                  <tr>
                    <td><a href="./insurance-details.php?aid='.$id.'">'; if($result['category_id']==1){ echo '<span class="badge bg-label-danger">Chicken</span>';$stock='Chicken'; }elseif($result['category_id']==2) {echo '<span class="badge bg-label-danger">Cow</span>';$stock='Cow'; }elseif($result['category_id']==3) {echo '<span class="badge bg-label-danger">Duck</span>';$stock='Duck'; }elseif($result['category_id']==4) { echo '<span class="badge bg-label-danger">Goat</span>';$stock='Goat'; }elseif($result['category_id']==5) { echo '<span class="badge bg-label-danger">Pig</span>';$stock='Pig'; }else{ echo '<span class="badge bg-label-danger">Sheep</span>';$stock='Sheep'; } echo'</td></a>
                    <td><a href="./insurance-details.php?aid='.$id.'">'.$result['microchip_number'].'</td></a>
                    <td><a href="./insurance-details.php?aid='.$id.'">'.$result['insurance_delivery_date'].'</td></a>
                    <td><a href="./insurance-details.php?aid='.$id.'">'.$result['price'].'</td></a>
                    <td><a href="./insurance-details.php?aid='.$id.'">'.$result['insurance_amount'].'</td></a>                    
                    <td><a href="./insurance-details.php?aid='.$id.'">'. ((($result['price']*5.5)/100) * 13.5)/100 .'</td></a>
                    <td><a href="./insurancer-details.php?aid='.$id.'">'. ((((($result['price']*5.5)/100) * 13.5)/100) * 7)/13.5 .'</td></a>
                    <td><a href="./insurance-details.php?aid='.$id.'">'. ((((($result['price']*5.5)/100) * 13.5)/100) * 6.5)/13.5 .'</td></a>
                    <td><a href="./insurance-details.php?aid='.$id.'">'; if($result['mode_of_payment']==1){ echo 'Cash'; }elseif( $result['category_id']==2) { echo 'MoMo'; }elseif($result['category_id']==3) { echo 'Airtel Money'; }else{ echo 'Bank'; } echo'</td></a>';                       
              echo '                    
                    <td><a href="./insurance-details.php?aid='.$id.'">'.$result['contract_number'].'</td></a>
                    <td><a href="./insurance-details.php?aid='.$id.'">'.$result['user'].'</td></a>
                    <td><a href="./insurance-details.php?aid='.$id.'">'.$result['entry_date'].'</td></a>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <button onclick="edit(' . $id . ',' . $category_id . ', \'' . $microchip_number . '\', \'' . $insurance_delivery_date . '\', ' . $price . ', ' . $mode_of_payment . ', \'' . $contract_number . '\')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                          <button onclick="del_insurance(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
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