<?php
    // if(isset($_POST['category'])){
    //     echo $_POST['category'];
    // }
?>
<!-- Delete Modal -->
<form action="php/updateAgent.php" method="POST">
    <div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Delete Agent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <div class="row">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Do you really want to delete this?</label>      
                        <input type="hidden" name="del_id" id="del_id">                  
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</form>
<script>
    const del_id = document.getElementById('del_id');                       
    function del_agent(id){
        console.log(id);
        del_id.value = id;
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