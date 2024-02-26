<?php 
 error_reporting(1|0);
 include('php/link.php');  
if(isset($_GET['uid'])){
  $uid=$_GET['uid']; 
  $check212 = $conn->prepare("SELECT * FROM users WHERE id = ? AND users.farmer_id IS NULL AND users.agent_id IS NULL");
  $check212->bind_param("i", $uid);
}
if(isset($_GET['aid'])){
  $aid=$_GET['aid'];   
  $check212 = $conn->prepare("SELECT * FROM users,agents WHERE users.id = ? AND users.agent_id = agents.id");
  $check212->bind_param("i", $aid);
}
if(isset($_GET['fid'])){
  $fid=$_GET['fid']; 
  $check212 = $conn->prepare("SELECT * FROM users,farmers WHERE users.id = ? AND users.farmer_id = farmers.id");
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
    $code=$result242['code'];
    $village_id=$result242['village_id'];
    echo $names;
  }
}
?>

<?php include('./layout/header.php'); ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Agent Details /</span> Thierry</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <!-- <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class=""></i> Account</a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="client-insurance.php"
                        ><i class="bx bx-bell me-1"></i> Insurance</a
                      >
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                      >
                    </li> -->
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Agent Details</h5>
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
                          <p class="text mb-0"><b>Ngoga Thierry</b></p><br>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">

                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">CODE</label>
                            <p><b>A2</b></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">NAME</label>
                            <p><b>Ngoga Thierry</b></p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">ID NUMBER</label>
                            <p><b>1122334455667788</b></p>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">EMAIL</label>
                            <p><b>example@test.com</b></p>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">PHONE NUMBER</label>
                            <p><b>0788881111</b></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Location</label>
                            <p><b>Muhanga/ Nyamabuye/ Gahogo/ Nyarucyamu</b></p>
                          </div>

                          <hr class="my-0" />

                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Created Date</label>
                            <p>2023-06-30 18:35:11</p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Added By</label>
                            <p>Rukundo</p>
                          </div>

                        </div>
                        <div class="mt-2">
                        <a type="button" href="edit-agent.php" class="btn btn-primary me-2">Edit Agent</a>
                        <a type="button" href="agent-details.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                      </form>
                    </div>
                    <!-- /Account --> 
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Agent</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete this agent?</h6>
                          <p class="mb-0">Once you delete this agent, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm this agent deletion</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Delete Insurance</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <?php include('layout/footer.html'); ?>