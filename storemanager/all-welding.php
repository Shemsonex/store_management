<?php include('layout/header.php'); ?>
<script>
      const token = localStorage.getItem('myToken1').replace(/^"(.*)"$/, '$1');
      // console.log(token);
        fetch('https://hardware.cyclic.app/api/stock/getAllStock', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Accept': '*',
          'token': token
        },
      })
        .then(response => response.json())
        .then(data => {
          const datas = data.stock;
          console.log(datas);
          datas.map(data =>{
            const dat = data.product;
                console.log(dat);
                document.getElementById('cons_name').innerHTML += `
                <tr>
                    <td><a href="./construction-details.php?aid=`+dat.id+`"><span class="badge bg-label-success">`+dat.product_name+`</span></td></a>
                    <td><a href="./construction-details.php?aid=`+dat.id+`">`+dat.description+`</td></a>
                    <td><a href="./construction-details.php?aid=`+dat.id+`">`+dat.category+`</td></a>
                    <td><a href="./construction-details.php?aid=`+dat.id+`">`+dat.price+`</td></a>                       
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <button onclick="edit()" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                          <button onclick="del_construction()" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
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
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Construction <div id="error-container" style="display: none;"></div><div id="success-container" style="display: none;"></div></h4>             -->

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Construction Products</h5>

                <div class="position-absolute top-0 end-0">

                  <div class="mt-3">
                  
                    <!-- Offcanvas -->
 
                    <div class="mt-3">
                        <button style="margin-right: 20px;" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                          + Add New Item
                        </button>
                        <?php include('php/modals/edit-construction.php'); ?>
                        <?php include('php/modals/delete-construction.php'); ?>
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasEnd"
                          aria-labelledby="offcanvasEndLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">Add New Item</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">

                          <form action="php/addInsurance.php" method="POST">

                          <div class="mb-3">
                              <label for="exampleFormControlSelect1" class="form-label">Items</label>
                              <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="category">
                                <option selected>-- Select Category --</option>
                                <option value="1">Chicken</option>
                                <option value="2">Cow</option>
                                <!-- <option value="3">Duck</option> -->
                                <!-- <option value="4">Goat</option> -->
                                <option value="5">Pig</option>
                                <!-- <option value="6">Sheep</option> -->
                              </select>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Microchip Number / Numero y'iherena</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="microchip_number" placeholder="Microchip Number"/>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Date of Insurance Delivery</label>
                          <input class="form-control" type="date" name="construction_delivery_date" id="html5-date-input" />
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Price</label>
                          <input type="number" class="form-control" id="exampleFormControlInput1" name="price" placeholder="Price / Agaciro kayo"/>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Contract Number</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="contract_number" placeholder="Contract Number"/>
                        </div>
                        
                        <div class="mb-3">
                              <label for="exampleFormControlSelect1" class="form-label">Mode Of Insurance Payment</label>
                              <select class="form-select" id="mode_of_payment" name="mode_of_payment" aria-label="Default select example" onchange="getInterface2(this.value)">
                                <option selected>-- Select Mode --</option>
                                <option value="1">Cash</option>
                                <option value="2">MOMO</option>
                                <option value="3">Airtel Money</option>
                                <option value="4">Bank Transfer</option>
                              </select>
                        </div>

                        <div class="mb-3" id="momo2" style="display: none;">
                          <label for="exampleFormControlInput1" class="form-label">Momo Account Number</label>
                          <input type="text" class="form-control" id="momo_number" name="momo_number" placeholder="Momo Account Number"/>
                        </div>

                        <div class="mb-3" id="airtel2" style="display: none;">
                          <label for="exampleFormControlInput1" class="form-label">Aitel Money Account Number</label>
                          <input type="text" class="form-control" id="airtelMoney_number" name="airtelMoney_number" placeholder="Aitel Money Account Number"/>
                        </div>

                        <div class="mb-3" id="bank2" style="display: none;">
                          <label for="exampleFormControlInput1" class="form-label">Bank Name</label>
                          <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Bank Name"/>
                          <label for="exampleFormControlInput1" class="form-label">Account Number</label>
                          <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number"/>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Insurance</button>
                      </div>
                    </form>
                    <!-- <div class="mt-3">
                      <button class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div> -->
                  </div>
                </div>
                    
                    <!-- /OffCanvas -->

              </div>
            </div>
                
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Items</th>
                        <th>type</th>
                        <th>Quantity</th>                      
                        <th>Unit Price</th>                      
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0" id="cons_name">

                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <!-- <hr class="my-5" /> -->

              
            <!-- / Content -->
<?php include('layout/footer.html'); ?>