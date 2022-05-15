<?php
session_start();
include("include/config.php");
error_reporting(0);
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM hospitals WHERE hName='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into doctorslog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['dlogin']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$_SESSION['dlogin']=$_POST['username'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into doctorslog(username,userip,status) values('".$_SESSION['dlogin']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="HK - Health Keeper">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#0134d4">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- Title-->
  <title>HOSPITAL LOGIN</title>
  <!-- Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com/">
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    rel="stylesheet">
  <!-- Favicon-->
  <link rel="icon" href="img/core-img/favicon.ico">
  <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
  <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
  <!-- CSS Libraries-->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/animate.css">
  <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap-icons.css">
  <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
  <link rel="stylesheet" href="../../assets/css/ion.rangeSlider.min.css">
  <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/css/apexcharts.css">
  <!-- Core Stylesheet-->
  <link rel="stylesheet" href="../../assets/style.css">
  <!-- Web App Manifest-->
  <link rel="manifest" href="manifest.json">
</head>

<body>
  <!-- Preloader-->
  <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
    <div class="spinner-grow text-primary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div>
  <!-- Internet Connection Status-->
  <div class="internet-connection-status" id="internetStatus"></div>
  <!-- Back Button-->
  <div class="login-back-button"><a href="../../index.html"><svg width="32" height="32" viewBox="0 0 16 16"
        class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
      </svg></a></div>
  <!-- Login Wrapper Area-->
  <div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
          <div class="text-center px-4"><img class="login-intro-img" src="img/bg-img/36.png" alt=""></div>
          <!-- Register Form-->
          <div class="register-form mt-4 px-4">
            <h6 class="mb-3 text-center">Hospital Login.</h6>
            <font color="red" class="mb-2"><center><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></center></font><br>
            <form action="" method="post">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Username" name="username">
              </div>
              <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Enter Password">
              </div>
              <button class="btn btn-primary w-100" name="submit" type="submit">Sign In</button>
            </form>
          </div>
          <!-- Login Meta-->
        
        </div>
      </div>
    </div>
  </div>
  <!-- All JavaScript Files-->
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/default/internet-status.js"></script>
  <script src="../../assets/js/waypoints.min.js"></script>
  <script src="../../assets/js/jquery.easing.min.js"></script>
  <script src="../../assets/js/wow.min.js"></script>
  <script src="../../assets/js/owl.carousel.min.js"></script>
  <script src="../../assets/js/jquery.counterup.min.js"></script>
  <script src="../../assets/js/jquery.countdown.min.js"></script>
  <script src="../../assets/js/imagesloaded.pkgd.min.js"></script>
  <script src="../../assets/js/isotope.pkgd.min.js"></script>
  <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../../assets/js/default/dark-mode-switch.js"></script>
  <script src="../../assets/js/ion.rangeSlider.min.js"></script>
  <script src="../../assets/js/jquery.dataTables.min.js"></script>
  <script src="../../assets/js/default/active.js"></script>
  <script src="../../assets/js/default/clipboard.js"></script>
  <!-- PWA-->
  <script src="../../assets/js/pwa.js"></script>
</body>

</html>