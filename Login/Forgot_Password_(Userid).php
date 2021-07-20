

<?php


include '../connection.php';


session_start();





	
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

	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/login-bg.jpg);background-repeat:no-repeat; background-size:100% 100%">
			<div class="wrap-login100" >
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Forgot Password
					</span>
				</div>

			<form class="login100-form " action="#" method="post">
					<div class="wrap-input100 validate-input m-b-26" 	>
						<span  class="label-input100">User Id</span>
						
							<input class='input100' type='text' name='userid' placeholder='Enter Id'>
					
						<span class="focus-input100"></span>
					</div>
					
					<?php
						if(isset($_POST['next']))
						{
							$_SESSION['fuserid']=$_POST['userid'];
							$uq="select id from registration where id='$_SESSION[fuserid]'";
							$uresult=mysqli_query($data,$uq);
									$c='';
							while($row=mysqli_fetch_array($uresult))
							{
								$c=$row['id'];		
								
							}
							if($c == $_SESSION['fuserid'])
							{
								header('location:Forgot_Password_(Email).php');
							}
							else
							{
								echo "Invaild Username";
							}
						
						
						}
					
					
					?>
					<br>
					<div class="container-login100-form-btn">
						<button name="next" class="login100-form-btn" style="margin-bottom:8%;margin-left:10%;margin-top:15px;">
							Next
						</button>
					</div>
					
					<p style="margin-bottom:5%;margin-left:5%;">Back to Login, Click the link Below! </p>
					
					<div style="margin-left:30%">
						<a href="Login.php" class="txt1" style="font-size:15px"/>
							Login
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


