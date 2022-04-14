<?php
include("includes/config.php");
error_reporting(-1);
?>

<?php




  $id = $_GET['id'];
  $type =  $_GET['type'];
  if (!empty($id) && $type == 'delresult') {

    $sql = " DELETE  FROM exam_test WHERE result_id  = '$id ' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    if ($query) {
      $sql = " DELETE  FROM scores WHERE result_id  = '$id ' ";
      $query = $dbh->prepare($sql);
      $query->execute();
      echo 1;
      exit;
    } else {
      echo 0;
      exit;
    }
  }



$id = $_GET['id'];
$type =  $_GET['type'];
if (!empty($id) && $type == 'delclass') {

  $sql = "DELETE  FROM tblclasses WHERE id  = '$id ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}

?>


<?php



$id = $_GET['id'];
$type =  $_GET['type'];
if (!empty($id) && $type == 'subject') {

  $sql = "DELETE  FROM tblsubjects WHERE id  = '$id ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}

?>

<?php
$idsubcombos = $_GET['id'];
$type =  $_GET['type'];
if (!empty($idsubcombos) && $type == 'delstudent') {
  $sql = " DELETE  FROM tblstudents WHERE StudentId  = '$idsubcombos ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}

?>
<?php
$delexam = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delexam) && $type == 'delexam') {
  $sql = "DELETE  FROM exam_srms WHERE exam_id  = '$delexam ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}

?>
<?php
$delterm = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delterm) && $type == 'delterm') {
  $sql = "DELETE  FROM tblterm WHERE id  = '$delterm ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}

?>
<?php
$delsession = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delsession) && $type == 'delsession') {
  $sql = "DELETE  FROM tblsession WHERE id  = '$delsession ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}

?>


<?php
$delteacher = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delteacher) && $type == 'delteacher') {
  $sql = "DELETE  FROM tblteacher WHERE teacher_id  = '$delteacher ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}
?>







<?php
$delabout = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delabout) && $type == 'delabout') {
  $sql = "DELETE  FROM about WHERE id  = '$delabout '";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}
?>
<?php
$delgenda = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delgenda) && $type == 'delgenda') {
  $sql = "DELETE  FROM agenda WHERE id  = '$delgenda '";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}
?>
<?php
$delcorriculum = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delcorriculum) && $type == 'delcorriculum') {
  $sql = "DELETE  FROM corriculum WHERE id  = '$delcorriculum '";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}
?>

<?php
$delprog = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delprog) && $type == 'delprog') {
  $sql = "DELETE  FROM programme WHERE id  = '$delprog '";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}
?>
<?php
$delevent = $_GET['id'];
$type =  $_GET['type'];
if (!empty($delevent) && $type == 'delevent') {
  $sql = "DELETE  FROM tblevent WHERE id  = '$delevent ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}

?>




<?php
$shakes = $_GET['id'];
$type =  $_GET['type'];
if (!empty($shakes) && $type == 'deleteimages') {

  $file_path = 'upload/' . $_POST["photo"];
  if ($file_path) {
    unlink($file_path);
    $sqlas = "UPDATE  tblevent SET photo = '' WHERE id   =  '$shakes' ";
    $querys = $dbh->prepare($sqlas);
    $querys->execute();
  }
}

?>
<?php
$idsubcombosd = $_GET['id'];
$type =  $_GET['type'];
if (!empty($idsubcombosd) && $type == 'delsubcombo') {
  $sql = "DELETE  FROM tblsubjectcombination WHERE id  = '$idsubcombos ' ";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}

?>

<?php
$deltest = $_GET['id'];
$type =  $_GET['type'];
if (!empty($deltest) && $type == 'deltest') {
  $sql = "DELETE  FROM tbltest WHERE id  = '$deltest '";
  $query = $dbh->prepare($sql);
  $query->execute();
  if ($query) {
    echo 1;
    exit;
  } else {
    echo 0;
    exit;
  }
}
?>


<?php
$deactivateSubject = $_GET['id'];
$type =  $_GET['type'];
if (!empty($deactivateSubject) && $type == 'deactivateSubject') {

  $deactivateSubject = ($_GET['id']);
  $status = 0;
  $sql = "update tblsubjectcombination set status=:status where id=:id ";
  $query = $dbh->prepare($sql);
  $query->bindParam(':id', $deactivateSubject, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  echo "<p style='color:red;' class='text-center'>Subject Deactivated</p>";
}

?>

<?php
$ActivateRecord = $_GET['id'];
$type =  $_GET['type'];
if (!empty($ActivateRecord) && $type == 'ActivateRecord') {

  $did = intval($_GET['id']);
  $status = 1;
  $sql = " UPDATE tblsubjectcombination set status=:status where id=:id ";
  $query = $dbh->prepare($sql);
  $query->bindParam(':id', $ActivateRecord, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  echo "Subject Activated successfully";
}

?>