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