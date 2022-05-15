<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$phn=$_POST['phn'];


$sql=mysqli_query($con,"Update users set fullName='$fname',address='$address',city='$city',phn='$phn',gender='$gender' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="Your Profile updated Successfully";


}

}
?>
		<?php include('include/header.php');?>
		<div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
          <div class="card-body">
		  <?php 
$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($data=mysqli_fetch_array($sql))
{
?>
<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
<h4><?php echo htmlentities($data['fullName']);?>'s Profile</h4>

<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
<?php if($data['updationDate']){?>
<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
<?php } ?>
<hr />													<form role="form" name="edit" method="post">
													

<div class="form-group">
															<label for="fname">
																 User Name
															</label>
	<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']);?>" >
														</div>


<div class="form-group">
															<label for="address">
																 Address
															</label>
					<textarea name="address" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>
<div class="form-group">
															<label for="city">
																 City
															</label>
		<input type="text" name="city" class="form-control" required="required"  value="<?php echo htmlentities($data['city']);?>" >
														</div>

														<div class="form-group">
															<label for="city">
																 Phone
															</label>
		<input type="text" name="phn" class="form-control" required="required"  value="<?php echo htmlentities($data['phn']);?>" >
														</div>
	
<div class="form-group">
									<label for="gender">
																Gender
															</label>

<select name="gender" class="form-control" required="required" >
<option value="<?php echo htmlentities($data['gender']);?>"><?php echo htmlentities($data['gender']);?></option>
<option value="male">Male</option>	
<option value="female">Female</option>	
<option value="other">Other</option>	
</select>

														</div>

<div class="form-group">
									<label for="fess">
																 User Email
															</label>
					<input type="email" name="uemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">
					<a href="change-emaild.php">Update your email id</a>
														</div>



														
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
													<?php } ?>
          </div>
        </div>
      </div>
    </div>
						
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
		
			
	