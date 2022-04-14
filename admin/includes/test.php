<?php session_start() ?>
<?php include('config.php'); ?>
<?php

if (isset($_POST["update"])) {
    // if (isset($_POST['id']) &&  $_POST['action'] == "update" ) {

    $id = $_POST['id'];
    $testid = $_POST['testid'];
    $sql = " UPDATE  tbltest SET test =:testid  where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':testid', $testid, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    if($query->execute()){


        header('Location: ../test.php');
        $_SESSION['msg']= 'Done';

    }else{

        echo 0;
    }
  
 
   

        }
    // }
    

  
?>

<?php
$msg = array();

if (isset($_POST['testid']) &&  $_POST['action'] == "insert") {


    $examname=   htmlentities($_POST['testid']);

    $sql = "INSERT INTO  tbltest(test) VALUES(:testid)";
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':testid', $examname ,PDO::PARAM_STR);
    
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
    $sql = "SELECT * from tbltest where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($results as $result) { ?>

        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label " for="subjectname">C.A.Test:</label>
                <input type="hidden" class="form-control" name="id" value="<?php echo  $result->id ?>">

                <input type="text" id="testid" name="testid" class="form-control" value="<?php echo $result->test ?>">
            </div>
        </div>
        <br> <br>
      
      
        <div class="modal-footer">
            <button type="submit" id="<?php echo  $result->id ?>" name="update" class="update btn btn-success update">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
        </div>

        </form>



<?php

    }
}

?>

<script type="text/javascript">
    // $('.update').click(function() {
    //     var id = $(this).attr('id');
    //     // alert(id);
    //     var subjectname = $('#subjectname').val();
    //     var subjectcode = $('#subjectcode').val();
    //     var action = "update";
    //     $.ajax({
    //         url: "subject.php",
    //         type: "POST",
    //         data: {
    //             id: id,
    //             subjectname: subjectname,
    //             subjectcode: subjectcode,
    //             action:action
    //         },
    //         success: function(data) {

    //             if(data == 1){
                    
    //                 alert('yeah' );
    //                 return true;
    //                 // $('#subjectname').val('');
    //                 // $('#subjectcode').val('');
    //             }else{

    //                 alert(data);
    //                 return false;

    //             }
           
    //         },
    //     });
    //     return false;

    // }); // update close
</script>

