<?php include('./layout/header.php'); ?>
<?php include('php/modals/edit-construction.php'); ?>
<?php include('php/modals/delete-construction.php'); ?>
<?php $aid=$_GET['aid']; ?>
<script>
      const token = localStorage.getItem('myToken1').replace(/^"(.*)"$/, '$1');
      // console.log(token);
        fetch('https://hardware.cyclic.app/api/product/getAll', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
          'Accept': '*',
          'token': token
        },
      })
        .then(response => response.json())
        .then(data => {
                console.log(data);
                data.filter(dats => {
                  // console.log(dats);
                  if(dats.id==<?= $aid ?>){
                    // console.log('first')
                    document.getElementById('prodet_name').innerHTML = dats.product_name.charAt(0).toUpperCase() + dats.product_name.slice(1);
                    document.getElementById('prodet_name2').innerHTML = dats.product_name.charAt(0).toUpperCase() + dats.product_name.slice(1);
                    document.getElementById('prodet_desc').innerHTML = dats.description.charAt(0).toUpperCase() + dats.description.slice(1);
                    document.getElementById('prodet_price').innerHTML = dats.price;
                    document.getElementById('prodet_category').innerHTML = dats.category;
                    document.getElementById('prodet_date').innerHTML = dats.createdAt;
                    document.getElementById('prodet_update').innerHTML = dats.updatedAt;
                    // document.getElementById('prodet_role').innerHTML = dats.role.charAt(0).toUpperCase() + dats.role.slice(1);
                    // document.getElementById('prodet_code').innerHTML = dats.id;
                  }
                });
            }
          )
        .catch(error => console.error('Error:', error));
    </script>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Insurance Details /</span> Livestock</h4> -->
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-2">
                    <!-- <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class=""></i> Account</a>
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="client-insurance.php"
                        ><i class="bx bx-bell me-1"></i> Insurance</a
                      >
                    </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                      >
                    </li> -->
                  </ul>
                  <div class="card mb-3">
                    <h5 class="card-header">Product Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="../assets/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <p class="text mb-0"><b id="prodet_name"></b></p><br>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">

                          <div class="mb-0 col-md-6">
                            <label for="lastName" class="form-label">Product Name</label>
                            <p><b id="prodet_name2"></b></p>
                          </div>

                          <div class="mb-0 col-md-6">
                            <label for="firstName" class="form-label">Product Category</label>
                            <p><b id="prodet_category"></b></p>
                          </div>
                          <div class="mb-0 col-md-6">
                            <label for="lastName" class="form-label">Product Description</label>
                            <p><b id="prodet_desc"></b></p>
                          </div>
                          
                          <div class="mb-0 col-md-6">
                            <label for="lastName" class="form-label">Updated At</label>
                            <p><b id="prodet_update"></b></p>
                          </div>
                          
                          <div class="mb-0 col-md-6">
                            <label for="email" class="form-label">PRICE</label>
                            <p><b id="prodet_price"></b></p>
                          </div>

                          <!-- <div class="mb-0 col-md-6">
                            <label class="form-label" for="country">INSURANCE AMOUNT</label>
                            <p><b>66000.00	</b></p>
                          </div> -->

                          <!-- <div class="mb-0 col-md-6">
                            <label for="language" class="form-label">TOTAL COMMISSION (13.5%)</label>
                            <p><b>8910</b></p>
                          </div>
                          
                          <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">COMMISSION(AGENT)</label>
                            <p><b>4620</b></p>
                          </div>

                          <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">COMMISSION(SOLEKTRA)</label>
                            <p><b>4290</b></p>
                          </div>

                          <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">PAYMENT MODE	</label>
                            <p><b>MoMo</b></p>
                          </div>

                          <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">CONTRACT NUMBER</label>
                            <p><b>12</b></p>
                          </div> -->

                          
                          <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">Created At</label>
                            <p><b id="prodet_date"></b></p>
                          </div>
                          
                          <hr class="my-0" />
                          <!-- <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">Added By</label>
                            <p>Rukundo</p>
                          </div>

                          <div class="mb-0 col-md-6">
                            <label for="currency" class="form-label">Location</label>
                            <p><b>Muhanga/ Nyamabuye/ Gahogo/ Nyarucyamu</b></p>
                          </div> -->

                        </div>
                        <div class="mt-2">
                        <button onclick="edit()" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bx bx-edit-alt me-1"></i> Edit Product</button>
                        <!-- <a type="button" href="edit-construction.php" class="btn btn-primary me-2">Edit Insurance</a> -->
                        <!-- <a type="button" href="construction-details.php?aid=<?= $aid ?>" class="btn btn-outline-secondary">Cancel</a> -->
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Insurance</h5>
                    <div class="card-body">
                      <div class="mb-0 col-12 mb-0">
                        <!-- <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete this insurance?</h6>
                          <p class="mb-0">Once you delete this insurance, there is no going back. Please be certain.</p>
                        </div> -->
                      </div>
                      <!-- <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-0">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm this insurance deletion</label
                          >
                        </div>-->
                        <!-- <button type="submit" class="btn btn-danger deactivate-account">Delete Insurance</button> -->
                        <button onclick="del_user()" class="btn btn-danger deactivate-account" data-bs-toggle="modal" data-bs-target="#basicModal2"><i class="bx bx-trash me-1"></i> Delete</button>
                      <!--</form> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <?php include('layout/footer.html'); ?>