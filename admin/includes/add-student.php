<?php session_start() ?>
<?php  include('config.php')?>


<?php

if (isset($_POST['updatethis'])) {

    $id = ($_POST['id']);

    $classname = htmlentities($_POST['classname']);

    $sql = "UPDATE  tblclasses set ClassName=:classname  where id=:id ";

    $query = $dbh->prepare($sql);

    $query->bindParam(':classname', $classname, PDO::PARAM_STR);

    $query->bindParam(':id', $id, PDO::PARAM_STR);

    $confirm = $query->execute();

    if($confirm){

        echo "ok";
    }

    // header('Location: ../classes.php');

    // $_SESSION['msg'] = 'Data has been updated successfully';

    exit();
}


?>


<?php
if (isset($_POST['name'])) {


    $name = $_POST['name'];
    $number = $_POST['email'];
    $gender = $_POST['gender'];
    $class = $_POST['ClassId'];
    $post_image = ($_FILES['image']['name']);
    $filetype = ($_FILES['image']['type']);
    $fileSize = ($_FILES['image']['size']);
    $fileTmp = ($_FILES['image']['tmp_name']);
    $file_store = "../upload/$post_image";

    $password = $_POST['password'];
    $number = $_POST['email'];
    $date = $_POST['date'];
    $role = $_POST['role'];
    move_uploaded_file($fileTmp, $file_store);
    $insertQuery = $dbh->prepare("INSERT INTO tblteacher(name, email, gender, ClassId, password, date, role, image) 
   VALUES(:name, :email, :gender, :ClassId, :password, :date, :role, :image) ");

    $insertQuery->execute([

        'name' => $name,
        'email' => $number,
        'gender' => $gender,
        'ClassId' => $class,
        'password' => password_hash($password, PASSWORD_BCRYPT, [12]),
        'date' => $date,
        'role' => $role,
        'image' => $post_image


    ]);

    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo 1;
    } else {

        echo 0;
    }
}

?>


<?php

if (isset($_POST['dob'])) {
  $studentname = htmlentities($_POST['studentname']);
  $roolid = htmlentities($_POST['rollid']);
  $gender = htmlentities($_POST['gender']);
  $classid = htmlentities($_POST['class']);
  $dob = htmlentities($_POST['dob']);

  //image-uploading
  // $file_nage
  $post_image = ($_FILES['image']['name']);
  $filetype = ($_FILES['image']['type']);
  $fileSize = ($_FILES['image']['size']);
  $fileTmp = ($_FILES['image']['tmp_name']);
  $file_store = "../upload/$post_image";


  //image -uploading
  $status = 1;
  $session_id = htmlentities($_POST['session_idss']);
  $term_id = htmlentities($_POST['term_ids']);


  move_uploaded_file($fileTmp, $file_store);
  $sql = "INSERT INTO  tblstudents(StudentName,RollId,image,Gender,ClassId,DOB,Status,session_ids,term_id) VALUES(:studentname,:roolid, :image, :gender,:classid,:dob,:status,:session_idss,:term_ids)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':studentname', $studentname, PDO::PARAM_STR);
  $query->bindParam(':roolid', $roolid, PDO::PARAM_STR);
  $query->bindParam(':image', $post_image, PDO::PARAM_STR);
  $query->bindParam(':gender', $gender, PDO::PARAM_STR);
  $query->bindParam(':classid', $classid, PDO::PARAM_STR);
  $query->bindParam(':dob', $dob, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->bindParam(':session_idss', $session_id, PDO::PARAM_STR);
  $query->bindParam(':term_ids', $term_id, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    // echo "Student info added successfully";
     echo 1;
  } else {
    //  echo "Something went wrong. Please try again";
   echo  0;
  }
}

?>
