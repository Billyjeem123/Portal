
<?php
include('includes/config.php');
include('includes/header.php');

// if($_POST['action'] == "PromoteStudent"){

//     if(isset($_POST['submit'])){


//     $idss=$_POST['id'];
//     $classname=$_POST['ClassName'];

//    echo $N = count($idss);
//    for($i=0; $i < $N; $i++)
//    {
//        $sql_check  = " UPDATE tblstudents SET ClassId='$classname[$i]'  WHERE StudentId='$idss[$i]' " ;
//        $query = $dbh->prepare($sql_check);
//        if($query->execute()){

//            echo "yeah";
//            exit();
//        }else{

//            echo "failed";
//            exit();


//        }

// }
// }

if (empty($_POST['employee'])) {

    header("Location: promote.php");
} else {

    if (isset($_POST['employee'])) {

        $employee = $_POST['employee'];
        $N = count($employee);
        for ($i = 0; $i < $N; $i++) {
            $resultss = "SELECT tblteacher.teacher_id,  tblteacher.name,  
            tblteacher.ClassId, tblclasses.id, tblclasses.ClassName FROM tblteacher  JOIN tblclasses ON tblclasses.id = tblteacher.ClassId  WHERE  tblteacher.teacher_id='$employee[$i]'";

            $query = $dbh->prepare($resultss);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                    $ids = $result->teacher_id;
                    $class_id = $result->id;
                    $ClassName = $result->ClassName;

?>

                    <div class="thumbnail" style="margin:auto; width:600px;">
                        <div style="margin-left: 70px; margin-top: 20px;">
                            <div class="form-group">
                                <label class="" for="classname" style="font-family:cursive; font-weight:bold; font-size:18px; color:blue;">Assign <?php echo $result->name ?> to:</label>
                                <div class="controls">
                                    <input name="teacher_id[]" class="id" data-emp-id="<?php echo $ids ?>" type="hidden" value="<?php echo $ids ?>" />
                                    <select name="ClassName[]" id="ClassData" class="ClassData">
                                        <option value="">Select class</option>
                                        <?php
                                        $result1 = "SELECT * FROM  tblclasses";
                                        $querys = $dbh->prepare($result1);
                                        $querys->execute();
                                        $keys = $querys->fetchAll(PDO::FETCH_OBJ);
                                        if ($query->rowCount() > 0) {
                                            foreach ($keys as $keyed) {
                                        ?>
                                                <option id="ClassData" value="<?php echo $keyed->id ?>"><?php echo $keyed->ClassName ?></option>
                                        <?php
                                            }
                                        }

                                        ?>


                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <br />
<?php
                }
            }
        }
    }
}
?>
<div class="modal-footer">
    <!--<input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form">-->
    <input id="updaterecord" type="button" name="submit" class="btn btn-success " value="Assign Class">

    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
    </form>
</div>
<script>
    $(document).ready(function() {

        $('#updaterecord').on('click', function(e) {

            var action = "AssignTeacher";

            var id = [];
            $(".id").each(function() {
                id.push($(this).data('emp-id'));
                $(this).val();
                // alert(id);

            });



            var ClassName = [];
            $(".ClassData").each(function() {
                ClassName.push($(this).val());
                // alert(ClassName);
            });

            // if (ClassName.length < ClassName-1) {
            //         alert("Please select all classes.");
            //         return false;
            //     }
            // });
            // return false;

            $.ajax({
                type: "POST",
                url: "final_promote.php",
                data: {
                    id: id,
                    ClassName: ClassName,
                    action: action

                },

                success: function(response) {

                    ('window.location.href = "assign.php" ');

                    swal({
                        title: 'Done',
                        type: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                    });
                    // $("#students").load('assign.php #students');
                    fetch_data();
                    $("#select_count").html('0 Selected');

                }
            });

        });


    });
</script>