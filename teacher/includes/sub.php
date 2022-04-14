<?php session_start() ?>
<?php include('config.php'); ?>

<?php
// $subjects = array();

if ($_POST['classes']) {
    $class = ($_POST['classes']);
    $subjects = ($_POST['subject']);
    var_dump($subjects);
    $status = 1;
    // $N = count($subjects);

    foreach($subjects as $value) {

        // for($i=0; $i < $N; $i++){
        $sql = " INSERT INTO  tblsubjectcombination(ClassId, SubjectId, status) VALUES(:classes,:subject,:status) ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':classes', $class, PDO::PARAM_STR);
        $query->bindParam(':subject', $value, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        $lastInsertIdsubject = $dbh->lastInsertId();
        if ($lastInsertIdsubject) {
            $msg = 1;
        } else {
            $msg = 0;
        }

        echo ($msg);
    }
}

?>