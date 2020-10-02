<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '*****';                 // SMTP username
    $mail->Password = '****';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('prjphp8866@gmail.com', 'Paras Optical');
    $mail->addAddress($_SESSION['email'],$_SESSION['name']);     // Add a recipient
    

    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset your password';
    $mail->Body    = "The Password is <b>{$_SESSION['pwd']}</b> ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
     
   echo "<script> alert ('Email has been sent')</script>";
   if(isset($_SESSION['url'])){
       echo '<script>setTimeout(function(){window.location ="./user_site/login.php";}, 100)</script>';
   } else {
       echo '<script>setTimeout(function(){window.location ="home.php";}, 100)</script>';
   }
   
    
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
