<?php
session_start();
error_reporting(-1);
$totlcount = "";
include('../includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/img/favicon/site.webmanifest">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../fonts.css">
</head>
<style>
  th,
  td {
    color: #020040;
  }

  td {
    text-align: center;
  }

  .student-details {
    width: 80%;
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
  }

  .student-details span:first-child {
    width: 40%;
  }

  .student-details span {
    /* height: max-content; */
    border: 1px solid #020040;
    width: 30%;
  }

  .student-details p {
    border-bottom: 1px solid #020040;
    /* min-width: 200px; */
    padding: 5px 10px;
    margin: 0;
  }

  .student-details p span {
    border: none;
    font-weight: bold;
  }

  .comment {
    width: 80%;
  }

  @media (max-width:600px) {
    table {
      width: 100% !important;
    }

    .brand img {
      width: 50px;
    }

    .brand h1 {
      font-size: 15px;
    }

    .brand em {
      font-size: 15px;
    }

    .student-details span {
      width: 100% !important;
      margin: auto;
    }

    .student-details {
      width: 100%;
    }

    .comment {
      width: 100%;
    }
  }
</style>

<body>
  <!-- nav-brand -->
  <div class="brand justify-content-center " style="background-color: #020040;">
    <a class="navbar-brand d-flex justify-content-center align-items-center text-white" href="../index.php">
      <img src="../assets/img/logo.jpeg" class="me-2" alt="" width="80">
      <div class="navbar-brand-text">
        <h1 class="p-0 m-0" style="font-family: 'Anton', sans-serif; line-height: .5;">IQRA MONTESSORI SCHOOL</h1>
        <em>Beacon of Hope</em>
      </div>
    </a>
  </div>



  <!-- ********************************STUDENT INFOR*************************** -->
  <?php

  $totlcount = "";
  $rollid = $_POST['rollid'];

  $classid = $_POST['exam_id'];

  $session_id = $_POST['session'];

  $term_id = $_POST['term'];

  $_SESSION['rollid'] = $rollid;

  $_SESSION['exam_id'] = $classid;

  $_SESSION['session'] = $session_id;

  $_SESSION['term'] = $term_id;


  $qery = "SELECT * FROM tblstudents INNER JOIN  tblclasses ON tblclasses.id =tblstudents.ClassId ";
  $qery .= "JOIN  tblterm on tblterm.id=tblstudents.term_id ";
  $qery .= "JOIN tblsession on tblsession.id=tblstudents.session_ids ";
  $qery .= " WHERE tblstudents.RollId=:rollid ";
  $stmt = $dbh->prepare($qery);
  $stmt->bindParam(':rollid', $rollid, PDO::PARAM_STR);
  $stmt->execute();
  $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach ($resultss as $student_info) :
    # code...
  ?>
    <!-- nav-brand end-->
    <div class="student-details m-auto p-3 home-about">
      <span>
        <p>Student Name: <span><?php echo $student_info->StudentName ?></span></p>
        <p>Class: <span><?php echo $student_info->ClassName ?></span></p>
        <p>DOB: <span><?php echo $student_info->RegDate ?></span></p>
      </span>
      <span>
        <p>Admission No.: <span><?php echo $student_info->RollId ?></span></p>
        <p>Term: <span><?php echo $student_info->term ?></span></p>
        <p>Session: <span><?php echo $student_info->session ?></span></p>
      </span>
      <span>
        <p>Position in Class: <span>00</span></p>
        <?php


        $Sql = " SELECT * FROM tblstudents WHERE ClassId = '$classid' ";
        $Sql = $dbh->prepare($Sql);
        $Sql->execute();
        $totalstudents = $Sql->rowCount();
        ?>
        <p>Total Pupils in Class: <span><?php echo $totalstudents ?></span></p>


      </span>
    </div>
  <?php
  endforeach;
  ?>


  <!-- ********************************STUDENT INFOR*************************** -->







  <div class="table-responsive p-3  home-about">
    <table class="table table-bordered table-striped" style="width: 80%; margin: auto;">
      <tr class="text-center">
        <th>S/N</th>
        <th>SUBJECTS:</th>
        <th>1<sup>st</sup>CA</th>
        <th>2<sup>nd</sup>CA</th>
        <th>Exam Scores</th>
        <th>Total Scores</th>
        <th>Teacher's <br> Remarks</th>
        <!-- <th>Term <br> Exams</th> -->
        <th>Class Average <br> Mark</th>
        <th>Position</th>
      </tr>
      <tr>
        <td>S/N</td>
        <td>Marks Obtainable</td>
        <td class="text-dark">40</td>
        <td class="text-dark">60</td>
        <td class="text-dark">100</td>
        <!-- <td class="text-dark"></td>
        <td class="text-dark"></td>
        <td class="text-dark"></td> -->
      </tr>
      <?php

      $sql = " SELECT * FROM exam_test  JOIN scores ON exam_test.result_id = scores.result_id ";
      $sql .= "  JOIN tblstudents on  tblstudents.StudentId=exam_test.StudentId ";
      $sql .= "  JOIN tblclasses on  tblclasses.id=exam_test.ClassId ";
      $sql .= "  JOIN tblsession on  tblsession.id=exam_test.session_ids ";
      $sql .= "  JOIN tblsubjects ON   scores.subject_id = tblsubjects.id ";
      $sql .= "  JOIN tblterm on  tblterm.id=exam_test.term_ids ";
      $sql .= "  JOIN exam_srms on  exam_srms.exam_id=exam_test.exam_Id ";
      $sql .= "  WHERE tblstudents.RollId = :rollid AND exam_test.exam_Id = :exam_id ";
      $sql .= "AND exam_test.session_ids = :session AND exam_test.term_ids = :term and tblstudents.status = '1' ";
      $query = $dbh->prepare($sql);
      $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
      $query->bindParam(':session', $session_id, PDO::PARAM_STR);
      $query->bindParam(':exam_id', $classid, PDO::PARAM_STR);
      $query->bindParam(':term', $term_id, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $cnt = 1;
      if ($countrow = $query->rowCount() > 0) {
        foreach ($results as $result) :

      ?>

          <tr>
            <th scope="row" style="text-align: center"><?php echo htmlentities($cnt); ?></th>
            <td style="text-align: center"><?php echo htmlentities($result->SubjectName); ?></td>
            <td style="text-align: center"><?php echo htmlentities($test1 = $result->test_marks); ?></td>
            <td style="text-align: center"><?php echo htmlentities($test2 = $result->ca_test); ?></td>
            <td style="text-align: center"><?php echo htmlentities($test3 = $result->exam_marks); ?></td>
            <?php $sum = (int)($test1 + $test2 + $test3); ?>
            <td style="text-align: center"><?php echo htmlentities($sum); ?></td>
            <?php
            if ($sum <= 24) {
              $grade =   "V.Poor";
            } elseif ($sum <= 39) {
              $grade =   "poor";
            } elseif ($sum <= 44) {
              $grade =   "fail";
            } elseif ($sum <= 49) {
              $grade =   "Fair";
            } elseif ($sum <= 59) {
              $grade =   "Good";
            } elseif ($sum <= 69) {
              $grade =   "v.Good";
            } elseif ($sum <= 79) {
              $grade =   "v.Good";
            } else {
              $grade =  "Excellent";
            }


            ?>



            <td style="text-align: center"><?php echo htmlentities($grade); ?></td>
            <td style="text-align: center"><?php echo htmlentities(ceil($sum / 3)); ?></td>


          </tr>
        <?php
          $cnt++;
        endforeach;
      } else {
        ?>
        <div class="alert alert-warning left-icon-alert" role="alert">
          <strong>Notice!</strong> Your result has not declared yet
        <?php

      }
        ?>


    </table>
  </div>
  <div class="p-3 mx-auto my-3 text-center comment border border-secondary  home-about">
    <h5 style="text-decoration: underline;">Class Teacher's Comment </h5>
    <?php

    $sql = " SELECT * FROM exam_test  JOIN scores ON exam_test.result_id = scores.result_id ";
    $sql .= "  JOIN tblstudents on  tblstudents.StudentId=exam_test.StudentId ";
    $sql .= "  JOIN tblclasses on  tblclasses.id=exam_test.ClassId ";
    $sql .= "  JOIN tblsession on  tblsession.id=exam_test.session_ids ";
    $sql .= "  JOIN tblsubjects ON   scores.subject_id = tblsubjects.id ";
    $sql .= "  JOIN tblterm on  tblterm.id=exam_test.term_ids ";
    $sql .= "  JOIN exam_srms on  exam_srms.exam_id=exam_test.exam_Id ";
    $sql .= "  WHERE tblstudents.RollId = :rollid AND exam_test.exam_Id = :exam_id ";
    $sql .= " AND exam_test.session_ids = :session AND exam_test.term_ids = :term ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rollid', $rollid, PDO::PARAM_STR);
    $query->bindParam(':session', $session_id, PDO::PARAM_STR);
    $query->bindParam(':exam_id', $classid, PDO::PARAM_STR);
    $query->bindParam(':term', $term_id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetch(PDO::FETCH_ASSOC);
    ?>

    <p class="border-bottom border-secondary m-3  home-about"><b><?php //echo htmlentities($results['head_master'] ); 
                                                                  ?></b>.</p>
  </div>

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/jquery/jquery-ui.js"></script>
  <script defer src="assets/vendor/fontawesome-free-5.15.4-web/js/all.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
</body>

</html>