<?php include("includes/header.php") ?>
<?php include('includes/config.php') ?>


<!-- Page Wrapper -->
<div id="wrapper">

    <?php include("includes/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php include("includes/navbar.php") ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">



                <h3 class="page-header pb-4">About Page <button style="float:right" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>






                <!-- //Start Modal -->

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">About</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">


                                <div class="" id="eee"></div>

                                <form style="width :100% !important;" class="form-horizontal" method="post" id="uploadForm" action="" enctype="multipart/form-data">

                                    <fieldset>
                                        <div class="container" style="width:100%">


                                            <div class="form-group">
                                                <label for="date" class=" control-label ">Image</label>
                                                <div class="col-sm-12">
                                                    <div class="">
                                                        <input type="file" name="photo" id="fileSelect">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="date" class=" control-label ">About School</label>
                                                <div class="col-sm-12">
                                                    <div class="">
                                                        <textarea class="form-control" name="details" id="editor" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>





                                        </div>


                            </div>
                            </fieldset>



                            <div class="modal-footer">
                                <!-- <input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form"> -->
                                <button id="addclass" type="submit" class="btn btn-info">Submit Form</button>

                                </form>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- End Modal -->


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <form action="" method="post" id="show">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>View</th>
                                            <th>Delete Record</th>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>View</th>
                                            <th>Delete Record</th>
                                            <!-- <tr> -->
                                    </tfoot>
                                    <tbody id="">
                                        <?php

                                        $output = "";


                                        $sql = "SELECT  * from about";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($results as $result) {
                                            $id = $result->id;
                                            $output .= '
                        
                            <tr >
                            <input type="hidden" name="id"   id=  value=' . $result->id  . '  style="border:0px" readonly>
                            <td><a data-toggle="modal" data-target="#edit_user" class="btn btn-dark"  data-id=' . $result->id . ' id="getUser">View-record</a></td>
                             <td><button type="button"  onclick="deleteabt(this)"   name="delete" class="btn btn-danger btn-sm " id="' .  $result->id . '"> <i class="fa fa-trash" title="Delete Record"></i></button></td>
                            
                        ';
                                        }

                                        $output .= '</tr>';
                                        echo ($output);





                                        ?>



                                    </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>



                <!-- end modal -->

            </div>
            <!-- /.container-fluid -->






            <div class="modal fade" id="edit_user" role="dialog">
                <div class="modal-dialog modal-lg ">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Record</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form class="form-group" method="POST" action="includes/update.php" enctype="multipart/form-data" id="upadateabt">
                            <div class="modal-body">
                                <div class="container" style="width :100% !important;">
                                    <div id="love">

                                    </div>
                                </div>
                            </div>

                            <!-- </form> -->
                    </div>
                </div>
            </div>



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
    $(document).ready(function(e) {

        $(document).ready(function(e) {
            $("#uploadForm").on('submit', (function(e) {
                e.preventDefault();

                $.ajax({
                    url: "includes/about.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 1) {

                            swal({
                                title: "Uploaded",
                                type: "success",
                                confirmButtonClass: "btn-success",
                                closeModal: false
                            });
                            // $("#myModal").css("visibility", "hidden");
                            $("#dataTable").load('about.php #dataTable');


                        } else {

                            alert(data);
                        }
                    },
                    error: function(data) {}
                });
            }));
        });
    });
</script>



<script>
    $(document).ready(function() {

        $(document).on('click', '#getUser', function(e) {

            e.preventDefault();

            var id = $(this).data('id');
            var action = "edit";

            $.ajax({
                url: 'includes/about.php',
                type: 'POST',
                data: {
                    id: id,
                    action: action
                },
                beforeSend: function() {
                    $("#love").html('Working on Please wait ..');
                },
                success: function(data) {
                    $("#love").html(data);
                },
            })

        });
    })
</script>


<script>
    function deleteabt(obj) {
        var id = obj.id;
        //  alert(id);
        bootbox.confirm("Do you really want to delete record?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete.php?id=' + id + '&&type=delabout',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {

                        if (response == 1) {
                            // Remove row from HTML Table
                            $(obj).closest('tr').css('background', 'tomato');
                            $(obj).closest('tr').fadeOut(800, function() {
                                $(this).remove();
                            });
                            console.log("hi");
                        } else {
                            // alert('Invalid ID.');
                        }
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