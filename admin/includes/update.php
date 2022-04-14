<?php session_start() ?>
    <?php  include('config.php')   ?>



    
<?php



if (isset($_POST['update'])) {

    echo  $the_event_id = ($_POST['id']);

    $filename = $_FILES["photo"]["name"];
    $filetmp = $_FILES["photo"]["tmp_name"];
    $db_short_desc = $_POST['details'];
    $the_event_id = ($_POST['id']);
    
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/" . $filename);
    if(empty($filename)){
    
        $image_syntax = "SELECT * FROM about WHERE id = '$the_event_id' ";
        $querys = $dbh->prepare($image_syntax);
        $querys-> execute();
        while($row=$querys->fetch()){
            $filename = $row['photo'];
        }
    }
    


    $sqls = " UPDATE about  SET photo='$filename', details='$db_short_desc'  WHERE id = '$the_event_id' ";
    $query = $dbh->prepare($sqls);
    $query->bindParam(':photo',$filename,PDO::PARAM_STR);
    $query->bindParam(':details',$db_short_desc,PDO::PARAM_STR);
    $check = $query->execute();
    if($check){
    
      $_SESSION['msg'] = 'Record Updated ';
    header("location: ../about.php");

    // exit();

    }else{

      echo "no";
          // exit();
    }

    // return false;
      // exit();
}

?>

<?php


                    if (isset($_POST['submit'])) {

                      $stid = ($_POST['id']);



                     $rowid = $_POST['id'];
                     $test_marks = $_POST['test_marks'];
                     $ca_test = $_POST['ca_test'];
                     $exam_marks = $_POST['exam_marks'];
                    //  $comment = $_POST['comment'];

                     foreach ($_POST['id'] as $count => $id) {

                       $exam_marks_loop = $exam_marks[$count];
                    //    $comment_loop = $comment[$count];
                       $test_marks_loop = $test_marks[$count];
                       $ca_test_loop = $ca_test[$count];
                       $iid = $rowid[$count];

                       for ($i = 0; $i <= $count; $i++) {

                         $sql = " UPDATE scores SET exam_marks= '$exam_marks_loop', test_marks='$test_marks_loop',  ca_test= '$ca_test_loop'  WHERE mark_id = '$iid' ";
                         $query = $dbh->prepare($sql);
                         $ch =  $query->execute();

                         if ($ch) {

                            $_SESSION['msg'] =  'Updated  Sucessfully';
                            header("Location: ../result.php");

                         } else {

                           echo  'Wrong';
                         }
                       }
                     }
                   }

                   ?>















