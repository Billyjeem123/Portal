<?php session_start() ?>
<?php include('config.php'); ?>
<?php

if (isset($_POST["update"])) {

    $id = $_POST['id'];
    $subjectname = $_POST['subjectname'];
    $subjectcode = $_POST['subjectcode'];
    $sql = " UPDATE  tblsubjects set SubjectName=:subjectname,SubjectCode=:subjectcode where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
    $query->bindParam(':subjectcode', $subjectcode, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    if ($query->execute()) {


        header('Location: ../subject.php');
        $_SESSION['msg'] = 'Done';
    } else {

        echo 0;
    }
}
// }



?>

<?php
$msg = array();

if ($_POST['action'] == "insert") {
    $subjectname = $_POST['subjectname'];
    $subjectcode = htmlentities($_POST['subjectcode']);
    $sqlsubject = "INSERT INTO  tblsubjects(SubjectName,SubjectCode) VALUES(:subjectname,:subjectcode)";
    $querysub = $dbh->prepare($sqlsubject);
    $querysub->bindParam(':subjectname', $subjectname, PDO::PARAM_STR);
    $querysub->bindParam(':subjectcode', $subjectcode, PDO::PARAM_STR);
    $querysub->execute();
    $lastInsertIdsubject = $dbh->lastInsertId();
    if ($lastInsertIdsubject) {
      echo  1;
    } else {
      echo  0;
    }

    // echo json_encode($msg);
}


?>




<?php



if ($_POST['action'] == "edit") {
    $id = $_POST['id'];
    $sql = "SELECT * from tblsubjects where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($results as $result) { ?>

        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label " for="subjectname">Subject-Name:</label>
                <input type="hidden" class="form-control" name="id" value="<?php echo  $result->id ?>">

                <input type="text" id="subjectname" name="subjectname" class="form-control" value="<?php echo $result->SubjectName ?>">
            </div>
        </div>
        <br> <br>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label" for="subjectcode">Subject-Code:</label>
                <input type="text" id="subjectcode" name="subjectcode" class="form-control" value="<?php echo $result->SubjectCode ?>">
            </div>
        </div>

        <br> <br>
     

        <div class="modal-footer">
            <button type="submit" id="<?php echo  $result->id ?>" name="update" class="update btn btn-info update">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
        </div>

        </form>



<?php

    }
}

?>

<?php
// $subjects = array();
if ($_POST['action'] == "insert_combo") {
    $class = ($_POST['classes']);
    $subjects = ($_POST['subject']);
    $status = 1;

    foreach($subjects as $value) {

        $sql = " INSERT INTO  tblsubjectcombination(ClassId, SubjectId, status) VALUES(:classes,:subject,:status) ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':classes', $class, PDO::PARAM_STR);
        $query->bindParam(':subject', $value, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        $lastInsertIdsubject = $dbh->lastInsertId();
        if ($lastInsertIdsubject) {
            $msg = 1;
        } else {
            $msg = 0;
        }

        echo ($msg);
    }
}

?>


<?php
$msg = array();

if ($_POST['action'] == "fetchSubcombo") {



    $sql = " SELECT tblclasses.ClassName,tblsubjects.SubjectName,tblsubjectcombination.id as 
        scid,tblsubjectcombination.status from tblsubjectcombination join tblclasses on 
        tblclasses.id=tblsubjectcombination.ClassId  join 
        tblsubjects on tblsubjects.id=tblsubjectcombination.SubjectId ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($results as $result) {
        $id =  $result->scid;
?>
        <tr>
            <td><?php echo htmlentities($result->ClassName); ?></td>
            <td><?php echo htmlentities($result->SubjectName); ?></td>
            <td><?php $stts = $result->status;
                if ($stts == '0') {
                   echo "<p style='color:red'>Subject Deactivated</p>";
                } else {
                    echo htmlentities('Subject Activated');
                }
                ?></td>
            <td>
                <?php if ($stts == '0') {

                ?>
            <td>
                <button type="button" onclick="Activate(this)" class="btn btn-secondary" id='<?= $id; ?>'>
                    <i class="fa fa-check" title="Activate Record"></i>
                </button>
            </td>
        <?php } else { ?>


            <button type="button" onclick="Dectivate(this)" class="btn btn-secondary" id='<?= $id; ?>'>
                <i class="fa fa-times" title="Deactivate Record"></i>
            </button>
        <?php } ?>
        </td>


        </tr>

<?php }
}


?>