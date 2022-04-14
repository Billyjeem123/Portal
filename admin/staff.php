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
                <h2 class="page-header">Staff-List <button style="float:right" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i> New Entry</button></h2>


                <!-- //Start Modal -->



                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Upload Staff Data</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">




                                <form action="includes/add-teacher.php" class="form-horizontal" method="post" id="uploadForm" enctype="multipart/form-data">

                                    <fieldset>
                                        <div class="container" style="width:100%">

                                            <div class="form-group">
                                                <label for="default" class="col-sm-1 control-label">Full Name</label>
                                                <div class="col-sm-11">
                                                    <input type="text" name="name" class="form-control" onInput="checkTeacher()" id="name" maxlength="40" required="required">
                                                    <span id="feedbackteacher" class="" style='color:red;font-size:12px;font-weight:bold' ;></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-1 control-label">Email</label>
                                                <div class="col-sm-11">
                                                    <input type="email" name="email" class="form-control" id="email" required="required">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="default" class="col-sm-1 control-label" id="gender">Gender</label>
                                                <div class="col-sm-11">
                                                    <input type="radio" name="gender" value="Male" required="required" id="Gender">Male
                                                    <input type="radio" name="gender" value="Female" required="required" id="Gender">Female
                                                    <input type="radio" name="gender" value="Other" required="required" id="Gender">Other
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-1 control-label">Assigned Class</label>
                                                <div class="col-sm-11">
                                                    <select name="ClassId" class="form-control" id="ClassId" required="required">
                                                        <option value="">Select Class</option>
                                                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                                                            <option value="admin">admin</option>
                                                        <?php endif; ?>

                                                        <?php $sql = "SELECT * from tblclasses";

                                                        $query = $dbh->prepare($sql);

                                                        $query->execute();

                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {   ?>
                                                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-1 control-label">Photo</label>
                                                <div class="col-sm-11">
                                                    <input type="file" name="image">
                                                    <span class="small" style="color:red"><b>Optional***</b></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-1 control-label">Password</label>
                                                <div class="col-sm-11">
                                                    <input type="password" placeholder="********" name="password" class="form-control" id="password" required="required">
                                                    <span class="small" style="color:red"> You are strongly advised to choose a simple password for teachers.</span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class="col-sm-1 control-label">Registration Date</label>
                                                <div class="col-sm-11">
                                                    <input type="date" name="date" class="form-control" id="date">
                                                </div>
                                            </div>

                                            <div class="form-group" class="">
                                                <label for="default" class="col-sm-1 control-label " id="gender">Role</label>
                                                <div class="col-sm-11  ">
                                                    <select name="role" id="role" class="form-control">
                                                        <option value="">select Role</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="teacher">Teacher</option>
                                                </div>
                                            </div>
                                            <div class=""></div>

                                            <div class="form-group">
                                                <div class="">
                                                    <input type="hidden" name="" class="btn btn-primary mt-5" value="Add Teacher" id="butsave">
                                                </div>
                                            </div>


                                        </div>
                                    </fieldset>






                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="staff" class="btn btn-info " value="Submit Form">

                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>




                <!-- End Modal -->

















                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> List of Staff</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Reg-Date</th>
                                        <th>View Profile</th>
                                        <th>Delete Record</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Reg-Date</th>
                                        <th>View Profile</th>
                                        <th>Delete Record</th>
                                </tfoot>
                                <tbody>
                                    <?php




                                    $output = "";


                                    $sql = "SELECT  * from tblteacher";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                                    foreach ($results as $result) {
                                        $id = $result->teacher_id;
                                        $output .= '

                                            <tr>
                                            <input type="hidden" name="id"   id=  value=' . $result->teacher_id  . '  style="border:0px" readonly>
                                    <td> <p> ' . $result->name . '   </p> </td>
                                    <td> <p> ' . $result->email . '   </p> </td>
                                    <td> <p> ' . $result->date . '   </p> </td>
                                    <td><a data-toggle="modal" class="btn btn-dark btn-sm" data-target="#edit_user"   data-id=' . $result->teacher_id . ' id="getUser">Edit Profile</a></td>
                                    <td><button type="button"  onclick="deleteteacher(this)"   name="delete" class="btn btn-danger btn-sm " id="' .  $result->teacher_id . '"> <i class="fa fa-trash" title="Delete Record"></i></button></td>

                                ';
                                    }

                                    $output .= '</tr>';
                                    echo ($output);
                                    // exit();



                                    ?>







                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              


                <!-- Modal -->
                <div class="modal fade" id="edit_user" role="dialog">
                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Edit Record</h6>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form class="form-group" method="POST" action="includes/staff.php" enctype="multipart/form-data" id="userForm">

                                    <fieldset>
                                        <div class="container" style="width:100%">
                                            <div id="love">

                                            </div>


                                        </div>

                                    </fieldset>

                            </div>

                            <!-- <div class="modal-footer">
                                <input id="updaterecord" type="button" name="submit" class="btn btn-success " value="Promote Student">

                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            </div> -->


                            <!-- </form> -->
                        </div>

                    </div>

                    <!-- /////modal- -->
                </div>

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
        $(document).ready(function(e) {

            $(document).ready(function(e) {
                $("#uploadForm").on('submit', (function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "includes/add-student.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            if (data == 1) {

                                swal({
                                    text: "New Staff Added",
                                    type: "success",
                                    confirmButtonClass: "btn-success",
                                    closeModal: false
                                });
                                // $("#myModal").css("visibility", "hidden");
                                $("#dataTable").load('student.php #dataTable');
                                $("#uploadForm")[0].reset();


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
                    url: 'includes/staff.php',
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
                        // alert(data);
                    },
                })

            });
        })
    </script>

<script>
        function checkTeacher() {

            jQuery.ajax({
                url: "register.php",
                data: 'Name=' + $("#Name").val(),
                type: "POST",
                success: function(data) {
                    $("#feedbackteacher").html(data);
                },
                error: function() {}

            });
        }
    </script>
<script>
        function deleteteacher(obj) {
            var id = obj.id;
            bootbox.confirm("Do you really want to delete record?", function(result) {
                if (result == true) {
                    // AJAX Request
                    $.ajax({
                        url: 'delete.php?id=' + id + '&&type=delteacher',
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
                                // alert('Invalid ID.');
                            }
                        }
                    });
                }
            });
        }
    </script>

<script>
    $(document).on("submit", "#updateTeacherForm", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "includes/staff.php",
            type: "POST",
            cache: false,
            contentType: false, // you can also use multipart/form-data replace of false
            processData: false,
            data: formData,

            success: function(response) {
                if (response) {

                    swal({
                        text: "Updated Sucessfully",
                        type: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                    });
                    $("#dataTable").load('staff.php #dataTable');


                    // } 
                }
            }
        });
    });
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