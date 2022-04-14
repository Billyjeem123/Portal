<?php session_start() ?>
<?php include 'config.php'; ?>


<?php
if (isset($_FILES['files']) && !empty($_FILES['files'])) {


    $date = $_POST['date'];
    $details = $_POST['details'];
    $tittle = $_POST['tittle'];

    $insert = $dbh->prepare(" INSERT INTO tblevent(date,details, tittle) VALUES ( '$date',  '$details',  '$tittle')");
    if ($insert->execute()) {
        $event_id = $dbh->lastInsertId();


        $countfiles = count($_FILES['files']['name']);

        // Looping all files
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['files']['name'][$i];

            // Upload file
            move_uploaded_file($_FILES['files']['tmp_name'][$i], '../upload/' . $filename);

            //  echo $filename;

            $insert = $dbh->prepare("INSERT INTO tblimage(event_id, photo) VALUES ('" . $event_id . "', '" . $filename . "')");
            $insert->execute();

            echo "yeah";
        }
    }
}

/* 
 * End of script
 */
if ($_POST["action"] == "edit") {
    $id = $_POST['id'];

    $sql = "SELECT * FROM tblevent where tblevent.id = '$id' ";
    $query = $dbh->prepare($sql);
    // $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($results as $result) {

        $id = $result->id;
        $date = $result->date;
        $details = $result->details;
        $tittle = $result->tittle; ?>


        <div class="container" style="width:100%">

            <div class="row">

                <div class="col-md-6 reloadimg">
                    <div class="form-group reloadimg">
                        <input type="file" name="files[]" id="files" multiple>

                        <div id="reloadimg">

                            <?php

                            $sql = " SELECT * FROM tblimage WHERE event_id = :id";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':id', $id, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            foreach ($results as $key) {
                                $image = $key->photo;
                            ?>
                                <div id="reloadimg" style="padding-top:40px; ">
                                    <img  src="upload/<?php echo $image  ?>" alt="uuu" style="width:200px; height:200px;border :2px solid black">
                                </div>

                            <?php }  ?>

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="default" class="">Tittle</label>
                            <div class="">
                                    





                    </div>


                </div>



        <?php



    }
}



        ?>