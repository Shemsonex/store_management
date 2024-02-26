<?php 
 error_reporting(1|0);
 include('php/link.php');  

if(isset($_GET['fid'])){
  $fid=$_GET['fid']; 
  $check212 = $conn->prepare("SELECT * FROM farmers WHERE farmers.id = ?");
  $check212->bind_param("i", $fid);
}
$check212->execute();
$checkRes232 = $check212->get_result();
if ($checkRes232->num_rows > 0) {
  foreach($checkRes232 as $result242)
  {                     
    $id_number = $result242['id_number'];
    $names1 = 'N/A';
    $names = $result242['names'];
    $phone_number = $result242['phone_number'];
    $phone_number1 = 'N/A';
    $status = $result242['status'];
    $role=$result242['role'];
    $email=$result242['email'];
    $village_id=$result242['village_id'];
    $date=$result242['date'];
    $user=$result242['user'];
    $code = 'C' . $result242['id'];
    // echo $names;
  }
}
?>

<?php include('./layout/header.php'); ?>
<?php include('php/modals/edit-client.php'); ?>
<?php include('php/modals/delete-client.php'); ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Details /</span> Client</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="client-insurance.php"
                        ><i class="bx bx-bell me-1"></i> Insurance</a
                      >
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                      >
                    </li> -->
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="../assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <p class="text mb-0"><b><?= $names ?></b></p><br>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Name</label>
                            <p><b><?= $names ?></b></p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">ID Number</label>
                            <p><b><?= $id_number ?></b></p>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Phone Number</label>
                            <p><b><?= $phone_number ?></b></p>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <p><b><?= $email ?></b></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">District</label>
                            <p><b>
                            <?php 
                                  // echo $village_id;                                                                    
                                  $sql = "
                                      SELECT
                                          villages.village AS village,
                                          cells.cell AS cell,
                                          sectors.sector AS sector,
                                          districts.district AS district,
                                          cells.cell_id AS cell_id,
                                          sectors.sector_id AS sector_id,
                                          districts.district_id AS district_id
                                      FROM
                                          villages,
                                          cells,
                                          sectors,
                                          districts
                                      WHERE
                                          villages.village_id = ?
                                          AND cells.cell_id = villages.cell_id
                                          AND sectors.sector_id = cells.sector_id
                                          AND districts.district_id = sectors.district_id
                                  ";
                                                                
                                  $stmt = $conn->prepare($sql);                                                                
                                  $stmt->bind_param('i', $village_id);                                                                
                                  if ($stmt->execute()) {                                      
                                    $results = $stmt->get_result();
                                    if ($results->num_rows > 0) {
                                      foreach($results as $result)
                                      {                     
                                      //   $id_number = $result242['id_number'];                                    
                                      // $result = $stmt->fetch(PDO::FETCH_ASSOC);                              
                                      // if ($result) {                                          
                                          $village = $result['village'];
                                          $cell = $result['cell'];
                                          $sector = $result['sector'];
                                          $district = $result['district'];
                                                                                    
                                          $cell_id = $result['cell_id'];
                                          $sector_id = $result['sector_id'];
                                          $district_id = $result['district_id'];
                                          // Muhanga/ Nyamabuye/ Gahogo/ Nyarucyamu
                                          echo $district;
                                      }                                     
                                    }
                                  }
                              ?>
                            </b></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Sector</label>
                            <p><b><?= $sector; ?></b></p>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Cell</label>
                            <p><b><?= $cell ?></b></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Village</label>
                            <p><b><?= $village ?></b></p>
                          </div>

                          <hr class="my-0" />

                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Created Date</label>
                            <p><?= $date ?></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Added By</label>
                            <p><?= strtoupper($user); ?></p>
                          </div>

                        </div>
                        <div class="mt-2">
                        <!-- <a type="button" href="edit-client.php" class="btn btn-primary me-2">Edit Profile</a> -->
                        <?php 
                        if(isset($_GET['fid'])){
                          $fid=$_GET['fid']; 
                        echo'<button onclick="edit(' . $fid . ',' . $id_number . ', \'' . $phone_number . '\', \'' . $email . '\', \'' . $names . '\', ' . $district_id . ', ' . $sector_id . ', ' . $cell_id . ', ' . $village_id . ')" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit User</button>';
                        }
                        ?>
                        <!-- <a type="button" href="client-details.php" class="btn btn-outline-secondary">Cancel</a> -->
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Client</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete this client?</h6>
                          <p class="mb-0">Once you delete this client, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <!-- <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm this client deletion</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Delete Client</button> -->
                        <?php
                        if(isset($_GET['fid'])){
                          $fid=$_GET['fid']; 
                        echo '<button onclick="del_client(' . $fid . ')" class="btn btn-danger deactivate-account" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>';
                        }
                        ?>
                      <!-- </form> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <?php include('layout/footer.html'); ?>