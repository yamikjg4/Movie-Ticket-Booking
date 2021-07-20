<?php


include "../connection.php";


if(isset($_POST['register']))
{
	$username=$_POST['username'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$gender=$_POST['gender'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$password=$_POST['password'];
	
		$iq="insert into registration values(NULL,'".$username."','".$name."','".$email."','".$contact."','".$gender."','".$state."','".$city."','".$password."')";
		$iresult=mysqli_query($data,$iq);
		
		if($iresult==true)
		{
			echo "<script>alert('Registered Successfully');
			window.location='index.php';
			</script>";
		}
		else
		{
			echo "<script>alert('Username Alerady Exist, Try Different One ')</script>";
		}
		
		
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
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
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/Login-bg.jpg); background-repeat:no-repeat; background-size:100% 100%">
			<div class="wrap-login100" >
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Registration
					</span>
				</div>

				<form class="login100-form validate-form" style="overflow: scroll;height:440px" action="#"  method="Post">
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Password Required">
						<span  class="label-input100">User Name</span>
						<input name="username" style="color:black" class="input100" type="Password" placeholder="Enter Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Name Required">
						<span  class="label-input100">Name</span>
						<input name="name" style="color:black" class="input100" type="text" placeholder="Enter Name">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="E-Mail Required">
						<span  class="label-input100">E-Mail</span>
						<input name="email" style="color:black" class="input100" type="email" placeholder="Enter E-Mail">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Contact required">
						<span  class="label-input100">Contact Number</span>
						<input style="color:black" name="contact" class="input100" type="number" placeholder="Enter Contact Number">
						<span class="focus-input100"></span>
					</div>
					
					<div class=" validate-input m-b-26" data-validate="Gender Required">
						<span class="label-input100">Gender</span>
						<div style="margin-top:3%">
							<span class="mr-2">Male</span><input class="mr-3" style="display:inline" name="gender" value="Male" type="radio">
							<span class="mr-2">Female</span><input class="mr-3 big" name="gender" value="Female" type="radio">
							<span class="mr-2">Transgender</span><input class="mr-3" name="gender" value="Transgender"  type="radio">
						</div>
						<span class="focus-input100"></span>
					</div>
					
					
					
			
					
					<div class="validate-input mt-2 m-b-26">
						<span class="label-input100">State</span>
						
							<?php
								$uq="select * from state";
								$uresult=mysqli_query($data,$uq);
								echo "<select style='color:grey; width:150%' name='state'>";
								$state='';
								while($row=mysqli_fetch_array($uresult))
								{
									echo "<option>".$state=$row['name']."</option>";
									
								}
								echo "</select>";
							?>
					</div>
					
					
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Password Required">
						<span  class="label-input100">Enter City</span>
						<input name="city" style="color:black" class="input100" type="Password" placeholder="Enter City">
						<span class="focus-input100"></span>
					</div>
					
					
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Password Required">
						<span  class="label-input100">Password</span>
						<input name="password" style="color:black" class="input100" type="Password" placeholder="Enter Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="City Required">
						<span  class="label-input100">Confirm Password</span>
						<input name="cPassword" style="color:black" class="input100" type="Password" placeholder="Enter Password Again">
						<span class="focus-input100"></span>
					</div>
					
					
					
					
					<div class="container-login100-form-btn mt-5">
						<button name="register" class="login100-form-btn" style="margin-bottom:8%;margin-left:15%">
							Register
						</button>						
					</div>
					
					<p class="mt-3" style="margin-bottom:3%">Already a User??, Login now, Click the link Below! </p>
					
					<div style="margin-left:25%">
						<a href="index.php"  style="font-size:20px; margin-left:20%" id="register"/>
							<u>Login</u>
						</a>
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