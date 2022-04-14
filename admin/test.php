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



                <h3 class="page-header pb-4">Test <button style="float:right" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>






                <!-- //Start Modal -->


                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Mid-Term Test</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">


                                <div class="" id="eee"></div>

                                <form style="width :100% !important;" class="form-horizontal" method="post" id="user_form" action="" enctype="multipart/form-data">

                                    <fieldset>
                                        <div class="container" style="width:100%">


                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label ">Test Name</label>
                                                <div class="col-sm-10">
                                                    <div class="">
                                                        <input type="text" name="testid" id="testid" onInput="checkTest()" class="form-control" required data-parsley-pattern="/^[a-zA-Z0-9 \s]+$/" data-parsley-trigger="keyup" autocomplete="on" />
                                                        <span id="feedbackxam" class=" " style='color:red;font-size:12px;font-weight:bold' ;></span>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>


                            </div>
                            </fieldset>



                            <div class="modal-footer">
                                <!-- <input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form"> -->
                                <button id="addsubject" type="submit" class="btn btn-info">Submit Form</button>

                                </form>
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>

                    </div>
                </div>




                <!-- End Modal -->


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Test List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <form action="" method="post" id="show">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width:30%;">TestName</th>
                                            <th style="width:20%;">Edit</th>
                                            <th style="width:20%;"></th>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width:30%;">TestName</th>
                                            <th style="width:20%;">Edit</th>
                                            <th style="width:20%;"></th>
                                            <!-- <tr> -->
                                    </tfoot>
                                    <tbody id="">
                                        <?php

                                        $output = "";


                                        $sql = "SELECT  * from tbltest";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($results as $result) {
                                            $id = $result->id;
                                            $output .= '

                                        <tr>
                                    <input type="hidden" name="id"   id=  value=' . $result->id  . '  style="border:0px" readonly>
                                <td> <p> ' . $result->test . '   </p> </td>
                                <td><a data-toggle="modal" data-target="#edit_user"   data-id=' . $result->id . ' id="getUser" class="btn btn-dark btn-sm">Edit</a></td>
                                <td><button type="button"  onclick="deletetest(this)"   name="delete" class="btn btn-danger btn-sm " id="' .  $result->id . '"> <i class="fa fa-trash" title="Delete Record"></i></button></td>

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
                            <h4 class="modal-title">Edit Record</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form class="form-group" method="POST" action="includes/test.php" enctype="multipart/form-data" id="userForm">
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
    $(document).ready(function() {

        $(document).on('click', '#getUser', function(e) {

            e.preventDefault();

            var id = $(this).data('id');
            var action = "edit";
            // alert(action);

            $.ajax({
                url: 'includes/test.php',
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
                    // alert(data);
                },
            })

        });
    })
</script>


<script>
    function checkTest() {

        jQuery.ajax({
            url: "register.php",
            data: 'testid=' + $("#testid").val(),
            type: "POST",
            success: function(data) {
                $("#feedbackxam").html(data);
            },
            error: function() {}

        });
    }
</script>

<script>
    $(document).on('click', '#addsubject', function(e) {

        e.preventDefault();
        var testid = $('#testid').val();
        var action = "insert";
        // alert(action);
        $.ajax({
                type: "POST",
                url: "includes/test.php",
                // data: data,
                // action: action,
                data: {
                    testid: testid,
                    action: action
                },
                // dataType: "json",
                encode: true,
            })

            .done(function(data) {


                swal({
                        title: "Done",
                        type: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                    }),

                    $('#testid').val('');
                    $("#dataTable").load('test.php #dataTable');


            });

    });
</script>













<script>
    function deletetest(obj) {
        var id = obj.id;
        bootbox.confirm("Do you really want to delete record?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete.php?id=' + id + '&&type=deltest',
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
                        } else {
                            // alert(response)
                            console.log("response");
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