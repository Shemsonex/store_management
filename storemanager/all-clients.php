<?php include('./layout/header.php'); ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List of All Clients <div id="error-container" style="display: none;"></div><div id="success-container" style="display: none;"></div></h4> -->

              <!-- Basic Bootstrap Table -->
              <div class="card" style="height: 560px; overflow-y: hidden !important;">
                <h5 class="card-header">Registered Clients</h5>
                
                <div class="position-absolute top-0 end-0">

                  <div class="mt-3">
                    <!-- Button trigger modal -->
                    <!-- <a type="button" href="create-client.php" class="btn btn-primary">+ Add Client</a> -->
                    <!-- <a type="button" href="php/addClient.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">+ Add Client</a> -->
                    
                    <!-- Offcanvas -->

                    <div class="mt-3">
                        <button style="margin-right: 20px;"
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEnd"
                          aria-controls="offcanvasEnd"
                        >
                          + Add New Client
                        </button>
                        <?php include('php/modals/edit-client.php'); ?>
                        <?php include('php/modals/delete-client.php'); ?>
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasEnd"
                          aria-labelledby="offcanvasEndLabel"
                        >
                          <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">Add New Client</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            
            <form action="php/addClient.php" method="POST">
                            
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Names</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="names" placeholder="Name"/>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID Number</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="id_number" placeholder="ID Number"/>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="phone_number" placeholder="+250..."/>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com"/>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">District</label>
                <select class="form-select" id="districts" aria-label="Default select example" onfocus="getDistricts()" onchange="getSectors(this.value)">
                  <option selected>-----------</option>                        
                </select>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Sector</label>
                <select class="form-select" id="sectors" aria-label="Default select example" onchange="getCells(this.value)">
                  <option selected>-----------</option>                        
                </select>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Cell</label>
                <select class="form-select" id="cells" aria-label="Default select example" onchange="getVillages(this.value)">
                  <option selected>-----------</option>                        
                </select>
              </div>

              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Village</label>
                <select class="form-select" id="villages" name="Village_id1" onchange="getAddress(this.value)">
                  <option selected>-----------</option>                        
                </select>
              </div>

              <div class="mb-3">
                <div class="col mb-3">
                  <div class="input-group">
                    <label class="input-group-text" for="inputGroupFile01">Upload Client Photo(Optional)</label>
                    <input type="file" class="form-control" id="inputGroupFile01" />
                  </div>
                </div>
              </div>

              <div id="holder"></div>
              
              <!-- <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button> -->
              <button type="submit" class="btn btn-primary">Add Client</button>                      
            </div>
          </div>
        </div>
      </form>
                          <!-- </div>
                        </div>
                      </div> -->
                    <!-- OffCanvas -->
                    
                  </div>
                </div>
               

                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>N<sup>o</sup></th>
                        <th>Names</th>
                        <th>ID Number</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>District</th>
                        <th>Sector</th>
                        <th>Cell</th>
                        <th>Village</th>
                        <th>Added By</th>
                        <th>Date Created</th>
                        <!-- <th>Actions</th> -->
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php include('php/getAllClients.php'); ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <!-- <hr class="my-5" /> -->

              
            <!-- / Content -->

<?php include('./layout/footer.html'); ?>