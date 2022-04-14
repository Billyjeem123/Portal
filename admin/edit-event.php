<?php include("includes/header.php") ?>
<?php include('includes/config.php') ?>

<!-- error_clear_last -->

<!-- Page Wrapper -->
<div id="wrapper">

    <?php include("includes/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" style="background-color: white;">

            <?php include("includes/navbar.php") ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <h3 class="page-header pb-4">Edit-Event <button style="float:right;display:none" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>


                <?php



                if ($_GET["id"]) {
                    $id = $_GET['id'];


                    $sql = " SELECT * FROM tblevent where tblevent.id = :id ";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    foreach ($results as $result) {

                        $id = $result->id;
                        $date = $result->date;
                        $details = $result->details;
                        $tittle = $result->tittle; ?>

                        <form class="form-group" id="sameUploadForm" method="POST" action="updateevent.php" enctype="multipart/form-data" id="userForm">
                            <div class="container-fluid" id="loadimg" style="width:100%">

                                <div class="form-group">
                                    <label for="date" class="control-label ">Tittle</label>
                                    <div class="col-md-12">
                                        <div class="">
                                        <input type="text" id="tittle" name="tittle" class="form-control" placeholder="" value="<?php echo $result->tittle ?>">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="control-label ">Date</label>
                                    <div class="col-md-12">
                                        <div class="">
                                            <input type="date" name="date" id="date" class="form-control" value="<?php echo $result->date ?>">

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="date" class="control-label ">Narration</label>
                                    <div class="col-md-12">
                                        <div class="">

                                            <textarea name="details" id="editor" cols="30" rows="10" class="form-control">
                               <?php echo $result->details ?>
                                </textarea>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="date" class=" control-label ">Images</label>
                                    <div class="col-md-12">
                                        <div class="">
                                            <input type="file" name="files[]" id="files" multiple>
                                            <?php

                                            $sql = " SELECT * FROM tblimage WHERE event_id = :id";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':id', $id, PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($results as $key) {
                                                $image = $key->photo;
                                                $image_id = $key->id;
                                            ?>

                                    <div class=" d-inline col-lg-2 col-md-3 col-sm-4 col-6 mt-lg-0 mb-3 pb-3 mt-4 pt-4"  id="reloadimg">      
                                                    <img onclick="deletimage(this)" src="upload/<?php echo $image  ?>" class="see" id="<?php echo $image_id    ?>" alt="" style="width:100px;  height:100px;border :2px solid black">
                                                </div>


                                    <?php }
                                        }
                                    }  ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" value="<?php echo $id  ?>" name="id" id="id">
                                    <input type="hidden" name="action" id="action" value="Update" class="update" />
                                    <button type="submit" name="update" class=' btn btn-success px-4 update  title-input' rel='<?php echo $id ?>' id="data<?php echo  $result->id ?>" name="update">Update</button>
                                    <a href="event.php" class="btn btn-danger  px-4">Back</a>
                                </div>


                                <div>
                        </form>









                        <!-- end modal -->

            </div>
            <!-- /.container-fluid -->












        </div>
        <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>





<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap-confirmation/bootbox.min.js"></script>
<!-- Javascript works -->

<script>
    $(document).ready(function() {

        $(document).on('click', '#getUser', function(e) {

            e.preventDefault();

            var id = $(this).data('id');
            var action = "edit";
            // alert(action);

            $.ajax({
                url: 'includes/classes.php',
                type: 'POST',
                data: {
                    id: id,
                    action: action,
                },
                beforeSend: function() {
                    $("#love").html('Working on Please wait ..');
                },
                success: function(data) {
                    $("#love").html(data);
                    //  alert(data);
                },
            })

        });
    })
</script>




<script>
    $(document).on('click', '#addclass', function(e) {

        e.preventDefault();
        var classname = $('#classname').val();
        var action = "insert";
        $.ajax({
                type: "POST",
                url: "includes/classes.php",
                data: {
                    classname: classname,
                    action: action
                },

                // dataType: "json",
                encode: true,
            })

            .done(function(data) {


                swal({
                        title: "Added",
                        icon: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                    }),

                    $('#classname').val('');
                $("#dataTable").load('class.php #dataTable');


            });

    });
</script>





<script>
    function checkUsername() {

        jQuery.ajax({
            url: "register.php",
            data: 'classname=' + $("#classname").val(),
            type: "POST",
            success: function(data) {
                $("#feedback").html(data);
            },
            error: function() {}

        });
    }
</script>








<script>
    function deletesclass(obj) {
        var id = obj.id;
        bootbox.confirm("Do you really want to delete record?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete.php?id=' + id + '&&type=delclass',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {

                        if (response == 1) {
                            // Remove row from HTML Table
                            $(obj).closest('tr').css('background', 'tomato');
                            $(obj).closest('tr').fadeOut(200, function() {
                                $(this).remove();
                            });
                        } else {
                            alert('Invalid ID.');
                        }
                    }
                });
            }
        });
    }
</script>






<script>
    function deletimage(obj) {
        var id = obj.id;
        bootbox.confirm("Do you really want to delete image?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'includes/remove_img.php',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {

                         // Remove row from HTML Table
                         $(obj).css('background', 'black');
                                $(obj).fadeOut(800, function () {
                                    $(this).remove();
                                });
                    }
                });
            }
        });
    }
</script>

<!-- ending javascript works -->


<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>