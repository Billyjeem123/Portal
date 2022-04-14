<?php session_start() ?>
<?php include 'config.php'; ?>




<?php

if (isset($_POST['details'])) {

    $abt = $_POST['details'];
    $filename = $_FILES["photo"]["name"];
    $filetype = $_FILES["photo"]["type"];
    $filesize = $_FILES["photo"]["size"];
    $fileTmp = $_FILES['photo']['tmp_name'];
    $file_store = "../upload/$filename";

    move_uploaded_file($fileTmp, $file_store);
    $sql = "INSERT INTO about(photo, details)  VALUES(:photo,:details)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':photo', $filename, PDO::PARAM_STR);
    $query->bindParam(':details', $abt, PDO::PARAM_STR);
    $query->execute();
    if ($query) {

        echo 1;
        exit();
    }
}

?>





<?php
if ($_POST["action"] == "edit") {

    $the_event_id = $_POST['id'];
    $sql = " SELECT * FROM about WHERE id = '$the_event_id' ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($results as $result) {
        $id = $result->id;
        $photo = $result->photo;
        $short_desc = $result->details;

?>

        <div class="" style="width:100%;border-bottom:1px solid white">

        <input type="hidden" class="id" id="id" name="id"   data-emp-id="<?php echo $result->id  ?>" id="<?php echo $result->id  ?>">
            <div class="form-group">
                <label for="date" class=" control-label">Image</label>
                <div class="col-sm-12">
                    <input type="file" name="photo" id="photo">
                    <img src="upload/<?php echo $photo ?>" alt="k" width="130px">
                </div>
            </div>

            <br> <br> 
            <div class="form-group">
                <label for="date" class=" control-label">Details</label>
                <div class="col-sm-12">
                    <textarea name="details" id="editor" cols="30" rows="10" class="form-control">
                <?php echo $short_desc ?>
                </textarea>
                </div>
            </div>

            <div class="modal-footer" style="margin-top: 20px;">
                <input type="hidden" class="id" id="id" name="id" value="<?php echo $result->id  ?>">
                <button id="" name="update" type="submit" class="btn btn-info">Update Form</button>

                </form>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
            </div>

        </div>
        </div>

    </form>

<?php

    }
}
