<?php include('./layout/header.php'); ?>
<?php include('php/modals/edit-user.php'); ?>
<?php include('php/modals/delete-user.php'); ?>
<?php $uid=$_GET['aid']; ?>
<script>
      const token = localStorage.getItem('myToken1').replace(/^"(.*)"$/, '$1');
      // console.log(token);
        fetch('https://hardware.cyclic.app/api/user/'+<?= $uid ?>, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Accept': '*',
          'token': token
        },
      })
        .then(response => response.json())
        .then(data => {
                console.log(data);
                document.getElementById('userdet_name').innerHTML = data.firstName.charAt(0).toUpperCase() + data.firstName.slice(1);
                document.getElementById('userdet_fullname').innerHTML = data.firstName.charAt(0).toUpperCase() + data.firstName.slice(1)+` `+data.lastName.charAt(0).toUpperCase() + data.lastName.slice(1);
                document.getElementById('userdet_email').innerHTML = data.email;
                document.getElementById('userdet_phone').innerHTML = data.phone;
                document.getElementById('userdet_role').innerHTML = data.role.charAt(0).toUpperCase() + data.role.slice(1);
                document.getElementById('userdet_code').innerHTML = data.id;
                document.getElementById('userdet_date').innerHTML = data.createdAt;
            }
          )
        .catch(error => console.error('Error:', error));
    </script>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User Details /</span><span></span></h4> -->

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-2">
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
                  <div class="card mb-3">
                    <h5 class="card-header">User Details</h5>
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
                          <p class="text mb-0"><b id="userdet_name"></b></p><br>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">

                          <div class="mb-0 col-md-6">
                            <label for="lastName" class="form-label">CODE</label>
                            <p><b id="userdet_code"></b></p>
                          </div>

                          <div class="mb-0 col-md-6">
                            <label for="firstName" class="form-label">NAME</label>
                            <p><b id="userdet_fullname"></b></p>
                          </div>
                          <div class="mb-0 col-md-6">
                            <label for="lastName" class="form-label">ROLE</label>
                            <p><b id="userdet_role"></b></p>
                          </div>
                          
                          <div class="mb-0 col-md-6">
                            <label for="lastName" class="form-label">EMAIL</label>
                            <p><b id="userdet_email"></b></p>
                          </div>
                          
                          <div class="mb-0 col-md-6">
                            <label for="email" class="form-label">PHONE NUMBER</label>
                            <p><b id="userdet_phone"></b></p>
                          </div>

                          <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">Created Date</label>
                            <p id="userdet_date"></p>
                          </div>
                          
                          <hr class="my-0" />
                          
                          <!-- <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">Location</label>
                            <p><b></b></p>
                          </div> -->

                          <!-- <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">Added By</label>
                            <p>Rukundo</p>
                          </div> -->

                        </div>
                        <div class="mt-2">
                        <!-- <a type="button" href="edit-agent.php" class="btn btn-primary me-2">Edit User</a> -->
                        
                        <?php 
                        if(isset($_GET['aid'])){
                          $aid=$_GET['aid']; 
                        echo'<button onclick="edit()" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit User</button>';
                        }

                        if(isset($_GET['fid'])){
                          $fid=$_GET['fid']; 
                        echo'<button onclick="edit()" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit User</button>';
                        }
                        ?>
                        <!-- <a type="button" href="agent-details.php" class="btn btn-outline-secondary">Cancel</a> -->
                        </div>
                      </form>
                    </div>
                    <!-- /Account --> 
                  </div>
                  <div class="card">
                    <h6 class="card-header">Delete Agent</h6>
                    <div class="card-body">
                      <div class="mb-0 col-12 mb-0">
                        <!-- <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-0">Are you sure you want to delete this agent?</h6>
                          <p class="mb-0">Once you delete this agent, there is no going back. Please be certain.</p>
                        </div> -->
                      </div>
                      <!-- <form id="formAccountDeactivation" onsubmit="return false"> -->
                        <!-- <div class="form-check mb-0">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm this agent deletion</label
                          >
                        </div> -->
                        <!-- <button type="submit" class="btn btn-danger deactivate-account">Delete Insurance</button> -->
                        <?php
                        if(isset($_GET['aid'])){
                          $aid=$_GET['aid']; 
                        echo '<button onclick="del_user(' . $aid . ')" class="btn btn-danger deactivate-account" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>';
                        }
                        if(isset($_GET['fid'])){
                          $fid=$_GET['fid']; 
                        echo '<button onclick="del_user(' . $fid . ')" class="btn btn-danger deactivate-account" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>';
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