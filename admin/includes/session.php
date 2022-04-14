<?php session_start() ?>
<?php include('config.php'); ?>
<?php

if (isset($_POST["update"])) {
    // if (isset($_POST['id']) &&  $_POST['action'] == "update" ) {

    $id = $_POST['id'];
    $sessionid = $_POST['sessionid'];
    $sql = " UPDATE  tblsession SET session =:sessionid  where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sessionid', $sessionid, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    if($query->execute()){


        header('Location: ../session.php');
        $_SESSION['msg']= 'Done';

    }else{

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
    
    $query->bindParam(':sessionid', $sessionid ,PDO::PARAM_STR);
    
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

                <input type="number" id="sessionid" name="sessionid" class="form-control" value="<?php echo $result->session ?>">
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

