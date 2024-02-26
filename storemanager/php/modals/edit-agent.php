<?php
    if(isset($_POST['category'])){
        echo $_POST['category'];
    }
?>
<!-- Modal -->
<form action="php/updateAgent.php" method="POST">
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Individual Identification Number</label>
                        <input class="form-control" type="text" id="code1" name="code" placeholder="Code"/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Name</label>
                        <input class="form-control" type="text" id="names1" name="names" placeholder="Name"/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">ID Number</label>
                        <input class="form-control" type="text" id="id_number1" name="id_number" placeholder="ID Number"/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Phone Number</label>
                        <!-- <div class="form-control" id="sho"></div> -->
                        <input type="hidden" id="id1" name="id"/>
                        <input class="form-control" type="text" id="phone_number1" name="phone_number" placeholder="07..."/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Email</label>
                        <!-- <div class="form-control" id="sho"></div> -->
                        <!-- <input type="hidden" id="" name=""/> -->
                        <input class="form-control" type="email" id="email1" name="email" placeholder="name@example.com"/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Distict</label>
                        <select class="form-select" id="districts1" name="districts" aria-label="Default select example" onchange="getInterface(this.value)">
                            <option selected> </option>
                            
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Sector</label>
                        <select class="form-select" id="sectors1" name="sectors" aria-label="Default select example" onchange="getInterface(this.value)">
                            <option selected> </option>
                            
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Cell</label>
                        <select class="form-select" id="cells1" name="cells" aria-label="Default select example" onchange="getInterface(this.value)">
                            <option selected> </option>
                            
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Village</label>
                        <select class="form-select" id="villages1" name="villages" aria-label="Default select example" onchange="getInterface(this.value)">
                            <option selected> </option>
                            <option value="111101"> 1</option>
                            
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
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    const id1 = document.getElementById('id1');
    const code1 = document.getElementById('code1');
    const names1 = document.getElementById('names1');
    const id_number1 = document.getElementById('id_number1');
    const phone_number1 = document.getElementById('phone_number1');
    const email1 = document.getElementById('email1');
    const districts1 = document.getElementById('districts1');
    const sectors1 = document.getElementById('sectors1');
    const cells1 = document.getElementById('cells1');
    const villages1 = document.getElementById('villages1');
    const option = document.createElement('option');
    const option1 = document.createElement('option');
    let type = '';    
    function edit(id,id_number,code,phone_number,names,village_id,status){
        console.log(id,id_number,code,phone_number,names,village_id,status);
        id1.value = id;        
        code1.value=code;
        names1.value=names;
        id_number1.value=id_number;
        phone_number1.value=phone_number;
        email1.value='example@test.com';
        districts1.value=districts;
        sectors1.value=sectors;
        cells1.value=cells;
        villages1.value=village_id;

        // microchip_number1.value=microchip_number;
        // insurance_delivery_date1.value=insurance_delivery_date;
        // microchip_number1_disp.innerText=microchip_number;
        // insurance_delivery_date1_disp.innerText=insurance_delivery_date;
        // price1.value=price;
        // contract_number1.value=contract_number;        
        // if(mode_of_payment==1){ 
        //     mop = 'Cash'; }else if(mode_of_payment==2) { 
        //     mop = 'MoMo'; }else if(mode_of_payment==3) { 
        //     mop = 'Airtel Money'; }else{ 
        //     mop = 'Bank Transfer'; }
        // option1.value = mode_of_payment;
        // option1.textContent = mop;
        // option1.selected =true;
        // mode_of_payment1.prepend(option1);
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