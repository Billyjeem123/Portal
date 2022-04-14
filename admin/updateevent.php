<?php session_start() ?>
<?php include 'includes/config.php'; ?>

   <?php

    if (isset($_POST['id']) && $_POST['date'] && $_POST['details']  && $_POST['date']){
        $id = $_POST['id'];
        $date = $_POST['date'];
        $details = $_POST['details'];
        $tittle = $_POST['tittle'];
        $filename = ($_FILES['files']['name']);

        $Sql = " SELECT * FROM tblevent WHERE date= :date, details=:details, tittle=:tittle ";
        $query = $dbh->prepare($Sql);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':details', $details, PDO::PARAM_STR);
        $query->bindParam(':tittle', $tittle, PDO::PARAM_STR);
        $query->execute();

        $updateEventv = " UPDATE tblevent SET date= :date, details=:details, tittle=:tittle  WHERE id = :id";
        $query = $dbh->prepare($updateEventv);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':details', $details, PDO::PARAM_STR);
        $query->bindParam(':tittle', $tittle, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

    }

        // exit();

        if(!empty($filename)){


            if (empty($filename)) {

                $id = $_POST['id'];

                $sqsl = " SELECT * FROM tblimage WHERE event_id = :id ";
                $query = $dbh->prepare($sqsl);
                $query->bindParam(':id', $id, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                foreach ($results as $imageresult) {

                   return   $imageresult->photo;
                }
            }



            $countfiles = count($_FILES['files']['name']);

            for ($i = 0; $i < $countfiles; $i++) {
                $filename = $_FILES['files']['name'][$i];
                move_uploaded_file($_FILES['files']['tmp_name'][$i], 'upload/' . $filename);

                //   $insert = $dbh->prepare(" UPDATE tblimage SET event_id  = '$id',  photo = '$filename' WHERE event_id = '$id' ");
                $insert = $dbh->prepare("INSERT INTO tblimage(event_id, photo) VALUES ('" . $id . "', '" . $filename . "')");
                if ($insert->execute()) {

              $_SESSION['msg'] = "Record Updated";
              header("Location: event.php");
                } else {

                   echo "nope";
                }
            }
        }

            // echo json_encode($msg);
        // }
