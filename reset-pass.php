<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IQRA MONTESSORI SCHOOL</title>
  <link rel="stylesheet" href="other.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/favicon/site.webmanifest">

</head>

<body>

  <div class="container-fluid p-0">
    <div class="logo px-3">
      <a href="index.php" class=" d-flex justify-content-center align-items-center"><img src="assets/img/logo.jpeg"
          width="80px" />
        <h1>Iqra Montessori School</h1>
      </a>
    </div>
  </div>
  <header style="min-height: 100vh;
  background:linear-gradient(83deg, rgba(0,0,0,0.7707282742198442) 5%, rgba(0,0,0,0.77) 100%), 
    url(assets/schl-img/2.jpg) center no-repeat; background-size: cover;">



<!-- //RESET PASSWORD -->

<?php include("includes/config.php") ?>
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

            if($update_passsword = $dbh->prepare( " UPDATE tblteacher SET token='', password='{$hashedPassword}' WHERE email = :email ")){
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

    <section class="py-5">
      <div class="container-fluid py-3 text-dark">
        <h2 class="text-center text-white py-3">Type in your new password</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 col-md-5 col-lg-4">
          <form method="POST" class="" action="">
            <label for="">New Password</label>
            <div class="form-floating mb-3">
            <input id="password" name="password" placeholder="Enter password" class="form-control"  type="password">
            </div>

            <label for="">Confirm Password</label>
            <div class="form-floating mb-3">
            <input id="confirmPassword" name="confirmPassword" placeholder="Confirm password" class="form-control"  type="password">
            </div>


            <div class="d-flex">
              <button name="submit" type="submit" class="btn px-3">Reset Password</button>
            </div>
            
            <input type="hidden" class="hide" name="token" id="token" value="">

          </form>
        </div>
      </div>
    </section>
  </header>



  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

</body>

</html>