<?php 
require_once '../../Models/user.php';
require_once '../../Controllers/AuthController.php';
$errMsg="";

if(isset($_GET["logout"]))
{
  session_start();
  session_destroy();
}


if(isset($_POST['username']) && isset($_POST['password']))
{
    if(!empty($_POST['username']) && !empty($_POST['password']) )
    {   
      if (isset($_POST['submit'])) {
        if (!ctype_alnum($_POST['username'])) {
            $errMsg .= 'Input data should be alpha numeric characters only.';
        }
    
     else { 
        $user=new User;
        $auth=new AuthController;
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        if(!$auth->login($user))
        {
            if(!isset($_SESSION["Id"]))
            {
                session_start();
            }
            $errMsg=$_SESSION["errMsg"];
        }
        else
        {
            if(!isset($_SESSION["Id"]))
            {
                session_start();
            }
            if($_SESSION["Role_Id"]=="Admin")
            {
                header("location: ../Admin/index.php");
            }
            else
            {
                header("location: ../Employee/index.php");
            }

          }
        }
        } 

        
    }
    else
    {
        $errMsg="Please fill all fields";
    }
}

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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../images/image0.png" alt="logo" style="width:200px;">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <?php
              if ($errMsg != "") {
              
                echo '<div class="alert alert-danger" role="alert">'.$errMsg.'</div>'
                ?> 
                <?php
              } 

              

              ?>
              <form class="pt-3" action="login.php" method="POST">
                <div class="form-group">
                  <input type="username" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                 
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="margin-inline-start: 87px;" type="submit" name="submit">SIGN IN</button>
                </div>
                
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
