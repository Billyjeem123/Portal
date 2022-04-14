<?php
include('includes/config.php');

//codeforclass
if (!empty($_POST["classid"])) {
    $cid = intval($_POST['classid']);
    if (!is_numeric($cid)) {

        echo htmlentities("invalid Class");
        exit;
    } else {
        $stmt = $dbh->prepare("SELECT StudentName,StudentId FROM tblstudents WHERE ClassId= :id order by StudentName");
        $stmt->execute(array(':id' => $cid));
?><option value="">Select Class </option><?php
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
            <option value="<?php echo htmlentities($row['StudentId']); ?>"><?php echo htmlentities($row['StudentName']); ?></option>
        <?php
                                            }
                                        }
                                    }


                                    //code for exam;

                                    if (!empty($_POST["exam_id"])) {
                                        $eid = intval($_POST['exam_id']);
                                        if (!is_numeric($eid)) {

                                            echo htmlentities("Exam does not exist");
                                            exit;
                                        } else {

                                            $stmt = $dbh->prepare("SELECT *  FROM exam_srms");
                                            $stmt->execute(array(':eid' => $eid));
        ?><option value="">Select Exam</option><?php
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
            <option value="<?php echo htmlentities($row['exam_id']); ?>"><?php echo htmlentities($row['exam_name']); ?></option>
        <?php
                                            }
                                        }
                                    }


                                    //code for session result;

                                    if (!empty($_POST["session_idss"])) {
                                        $sid = intval($_POST['session_idss']);
                                        if (!is_numeric($sid)) {

                                            echo htmlentities("session_id does not exist");
                                            exit;
                                        } else {

                                            $stmt = $dbh->prepare("SELECT *  FROM tblsession");
                                            $stmt->execute(array(':sid' => $sid));
        ?><option value="">Select session</option><?php
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
            <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['session']); ?></option>
        <?php
                                            }
                                        }
                                    }

                                    //code for session result;

                                    if (!empty($_POST["term_ids"])) {
                                        $tid = intval($_POST['term_ids']);
                                        if (!is_numeric($tid)) {

                                            echo htmlentities("Term does not exist");
                                            exit;
                                        } else {

                                            $stmt = $dbh->prepare("SELECT *  FROM tblterm");
                                            $stmt->execute(array(':tid' => $tid));
        ?><option value="">Select Exam</option><?php
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
            <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['term']); ?></option>
        <?php
                                            }
                                        }
                                    }





                                    //code for exam;;
                                    // Code for Subjects
                                    if (!empty($_POST["classid1"])) {
                                        $cid1 = intval($_POST['classid1']);
                                        if (!is_numeric($cid1)) {

                                            echo htmlentities("invalid Class");
                                            exit;
                                        } else {
                                            $status = 0;
                                            $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName,tblsubjects.id 
FROM tblsubjectcombination join
tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE 
tblsubjectcombination.ClassId=:cid 
and tblsubjectcombination.status!=:stts
order by tblsubjects.SubjectName");
                                            $stmt->execute(array(':cid' => $cid1, ':stts' => $status));

                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <div><b>1st C.A Test</div></b><input type="text" name="test_marks[]" value="" id="subject" class="form-control" placeholder="Enter Score" autocomplete="off">
            <div><b>2nd C.A Test</div></b><input type="text" name="ca_test[]" value="" id="subject" class="form-control" placeholder="Enter Score" autocomplete="off">
            <b>Subject Examination For <?php echo htmlentities($row['SubjectName']); ?></b><input id="subject" type="text" name="exam_marks[]" value="" class="form-control" placeholder=" Score" autocomplete="off">
            <br>
        <?php  }
                                        }
                                    }





                                    if (!empty($_POST["studclassexamsesterm"])) {
                                        $id = $_POST['studclassexamsesterm'];
                                        $dta = explode("$", $id);
                                        $id = $dta[0];
                                        $id1 = $dta[1];
                                        $id2 = $dta[2];
                                        $id3 = $dta[3];
                                        $id4 = $dta[4];
                                        $query = $dbh->prepare(" SELECT StudentId,ClassId, exam_id, session_ids, term_ids FROM exam_test WHERE StudentId=:id1 and ClassId=:id and exam_Id=:id2 and session_ids=:id3 and term_ids=:id4 ");
                                        $query->bindParam(':id1', $id1, PDO::PARAM_STR);
                                        $query->bindParam(':id', $id, PDO::PARAM_STR);
                                        $query->bindParam(':id2', $id2, PDO::PARAM_STR);
                                        $query->bindParam(':id3', $id3, PDO::PARAM_STR);
                                        $query->bindParam(':id4', $id4, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) { ?>

        <script>
            swal({
                title: "Result Already Declared",
                type: "success",
                confirmButtonClass: "btn-success",
                closeModal: false
            });
        </script>

<?php }
                                    }
?>