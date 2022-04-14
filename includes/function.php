   <?php  include('config.php') ?>
   <?php

function email_exists($email){

global $dbh;


$query = " SELECT email FROM tblteacher WHERE email = :email ";
$query= $dbh ->prepare($query);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0){

    return true;

} else {

    return false;

}



}

function redirect($location){


    header("Location: {$location}");
    
    
    }

    function AboutUs(){
        global $dbh;
        ?>

        <section id="about" class="container py-5">
        <div class="row">
          <div data-aos="fade-right" data-aos-duration="2000" class="col-md-6 py-3">
            
            <h2>About Our School</h2>
            <?php
            $sal = $dbh->prepare(" SELECT * FROM  about ");
            $sal ->execute();
            $row=$sal->fetchAll(PDO::FETCH_OBJ);
    
            foreach($row as $result)
            {  
                $db_photo= $result->photo;
                $db_details = $result->details;
                
                ?>
            
            
            <p class="lead py-3"><?php echo $result->db_details  ?></p>
  
            <a href="about.php" class="btn py-3 px-5py-3 px-5">Read More</a>
          </div>
          <div data-aos="fade-left" data-aos-duration="2000" class="col-md-6">
            <img src="assets/schl-img/10.jpg" width="100%" alt="Iqra">
        </div>
        </div>
    </section>
    <?php } }?>


  

  
