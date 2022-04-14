<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IQRA MONTESSORI SCHOOL</title>
  <link rel="stylesheet" href="style.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="../assets/img/favicon/site.webmanifest">
  <link rel="stylesheet" href="../fonts.css">

</head>

<body>
  <?php include('../includes/config.php') ?>

  <div class="container-fluid p-0">
    <div class="logo px-3">
      <a href="../index.html" class=" d-flex justify-content-center align-items-center"><img
          src="../assets/img/logo.jpeg" width="80px" />
        <h1>Iqra Montessori School</h1>
      </a>
    </div>
  </div>
  <header style="min-height: 100vh;
  background:linear-gradient(83deg, rgba(0,0,0,0.7707282742198442) 5%, rgba(0,0,0,0.77) 100%), 
    url(../assets/schl-img/13.jpg) center no-repeat; background-size: cover;">

    <section class="py-3 home-about">
      <div class="container-fluid py-3 text-dark">
        <h2 class="text-center text-white py-3">Check Your Result</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-10 col-md-5 col-lg-4 py-3" style="background: #666262c7;">
          <form action="result.php" method="post">
            <div class="form-floating mb-3">
              <label for="roll-id" class="text-white">Enter Your Roll ID</label>
              <input type="text" class="form-control" id="rollid" placeholder="Enter Your Roll Id"
               autocomplete="off" name="rollid">
            </div>
            <div class="form-floating mb-3">
            <label for="exam Type" class="text-white">Exam Type</label>
            <select name="exam_id" class="form-control" id="default" required="required">
                <option value="" style="color:green">Exam type</option>
                <?php $sql = "SELECT * from exam_srms";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              if($query->rowCount() > 0)
              {
              foreach($results as $result)
              {   ?>
              <option value="<?php echo htmlentities($result->exam_id); ?>">
                    <?php echo htmlentities($result->exam_name);?></option>
                <?php }} ?>
            </select>
            </div>
            <div class="form-floating mb-3">
              <label for="session" class="text-white">Session</label>
              <select name="session" class="form-control" id="default" required="required">
                        <option value="" style="color:green">Session</option>
                            <?php $sql = " SELECT * from tblsession ";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              if($query->rowCount() > 0)
              {
              foreach($results as $result)
              {   ?>
                              <option value="<?php echo htmlentities($result->id); ?>">
                            <?php echo htmlentities($result->session);?></option>
                        <?php }} ?>
                    </select>
            </div>
            <div class="form-floating mb-3">
              <label for="term" class="text-white">Term</label>
              <select name="term" class="form-control" id="default" required="required">
                    <option value="" style="color:green">Term</option>
                    <?php $sql = "SELECT * from tblterm";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {   ?>
                    <option value="<?php echo htmlentities($result->id); ?>">
                        <?php echo htmlentities($result->term);?></option>
                    <?php }} ?>
                </select>

               </div>

            <div class="">
              <button type="submit" class="btn px-3 btn-sm">Check Result</button>
            </div>
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