<?php session_start() ?>
<?php include 'config.php'; ?>
<?php

if (isset($_POST['update'])) {

    $id = ($_POST['id']);

    $termid = htmlentities($_POST['termid']);

    $sql = " UPDATE  tblterm set term =:termid  where id=:id ";

    $query = $dbh->prepare($sql);

    $query->bindParam(':termid', $termid, PDO::PARAM_STR);

    $query->bindParam(':id', $id, PDO::PARAM_STR);

    $confirm = $query->execute();

    if($confirm){

        echo "ok";
        header('Location: ../term.php');

        $_SESSION['msg'] = 'Data has been updated successfully';
    
        exit();
    }
    }

   


?>



<?php


if($_POST['action'] == "insert") {


    $sessionid = htmlentities($_POST['termid']);

    $sql = "INSERT INTO tblterm (term) VALUES(:termid)";
    
    $query = $dbh->prepare($sql);
    
    $query->bindParam(':termid', $sessionid ,PDO::PARAM_STR);
    
    $query->execute();
    
    $lastInsertId = $dbh->lastInsertId();
    
    if($lastInsertId){
    
    
        echo "ok";
        
      }
        
      }
    
    
    ?>









<?php



if ($_POST['action'] == "edit") {
    $id = $_POST['id'];
    $sql = "SELECT * from tblterm where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($results as $result) { ?>

        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label " for="subjectname">Term-Name:</label>
                <input type="hidden" class="form-control" name="id" value="<?php echo  $result->id ?>">

                <input type="text" id="termid" name="termid" class="form-control" value="<?php echo $result->term ?>">
            </div>
        </div>
        <br> <br>
        <br> <br>


        <div class="modal-footer">
            <button type="submit" class=' btn btn-success update  title-input' rel='<?php echo $result->id ?>' id="data<?php echo  $result->id ?>" name="update">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </form>



<?php

    }
}

?>

<script>
    $(document).ready(function() {

        // $(".title-input").on('click', function() {



        //     var id = $(this).attr('rel');
        //     var updatethis = "updatethis";

        //     $(".update").on('click', function() {


        //            alert(id);

        //         })




        //     });



        })

</script>

