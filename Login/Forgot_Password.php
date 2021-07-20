<?php
include '../connection.php';
session_start();





if(isset($_POST['change']))
{
	
	
	if($_POST['pass'] == $_POST['cpass'])
	{
		$uq="update registration set password= '".$_POST['pass']."' where id=".$_SESSION['fuserid']."";
		$uresult=mysqli_query($data,$uq);
		if($uresult==true)
		{
			unset($_SESSION['fuserid']);
			session_destroy();
			echo "<script>alert('Password Updated Successfully');
									window.location = 'index.php';
								</script>";
			
		}
		else
		{
			echo "<script>alert('Failed ')</script>";
		}	
	}
	else
	{
		echo "<script>alert('Password and Confirm Password not Matched ')</script>"; 
	}
}

	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<script>


    function registerPage() {
        window.location="index.php";
    }

</script>
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/login-bg.jpg);background-repeat:no-repeat; background-size:100% 100%">
			<div class="wrap-login100" >
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Forgot Password
					</span>
				</div>

			<form class="login100-form validate-form" action="#" method="Post">
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span  class="label-input100">New Password</span>
						
							<input  class='input100' type='text'  name='pass' placeholder='Enter New Password'>
						
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span  class="label-input100">Confirm Password</span>
						<input  class="input100" type="password" name="cpass" placeholder="Confirm Password">
						<span class="focus-input100"></span>
					</div>

					
					<div class="container-login100-form-btn" style="margin-top:15px">
						<button name="change" name="change" class="login100-form-btn" style="margin-bottom:8%;margin-left:10%">
							Change
						</button>						
					</div>
					<div class="container-login100-form-btn">
						<button onclick="registerPage()" class="login100-form-btn bg-danger" style="margin-bottom:8%;margin-left:10%">
							Cancle
						</button>						
					</div>
					
					
					
					
					
					
				</form>

			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


