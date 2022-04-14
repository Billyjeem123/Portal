<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IQRA MONTESSORI SCHOOL</title>
  <link rel="stylesheet" href="other.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/favicon/site.webmanifest">
  <!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
  <style>
    .error {
      color: red;
      font-weight: normal;
    }

    #eee {
   width:40%;    
   align-items: center;
   justify-content: center;
   display: flex;
}
  </style>

</head>

<body>

  <div class="container-fluid p-0">
    <div class="logo px-3">
      <a href="index.php" class=" d-flex justify-content-center align-items-center"><img src="assets/img/logo.jpeg" width="80px" />
        <h1>Iqra Montessori School</h1>
      </a>
    </div>
  </div>
  <header style="min-height: 100vh;
  background:linear-gradient(83deg, rgba(0,0,0,0.7707282742198442) 5%, rgba(0,0,0,0.77) 100%), 
    url(assets/schl-img/2.jpg) center no-repeat; background-size: cover;">


    <?php include("includes/config.php") ?>

    <section class="py-3">
      <div class="container-fluid py-3 text-dark">
        <h2 class="text-center text-white py-3">Recover Your password</h2>
      </div>

 
<div class="" id="eee"></div>

      <div class="row justify-content-center">
        <div class="col-10 col-md-5 col-lg-4">
          <form action="" class="" method="post" id="frm">
            <div class="form-floating mb-3">
              <img src="assets/index.png" class="d-flex m-auto" width="40%" alt="user-image">
            </div>
            <div class="form-floating mb-3">
              <label for="email" class="text-white">Type in your Email Address</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
            </div>
            <div class="d-flex">
              <a href="login.php" class="text-white" style="letter-spacing: 2px;">Back to Login</a>
              <button id="send" type="submit" class="btn ml-auto px-3">Search</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </header>





  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>
  <!-- +********************************** * -->
  <!-- Jquery-Ajax-Cdn -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <!-- Jquery-Ajax-Cdn -->
  <script type="text/javascript">
    jQuery('#frm').validate({
      rules: {
        email: {
          required: true,
          email: true
        },


      },
      messages: {
        email: {
          required: "Enter your  email",
          email: "Enter a  valid email",
        },


      },
      submitHandler: function(form) {
        var dataparam = $('#frm').serialize();
        // 
        // alert(dataparam);

        $.ajax({
          type: 'POST',
          async: true,
          url: 'includes/forget_pass.php',
          data: dataparam,
          datatype: 'json',
          cache: true,
          global: false,
          beforeSend: function() {
            $("#send").html('Recovering <img id="" src="https://res.cloudinary.com/sivadass/image/upload/v1498134389/icons/loader.gif" alt="loading">');

          },
          success: function(data) {

       

            $("#eee").html(
          '<div class="alert alert-success text-center ">'+data+'</div>'
        );
        $("#frm")[0].reset();

          },
          complete: function() {
            $('#loader').hide();
            $("#send").html('Search');
          }


        });
        return false;
      }

    });
  </script>
</body>

</html>