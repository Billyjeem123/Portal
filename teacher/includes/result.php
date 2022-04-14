<?php session_start() ?>
<?php include('config.php'); ?>


<?php


if ($_POST["action"] == 'Add') {



    $test_marks = array();
    $exam_marks = array();
    $ca_test = array();
    $class = $_POST['class'];
    $studentid = $_POST['studentid'];
    $exam = $_POST['exam_id'];
    $session_idss = $_POST['session_idss'];
    $term_id = $_POST['term_ids'];
    $head_master = $_POST['head_master'];

    $insertQuery = $dbh->prepare(" INSERT INTO exam_test(StudentId, ClassId, exam_id, session_ids, term_ids, head_master)
        VALUES(:studentid, :class, :exam_id, :session_idss, :term_ids, :head_master) ");

    $insertQuery->execute([

        'studentid' => $studentid,
        'class' => $class,
        'exam_id' => $exam,
        'session_idss' => $session_idss,
        'term_ids' => $term_id,
        'head_master' => $head_master


    ]);

    $result_id = $dbh->lastInsertId();
    $test_marks = $_POST["test_marks"];
    $exam_marks = $_POST["exam_marks"];
    $ca_test = $_POST["ca_test"];
    $sid1 = array();
    $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName,tblsubjects.id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=:cid order by tblsubjects.SubjectName");
    $stmt->execute(array(':cid' => $class));
    $sid1 = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        array_push($sid1, $row['id']);
    }

    for ($i = 0; $i < count($test_marks); $i++) {
        $test_marks_loop = $test_marks[$i];
        $exam_marks_loop = $exam_marks[$i];
        $ca_test_loop = $ca_test[$i];
        $sid_loop = $sid1[$i];


        $insert = (" INSERT INTO scores(result_id, subject_id, exam_marks, test_marks, ca_test)  VALUES(:result_id, :cid, :exam_marks, :test_marks,  :ca_test)");
        $query = $dbh->prepare($insert);
        $query->bindParam(':result_id', $result_id, PDO::PARAM_STR);
        $query->bindParam(':cid', $sid_loop, PDO::PARAM_STR);
        $query->bindParam(':exam_marks', $exam_marks_loop, PDO::PARAM_STR);
        $query->bindParam(':test_marks', $test_marks_loop, PDO::PARAM_STR);
        $query->bindParam(':ca_test', $ca_test_loop, PDO::PARAM_STR);
        if ($query->execute()) {

            echo  1;
        } else {
            echo  0;
        }
    }
}









?>



<?php

if (isset($_POST["update"])) {
    // if (isset($_POST['id']) &&  $_POST['action'] == "update" ) {

    $id = $_POST['id'];
    $sessionid = $_POST['sessionid'];
    $sql = " UPDATE  tblsession SET session =:sessionid  where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sessionid', $sessionid, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    if ($query->execute()) {


        header('Location: ../session.php');
        $_SESSION['msg'] = 'Done';
    } else {

        echo 0;
    }
}
// }



?>

<?php
$msg = array();

if (isset($_POST['sessionid']) &&  $_POST['action'] == "insert") {


    $sessionid = htmlentities($_POST['sessionid']);

    $sql = "INSERT INTO tblsession (session) VALUES(:sessionid)";

    $query = $dbh->prepare($sql);

    $query->bindParam(':sessionid', $sessionid, PDO::PARAM_STR);

    $query->execute();

    $lastInsertIdsubject = $dbh->lastInsertId();

    if ($lastInsertIdsubject) {
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
    $sql = "SELECT * from tblsession where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($results as $result) { ?>

        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label " for="subjectname">Session:</label>
                <input type="hidden" class="form-control" name="id" value="<?php echo  $result->id ?>">

                <input type="text" id="sessionid" name="sessionid" class="form-control" value="<?php echo $result->session ?>">
            </div>
        </div>
        <br> <br>
        <br> <br>


        <div class="modal-footer">
            <button type="submit" id="<?php echo  $result->id ?>" name="update" class="update btn btn-default update">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
        </div>

        </form>



<?php

    }
}

?>






<?php


