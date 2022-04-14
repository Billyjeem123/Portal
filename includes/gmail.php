<?php

require 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'class.php';
require 'C:\xampp\htdocs\school-portal\vendor\autoload.php';

$mail = new PHPMailer(TRUE);

if(isset($_POST['email'])){

    $msg = array();

    echo $email = $_POST['email'];
    $msg = $_POST['message'];


$mailbody = 'From Asthetics' . PHP_EOL . PHP_EOL . 
            'email:' . $email . '' . PHP_EOL .
            'message: ' . $msg . '' . PHP_EOL;
// $mail->SMTPDebug = 2;  
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = Config::SMTP_HOST;           // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = Config::SMTP_USER; // SMTP username
$mail->Password =Config::SMTP_PASSWORD ;   // SMTP password
$mail->SMTPSecure = 'tls';           // Enable TLS encryption,
$mail->Port = Config::SMTP_PORT; // TCP port to connect to

$mail->setFrom('billyhadiattaofeeq@gmail.com', 'Billyjeem'); // Admin ID
$mail->addAddress('billyhadiattaofeeq@gmail.com', 'Business Owner'); // Business Owner ID
$mail->addReplyTo($email, "Visitor"); // Form Submitter's ID

$mail->isHTML(true); // Set email format to HTML

$mail->Subject = 'New Lead Enquiry';
$mail->Body    = $mailbody;
// $mail->Body    = $msg;
if(!$mail->send()) {
    $msg =  'failed';
    $msg  = 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $msg = "Message Delivered Sucessfully";

    
}

echo  json_encode($msg);

}
