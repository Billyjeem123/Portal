<?php session_start(); ?>
<?php
include 'config.php';
$array = [];
// $error = [];
if ($_POST) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); // $remember = htmlspecialchars($_POST['remember']);
    $sql = "SELECT * from tblteacher WHERE email =:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        $results = $query->fetch(PDO::FETCH_OBJ);
        $teacher_id = $results->teacher_id;
        $db_email = $results->email;
        $db_name = $results->name;
        $db_role = $results->role;
        $db_class = $results->ClassId;
        if (password_verify($password, $results->password)) {
            if (!empty($_POST["remember"])) {
                setcookie("email", $_POST["email"], time() + 60 * 6 * 60 * 7);
                setcookie(
                    "password",
                    $_POST["password"],
                    time() + 60 * 6 * 60 * 7
                );
            } else {
                setcookie("email", "");
                setcookie("password", "");
            }
            if ($db_role == 'admin') {
                $_SESSION['teacher_id'] = $teacher_id;
                $_SESSION['name'] = $db_name;
                $_SESSION['email'] = $db_email;
                $_SESSION['role'] = $db_role;
                $array = "admin";
            } else {
                if (!empty($_POST["remember"])) {
                    setcookie("email", $_POST["email"], time() + 60 * 60 * 7);
                    setcookie(
                        "password",
                        $_POST["password"],
                        time() + 60 * 60 * 7
                    );
                } else {
                    setcookie("email", "");
                    setcookie("password", "");
                }
                $_SESSION['teacher_id'] = $teacher_id;
                $_SESSION['name'] = $db_name;
                $_SESSION['email'] = $db_email;
                $_SESSION['role'] = $db_role;
                $_SESSION['ClassId'] = $db_class;
                $array = "teacher";
            }
        } else {
            $array = "Incorrect";
            // echo json_encode($array);
        }
    } else {
        $array = "Nothing";
    }
    echo json_encode($array);
}
 ?>
