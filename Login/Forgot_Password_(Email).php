

<?php


include '../connection.php';


session_start();




$message="Email Not Matched";
if(isset($_POST['getotp']))
{
	
	$uq="select id,email from registration where id='$_SESSION[fuserid]'";
	$uresult=mysqli_query($data,$uq);
	$email='';				
	while($row=mysqli_fetch_array($uresult))
	{
		$email= $row['email'];
						
	}
	
	if($email == $_POST['email'])
	{
		
	//use PHPMailer\PHPMailer\PHPMailer;

//require 'PHPMailer-5.2-stable/src/Exception.php';
require 'PHPMailerAutoload.php';


	
class VerificationCode
{
    public $smtpHost;
    public $smtpPort;
    public $sender;
    public $password;
    public $receiver;
    public $code;

    public function __construct($receiver)
    {
         
			
        $this->sender = "mail id"; 

        /**
         *  YOUR PASSWORD 
         *  ************
         */               
        $this->password = "password";  

        /**
         * Receiver email
         * For example : johndoe@gmail.com
         */     
        $this->receiver =$_POST['email'];;  

        /**
         * YOUR SMTP HOST NAME 
         * For example : smtp.gmail.com 
         * OR mail.youwebsite.com
         */     
        $this->smtpHost="smtp.gmail.com";        
        
        /**
         * SMTP port number
         * For example :587
         */
        $this->smtpPort = 587;

    }
    public function sendMail(){
        $mail = new PHPMailer();
		//$mail->SMTPDebug = 4; 
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->Host = $this->smtpHost;   
        $mail->Port = $this->smtpPort;    
        $mail->IsHTML(true);
        $mail->Username = $this->sender;
        $mail->Password = $this->password;
        $mail->Body=$this->getHTMLMessage();
        $mail->Subject = "Forgot Password";
        $mail->SetFrom($this->sender,"info.hostel.charusat");
        $mail->AddAddress($this->receiver);
		//$mail->AddAttachment($_POST['file']);
        if($mail->send()){
		
         echo "<script>alert('Mail Send Successfully to your Email');
									window.location = 'Forgot_Password_(OTP).php';
								</script>";
          // return true;
          //exit;  
        }
		else
		{
			echo "<script>alert('FAILED TO SEND MAIL');</script>";
        
		}// return false;
		// pass your recipient's email

    }
    public function getVerificationCode()
    {
        return (int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    }

    public function getHTMLMessage(){
		$otp=$this->getVerificationCode(); 
		setcookie('otp', $otp);
          
        $htmlMessage=<<<MSG
        <!DOCTYPE html>
        <html>
         <body>
            <h1 style='font-weight:normal;'>Your verification code (OTP) is <b style='color:red'>{$otp}</b></h1>
            <p>Use this code to verify.</p>
         </body>
        </html>        
MSG;
    return $htmlMessage;
    }

	}

	
	
		$vc=new VerificationCode($email); 
		$vc->sendMail(); // MAIL SENT SUCCESSFULLY
		
		
	
	
	
	}
	else
	{
		echo "<script>alert('$message');</script>";
	}

}

	
?>



<!DOCTYPE html>
<html lang="en">


<head>

<script>
function myFunction() {
  alert("Hello! I am an alert box!");
}
</script>
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
						<span  class="label-input100">Enter Email</span>
						
							<input class='input100' type='text' name='email' placeholder='Enter Registered Email'>
					
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="getotp" class="login100-form-btn" style="margin-bottom:8%;margin-left:10%">
							Get OTP
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


