<?php
    if(isset($_POST['category'])){
        echo $_POST['category'];
    }
?>
<!-- Modal -->
<form action="php/updateUser.php" method="POST">
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Username</label>
                        <input type="hidden" id="id1" name="id"/>
                        <input class="form-control" type="text" id="username" name="username" placeholder="Username"/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="ID Number"/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Confirm Password</label>
                        <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="ID Number"/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">User Role</label>
                        <select class="form-select" id="role" name="role" aria-label="Default select example" onchange="getInterface(this.value)">
                        <option selected>--Select Role--</option>
                        <option value="1">Admin</option>
                        <option value="2">Agent</option>
                        <option value="3">Operator</option>
                            
                        </select>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col mb-3">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupFile01">Upload User Photo(Optional)</label>
                        <input type="file" class="form-control" id="inputGroupFile01" />
                    </div>
                    </div>
                </div> -->    

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button> -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    const id1 = document.getElementById('id1');
    const username1 = document.getElementById('username');
    const password1 = document.getElementById('password');
    const confirm_password1 = document.getElementById('confirm_password');
    const role1 = document.getElementById('role');
    const option = document.createElement('option');
    const option1 = document.createElement('option');
    let type = '';    
    function edit(id,username,role,status){
        console.log(id,username,role,status);
        id1.value = id;
        username1.value=username;
        password1.value=password;
        confirm_password1.value=confirm_password;
        role1.value=role;
    }
</script>

<!-- async function getDistricts(district_id) {
  try {
    const response = await fetch(`./php/getDistricts.php?district_id=${district_id}`);
    const data = await response.json();
    
    const selectElement = document.getElementById('districts');
    data.forEach(district => {
      const option = document.createElement('option');
      option.value = district.district_id;
      option.textContent = district.district;
      selectElement.appendChild(option);
    });
  } catch (error) {
    console.error('Error:', error);
  }
} -->