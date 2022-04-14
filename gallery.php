<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="gallery.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Font Awsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Slider -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/favicon/site.webmanifest">
  <link rel="stylesheet" href="fonts.css">
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
  <main>
<?php include('includes/function.php') ?>

<div class="home-about mx-3 px-1">
  <?php
        //   if(!isset($_GET['gallery'])){
                    
        //     redirect('index.php');


            
        // }

                $the_event_id =   $_GET['gallery'];
                $sql = " SELECT * FROM  tblimage  WHERE event_id = :gallery ";
                $query= $dbh -> prepare($sql);
                $query->bindParam(':gallery',$the_event_id,PDO::PARAM_STR);
                $query-> execute();
                while($results=$query->fetch(PDO::FETCH_ASSOC)){
                    // $tittle = $results['details'];
                    $image = $results['photo'];
                    $images = explode(',', $results['photo']);
            ?>
            </div>
            <div class='slider'>
                    <?php
                foreach ($images as $key) {?>
        <div><img src="admin/upload/<?php echo $key?>" width="100%" alt=""></div> 

                    <?php  }?>
            </div>
            <div class='slider-nav'>
              <?php
                foreach ($images as $key) {?>
        <div><img src="admin/upload/<?php  echo $key?>" alt=""></div>

              <?php  } ?>
            </div>
        <?php  }?>


  <section id="gallery" class="container py-5">
      <h2 class="text-center py-3">Photo Album</h2>
      <div data-aos="zoom-in" data-aos-duration="1000" class="card-columns py-3">
                  <?php
        $sql   = " SELECT  * FROM tblevent WHERE id !=  " . htmlspecialchars($_GET['gallery'])  .  "   ";
            $sql = $dbh->prepare($sql);
            $sql->execute();
            while($results=$sql->fetch(PDO::FETCH_ASSOC)):
              $img = $results['photo'];
              $images = explode(',', $results['photo']);
                  ?>
        <div class="card border-0">
          <a href="gallery/<?php echo $results['id'] ?>">
            <img src="admin/upload/<?php  echo $images[0] ?>" class="card-img-top" alt="kkk">
            <div class="card-body">
              <h5 class="card-title"><?php echo $results['tittle'] ?></h5>
            </div>
          </a>
        </div>
        <?php endwhile; ?>
      </div>

      <!-- <nav class="d-flex justify-content-center">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav> -->
    </section>



  </main>
  <?php include("includes/footer.php") ?>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
  <!-- font awsome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <!-- slider -->
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>



  

  <script type="text/javascript">
    $(document).ready(function () {
      //Slick slider initialize
      $('.slider').slick({
        arrows: false,
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1
      });
      //On click of slider-nav childern,
      //Slick slider navigate to the respective index.
      $('.slider-nav > div').click(function () {
        $('.slider').slick('slickGoTo', $(this).index());
      })
    })
  </script>
  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- swiper  -->


</body>

</html>