if (isset($_POST["action"])) {


    if ($_POST["action"] == "editId") {

        $resultId =  $_POST['id'];

        $sql = " SELECT * FROM  exam_test WHERE result_id = :id ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $resultId, PDO::PARAM_STR);
        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $row) {
            # code...

            $class_id = $row['ClassId'];
            $StudentId = $row['StudentId'];
            $exma_id  = $row['exam_Id'];
            $resultId = $row['result_id'];
            $term_ids = $row['term_ids'];
            $session_ids = $row['session_ids'];

?>
            <?php
            $Sql = " SELECT StudentId, StudentName From tblstudents WHERE ClassId = '" . $class_id . "' ";
            $query = $dbh->prepare($Sql);
            $query->execute();
            $StudentResult = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="form-group">
                <label for="date" class="control-label ">StudentName</label>
                <div class="col-sm-12">
                    <select name="studentid" id="studentid" class="form-control">
                        <?php
                        foreach ($StudentResult as $row) {
                            $classidsubject   =  $row['StudentId'];

                            if ($classidsubject == $StudentId) {



                                echo "<option selected value='{$row['StudentId']}'>{$row['StudentName']}</option>";
                            } else {


                                echo "<option value='{$row['StudentId']}'>{$row['StudentName']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>



            <?php
            $Sql = " SELECT *  FROM tblclasses    ";
            $query = $dbh->prepare($Sql);
            $query->execute();
            $StudentResult = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="form-group">
                <label for="date" class="control-label ">StudentClass</label>
                <div class="col-sm-12">
                    <select name="classid" id="classid" class="form-control">
                        <?php
                        foreach ($StudentResult as $row) {
                            $classidsubject   =  $row['id'];

                            if ($classidsubject == $class_id) {



                                echo "<option selected value='{$row['id']}'>{$row['ClassName']}</option>";
                            } else {


                                echo "<option value='{$row['id']}'>{$row['ClassName']}</option>";
                            }
                        ?>
                        <?php
                        } ?>
                    </select>
                </div>
            </div>



            <?php
            $Sql = " SELECT *  FROM tblterm   ";
            $query = $dbh->prepare($Sql);
            $query->execute();
            $StudentResult = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="form-group">
                <label for="date" class="control-label ">Specify Term</label>
                <div class="col-sm-12">
                    <select name="termid" id="termid" class="form-control">
                        <?php
                        foreach ($StudentResult as $row) {
                            $termid   =  $row['id'];

                            if ($termid == $term_ids) {



                                echo "<option selected value='{$row['id']}'>{$row['term']}</option>";
                            } else {


                                echo "<option value='{$row['id']}'>{$row['term']}</option>";
                            }
                        ?>
                        <?php
                        } ?>
                    </select>
                </div>
            </div>
            <?php
            $Sql = " SELECT *  FROM tblsession    ";
            $query = $dbh->prepare($Sql);
            $query->execute();
            $StudentResult = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="form-group">
                <label for="date" class="control-label ">Specify Session</label>
                <div class="col-sm-12">
                    <select name="sessionid" id="sessionid" class="form-control">
                        <?php
                        foreach ($StudentResult as $row) {
                            $sesson_lop   =  $row['id'];

                            if ($sesson_lop == $session_ids) {



                                echo "<option selected value='{$row['id']}'>{$row['session']}</option>";
                            } else {


                                echo "<option value='{$row['id']}'>{$row['session']}</option>";
                            }
                        ?>
                        <?php
                        } ?>
                    </select>
                </div>
            </div>

            <?php
            $result_final = "   SELECT  scores.subject_id, scores.mark_id, scores.exam_marks, scores.test_marks,  scores.ca_test,  ";
            $result_final .= " tblsubjects.SubjectName FROM scores INNER JOIN tblsubjects ON tblsubjects.id = scores.subject_id";
            $result_final .= "  WHERE scores.result_id =  '$resultId' ";
            $query = $dbh->prepare($result_final);
            $query->execute();
            $StudentResultFinals = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($StudentResultFinals as $rows) { ?>

                <div class="text-center align-items:center" style="font-size:25px;">
                    Exam Score For : <label for="default" class=""><?php echo htmlentities($rows->SubjectName) ?></label>
                </div>
                <input type="hidden" id="" name="mark_id[]" value="<?php echo $rows->mark_id ?>">

                <div class="form-group">
                    <label for="date" class=" control-label ">1st C.A Test</label>
                    <div class="col-sm-12">
                        <div class="">
                            <u>*******************<B>1ST C.A Test</B>********************************************</u>
                            <input type="number" name="test_marks[]" class="form-control" id="test_mark" value="<?php echo htmlentities($rows->test_marks) ?>" required="required" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date" class=" control-label ">2nd C.A Test</label>
                    <div class="col-sm-12">
                        <div class="">
                            <u>*******************<B>2ND C.A Test</B>********************************************</u>
                            <input type="number" name="ca_test[]" class="form-control" id="ca_test" value="<?php echo htmlentities($rows->ca_test) ?>" required="required" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date" class=" control-label ">Exam Score</label>
                    <div class="col-sm-12">
                        <div class="">
                            <u>*******************<B>Exam Score</B>********************************************</u>
                            <input type="number" name="exam_marks[]" class="form-control" id="exam_marks" value="<?php echo htmlentities($rows->exam_marks) ?>" required="required" autocomplete="off">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo $_POST['id']  ?>">


            <?php
            }
            ?>






<?php
        }
    }
}






?>