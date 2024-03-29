<?php include('./layout/header.php'); ?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit Account /</span> Client</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <!-- <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
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
                  <div class="card mb-4">
                    <h5 class="card-header">Insurance Details</h5>
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
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">CLIENT NAME</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              value="Thierry Ngoga"
                              autofocus
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">CATEGORY OF LIVESTOCK</label>
                            <select id="country" class="select2 form-select">
                              <option value="">-------</option>
                              <option value="Australia">Cow</option>
                              <option value="Bangladesh">Pig</option>
                              <option value="Belarus">Chicken</option>
                            </select>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">MICROCHIP NUMBER</label>
                            <input class="form-control" type="text" name="lastName" id="idNumber" value="AB10" />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">DATE OF INSURANCE DELIVERY</label>
                            <input class="form-control" type="text" name="" id="Number" value="12/06/2023" />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">PRICE</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="1200000.00"
                              placeholder="1200000.00"
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">CONTRACT NUMBER</label>
                            <input class="form-control" type="text" name="" id="Number" value="12" />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">District</label>
                            <select id="country" class="select2 form-select">
                              <option value="">-------</option>
                              <option value="Australia">Gasabo</option>
                              <option value="Bangladesh">Nyarugenge</option>
                              <option value="Belarus">Kicukiro</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Sector</label>
                            <select id="language" class="select2 form-select">
                              <option value="">-------</option>
                              <option value="en">English</option>
                              <option value="fr">French</option>
                            </select>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Cell</label>
                            <select id="currency" class="select2 form-select">
                              <option value="">---------</option>
                              <option value="usd">Kamugina</option>
                              <option value="euro">Kamutwa</option>
                            </select>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label">Village</label>
                            <select id="currency" class="select2 form-select">
                              <option value="">---------</option>
                              <option value="usd">Amajyambere</option>
                              <option value="euro">Amahoro</option>
                            </select>
                          </div>

                        </div>
                        <div class="mt-2">
                        <a type="button" href="#" class="btn btn-primary me-2">Save change</a>
                        <a type="button" href="insurance-details.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <?php include('layout/footer.html'); ?>