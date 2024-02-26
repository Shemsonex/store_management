<?php
    if(isset($_POST['category'])){
        echo $_POST['category'];
    }
?>
<!-- Modal -->
<form action="php/updateInsurance.php" method="POST">
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Insurance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <div class="row">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Category of Livestock</label>
                        <select class="form-select" id="animal" aria-label="Default select example" name="category">
                        <option value="1">Chicken</option>
                        <option value="2">Cow</option>
                        <!-- <option value="3">Duck</option> -->
                        <!-- <option value="4">Goat</option> -->
                        <option value="5">Pig</option>
                        <!-- <option value="6">Sheep</option> -->
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Microchip Number / Nimero y'iherena</label>
                        <!-- <div class="form-control" id="sho"></div> -->
                        <input type="hidden" id="lvst_id" name="lvst_id"/>
                        <input class="form-control" type="text" id="microchip_number" name="microchip_number" placeholder="Microchip Number"/>
                        <!-- <div class="form-control" id="microchip_number_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="dobBasic" class="form-label">Date of Insurance Delivery</label>
                        <input class="form-control" id="insurance_delivery_date" type="date" name="insurance_delivery_date" id="html5-date-input"/>
                        <!-- <input type="hidden" id="insurance_delivery_date" name="insurance_delivery_date"/> -->
                        <!-- <div class="form-control" id="insurance_delivery_date_disp"></div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price / Agaciro kayo"/>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Contract Number</label>
                        <input type="text" class="form-control" id="contract_number" name="contract_number" placeholder="Contract Number"/>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label for="defaultSelect" class="form-label">Mode of Insurance Payment</label>
                        <select class="form-select" id="mode_of_payment" name="mode_of_payment" aria-label="Default select example" onchange="getInterface(this.value)">
                            <option selected>-- Select Mode --</option>
                            <option value="1">Cash</option>
                            <option value="2">MOMO</option>
                            <option value="3">Airtel Money</option>
                            <option value="4">Bank Transfer</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3" id="momo" style="display: none;">
                        <label for="nameBasic" class="form-label">Momo Account Name</label>
                        <input type="text" class="form-control" id="momo_number" name="momo_number" placeholder="Momo Number"/>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3" id="airtel" style="display: none;">
                        <label for="nameBasic" class="form-label">Aitel Money Account Name</label>
                        <input type="text" class="form-control" id="airtelMoney_number" name="airtelMoney_number" placeholder="Aitel Money Number"/>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3" id="bank" style="display: none;">
                        <label for="nameBasic" class="form-label">Bank Name & Account Number</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Bank Name"/>           
                        <!-- <label for="nameBasic" class="form-label">Contract Number</label> -->
                        <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number"/>
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
    const id1 = document.getElementById('lvst_id');
    const select_animal = document.getElementById('animal');
    const microchip_number1 = document.getElementById('microchip_number');
    const insurance_delivery_date1 = document.getElementById('insurance_delivery_date');
    // const microchip_number1_disp = document.getElementById('microchip_number_disp');
    // const insurance_delivery_date1_disp = document.getElementById('insurance_delivery_date_disp');
    const price1 = document.getElementById('price');
    const contract_number1 = document.getElementById('contract_number');
    const mode_of_payment1 = document.getElementById('mode_of_payment');
    const momo_number1 = document.getElementById('momo_number');
    const airtelMoney_number1 = document.getElementById('airtelMoney_number');
    const company_name1 = document.getElementById('company_name');
    const account_number1 = document.getElementById('account_number');
    const option = document.createElement('option');
    const option1 = document.createElement('option');
    let type = '';    
    function edit(id,cat_id,microchip_number,insurance_delivery_date,price,contract_number,mode_of_payment){
        console.log(id,cat_id,microchip_number,insurance_delivery_date,price,contract_number,mode_of_payment);
        id1.value = id;
         if(cat_id==1){ 
            type = 'Chicken'; }else if(cat_id==2) { 
            type = 'Cow'; }else if(cat_id==3) { 
            type = 'Duck'; }else if(cat_id==4) { 
            type = 'Goat'; }else if(cat_id==5) { 
            type = 'Pig'; }else{ 
            type = 'Sheep'; 
        }        
        option.value = cat_id;
        option.textContent = type;
        option.selected =true;
        select_animal.prepend(option);
        microchip_number1.value=microchip_number;
        insurance_delivery_date1.value=insurance_delivery_date;
        // microchip_number1_disp.innerText=microchip_number;
        // insurance_delivery_date1_disp.innerText=insurance_delivery_date;
        price1.value=price;
        contract_number1.value=contract_number;        
        if(mode_of_payment==1){ 
            mop = 'Cash'; }else if(mode_of_payment==2) { 
            mop = 'MoMo'; }else if(mode_of_payment==3) { 
            mop = 'Airtel Money'; }else{ 
            mop = 'Bank Transfer'; }
        option1.value = mode_of_payment;
        option1.textContent = mop;
        option1.selected =true;
        mode_of_payment1.prepend(option1);
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