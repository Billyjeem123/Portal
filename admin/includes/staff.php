<?php   session_start() ?>
<?php
include 'config.php';



if (isset($_POST['update'])) {

    $id = ($_POST['id']);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    //  $password= $_POST['password'];
    $post_image = ($_FILES['photo']['name']);
    $filetype = ($_FILES['photo']['type']);
    $fileSize = ($_FILES['photo']['size']);
    $fileTmp = ($_FILES['photo']['tmp_name']);
    $file_store = "upload/" . $post_image;
    $role = $_POST['role'];
    move_uploaded_file($fileTmp, $file_store);

    if (empty($post_image)) {

        $image_syntax = " SELECT * FROM tblteacher WHERE teacher_id = :id ";
        $sql = $dbh->prepare($image_syntax);
        $sql->bindParam(':id', $id, PDO::PARAM_STR);
        $sql->execute();
        while ($results = $sql->fetch(PDO::FETCH_ASSOC)) {
            $post_image = $results['image'];
        }
    }


    $sql = " UPDATE  tblteacher SET name = :name, email=:email, image=:photo, gender=:gender, role=:role  WHERE teacher_id=:id ";
    $query = $dbh->prepare($sql);
    $query->bindParam('name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':photo', $post_image, PDO::PARAM_STR);
    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $confirm = $query->execute();

    if ($confirm) {

        echo "ok";
        header('Location: ../staff.php');

        $_SESSION['msg'] = 'Done';

        exit();
    }
}










if (isset($_POST["action"])) {
    if ($_POST["action"] == "edit") {
        $id = $_POST['id'];

        $sql = "SELECT * FROM tblteacher   where teacher_id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) {  ?>
                <div class="container" style="width:100%">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="file" name="photo" id="photo">
                                <?php

                                if (empty($result->image)) { ?>

                                    <a class="thumbnail" width="50px;" height="400px" href="#"><img src="upload/holder.jpg" alt="s"></a>
                                <?php  } else { ?>

                                    <a class="thumbnail" href="#"><img src="upload/<?php echo $result->image; ?>" width="" alt="f"></a>

                                    <!-- </div> -->
                                <?php  } ?>

                            </div>

                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="default" class="">Full Name</label>
                                <div class="">
                                    <input type="text" name="name" class="form-control" value="<?php echo $result->name ?>">
                                </div>
                            </div>





                            <div class="form-group">
                                <label for="default" class="">Email</label>
                                <div class="">
                                    <input type="text" name="email" class="form-control" id="email" value="<?php echo htmlentities($result->email) ?>" maxlength="5" required="required" autocomplete="off">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="default" class="" id="gender">Gender</label>
                                <div class="">
                                    <?php $gndr = $result->gender;
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
                            </div>





                            <div class="form-group">
                                <label for="date" class="">Registration Date</label>
                                <div class="">
                                    <input type="date" value=" <?php echo $result->date ?>" name="date" class="form-control" id="date">
                                </div>
                            </div>

                            <div class="form-group" class="">
                                <label for="default" class=" " id="gender">Role</label>
                                <div class="  ">
                                    <select name="role" id="" class="form-control" value=" <?php echo $result->role ?>">

                                    <?php

                                    if($result->role == "admin"){


                                        echo "<option value='admin'>Admin</option>";
                                    }else{


                                        echo "<option value='teacher'>Teacher</option>";
                                    }




                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo  $result->teacher_id ?>" id="<?php echo  $result->teacher_id ?>">
                        <button type="submit" class=' btn btn-success update  title-input' rel='<?php echo $result->teacher_id ?>' id="data<?php echo  $result->teacher_id ?>" name="update">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>


                </div>

<?php }
        }
    }
}
?>

<?php
$output = "";

if (isset($_POST["action"])) {
    if ($_POST["action"] == "fetchAndAssign") {
        $sql = "SELECT * FROM  tblclasses  join tblteacher on tblclasses.id = tblteacher.ClassId ";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($results as $result) {
            $id = $result->teacher_id;
            $output .= '

            <input type="hidden" name="id"   id=  value=' . $result->teacher_id  . '  style="border:0px" readonly>
            <tr>
            <td><input type="checkbox"     data-emp-id='. $result->teacher_id .'  value='. $result->teacher_id .'  class="emp_checkbox"  readonly></td>
    <td> <p> ' . $result->name . '   </p> </td>
    <td> <p> ' . $result->ClassName . '   </p> </td>

';
        }

        $output .= '</tr>';
        echo ($output);
        // exit();
    }
}


?>

