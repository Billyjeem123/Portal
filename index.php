<?php include("includes/header.php") ?>
<link rel="stylesheet" href="fonts.css">
<?php include("includes/config.php") ?>
<div class="container-fluid p-0">
  <div class="logo px-3">
    <a href="index.php" class=" d-flex justify-content-center align-items-center"><img src="assets/img/logo.jpeg" width="80px" />
      <h1>Iqra Montessori School</h1>
    </a>
    <button class="navbar-toggler d-sm-none d-flex" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="bi-list"></i></span>
    </button>
  </div>
</div>
<?php include("includes/navbar.php") ?>

<main>


  <section id="welcome" class="container py-5 home-about">
    <div class="row">
      <div data-aos="fade-right" data-aos-duration="1000" class="col-md-6">
        <?php
        $query = " SELECT * FROM about ";
        $query = $dbh->prepare($query);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($row as $result) : ?>
          <img src="admin/upload/<?php echo $result->photo ?>" width="100%" alt="alt">
        <?php endforeach; ?>
      </div>
      <div data-aos="fade-left" data-aos-duration="1000" class="col-md-6 py-3 ">
        <h1 class=" home-about ">WELCOME TO IQRA MONTESSORI SCHOOL</h1>
        <p class="py-3 home-about">Our goal is to Teach and Guide your children to be great and set their foot on the right path.
        </p>
        <a href="contact.php" class="btn py-3 px-5py-3 px-5 home-about">Contact Us</a>
      </div>
    </div>
  </section>

  <section id="programs" class="container py-5 home-about">
    <h2 class="text-center py-3">Our Programs</h2>
    <div class="row justify-content-around px-3">
      <div data-aos="fade-right" data-aos-duration="1000" class="col-sm-3 my-3">
        <i class="fa fa-smile-beam icon"></i>
        <h4>Daycare</h4>
      </div>
      <div data-aos="fade-up" data-aos-duration="1000" class="col-sm-3 my-3">
        <i class="fa fa-book-reader icon"></i>
        <h4>Nursery</h4>
      </div>
      <div data-aos="fade-left" data-aos-duration="1000" class="col-sm-3 my-3">
        <i class="fa fa-user-graduate icon"></i>
        <h4>Primary</h4>
      </div>
    </div>
  </section>

  <section id="about" class="container py-5 home-about">
    <div class="row">
      <div data-aos="fade-right" data-aos-duration="1000" class="col-md-6 py-3">
        <h2>About Our School</h2>
        <?php
        $sal = $dbh->prepare(" SELECT * FROM  about ");
        $sal->execute();
        $row = $sal->fetchAll(PDO::FETCH_OBJ);
        foreach ($row as $result) : ?>
          <p class=" py-3  home-about"><?php echo substr($result->details, 0, 140); ?></p>
          <a href="about.php" class="btn py-3 px-5py-3 px-5">Read More</a>
      </div>
      <div data-aos="fade-left" data-aos-duration="1000" class="col-md-6">
        <img src="admin/upload/<?php echo $result->photo ?>" width="100%" alt="alt">
      <?php endforeach ?>
      </div>
    </div>
  </section>


  <section id="scope" class="container py-5 home-about ">
    <h2 class="text-center py-3">Our Scope of Learning</h2>
    <div class="row justify-content-around align-items-center">
      <div class="col-lg-4">
        <div class="wrap d-flex  ">
          <i class="fa fa-globe icon"></i>
          <p class="text home-about">Outreach the global population</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="wrap d-flex">
          <i class="fa fa-play-circle icon"></i>
          <p class="text">Beginner's best option</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="wrap">
          <i class="fa fa-rocket icon"></i>
          <p class="text">Experience the best of education</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-around align-items-center">
      <div class="col-lg-4">
        <div class="wrap d-flex ">
          <i class="fab fa-reddit-alien icon"></i>
          <p class="text">Enjoy educative extra curricular activities</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="wrap d-flex">
          <i class="fa fa-handshake icon"></i>
          <p class="text">Join us from any part of the world</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="wrap d-flex">
          <i class="fa fa-hand-holding-heart icon"></i>
          <p class="text">Learn more about life, not just education</p>
        </div>
      </div>
    </div>
  </section>
  <!-- <section id="gallery" class="container py-5 home-about d-non" style="display:none">
    <h2 class="text-center py-3">Photo Album</h2>
    <div data-aos="zoom-in" data-aos-duration="1000" class="card-columns py-3">
      <?php

     // $sql = " SELECT event_id, tittle, GROUP_CONCAT(photo)  AS images FROM tblimage  INNER JOIN tblevent on tblevent.id = tblimage.event_id GROUP BY event_id";
     // $query = $dbh->prepare($sql);
     // $query->execute();
     // while ($results = $query->fetch(PDO::FETCH_ASSOC)) :
       // $img = $results['images'];
       // $images = explode(',', $results['images']);
      ?>
        <div class="card border-0">
          <a href="gallery.php/gallery/<?php //echo $results['event_id'] ?>">
            <img src="admin/upload/<?php // echo $images[0] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php // echo $results['tittle'] ?></h5>
            </div>
          </a>
        </div> -->
      <?php // endwhile; ?>
   <!-- // </div> -->
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
  <!-- </section> -->

  <section id="testimonials" class="container py-5 home-about">
    <h2 class="text-center py-3">Testimonials</h2>


    <div id="carouselExampleIndicators" class="carousel slide" data-touch="true" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-dark"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=" bg-dark"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" class=" bg-dark"></li>
      </ol>

      <div class="carousel-inner py-3">
        <div class="carousel-item active">
          <div class="card border-0 text-center m-auto">
            <div class="text">
              <h1 class="pt-5"><i class="fa fa-quote-right"></i></h1>
              <p>Iqrah School is a great school! The teachers here are super about encouraging students to do their very
                best They guide us down the right path. I am so proud and lucky to go to the best school!.</p>
              <img src="admin/upload/holder.jpg" class="" alt="image">
            </div>
            <div class="card-body my-3">
              <h2 class="card-title m-0 p-0">Ahmad Ibraheem</h2>
              <p class="card-text m-0 p-0">Student</p>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="card border-0 text-center m-auto">
            <div class="text">
              <h1 class="pt-5"><i class="fa fa-quote-right"></i></h1>
              <p>

                I really value my education at Iqrah School Academy for many reasons. First, I get to learn about many things
                I never knew about. I have a lot of chances to make up work during the week. Tutoring is also
                available after school for those students who don’t understand something. God Bless our Teachers

              </p>
              <img src="admin/upload/holder.jpg" class="" alt="image">
            </div>
            <div class="card-body my-3">
              <h2 class="card-title m-0 p-0">Ibraheem Salami</h2>
              <p class="card-text m-0 p-0">Student</p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card border-0 text-center m-auto">
            <div class="text">
              <h1 class="pt-5"><i class="fa fa-quote-right"></i></h1>
              <p>

                I will always try my best in school. I have always loved this school since the day I came here
                . The teachers respect me, and I respect them. I will never ever forget this school in my life.
                This is the best school I have ever had in the past three years.

              </p>
              <img src="admin/upload/holder.jpg" class="" alt="image">
            </div>
            <div class="card-body my-3">
              <h2 class="card-title m-0 p-0">Mrs. Adeola Rahmah</h2>
              <p class="card-text m-0 p-0">Parent</p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev bg-dark m-auto p-3" style="width: fit-content; height: fit-content !important; border-radius: 50%;" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next bg-dark m-auto p-3" style="width: fit-content; height: fit-content !important; border-radius: 50%;" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
  </section>
</main>


<?php include("includes/footer.php") ?>