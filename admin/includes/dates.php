<?php session_start() ?>
    <?php include('config.php')   ?>
<?php

if (isset($_POST['submit'])) {

                    $id =  array();
                    $id = $_POST['id'];

                    $test_marks = array();
                    $exam_marks = array();
                    $ca_test = array();


                    $StudentId = $_POST['studentid'];
                    $classid = $_POST['classid'];
                    $term = $_POST['termid'];
                    $session = $_POST['sessionid'];


                    $Sql = " SELECT *  FROM exam_test WHERE StudentId = '$StudentId', ClassId = '$classid', term_ids = '$term', session_ids = '$session' ";
                    $Sql = $dbh->prepare($Sql);
                    $Sql->execute();

                    $update = " UPDATE exam_test SET  StudentId = ' $StudentId', ClassId = '$classid', term_ids = '$term', session_ids = '$session' WHERE result_id = '$id' ";
                    $update = $dbh->prepare($update);
                    $update->execute();


                    $marks_id = $_POST['mark_id'];
                    $test_marks = $_POST['test_marks'];
                    $ca_test = $_POST['ca_test'];
                    $exam_marks = $_POST['exam_marks'];




              for ($i = 0; $i < count($test_marks); $i++) {

                $test_marks_loop = $test_marks[$i];
                $exam_marks_loop = $exam_marks[$i];
                $ca_test_loop = $ca_test[$i];
                // $iid = $id[$i];

                $sql = " UPDATE scores SET exam_marks= '$exam_marks_loop', test_marks='$test_marks_loop',  ca_test= '$ca_test_loop' WHERE mark_id = '".$marks_id[$i]."'";
                $query = $dbh->prepare($sql);
                $ch =  $query->execute();

                if ($ch) {

                   $_SESSION['msg'] = "Updated Sucessfully";
                   header("Location: ../result.php");
                } else {

                    echo  'Wrong';
                }
            





    }
}
