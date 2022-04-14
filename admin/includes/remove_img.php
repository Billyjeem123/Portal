<?php session_start() ?>
<?php  ob_start() ?>
<?php include 'config.php'; ?>


<?php

$id = $_GET['id'];
$sql = " DELETE FROM tblimage WHERE id = :id ";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
if($query->execute()){
  
  // unlink("../upload/".$id);
  echo "yeah";
}else{

  echo "nope";
}


?>
