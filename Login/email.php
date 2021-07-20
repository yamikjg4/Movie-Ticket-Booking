<?php

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
         
			
        $this->sender = "17bca014@charusat.edu.com"; 

        /**
         *  YOUR PASSWORD 
         *  ************
         */               
        $this->password = "password";  

        /**
         * Receiver email
         * For example : johndoe@gmail.com
         */     
        $this->receiver = $email;  

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
        $mail->Subject = "OTP is";
        $mail->SetFrom($this->sender,"hostelinfocharusat");
        $mail->AddAddress($this->receiver);
		//$mail->AddAttachment($_POST['file']);
        if($mail->send()){
          echo "Mail send successfully";
          // return true;
          //exit;  
        }
		else
		{
			echo "FAILED TO SEND MAIL";
        
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
            <h1>Your verification code is {$otp}</h1>
            <p>Use this code to verify your account.</p>
         </body>
        </html>        
MSG;
    return $htmlMessage;
    }

	}


if(isset($_POST['submit']))
{
	
	if($_COOKIE['otp'] == $_POST['otp'])
	{
		echo "successfully logged in";
	}
	else
	{
		echo "Enter again";
	}
}


?>
