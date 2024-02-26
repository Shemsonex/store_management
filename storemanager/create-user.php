<?php include('layout/header.php'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-center"><span class="text-muted fw-light"></span> Create New User</h4>

    <form action="php/addUser.php" method="POST">
      <div class="col-md-6 mx-auto">
        <div class="card mb-4">
          <div id="error-container" style="display: none;"></div>
          <div id="success-container" style="display: none;"></div>
          <h5 class="card-header">Add New User</h5>
          <div class="card-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">User</label>
              <select class="form-select" id="exampleFormControlSelect1" name="agent_id" aria-label="Default select example" required>
                <option selected>--Select User--</option>
                  <?php 
                    include('php/link.php');
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

            <button type="submit" class="btn btn-outline-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- / Content -->
<?php include('layout/footer.html'); ?>