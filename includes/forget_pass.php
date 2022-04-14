

    <!-- //php code -->




    <?php
    // require 'config.php';
    require 'function.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'class.php';
require 'C:\xampp\htdocs\iqra-new-file\vendor\autoload.php';






// if(!isset($_GET['forget'])  && empty($_GET['forget'])){

// header("Location: index.php");
// }


if(isset($_POST['email'])) {

$email = $_POST['email'];

$length = 50;

$token = bin2hex(openssl_random_pseudo_bytes($length));


if(email_exists($email)){

if($query = $dbh->prepare(" UPDATE tblteacher SET token='{$token}' WHERE email= :email")){
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();



                    /**
                     *
                     * configure PHPMailer
                     *
                     *
                     */

                    $mail = new PHPMailer();

                    $mail->isSMTP();
                    $mail->Host = Config::SMTP_HOST;
                    $mail->Username = Config::SMTP_USER;
                    $mail->Password = Config::SMTP_PASSWORD;
                    $mail->Port = Config::SMTP_PORT;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';


                    // $mail->setFrom('billyhadiattaofeeq@gmail.com', 'Billyjeem');
                    // $mail->addAddress($email);

                    $mail->setFrom($_POST['email']);
                    $mail->addAddress('Billyhadiattaofeeq@gmail.com');
                    $mail->addReplyTo($_POST['email'] );

                    $mail->Subject = 'Iqrah Schools';

                    $mail->AddEmbeddedImage('assets/img/logo.jpeg','logo.jpeg', 'logo.jpeg');

                    $mail->AltBody  = "<img alt='PHPMailer' src='assets/img/logo.jpeg' width=' 20px'>";

                    $mail->Body = '<p> Please click to reset your password

                    <a class= "btn py-3 px-5py-3 px-5" href="http://localhost/iqra-new-file/reset-pass.php?email='.$email.'&token='.$token.' "  >Click To Reset</a>

                    </p>';
                    
                    if(!$mail->send()) {
                      $msg =  'failed';
                      $msg  = 'Mailer Error: ' . $mail->ErrorInfo;
                  } else {
                      $msg = "Check Your Inbox To Proceed ";
                  
                      
                  }
                  
                  echo  json_encode($msg);

}

}

}



?>
