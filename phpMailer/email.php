<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include_once "Exception.php";
include_once "PHPMailer.php";
include_once "SMTP.php";

$mail=new PHPMailer(true);
try{

    $email=$_REQUEST["email"];
   // $mail->SMTPDebug=SMTP::DEBUG_SERVER;
   $mail->SMTPDebug=SMTP::DEBUG_SERVER;
   $mail->isSMTP();
   $mail->Host= 'smtp.sendgrid.net';
   $mail->SMTPAuth=true;
   $mail->Username='apikey';
   $mail->Password='SG.WoVXVtFQQXq2rtGJxH083w.8td3FJt5uoRtxGpDCVm8ccVQmUEKmnITbRVCvSX5JDQ';
   $mail->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;
   $mail->Port=465;

   $mail->setFrom('faridasherif362@gmail.com');

   $mail->addAddress($email);
   
   $mail->isHTML(true);
  
   $mail->Subject='welcome';
   $mail->Body='welcome to adNow, you can now sell any product using our website';
   $mail->send();

   
}
catch(Exception $e)
{
    echo "message could not be sent.Mailer Error: {$mail->ErrorInfo}";
}
header("location:../controllers/userController.php?command=loginForm");

?>