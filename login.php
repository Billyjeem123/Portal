
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
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/favicon/site.webmanifest">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="fonts.css">

</head>

<body>
<?php include('includes/login.php') ?>
<!-- oooop -->

  <div class="container-fluid p-0">
    <div class="logo px-3">
      <a href="index.php" class=" d-flex justify-content-center align-items-center"><img src="assets/img/logo.jpeg"
          width="80px" />
        <h1>Iqra Montessori School</h1>
      </a>
      <button class="navbar-toggler d-sm-none d-flex" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="bi-list"></i></span>
      </button>
    </div>
  </div>
  
  <?php
$sal = $dbh->prepare(" SELECT * FROM  about ");
$sal ->execute();
$row=$sal->fetchAll(PDO::FETCH_OBJ);
foreach($row as $result):?>
  <header class="testing" style="background:linear-gradient(83deg, rgba(0,0,0,0.7707282742198442) 5%, rgba(0,0,0,0.77) 100%), 
     url('admin/upload/<?php echo $result->photo ?>') center no-repeat; background-size: cover; height:100vh">
    <?php  endforeach; ?>
    <nav class="navbar navbar-expand-sm navbar-light ml-auto p-0 testing">
      <div data-aos="fade-left" data-aos-duration="1000" class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-expanded="false">
              About Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="about.php">About our School</a>
              <a class="dropdown-item" href="admin.php">Administration</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="py-5">
      <div class="container-fluid py-3 text-dark">
        <h2 class="text-center text-white py-3">LOG IN</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 col-lg-5">


     



          <form action="" id="login-form" class="testing" method='post' onsubmit="return Login()" >
            <div class="" id="eee"></div>
            <div class="form-floating mb-3">
              <label for="floatingInput"  class="text-white">Email</label>
              <input type="email"  name='email'  class="form-control" id="email"  value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"   placeholder="" required >
            </div>
            <div class="form-floating mb-3">
              <label for="floatingPassword" class="text-white">Password</label>
              <input type="password" name='password' class="form-control" id="password"  value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" class="form-control" id="password " placeholder=""  required>
            </div>
         <p><input type="checkbox" name="remember"   checked  value="<?php if(isset($_COOKIE["email"])) { ?>  <?php } ?> " checked class="text-white">  Remember me
	        </p>

            <div class="d-flex">
              <button  id="save" name="submit" type="submit" class="btn px-3">Log in</button>
              <a href="forget-pass.php?forget=<?php  echo uniqid(true); ?>" class="text-white ml-auto" style="letter-spacing: 2px;">Forget Password?</a>
            </div>
          </form>
        </div>
      </div>

    </section>
  </header>

 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> -->

<script>


function Login() {
		var data = $("#login-form").serialize();				
    $.ajax({
      type: "POST",
      url: "includes/login.php",
      data: data,
      dataType: "json",
      encode: true,
    })
    
      .done(function(data) {
        
        
        if(data == 'Incorrect'){
          $("#eee").html(
          '<div class="alert alert-danger">  Username  and Password Incorrect </div>'
        );
           

        }
        if(data == 'Nothing'){
          $("#eee").html(
          '<div class="alert alert-danger">  EmaiL and Password Does Not Exists </div>'
        );
           

        }

        if(data == 'admin'){
         
        	$("#save").html(' Signing In <img id="" src="https://res.cloudinary.com/sivadass/image/upload/v1498134389/icons/loader.gif" alt="loading"> &nbsp; ');
					setTimeout(' window.location.href = "admin/index.php"; ',4000);
           

        }

        if(data == 'teacher'){
          $("#save").html(' Signing In <img id="" src="https://res.cloudinary.com/sivadass/image/upload/v1498134389/icons/loader.gif" alt="loading"> &nbsp; ');
					setTimeout(' window.location.href = "teacher/index.php"; ',4000);
           

        }
       
      })

      .fail(function (data) {
        $("#eee").html(
          '<div class="alert alert-danger"> Error Connecting To Server  </div>'
        );
      });

      return false;
	}   
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>