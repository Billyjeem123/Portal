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
            $resultss = "  SELECT tblstudents.StudentId,  tblstudents.StudentName,  tblstudents.RollId, 
                    tblstudents.ClassId, tblclasses.id, tblclasses.ClassName FROM tblstudents 
                    JOIN tblclasses ON tblclasses.id = tblstudents.ClassId  WHERE  tblstudents.StudentId='$employee[$i]'  ";

            $query = $dbh->prepare($resultss);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                    $ids = $result->StudentId;
                    $class_id = $result->id;
                    $ClassName = $result->ClassName;

?>

                    <div class="thumbnail" style="margin:auto; width:600px;">
                        <div style="margin-left: 70px; margin-top: 20px;">
                            <div class="form-group">
                                <label class="" for="classname" style="font-family:cursive; font-weight:bold; font-size:18px; color:blue;">Promote <?php echo $result->StudentName ?> to:</label>
                                <div class="controls">
                                    <input name="StudentId[]" class="id" data-emp-id="<?php echo $ids ?>" type="hidden" value="<?php echo $ids ?>" />
                                    <select name="ClassName[]" id="ClassData" class="ClassData">
                                        <option value="">Select class</option>
                                        <?php
                                        $result1 = "SELECT * FROM  tblclasses";
                                        $querys = $dbh->prepare($result1);
                                        $querys->execute();
                                        $keys = $querys->fetchAll(PDO::FETCH_OBJ);
                                        if ($query->rowCount() > 0) {
                                            foreach ($keys as $keyed) {

                                                if ($keyed->ClassName == $ClassName) {

                                                    echo "<option  selected id='ClassData' value=$keyed->id'>$keyed->ClassName </option>";
                                                } else {

                                                    echo "<option   id='ClassData' value=' $keyed->id '> $keyed->ClassName </option>";
                                                }
                                        ?>
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

