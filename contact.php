
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
<link rel="stylesheet" href="fonts.css">
<style>
  .error{

    color:red;
  }

</style>
</head>

<body>
<?php include("includes/config.php");?>



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
  <header style="background:linear-gradient(83deg, rgba(0,0,0,0.7707282742198442) 5%, rgba(0,0,0,0.77) 100%), 
     url('admin/upload/<?php echo $result->photo ?>') center no-repeat; background-size: cover;">
    <?php  endforeach; ?>
    <nav class="navbar navbar-expand-sm navbar-light ml-auto p-0 testing">
      <div data-aos="fade-left" data-aos-duration="2000" class="collapse navbar-collapse" id="navbarSupportedContent">
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
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <h3>CONTACT US</h3>
    </div>
  </header>


  <main>
    <section class="py-5 home-about" >
      <h2 class="text-center py-3">Get In touch</h2>
      <div class="row p-3">
        <div class="col-sm-6">
          <div class="container m-auto text-center home-about">
          <div class="mb-3 ">
            <h1><i class="bi bi-telephone"></i></h1>
            <p class=""> (234) 000 00 0000 <br>
                (234) 000 00 0000</p>
            </div>

            <div class="mb-3">
              <h1><i class="bi bi-envelope"></i></h1>
              <p class="">0000@gmail.com</p>
            </div>
            <div class="mb-3 ms-4">
              <h1><i class="bi bi-geo-alt"></i></h1>
              <address>
                Iqra Montessori School<br>
                <!-- Ibadan, Nigeria. -->
              </address>
            </div>
          </div>
        </div>
        <div class="col-sm-6">

 
        <div class="" id="eee"></div>


          <form class="row g-3" action="" method="post" id="frm">
           
            <div class="col-12 form-floating">
              <label for="email" class="form-label">Email</label>
              <input type="email"  name="email"  class="form-control" id="email">
            </div>
            
            <div class="col-12">
              <textarea name="message" id="message" cols="20" rows="5" class="form-control"
                placeholder="Write your message"></textarea>
            </div>
            <div class="col-6">
              <button name="submit" type="submit"  id="send" class="btn my-3 px-5"> Send  </button>
              <!-- <input type="submit" value="Send"  id="send"  class="btn my-3 px-5"> -->
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>

<!-- +********************************** * -->
  	<!-- Jquery-Ajax-Cdn -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
			<!-- Jquery-Ajax-Cdn -->
  <script type="text/javascript">
  jQuery('#frm').validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      
      message: {
        required: true,
      },
    },
    messages: {
      email: {
        required: "Enter your  email",
        email: "Enter a  valid email",
      },
     
      message: {
        required: " Leave us a message"
      },
    },
    submitHandler: function(form) {
      var dataparam = $('#frm').serialize();


      $.ajax({
        type: 'POST',
        async: true,
        url: 'includes/gmail.php',
        data: dataparam,
        datatype: 'json',
        cache: false,
        global: false,
        beforeSend: function() {
          $("#send").html('Sending <img id="" src="https://res.cloudinary.com/sivadass/image/upload/v1498134389/icons/loader.gif" alt="loading">');

        },
        success: function(data) {
        
          $("#eee").html(
          '<div class="alert alert-success text-center"> '+data+' </div>'
        );
        $("#frm")[0].reset();
        },
        complete: function() {
          $('#loader').hide();
          $("#send").html('Send Message ');
        }

        
      });
      return false;
    }

  });
</script>

  <?php  include('includes/footer.php') ?>

</body>

</html>