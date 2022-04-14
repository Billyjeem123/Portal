<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iqra Montessori School</title>

<!-- <link href="assets/img/favicon.png" rel="icon"> -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<!-- favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="assets/img/favicon/site.webmanifest">
</head>

<body>

<?php include("includes/connect.php") ?>
<?php

if(!isset($_GET['email']) && !isset($_GET['token'])){


$token = $_GET['token'];
$email = $_GET['email'];


    header("Location: index.php");


}


// $token = 'a2eaf368c2491397e9c95bdbd4896757341266c1d647d8dcf6233810814d3321c7e18509761fea466db3bd0ff8f25a86e3ff';

if($update_syntax = $dbh->prepare("SELECT name, email, token FROM tblteacher WHERE token= :token ")){

    $update_syntax->bindParam(':token',$_GET['token'],PDO::PARAM_STR);
    $update_syntax->execute();

    while($results=$update_syntax->fetch(PDO::FETCH_ASSOC)){
        $name = $results['name'];
        $email = $results['email'];
        $token = $results['token'];
   
      }

      if(isset($_POST['password']) && isset($_POST['confirmPassword'])){


        if($_POST['password'] === $_POST['confirmPassword']){


            $password = $_POST['password'];

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));

            if($update_passsword = $dbh->prepare( " UPDATE tblteacher SET token='', password='{$hashedPassword}' WHERE email = :email")){
                $update_passsword->bindParam(':email',$_GET['email'],PDO::PARAM_STR);
                $update_passsword->execute();

                if($update_passsword->rowCount() >= 1){


                  header("Location: login.php");

                }



            }


        }

    }







}



?>




<!-- Navigation -->


<div class="container">



    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Reset Password</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">


                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input id="password" name="password" placeholder="Enter password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
                                            <input id="confirmPassword" name="confirmPassword" placeholder="Confirm password" class="form-control"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input name="resetPassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<hr>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery/jquery-ui.js"></script>
<script defer src="assets/vendor/fontawesome-free-5.15.4-web/js/all.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

</body>

</html>

</div> <!-- /.container -->



