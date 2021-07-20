
<script>
    function registerPage() {
		
        window.location="Registration.php";
    }
 </script>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
		<div class="container-login100" style="background-image: url(images/login-bg.jpg);background-repeat:no-repeat; background-size:100% 100%;filter: blur(0px);
  -webkit-filter: blur(0px);">
			<div class="wrap-login100" >
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form"  action="#" method="Post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span  class="label-input100">User Name</span>
						<input name="username" class="input100" type="text"  placeholder="Enter User Name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span  class="label-input100">Password</span>
						<input name="password" class="input100" type="password"  placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<?php
					include "../connection.php";
					session_start();
					
					if(isset($_POST['login']))
					{
						$_SESSION['username']=$_POST['username'];
						$password=$_POST['password'];
						
						$pass='';
						$pwd='';
						$email='';
						$username='';
						$_SESSION['nam']='';
						$_SESSION['userid']='';
						$uq="select id,password,name,email,username from registration where username='$_SESSION[username]'";
						$uresult=mysqli_query($data,$uq);
										
						while($row=mysqli_fetch_array($uresult))
						{
							$_SESSION['userid']=$row['id'];
							$username=$row['username'];
							$pass=$row['password'];
							$_SESSION['nam']=$row['name'];	
							$email=$row['email'];
						}
						
						$q="select * from admin where id=1";
						$result=mysqli_query($data,$q);
													
						while($row=mysqli_fetch_array($result))
						{
							$pwd=$row['password'];							
						}
						
						
							if($_SESSION['username']=='admin' and $password==$pwd)
							{
								header("location:../Admin/index.php");
							}
							elseif($_SESSION['username']==$username and $password==$pass)
							{
								$id=$_SESSION['userid'];
								echo "<script>alert('Login Successfull');
								 window.location='../User/index.php';</script>";
								
							}
							else
							{
								echo "<script>alert('Invalid Credentials')</script>";
							}
						
									
									
										

						
					}

					?>

					<div class="flex-sb-m w-full p-b-30">
						<!--<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>-->
					
						<div style="margin-left:70%">
							<a href="Forgot_Password_(Userid).php" class="txt1">
								Forgot Password?
							</a>
							
						</div>
						
					</div>
					
					<br>
					<br>
					

					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn" style="margin-bottom:8%;margin-left:15%">
							Login
						</button>						
					</div>
					
					<p style="margin-bottom:5%">New User??, Register now, Click the link Below! </p>
					
					<div style="margin-left:25%">
						<a href="#" class="txt1" data-toggle="modal" data-target="#myModal" style="font-size:15px" id="register" onclick="registerPage()" />
							Register
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


