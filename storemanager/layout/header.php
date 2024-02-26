<?php
// session_start();
// if(!$_SESSION['name']){
//     header("Location: login.php");
//     exit;
// } 
?>
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Store Management System</title>

    <meta name="description" content="" />

    <!-- Favicon -->    
    <link rel="icon" type="image/x-icon" href="./../assets/img/logo/icon .png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./../assets/vendor/fonts/boxicons.css" />  

    <!-- Core CSS -->
    <link rel="stylesheet" href="./../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="./../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="./../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./../assets/js/config.js"></script>    
    <script type="text/javascript" src="highslide/highslide-with-html.js"></script>
      <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
      <script type="text/javascript">
      hs.graphicsDir = 'highslide/graphics/';
      hs.outlineType = 'rounded-white';
      hs.wrapperClassName = 'draggable-header';
    </script>
    <style>
      /* CSS styles for error-container */
      #error-container {
        background-color: #ffcccc;
        color: #ff0000;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        animation-name: pop-up;
        animation-duration: 0.5s;
        animation-timing-function: ease-out;
        animation-delay: 0s;
        animation-fill-mode: forwards;
      }
  
      /* CSS animation keyframes */
      @keyframes pop-up {
        0% { transform: scale(0); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
      }

      #success-container {
      background-color: #ccffcc;
      color: #006600;
      padding: 10px;
      border-radius: 5px;
      font-weight: bold;
      text-align: center;
      animation-name: fade-in;
      animation-duration: 0.5s;
      animation-timing-function: ease-out;
      animation-delay: 0s;
      animation-fill-mode: forwards;
    }

    /* CSS animation keyframes */
    @keyframes fade-in {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }
    </style>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
      const storedData = localStorage.getItem('myUser1');
      const dashb = document.getElementById('dashb').innerHTML;
      const userb = document.getElementById('userb').innerHTML;
      if (storedData) {
        const data = JSON.parse(storedData);
        // console.log(data);
        const manager = data.role;
        if (manager=='manager'){
          // console.log(dashb);
          // console.log(userb);
          document.getElementById('dashb').innerHTML = ` <li class="menu-item active">
          <a href="./home.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
          </a>
          </li>`;

          document.getElementById('userb').innerHTML = ` <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div data-i18n="Layouts">Users</div>
                      </a>

                      <ul class="menu-sub">
                        <li class="menu-item">
                          <a href="./all-users.php" class="menu-link">
                            <div data-i18n="Without menu">All Users</div>
                          </a>
                        </li>
                        <!-- <li class="menu-item">
                          <a href="./create-user.php" class="menu-link">
                            <div data-i18n="Without navbar">Create New User</div>
                          </a>
                        </li> -->
                      </ul>
                    </li>`;

          document.getElementById('clientb').innerHTML = ` <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                          
                          <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                          <div data-i18n="Layouts">Clients</div>
                        </a>

                        <ul class="menu-sub">
                          <li class="menu-item">
                            <a href="./all-clients.php" class="menu-link">
                              <div data-i18n="Without menu">All Clients</div>
                            </a>
                          </li>
                          <!-- <li class="menu-item">
                            <a href="./create-client.php" class="menu-link">
                              <div data-i18n="Without navbar">Add New Client</div>
                            </a>
                          </li> -->
                        </ul>
                      </li>`;

          document.getElementById('pro_name').innerHTML = data.firstName +` `+ data.lastName;
          document.getElementById('pro_role').innerHTML = data.role.charAt(0).toUpperCase() + data.role.slice(1);
          document.getElementById('pro_btn').href=`./user-details.php?aid=`+data.id;
        }
      } else {
        console.log('No stored data found.');
      }
     });
    </script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="./home.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <!-- <img src="./../assets/img/logo/SOLEKTRA LOGO OFFICIAL C.png" alt="" class="w-px-100 h-auto "> -->
                Logo Here
              </span>
            
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <div id="dashb" style="width: 100%;"></div> 
            <div id="clientb" style="width: 100%;"></div>    
            <div id="userb" style="width: 100%;"></div>       
            
            <!-- Livestock Commission  -->

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Point of Sale</span>
            </li>
              
            <li class="menu-item">
              <a href="./pos.php" class="menu-link">
                <!-- <i class="menu-icon tf-icons bx bxs-circle"></i> -->
                <i class='menu-icon tf-icons bx bx-money'></i>
                <div data-i18n="Accordion">P.O.S</div>
              </a>
            </li>
            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Categories</span>
            </li>
              
            <li class="menu-item">
              <a href="./all-constructions.php" class="menu-link">
                <!-- <i class="menu-icon tf-icons bx bxs-circle"></i> -->
                <i class='menu-icon tf-icons bx bx-building-house'></i>
                <div data-i18n="Accordion">Construction</div>
              </a>
            </li>
            
            <li class="menu-item">
              <a href="./all-agents.php" class="menu-link">
                <!-- <i class="menu-icon tf-icons bx bxs-user-detail"></i> -->
                <i class='menu-icon tf-icons bx bx-water'></i>
                <div data-i18n="Accordion">Plumbing</div>
              </a>
            </li>
            
            <li class="menu-item">
              <a href="./all-constructions.php" class="menu-link">
                <!-- <i class="menu-icon tf-icons bx bxs-circle"></i> -->
                <i class='menu-icon tf-icons bx bxs-plug'></i>
                <div data-i18n="Accordion">Electricity</div>
              </a>
            </li>
            
            <li class="menu-item">
              <a href="./all-welding.php" class="menu-link">
                <!-- <i class="menu-icon tf-icons bx bxs-circle"></i> -->
                <i class='menu-icon tf-icons bx bxs-edit-alt'></i>                
                <div data-i18n="Accordion">Welding</div>
              </a>
            </li>

            <!-- <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">            
                <i class="menu-icon tf-icons bx bxs-circle"></i>
                <div data-i18n="User interface">Categories</div>
              </a>
              <ul class="menu-sub">

                <li class="menu-item">
                  <a href="./all-constructions.php" class="menu-link">
                    <div data-i18n="Accordion">All Insurance</div>
                  </a>
                </li>

                <!-- <li class="menu-item">
                  <a href="./create-insurance.php" class="menu-link">
                    <div data-i18n="Accordion">Add Insurance</div>
                  </a>
                </li> --
              </ul>
            </li> -->
            
            <!-- <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="User interface">Agents</div>
              </a>
              <ul class="menu-sub">

                <li class="menu-item">
                  <a href="./all-agents.php" class="menu-link">
                    <div data-i18n="Accordion">All Agents</div>
                  </a>
                </li>

                <!-- <li class="menu-item">
                  <a href="./create-agent.php" class="menu-link">
                    <div data-i18n="Accordion">Add New Agent</div>
                  </a>
                </li> --
              </ul>
            </li> -->

            <!-- Products -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Reports</span></li>
            <!-- Products -->
            
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Extended UI">Products Report</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="report.php" class="menu-link" target="_blank">
                    <div data-i18n="Perfect Scrollbar">Construction</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Plumbing</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Electricity</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Welding</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Support -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a
                href="acalculator.html"
                target=""
                class="menu-link"
                onclick="return hs.htmlExpand(this,{objectType:'iframe',width:550,height:450})"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Calculator</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="./../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="./account-setting.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="./../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block" id="pro_name"></span>
                            <small class="text-muted" id="pro_role"></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>

                    <li>
                      <a class="dropdown-item" id="pro_btn">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="./logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          
            <!-- / Content -->

        