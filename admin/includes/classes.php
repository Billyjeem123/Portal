
<?php session_start() ?>
<?php include 'config.php'; ?>




<?php

if (isset($_POST['update'])) {

    $id = ($_POST['id']);

    $classname = htmlentities($_POST['classname']);

    $sql = "UPDATE  tblclasses set ClassName=:classname  where id=:id ";

    $query = $dbh->prepare($sql);

    $query->bindParam(':classname', $classname, PDO::PARAM_STR);

    $query->bindParam(':id', $id, PDO::PARAM_STR);

    $query->execute();

    header('Location: ../class.php');

    $_SESSION['msg'] = 'Record Updated';

    exit();
}


?>
<?php

$msg = array();

if (isset($_POST['classname']) &&  $_POST['action'] == "insert") {
    $classname = htmlentities($_POST['classname']);

    $sql = "INSERT INTO  tblclasses(ClassName) VALUES(:classname)";

    $query = $dbh->prepare($sql);

    $query->bindParam(':classname', $classname, PDO::PARAM_STR);

    $query->execute();

    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = 1;
    } else {
        $msg = 0;
    }

    echo json_encode($msg);
}
?>









<?php



if ($_POST['action'] == "edit") {
    $id = $_POST['id'];
    $sql = "SELECT * from tblclasses where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($results as $result) { ?>

        <div class="form-group">
            <label for="sub" class="cols-sm-2 control-label">Class</label>
            <div class="cols-sm-12">
                <div class="input-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo  $result->id ?>">

                    <input class="form-control"  type="text" id="classname" name="classname" value="<?php echo $result->ClassName ?>">
                    <span id="feedback" class="" style='color:red;font-size:12px;font-weight:bold' ;></span>
                </div>
            </div>
        </div>
        </div>


        <div class="modal-footer">
            <button type="submit" id="<?php echo  $result->id ?>" name="update" class="update btn btn-primary update">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </form>



<?php

    }
}

?>

<?php
if ($_POST['action'] == "Delete_Result") {


  if (isset($_POST['Category'])) {


    $employee_to_delete = ($_POST['Category']);

    foreach ($_POST['Category'] as $value) {

      $sql = "  DELETE FROM exam_test WHERE  result_id = '$value'  ";
      $query = $dbh->prepare($sql);
      if($query->execute()){


        echo 1;

      }else{


          echo 0;
      }
    }
  }
}

?>