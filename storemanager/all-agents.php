<?php include('layout/header.php'); ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> List of All Agents <div id="error-container" style="display: none;"></div><div id="success-container" style="display: none;"></div></h4> -->

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Plumbing Products</h5>
                
                <div class="position-absolute top-0 end-0">

                  <div class="mt-3">
                    <!-- Button trigger modal -->
                    <!-- <a type="button" href="create-agent.php" class="btn btn-primary">+ Add Agent</a> -->
                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">+ Add Agent</button> -->

                    <!-- Modal -->

                    <!-- Offcanvas -->

                    <div class="mt-3">
                    <?php //if($_SESSION['role']==1){ ?>
                        <button style="margin-right: 20px;"
                          class="btn btn-primary"
                          type="button"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEnd"
                          aria-controls="offcanvasEnd"
                        >
                          + Add New Item
                        </button>
                    <?php //} ?>
                        <?php include('php/modals/edit-agent.php'); ?>
                        <?php include('php/modals/delete-agent.php'); ?>
                        <div
                          class="offcanvas offcanvas-end"
                          tabindex="-1"
                          id="offcanvasEnd"
                          aria-labelledby="offcanvasEndLabel"
                        >
                        <?php if($_SESSION['role']==1){ ?>
                          <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">Add New Item</h5>
                            <button
                              type="button"
                              class="btn-close text-reset"
                              data-bs-dismiss="offcanvas"
                              aria-label="Close"
                            ></button>
                          </div>
                          <?php } ?>
                          <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            
                        <form action="php/addAgent.php" method="POST">
                            
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
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="phone_number" placeholder="+250..."/>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Email</label>
                          <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="email@example.com"/>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">District</label>
                          <select class="form-select" id="districts" aria-label="Default select example" onfocus="getDistricts()" onchange="getSectors(this.value)">
                            <option selected>-----------</option>                        
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Sector</label>
                          <select class="form-select" id="sectors" aria-label="Default select example" onchange="getCells(this.value)">
                            <option selected>-----------</option>                        
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Cell</label>
                          <select class="form-select" id="cells" aria-label="Default select example" onchange="getVillages(this.value)">
                            <option selected>-----------</option>                        
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Village</label>
                          <select class="form-select" id="villages" name="Village_id1" onchange="getAddress(this.value)">
                            <option selected>-----------</option>                        
                          </select>
                        </div>

                        <div id="holder"></div>

                        <!-- <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button> -->
                        <button type="submit" class="btn btn-primary">Add Item</button>
                      </div>
                    </div>
                  </div>
                </form>
                    <!-- OffCanvas -->

                    
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
                    <tbody class="table-border-bottom-0">
                        <?php //include('php/getAllAgents.php'); ?>
                      <tr>
                        <td><a href="./insurance-details.php?aid='.$id.'"><span class="badge bg-label-success">Pipe</span></td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">PVC</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">20</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">1500</td></a>                       
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button onclick="edit(' . $id . ',' . $category_id . ', \'' . $microchip_number . '\', \'' . $insurance_delivery_date . '\', ' . $price . ', ' . $mode_of_payment . ', \'' . $contract_number . '\')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                              <button onclick="del_insurance(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                              <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="./insurance-details.php?aid='.$id.'"><span class="badge bg-label-success">Wrench</span></td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">Medium</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">120</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">500</td></a>                       
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button onclick="edit(' . $id . ',' . $category_id . ', \'' . $microchip_number . '\', \'' . $insurance_delivery_date . '\', ' . $price . ', ' . $mode_of_payment . ', \'' . $contract_number . '\')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                              <button onclick="del_insurance(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                              <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>                        
                        <td><a href="./insurance-details.php?aid='.$id.'"><span class="badge bg-label-success">Tap</span></td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">With Sensor</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">300</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">8000</td></a>                       
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button onclick="edit(' . $id . ',' . $category_id . ', \'' . $microchip_number . '\', \'' . $insurance_delivery_date . '\', ' . $price . ', ' . $mode_of_payment . ', \'' . $contract_number . '\')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                              <button onclick="del_insurance(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                              <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>                        
                        <td><a href="./insurance-details.php?aid='.$id.'"><span class="badge bg-label-success">Shower</span></td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">Large</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">8</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">30000</td></a>                       
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button onclick="edit(' . $id . ',' . $category_id . ', \'' . $microchip_number . '\', \'' . $insurance_delivery_date . '\', ' . $price . ', ' . $mode_of_payment . ', \'' . $contract_number . '\')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                              <button onclick="del_insurance(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                              <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>                        
                        <td><a href="./insurance-details.php?aid='.$id.'"><span class="badge bg-label-success">Sink</span></td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">Kitchen</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">100</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">4000</td></a>                       
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button onclick="edit(' . $id . ',' . $category_id . ', \'' . $microchip_number . '\', \'' . $insurance_delivery_date . '\', ' . $price . ', ' . $mode_of_payment . ', \'' . $contract_number . '\')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                              <button onclick="del_insurance(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                              <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>                        
                        <td><a href="./insurance-details.php?aid='.$id.'"><span class="badge bg-label-success">Bath-tub</span></td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">European</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">115</td></a>
                        <td><a href="./insurance-details.php?aid='.$id.'">60000</td></a>                       
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <button onclick="edit(' . $id . ',' . $category_id . ', \'' . $microchip_number . '\', \'' . $insurance_delivery_date . '\', ' . $price . ', ' . $mode_of_payment . ', \'' . $contract_number . '\')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                              <button onclick="del_insurance(' . $id . ')" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                              <!-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a> -->
                            </div>
                          </div>
                        </td>
                      </tr>                        
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <!-- <hr class="my-5" /> -->

              
            <!-- / Content -->
<?php include('layout/footer.html'); ?>