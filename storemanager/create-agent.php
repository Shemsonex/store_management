<?php include('layout/header.php'); ?>
          <!-- Content wrapper -->
            <div class="content-wrapper">
              <!-- Content -->

              <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4 text-center"><span class="text-muted fw-light"></span> Create New Agent</h4>

                <form action="php/addAgent.php" method="POST">
                  <div class="col-md-6 mx-auto">
                    <div class="card mb-4">
                      <div id="error-container" style="display: none;"></div>
                      <div id="success-container" style="display: none;"></div>
                      <h5 class="card-header">Add New Agent</h5>
                      <div class="card-body">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Individual Identification Number</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="code" placeholder="Code"/>
                        </div>
                        
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Name</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="names" placeholder="Fullname"/>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">ID Number</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="id_number" placeholder="ID Number"/>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="phone_number" placeholder="07..."/>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Email</label>
                          <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="email@example.com"/>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">District</label>
                          <select class="form-select" id="districts" aria-label="Default select example" onfocus="getDistricts()" onchange="getSectors(this.value)">
                            <option selected> </option>                        
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Sector</label>
                          <select class="form-select" id="sectors" aria-label="Default select example" onchange="getCells(this.value)">
                            <option selected> </option>                        
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Cell</label>
                          <select class="form-select" id="cells" aria-label="Default select example" onchange="getVillages(this.value)">
                            <option selected> </option>                        
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Village</label>
                          <select class="form-select" id="villages" name="Village_id1" onchange="getAddress(this.value)">
                            <option selected> </option>                        
                          </select>
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