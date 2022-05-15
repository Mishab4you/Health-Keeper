<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$phn=$_POST['phn'];
$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password,phn) values('$fname','$address','$city','$gender','$email','$password','$phn')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
    
	header("location:login.php");
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
  <!-- <meta http-equiv="refresh" content="5; url=http://localhost/hm4/hk/register.php"> -->

  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- Title-->
  <title>REGISTRATION</title>
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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/magnific-popup.css">
  <link rel="stylesheet" href="../assets/css/ion.rangeSlider.min.css">
  <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/apexcharts.css">
  <!-- Core Stylesheet-->
  <link rel="stylesheet" href="../assets/style.css">
  <!-- Web App Manifest-->
  <link rel="manifest" href="manifest.json">
  <script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>
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
  <div class="login-back-button"><a href="../index.html"><svg width="32" height="32" viewBox="0 0 16 16"
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
            <h6 class="mb-3 text-center">Register to continue with Health Keeper.</h6>
            <div class="card">
          <div class="card-body">

            <form name="registration" id="registration"  method="post" onSubmit="return valid();">

              <div class="form-group">
                <input class="form-control" type="text" placeholder="Full Name"name="full_name"  required>
              </div>

              <div class="form-group">
                <input class="form-control" type="text" placeholder="Address" name="address"  required>
              </div>

              <div class="form-group">
                <input class="form-control" type="text" placeholder="Phone"name="phn" required>
              </div>

              <div class="form-group">
                <input class="form-control" type="text" placeholder="City" name="city" required>
              </div>

              <label>Gender</label>

        <div class="card mb-4">
          <div class="card-body">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="male" id="primaryRadio">
                <label class="form-check-label" for="primaryRadio">Male</label>
              </div>
              <div class="mb-2"></div>
              <div class="form-check">
                <input class="form-check-input form-check-success" type="radio" name="gender" value="female"  id="successRadio" checked="">
                <label class="form-check-label" for="successRadio">Female</label>
              </div>
          </div>
        </div>


        <div class="form-group">
                <input class="form-control" type="email" placeholder="Email" name="email" onBlur="userAvailability()"  id="email" required>
                <span id="user-availability-status1" style="font-size:12px;"></span>
              </div>

              <div class="form-group">
                <input class="form-control" type="password" id="password" name="password"  placeholder="Enter Password">
              </div>
              

              <div class="form-group">
                <input class="form-control" type="password" id="password_again" name="password_again" placeholder="Re-enter Password">
              </div>


              <button class="btn btn-primary w-100" name="submit" id="submit" type="submit">Sign In</button>

            </form>
          </div></div>
          </div>
          <br>
          <!-- Login Meta-->
          <div class="login-meta-data text-center">
            <p class="mb-0">Already have an account? <a class="stretched-link" href="login.php">Login Now</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- All JavaScript Files-->
  <script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
<script src="assets/js/login.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/default/internet-status.js"></script>
  <script src="../assets/js/waypoints.min.js"></script>
  <script src="../assets/js/jquery.easing.min.js"></script>
  <script src="../assets/js/wow.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.counterup.min.js"></script>
  <script src="../assets/js/jquery.countdown.min.js"></script>
  <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
  <script src="../assets/js/isotope.pkgd.min.js"></script>
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/default/dark-mode-switch.js"></script>
  <script src="../assets/js/ion.rangeSlider.min.js"></script>
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/default/active.js"></script>
  <script src="../assets/js/default/clipboard.js"></script>
  <!-- PWA-->
  <script src="../assets/js/pwa.js"></script>
</body>

</html>