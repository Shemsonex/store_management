<?php include('layout/header.php'); ?>

          <!-- Content wrapper -->
            <div class="content-wrapper">
              <!-- Content -->

              <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4 text-center"><span class="text-muted fw-light"></span> Create New Insurance</h4>

                <form action="php/addInsurance.php" method="POST">
                  <div class="col-md-6 mx-auto">
                    <div class="card mb-4">
                      <div id="error-container" style="display: none;"></div>
                      <div id="success-container" style="display: none;"></div>
                      <h5 class="card-header">Add New Livestock</h5>
                      <div class="card-body">

                        <div class="mb-3">
                              <label for="exampleFormControlSelect1" class="form-label">Category of Livestock</label>
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
                          <input class="form-control" type="date" name="insurance_delivery_date" id="html5-date-input" />
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Price</label>
                          <input type="number" class="form-control" id="exampleFormControlInput1" name="price" placeholder="Price / Agaciro kayo"/>
                        </div>

                        <!-- <div class="mb-3">
                          <-- <label for="exampleFormControlInput1" class="form-label">Phone Number</label> --
                          <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="+250..."/>
                        </div> -->
                        
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Contract Number</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="contract_number" placeholder="Contract Number"/>
                        </div>
                        
                        <div class="mb-3">
                              <label for="exampleFormControlSelect1" class="form-label">Mode Of Insurance Payment</label>
                              <select class="form-select" id="exampleFormControlSelect1" name="mode_of_payment" aria-label="Default select example" onchange="getInterface(this.value)">
                                <option selected>-- Select Mode --</option>
                                <option value="1">Cash</option>
                                <option value="2">MOMO</option>
                                <option value="3">Airtel Money</option>
                                <option value="4">Bank Transfer</option>
                              </select>
                        </div>

                        <div class="mb-3" id="momo" style="display: none;">
                          <label for="exampleFormControlInput1" class="form-label">Momo Account Number</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="momo_number" placeholder="Momo Account Number"/>
                        </div>

                        <div class="mb-3" id="airtel" style="display: none;">
                          <label for="exampleFormControlInput1" class="form-label">Aitel Money Account Number</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="airtelMoney_number" placeholder="Aitel Money Account Number"/>
                        </div>

                        <div class="mb-3" id="bank" style="display: none;">
                          <label for="exampleFormControlInput1" class="form-label">Bank Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="company_name" placeholder="Bank Name"/>
                          <label for="exampleFormControlInput1" class="form-label">Account Number</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="account_number" placeholder="Account Number"/>
                        </div>

                        <!-- <div class="mb-3">
                          <div class="col mb-3">
                            <div class="input-group">
                              <label class="input-group-text" for="inputGroupFile01">Upload Insurance Contract(Optional)</label>
                              <input type="file" class="form-control" id="inputGroupFile01" />
                            </div>
                          </div>
                        </div> -->

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