<?php include('layout/header.php'); ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List of All Insurance </h4> -->
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">All Insurance /</span> Ngoga Thierry</h4>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Registered Livestocks</h5>

                <div class="position-absolute top-0 end-0">

                  <div class="mt-3">
                    <!-- Button trigger modal -->
                    <a type="button" href="create-insurance.php" class="btn btn-primary">+ Add Insurance</a>
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">+ Add Insurance</button> -->

                    <!-- Modal -->
                    <!-- <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Add New Insurance</h5>
                            <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">

                            <div class="row">
                                <div class="mb-3">
                                  <label for="defaultSelect" class="form-label">Category of Livestock</label>
                                  <select id="defaultSelect" class="form-select">
                                    <option>--------</option>
                                    <option value="1">Cow</option>
                                    <option value="2">Pig</option>
                                    <option value="3">Chicken</option>
                                  </select>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Microchip Number / Nimero y'iherena</label>
                                <input type="text" id="nameBasic" class="form-control" placeholder="Microchip Number / Nimero y'iherena" />
                              </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="dobBasic" class="form-label">Date of Insurance Delivery</label>
                                    <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY" />
                                </div>
                              </div>

                            <div class="row">
                              <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Price</label>
                                <input type="text" id="nameBasic" class="form-control" placeholder="Price / Agaciro kayo" />
                              </div>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                  <label for="defaultSelect" class="form-label">Mode of Insurance Payment</label>
                                  <select id="defaultSelect" class="form-select">
                                    <option>--------</option>
                                    <option value="1">Cash</option>
                                    <option value="2">MOMO</option>
                                    <option value="3">Aitel Money</option>
                                    <option value="4">Bank Transfer</option>
                                  </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                  <label for="nameBasic" class="form-label">Momo Account Name</label>
                                  <input type="text" id="nameBasic" class="form-control" placeholder="Momo Account Name" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                  <label for="nameBasic" class="form-label">Aitel Money Account Name</label>
                                  <input type="text" id="nameBasic" class="form-control" placeholder="Aitel Money Account Name" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                  <label for="nameBasic" class="form-label">Bank Name & Account Number</label>
                                  <input type="text" id="nameBasic" class="form-control" placeholder="Bank Name & Account Number" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                  <label for="nameBasic" class="form-label">Contract Number</label>
                                  <input type="text" id="nameBasic" class="form-control" placeholder="Contract Number" />
                                </div>
                            </div>

                             <div class="row">
                              <div class="col mb-3">
                                <div class="input-group">
                                  <label class="input-group-text" for="inputGroupFile01">Upload User Photo(Optional)</label>
                                  <input type="file" class="form-control" id="inputGroupFile01" />
                                </div>
                              </div>
                            </div> 

                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                              Cancel
                            </button>
                            <button type="button" class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
                
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Category of Livestock</th>
                        <th>Microchip Number</th>
                        <th>Date of Insurance Delivery</th>
                        <th>Price</th>
                        <th>Insurance Amount</th>
                        <th>Total Commission (13.5%)</th>
                        <th>Commission(Agent)</th>
                        <th>Commission(Solektra)</th>
                        <th>Payment Mode</th>
                        <th>Contract Number</th>
                        <th>Added By</th>
                        <th>Date & Time</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php include('php/getAllInsurances.php'); ?>
                      <!-- <tr>
                        <td><span class="badge bg-label-primary">Cow</span></td>
                        <td>00122RF </td>
                        <td>23/07/2023</td>
                        <td>1200000</td>    price
                        <td>66000</td>      insurance amount (5.5% of 1.2M)
                        <td>8910</td>       Solektra comm (13.5% of 66K)
                        <td>4290</td>
                        <td>4620</td>
                        <td>Momo</td>
                        <td>0021/SONARWA/2023</td>
                        <td>Added By</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>

                      </tr> -->
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <hr class="my-5" />

              
            <!-- / Content -->
<?php include('layout/footer.html'); ?>