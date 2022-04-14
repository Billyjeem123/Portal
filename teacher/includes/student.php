<?php
include 'config.php';


if (!empty($_POST['email'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    //  $password= $_POST['password'];
    $post_image = ($_FILES['photo']['name']);
    $filetype = ($_FILES['photo']['type']);
    $fileSize = ($_FILES['photo']['size']);
    $fileTmp = ($_FILES['photo']['tmp_name']);
    $file_store = "../upload/" . $post_image;
    $stid  = $_POST['id'];
    $role = $_POST['role'];
    move_uploaded_file($fileTmp, $file_store);

    if (empty($post_image)) {

        $image_syntax = " SELECT * FROM tblteacher WHERE teacher_id = :id ";
        $sql = $dbh->prepare($image_syntax);
        $sql->bindParam(':id', $stid, PDO::PARAM_STR);
        $sql->execute();
        while ($results = $sql->fetch(PDO::FETCH_ASSOC)) {
            $post_image = $results['image'];
        }
    }
    // if(!empty($password)) { 

    //   $query_password = "SELECT password FROM tblteacher WHERE teacher_id =  :stid ";
    //   $sql = $dbh->prepare($query_password);
    //   $sql->bindParam(':stid',$stid,PDO::PARAM_STR);
    //   $sql->execute();
    //   while($results=$sql->fetch(PDO::FETCH_ASSOC)){

    // $db_user_password = $results['password'];

    // if($db_user_password != $password) {

    // $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    // }
    // }
    // }

    $sql = " UPDATE  tblteacher SET name = :name, email=:email, image=:photo, gender=:gender, role=:role  WHERE teacher_id=:id ";
    $query = $dbh->prepare($sql);
    $query->bindParam('name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':photo', $post_image, PDO::PARAM_STR);
    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    $query->bindParam(':id', $stid, PDO::PARAM_STR);
    $dim = $query->execute();
    if ($dim) {

        echo "yeah";
    } else {

        echo "nope";
    }
}



if (!empty($_POST['studentname'])) {
    // if(!empty($_POST['id'] &&  $_POST['action'] == "update")) {


    $id = $_POST['id'];
    $studentname = $_POST['studentname'];
    $roolid = $_POST['roolid'];
    $term_ids = $_POST['termid'];
    $session = $_POST['sessionid'];
    $gender = $_POST['gender'];
    $classid = $_POST['classid'];
    $dob = $_POST['dob'];
    $post_image = ($_FILES['photo']['name']);
    $filetype = ($_FILES['photo']['type']);
    $fileSize = ($_FILES['photo']['size']);
    $fileTmp = ($_FILES['photo']['tmp_name']);
    $file_store = "../upload/" . $post_image;
    $status = $_POST['status'];
    move_uploaded_file($fileTmp, $file_store);

    if (empty($post_image)) {

        $image_syntax = " SELECT * FROM tblstudents WHERE StudentId = :id ";
        $sql = $dbh->prepare($image_syntax);
        $sql->bindParam(':id', $id, PDO::PARAM_STR);
        $sql->execute();
        while ($results = $sql->fetch(PDO::FETCH_ASSOC)) {
            $post_image = $results['image'];
        }
    }


    $Sql = " SELECT *  FROM tblstudents WHERE StudentName = '$studentname', ClassId = '$classid', term_id = '$term_ids', session_ids = '$session',  RollId = '$roolid', ";
    $Sql .=  " Gender= '$gender', Status= '$status',  DOB = '$dob',  image='$post_image' ";
    $Sql = $dbh->prepare($Sql);
    $Sql->execute();


    $update = " UPDATE tblstudents SET  StudentName = '$studentname', ClassId = '$classid', term_id = '$term_ids', session_ids = '$session',  RollId = '$roolid', ";
    $update .= " Gender= '$gender', Status= '$status',  DOB = '$dob',  image='$post_image' ";
    $update .=  " WHERE StudentId = '$id' ";
    $update = $dbh->prepare($update);
    if ($update->execute()) {
        echo 1;
    } else {

        echo 0;
    }
}
?>







<?php


if (isset($_POST['action'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM tblstudents  where StudentId=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        # code...

        $StudentId = $row['StudentId'];
        $StudentName = $row['StudentName'];
        $ClassId  = $row['ClassId'];
        $term_ids = $row['term_id'];
        $session_ids = $row['session_ids'];
        $RollId = $row['RollId'];
        $Gender = $row['Gender'];
        $status = $row['Status'];
        $image = $row['image'];

?>

        <fieldset>

            <div class="container" style="width:100%">

                <div class="form-group mt-4   ">
                    <label for="date" class="  control-label ">StudentName</label>
                    <div class="col-sm-12">
                        <input type="hidden" class="form-control" name="id" value="<?php echo  $StudentId ?>">

                        <input type="text" name="studentname" class="form-control" value="<?php echo $StudentName ?>">
                    </div>
                </div>

                <div class="form-group mt-4 ">
                    <label for="date" class="  control-label ">RollId</label>
                    <div class="col-sm-12">

                        <input type="text" name="roolid" class="form-control" value="<?php echo htmlentities($row['RollId']) ?>" onInput="checkRollid()" id="rollid">
                    </div>
                </div>

                <div class="form-group mt-4   ">
                    <label for="date" class="  control-label ">D.O.B</label>
                    <div class="col-sm-12">
                        <input type="date" name="dob" class="form-control" value="<?php echo htmlentities($row['DOB']) ?>" id="dob">
                    </div>
                </div>


                <?php
                $Sql = " SELECT *  FROM tblclasses    ";
                $query = $dbh->prepare($Sql);
                $query->execute();
                $StudentResult = $query->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="form-group mt-4">
                    <label for="date" class="  control-label ">Student-Class</label>
                    <div class="col-sm-12">
                        <select name="classid" id="classid" class="form-control">
                            <?php
                            foreach ($StudentResult as $row) {
                                $classidsubject   =  $row['id'];

                                if ($classidsubject == $ClassId) {


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
                    <label for="date" class=" control-label ">Specify Term</label>
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
                    <label for="date" class=" control-label ">Specify Session</label>
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

                <div class="form-group">
                    <label for="date" class=" control-label ">Gender</label>
                    <?php $gndr = $Gender;
                    if ($gndr == "Male") {
                    ?>
                        <input type="radio" name="gender" value="Male" required="required" checked>Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
                    <?php } ?>
                    <?php
                    if ($gndr == "Female") {
                    ?>
                        <input type="radio" name="gender" value="Male" required="required">Male <input type="radio" name="gender" value="Female" required="required" checked>Female <input type="radio" name="gender" value="Other" required="required">Other
                    <?php } ?>
                    <?php
                    if ($gndr == "Other") {
                    ?>
                        <input type="radio" name="gender" value="Male" required="required">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required" checked>Other
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label for="date" class=" control-label ">Status</label>
                    <?php $stats = $status;
                    if ($stats == "1") {
                    ?>
                        <input type="radio" name="status" value="1" required="required" checked>Active <input type="radio" name="status" value="0" required="required">Block
                    <?php } ?>
                    <?php
                    if ($stats == "0") {
                    ?>
                        <input type="radio" name="status" value="1" required="required">Active <input type="radio" name="status" value="0" required="required" checked>Block
                    <?php } ?>
                </div>


                <div class="form-group">
                    <label for="date" class=" control-label ">Status</label>
                    <input type="file" name="photo" id="photo">
                    <?php

                    if (empty($image)) { ?>

                        <a class="" href="#"><img src="upload/holder.jpg" alt="" width="50px"></a>
                    <?php  } else { ?>

                        <a class="" href="#"><img src="upload/<?php echo $image; ?>" width="50px" alt=""></a>

                </div>
            <?php  } ?>
            </div>



            <div class="modal-footer">
                <!--<input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form">-->
                <button type="submit" class=' btn btn-success update  title-input' rel='<?php echo $StudentId ?>' id="data<?php echo  $StudentId ?>" name="update">Update</button>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>




            </div>
        </fieldset>


<?php
    }
}
?>