<?php include('layout/header.php'); ?>
<script>
      const token = localStorage.getItem('myToken1').replace(/^"(.*)"$/, '$1');
      console.log(token);
        fetch('https://hardware.cyclic.app/api/user/getAll', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Accept': '*',
          'token': token
        },
      })
        .then(response => response.json())
        .then(data => {
              data.map(dat =>{
                // console.log(dat);
                document.getElementById('users').innerHTML += `
              <tr>
                <td><a href="./user-details.php?aid=`+ dat.id +`">`+ dat.firstName +`  `+ dat.lastName +`</td></a>
                <td><a href="./user-details.php?aid=`+ dat.id +`">`+ dat.firstName +`</td></a>
                <td><a href="./user-details.php?aid=`+ dat.id +`">`+ dat.phone +`</td></a>
                <td><a href="./user-details.php?aid=`+ dat.id +`">`+ dat.role +`</a></td>
                <td><a href="./user-details.php?aid=`+ dat.id +`"><span class="badge bg-label-primary">Active</span></a></td><td>
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
              </tr>`;
              })
            }
          )
        .catch(error => console.error('Error:', error));
    </script>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List of All Users <div id="error-container" style="display: none;"></div><div id="success-container" style="display: none;"></div></h4> -->
              
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Registered Users</h5>

                <div class="position-absolute top-0 end-0">

                  <div class="mt-3">
                    <!-- Button trigger modal -->
                    <!-- <a type="button" href="create-user.php" class="btn btn-primary">+ Add User</a> -->
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">+ Add User</button> -->

                    <!-- Offcanvas -->

                    <div class="mt-3">
                        <button style="margin-right: 20px;"
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEnd"
                          aria-controls="offcanvasEnd"
                        >
                          + Add New User
                        </button>
                        <?php include('php/modals/edit-user.php'); ?>
                        <?php include('php/modals/delete-user.php'); ?>
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasEnd"
                          aria-labelledby="offcanvasEndLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">Add New User</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">

              <form action="php/addUser.php" method="POST">
                            
                          <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">User</label>
              <select class="form-select" id="exampleFormControlSelect1" name="agent_id" aria-label="Default select example" required>
                <option selected>--Select User--</option>                
                  <?php 
                    include('php/link.php');
                      $cht = $conn->prepare("SELECT * FROM farmers");                      
                      $cht->execute();
                      $chec = $cht->get_result();
                      if ($chec->num_rows > 0) {
                        foreach($chec as $resul)
                        {
                          $id = $resul['id'];
                          echo '<option value="farmer'.$id.'">'.$resul['names'].'</option>';
                        }
                      }
                      $checkStmt = $conn->prepare("SELECT * FROM agents");                      
                      $checkStmt->execute();
                      $checkResult = $checkStmt->get_result();
                      if ($checkResult->num_rows > 0) {
                        foreach($checkResult as $result)
                        {
                            echo '<option value="'.$result['id'].'">'.$result['names'].'</option>';
                        }
                      }
                  ?>
                <!-- <option value="1">Admin</option>
                <option value="2">Agent</option>
                <option value="3">Operator</option> -->
              </select>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Username</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="name@example.com or JohnDoe" required/>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="........" required/>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="exampleFormControlInput1" name="confirm_password" placeholder="........" required/>
            </div>                    
            
            <div class="mb-3">
              <label for="exampleFormControlSelect1" class="form-label">User Role</label>
              <select class="form-select" id="exampleFormControlSelect1" name="role" aria-label="Default select example" required>
                <option selected>--Select Role--</option>
                <option value="1">Admin</option>
                <option value="2">Agent</option>
                <option value="3">Operator</option>
              </select>
            </div>

            <div class="mb-3">
              <div class="col mb-3">
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupFile01">Upload User Photo(Optional)</label>
                  <input type="file" class="form-control" id="inputGroupFile01" />
                </div>
              </div>
            </div>                        

            <div id="holder"></div>

            <!-- <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button> -->
            <button type="submit" class="btn btn-primary">Add User</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
                    <!-- OffCanvas -->
                    
                  <!-- </div>
                </div>
                 -->
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="users">
                      <?php //include('php/getAllUsers.php'); ?>           
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <!-- <hr class="my-5" /> -->

              
            <!-- / Content -->
<?php include('layout/footer.html'); ?>