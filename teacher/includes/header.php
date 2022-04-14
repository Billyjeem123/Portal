<?php session_start() ?>
<?php ob_start() ?>
<?php
if (!isset($_SESSION['name'])) {

    session_destroy();

    header("Location: ../login.php");
}
?>

<?php
if (($_SESSION['role']) != "teacher") {

    session_destroy();

    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School-Portal</title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <!-- <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="../admin/css/sb-admin-2.css" rel="stylesheet">
    <link href="../fonts.css" rel="stylesheet">
    <link href="../admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="../admin/vendor/sweetalert.min.js"></script>

</head>
<style>
    .admin-photo-thumbnail {

        width: 70px;
        border-radius: 5px;
        padding: 0px;
        margin-left: 2rem
    }

    input[type=number] {

        -moz-appearance: textfield;
    }
</style>

<body id="page-top">

    <?php
    if (isset($_SESSION['msg'])) {
    ?>

        <script>
            swal({
                title: "<?php echo $_SESSION['msg'] ?>",
                type: "success",
                confirmButtonClass: "btn-success",
                closeModal: false
            });
        </script>
    <?php

        unset($_SESSION['msg']);
    } else {
        unset($_SESSION['msg']);
    }
    ?>