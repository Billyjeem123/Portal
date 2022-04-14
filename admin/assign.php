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

                <!-- Page Heading -->
                <h4 class="page-header">Assingn Class <button id="View-Promoted-Student" style="float:right;display:none;" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i> New Entry</button></h4>




               

                <!-- //Start Modal -->


                <!-- End Modal -->


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Staff List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <form action="assignclass.php" method="post" id="show">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><input class="" type="checkbox" id="select_all"></th>
                                            <th>Staff-Name</th>
                                            <th>Assigned-Class</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><input class="" type="checkbox" id="select_all"></th>
                                            <th>Staff-Name</th>
                                            <th>Assigned-Class</th>
                                    </tfoot>
                                    <tbody id="show-promote">



                                    </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 well">
                        <span class="rows_selected" id="select_count">0 Selected</span>
                        <input type="button" value="Proceed" class="btn btn-primary pull-right" id="delete_records">
                    </div>
                </div>

                <!-- end modal -->

            </div>
            <!-- /.container-fluid -->



            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Assign Staff</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">

                            <form class="form-horizontal" method="post" action="" action="final_promote.php">

                                <fieldset>
                                    <div class="container" style="width:100%">
                                        <div class="" id="ee">

                                        </div>


                                    </div>

                                </fieldset>

                        </div>

                       
                        </form>
                    </div>

                </div>

                <!-- /////modal- -->
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
    function fetch_data() {
        $(document).ready(function() {

            var action = "fetchAndAssign";
            $.ajax({
                url: "includes/staff.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function(data) {

                    $('#show-promote').html(data);

                }
            })
        })
    }
    fetch_data();
</script>

<script>
    $(document).ready(function() {

        $('#delete_records').on('click', function(e) {
            var employee = [];
            $(".emp_checkbox:checked").each(function() {
                // employee.push($(this).val());
                employee.push($(this).data('emp-id'));
                $(this).val();
            });
            // alert(employee)
            if (employee.length <= 0) {
                alert("Please select a record.");
                return false;
            }

            var action = "Delete";

            $.ajax({
                type: "POST",
                url: "assignclass.php",
                data: {
                    employee: employee,
                    action: action

                },

                success: function(response) {

                    $("#View-Promoted-Student").click();
                    $('#ee').html(response);

                }
            });

        });
    });
    $(document).on('click', '#select_all', function() {
        $(".emp_checkbox").prop("checked", this.checked);
        $("#select_count").html($("input.emp_checkbox:checked").length + " Selected");
    });
    $(document).on('click', '.emp_checkbox', function() {
        if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }
        $("#select_count").html($("input.emp_checkbox:checked").length + " Selected");
    });
</script>


<!-- ending javascript works -->


<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script> -->
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>