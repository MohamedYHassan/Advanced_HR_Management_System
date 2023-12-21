<?php
session_start();
if (!isset($_SESSION["Role_Id"])) {

  header("location:../Auth/login.php ");
} else {
  if ($_SESSION["Role_Id"] != "Employee") {
    header("location:../Auth/login.php ");
  }
}

require_once '../../Controllers/EmailController.php';
require_once '../../Models/email.php';
$EmailController = new EmailController;
$errMsg = "";
$emails = $EmailController->getEmail();










?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.php">
            <img src="../images/image0.png" style="max-width: 200%;margin-left: -40px; height:auto;" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="../images/image0.png"  style="max-width: 200%;margin-left: -40px; height:auto;"alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold"><?php echo $_SESSION["name"]; ?> </span></h1>
            
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>
          
          <li class="nav-item dropdown"> 
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="icon-mail icon-lg"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">Mail Inbox </p>
              </a>
              <div class="dropdown-divider"></div>

              <?php
              if (count($emails) == 0) {
              ?>
                <div class="alert alert-danger" role="alert">No Incoming Emails</div>
              <?php
              }

              ?>

              <?php 
              foreach($emails as $email) {
                ?>

              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark"> <?php echo $email['Sender_Email'] ?> </p>
                  <p class="fw-light small-text mb-0"> <?php echo $email['Subject'] ?></p>
                </div>
              </a>
              <?php 
              }
              ?>
              <div class="list align-items-center pt-3">
                                  <div class="wrapper w-100">
                                    <p class="mb-0" style="margin-inline: 44px; margin-block: -5px;">
                                      <a href="email.php" class="fw-bold text-primary">View all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                  </div>
                                </div>
              
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="padding-block-start: 16px; ">
            <i class="mdi mdi-account-circle" style="font-size: 1.5rem;"></i> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
              <i class="mdi mdi-account-circle" style="font-size:2rem;"></i>
                <p class="mb-1 mt-3 font-weight-semibold"><?php  echo $_SESSION["name"]; ?> </p>
                <p class="fw-light text-muted mb-0"><?php  echo $_SESSION["email"]; ?> </p>
              </div>
              <a role="submit" class="dropdown-item" href="profile.php"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              
              
              <a class="dropdown-item" href="../Auth/login.php?logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2" ></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options"  id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
     
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Leaves</li>
          <li class="nav-item">
            <a class="nav-link" href="leave.php">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Request Leaves</span>
              
            </a>
            
            
          </li>
          <li class="nav-item nav-category">Holidays</li>
          <li class="nav-item" href="employee.php">
            <a class="nav-link"  href="holiday.php">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title" >View Holidays</span>
              
            </a>
            
            
          </li>

          <li class="nav-item nav-category">Salary</li>
          <li class="nav-item">
            <a class="nav-link" href="salary.php">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">View Salary</span>
              
            </a>
            
          </li>

          <li class="nav-item nav-category">Resign</li>
          <li class="nav-item">
            <a class="nav-link" href="resign.php">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Submit Resignation</span>
              
            </a>
            
          </li>
         
          <li class="nav-item nav-category">Messages </li>
          <li class="nav-item">
            
              
            
            <a  class="nav-link" href="email.php">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              
              <span class="menu-title">Email Inbox</span>
              
            </a>
            
          </li>
          
        </ul>
      </nav>

          <!-- partial -->
      <div class="main-panel">
      
      <?php
              if (count($emails) == 0) {
              ?>
                <div class="alert alert-danger" role="alert">No Emails Available</div>
              <?php
              }

              ?>
          

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Email Inbox</h4>
                  <a href="add_email.php" class=" col-md-3 btn btn-primary float-end">
                  <span class="tf-icons bx bx-add-to-queue"></span> Send Email
                </a>
                  <p class="card-description">
                  Your Inbox
                  </p>
                  <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Email ID</th>
                        <th>Sender Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">


                      <?php

                      foreach ($emails as $email) {
                      ?>
                        <tr>
                          <td style="padding-left: 0px;"><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $email["Email_Id"] ?></strong></td>
                          <td><?php echo $email["Sender_Email"] ?></td>
                          <td>
                            <?php echo $email["Subject"] ?>
                          </td>
                          <td>
                            <?php echo $email["Message"] ?>
                          </td>
                          <td id="action" style="padding-right: 0px; padding-left: 0px;">
                            <ul style="display: flex; list-style-type:none; padding-left: 0px; ">
                              

                              <li>
                            <form action="delete_email.php" method="POST">
                            <input type="hidden" name="Email_Id" value="<?php echo $email["Email_Id"] ?>">
                            <button type="submit" name="delete" class="btn btn-primary" >
                            <i class="mdi mdi-delete"></i>
                            </button>
                            </form>
                              </li>

                              
                            </ul>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
             

            </div>
      
      </div>
    
    
    
    
    

      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

