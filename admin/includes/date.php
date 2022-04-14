<?php session_start() ?>
<?php include 'config.php'; ?>




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