<?php 
include 'config.php';
$Id = $_GET['Id'];

$sql = "SELECT OneTimePassword, Email FROM user WHERE ID = $Id";
$result =mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$message = $row['OneTimePassword'];
$email = $row['Email'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                  
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dangilanjc@gmail.com';                     //SMTP username
    $mail->Password   = 'cqbpskpqrfosszqo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dangilanjc@gmail.com', 'La Perfecta Convention Center, Villas and Resort');
    $mail->addAddress($email);     //Add a recipient
    
    

    

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is your OTP for your Account';
    $mail->Body    = $message;
    

    $mail->send();
    header("Location: verify.php?Id=$Id");
} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>