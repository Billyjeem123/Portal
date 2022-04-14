<?php 
 include('includes/config.php');

  if (!empty($_POST['classname'])) {

  	$username = $_POST['classname'];

  	$sql = "SELECT * FROM tblclasses WHERE ClassName = '$username'   ";
      $query = $dbh->prepare($sql);
      $query->execute();
      if($query->rowCount() > 0)
      {
      echo "Class Already Exists";	
      echo "<script>$('#class').prop('disabled',true);</script>";
    }else{
       echo "<script>$('#class').prop('disabled',false);</script>";
    }
    exit();
}
 
if (!empty($_POST['subjectname'])) {

  $subname = $_POST['subjectname'];

  $sql = "SELECT * FROM tblsubjects WHERE SubjectName = '$subname'   ";
    $query = $dbh->prepare($sql);
    $query->execute();
    if($query->rowCount() > 0)
    {
    echo "Subject Already Exists";	
    echo "<script>$('#subname').prop('disabled',true);</script>";
  }else{
     echo "<script>$('#subname').prop('disabled',false);</script>";
  }
  exit();
}


?>

<?php
 
if (!empty($_POST['rollid'])) {

  $rollid = $_POST['rollid'];

  $sql = "SELECT * FROM tblstudents WHERE Rollid = '$rollid'   ";
    $query = $dbh->prepare($sql);
    $query->execute();
    if($query->rowCount() > 0)
    {
    echo "Rollid Already Exists";	
     echo "<script>$('#submit').prop('disabled',true);</script>";
  }else{
     echo "<span  style='color:green;font-size:12px';  >Rollid Available To Use</span>";
     echo "<script>$('#submit').prop('disabled',false);</script>";
  }
  exit();
}


?>

<?php
 
if (!empty($_POST['studentname'])) {

  $subname = $_POST['studentname'];

  $sql = "SELECT * FROM tblstudents WHERE studentname = '$subname'   ";
    $query = $dbh->prepare($sql);
    $query->execute();
    if($query->rowCount() > 0)
    {
    echo "Student Name Already Exists";	
  }else{
  }
  exit();
}


?>

<?php
 
if (!empty($_POST['Name'])) {

  $subnameteacher = $_POST['Name'];

  $sql = "SELECT * FROM tblteacher WHERE name = '$subnameteacher'   ";
    $query = $dbh->prepare($sql);
    $query->execute();
    if($query->rowCount() > 0)
    {
    echo "Teacher's Name Already Exists";	
  }else{
  }
  exit();
}


?>



<?php
 
if (!empty($_POST['Exam_name'])) {

  $subnameteacherexam = $_POST['Exam_name'];

  $sql = "SELECT * FROM exam_srms WHERE exam_name = '$subnameteacherexam'"; 
    $query = $dbh->prepare($sql);
    $query->execute();
    if($query->rowCount() > 0)
    {
    echo "Examname already exists";	
  }else{
  }
  exit();
}


?>
<?php
 
 if (!empty($_POST['sessionid'])) {
 
   $session = $_POST['sessionid'];
 
   $sql = "SELECT * FROM tblsession WHERE session = '$session'   ";
     $query = $dbh->prepare($sql);
     $query->execute();
     if($query->rowCount() > 0)
     {
     echo "Session Already Exists";	
   }else{
   }
   exit();
 }
 
 
 ?>
 <?php
 
 if (!empty($_POST['termid'])) {
 
   $session_term = $_POST['termid'];
 
   $sql = "SELECT * FROM tblterm WHERE term = '$session_term'   ";
     $query = $dbh->prepare($sql);
     $query->execute();
     if($query->rowCount() > 0)
     {
     echo "Term Already Exists Choose another";	
   }else{

   }
   exit();
 }
 
 
 ?>
  <?php
 
 if (!empty($_POST['testid'])) {
 
   $testbtn = $_POST['testid'];
 
   $sql = "SELECT * FROM tbltest WHERE test = '$testbtn'   ";
     $query = $dbh->prepare($sql);
     $query->execute();
     if($query->rowCount() > 0)
     {
     echo "Test Name  Exist Choose another";	
   }else{
   }
   exit();
 }
 
 
 ?>

 