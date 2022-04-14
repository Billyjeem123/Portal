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
                <h2 class="page-header">Student-List <button style="float:right" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i> New Entry</button></h2>


                <!-- //Start Modal -->



                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <!-- <h4 class="modal-title">Upload Staff Data</h4> -->
                            </div>
                            <div class="modal-body">




                                <form action=" " class="form-horizontal" method="post" id="uploadForm" enctype="multipart/form-data">

                                    <div class="eee" id="eee"></div>
                                    <fieldset>
                                        <div class="container" style="width:100%">

                                            <div class="form-group">
                                                <label for="default" class=" control-label">Student Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="studentname" placeholder="John Doe" class="form-control" onInput="checkName()" id="studentname" maxlength="40" required="required">
                                                    <span id="feedbackname" class="" style='color:red;font-size:12px;' ;></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class=" control-label">Gender</label>
                                                <div class="col-sm-12">
                                                    <input type="radio" name="gender" value="Male" required="required" checked="">Male
                                                    <!-- <br> -->
                                                    <input type="radio" name="gender" value="Female" required="required">Female
                                                    <!-- <br> -->
                                                </div>
                                            </div>






                                            <div class="form-group">
                                                <label for="default" class=" control-label">D.O.B</label>
                                                <div class="col-sm-12">
                                                    <input id="dob" name="dob" type="date" placeholder="YYYY-MM-DD" class="form-control input-md" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class=" control-label">RoolId</label>
                                                <div class="col-sm-12">
                                                    <input type="number" placeholder="123456" name="rollid" class="form-control" onInput="checkRollid()" id="rollid" maxlength="40" required="required">
                                                    <span id="feedback" class="" style='color:red;font-size:12px;' ;></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class=" control-label">Registration Date</label>
                                                <div class="col-sm-12">
                                                    <input type="date" name="date" class="form-control" id="date">
                                                </div>
                                            </div>



                                            <div class="form-group" class="">
                                                <label for="default" class=" control-label " id="gender">Student Class</label>
                                                <div class="col-sm-12">
                                                    <select id="class" name="class" class="form-control input-xs" required="">
                                                        <option value="">Select Class</option>
                                                        <?php
                                                       $classid = $_SESSION['ClassId'];
          
                                                       $sql = "SELECT * from tblclasses WHERE id =  '$classid' ";
                                                        $query = $dbh->prepare($sql);

                                                        $query->execute();

                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) { ?>
                                                                <option value="<?php echo htmlentities($result->id); ?>">
                                                                    <?php echo htmlentities($result->ClassName); ?>&nbsp;
                                                                </option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" class="">
                                                <label for="default" class=" control-label " id="gender">Session</label>
                                                <div class="col-sm-12">
                                                    <select id="session_idss" name="session_idss" class="form-control input-xs" required="">
                                                        <option value="">Select Session</option>
                                                        <?php
                                                        $sql = "SELECT * from tblsession";
                                                        $query = $dbh->prepare($sql);

                                                        $query->execute();

                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) { ?>
                                                                <option value="<?php echo htmlentities($result->id); ?>">
                                                                    <?php echo htmlentities($result->session); ?>&nbsp;
                                                                </option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" class="">
                                                <label for="default" class=" control-label " id="gender">Term</label>
                                                <div class="col-sm-12">
                                                    <select id="prog" name="term_ids" class="form-control input-xs" required="">
                                                        <option value="">Select term</option>
                                                        <?php
                                                        $sql = "SELECT * from tblterm";
                                                        $query = $dbh->prepare($sql);

                                                        $query->execute();

                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) { ?>
                                                                <option value="<?php echo htmlentities($result->id); ?>">
                                                                    <?php echo htmlentities($result->term); ?>&nbsp;
                                                                </option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class=" control-label">Student Image</label>
                                                <div class="col-sm-12">
                                                    <input type="file" name="image" class="form-control">
                                                    <span class="small" style="color:red"><b>Optional***</b></span>
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

                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>





                <!-- End Modal -->

















                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Roll Id</th>
                                        <th>Class</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Delete record</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Roll Id</th>
                                        <th>Class</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Delete record</th>
                                </tfoot>
                                <tbody>

                                    <?php

                                    $classid = $_SESSION['ClassId'];
                                    $sql = "SELECT  tblstudents.StudentId, tblstudents.gender,  
                                    tblstudents.StudentName,tblstudents.RollId,tblstudents.ClassId, 
                                    tblstudents.RegDate,tblstudents.Status, tblstudents.image,
                                     tblstudents.term_id, tblstudents.session_ids,
                                      tblclasses.ClassName, tblsession.session, tblterm.term 
                                      from tblstudents  LEFT  JOIN tblclasses on 
                                      tblclasses.id=tblstudents.ClassId LEFT  JOIN 
                                      tblsession on tblsession.id=tblstudents.session_ids  
                                      LEFT JOIN tblterm on tblterm.id=tblstudents.term_id  WHERE ClassId = '$classid'";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    // $cnt = 1;
                                    foreach ($results as $result) {
                                        $id = $result->StudentId; ?>
                                        <tr>
                                            <td><?php echo htmlentities($result->StudentName); ?></td>
                                            <td><?php echo htmlentities($result->RollId); ?></td>
                                            <td><?php echo htmlentities($result->ClassName); ?></td>
                                            <td><?php echo htmlentities($result->gender); ?></td>
                                            <td><?php if ($result->Status == 1) {
                                                    echo htmlentities('Active');
                                                } else {
                                                    echo "<p style='color:red'>Blocked</p>";
                                                } ?></td>

<td><a data-toggle="modal" class="btn btn-dark btn-sm" data-target="#edit_user" data-id="<?php echo $result->StudentId ?>" id="getUser">Edit</a></td>
                                            <td> <button type="button" onclick="deletestudent(this)" class="btn btn-danger btn-sm" id='<?= $id ?>'> <i class="fa fa-trash" title="Delete Record"></i> </button> </td>
                                        </tr> <?php
                                            } ?>




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


             

            </div>



        </div>
    </div>

    <!-- end modal -->

</div>
<!-- /.container-fluid -->


   <!-- Modal -->
                <div id="edit_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content modal-lg">

                            <div class="modal-header">
                                <h6 class="modal-title">
                                    <i class=""></i> Edit-Student-Info
                                </h6>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form class="form-group" id="updateStudentForm" method="POST" action="includes/student.php" enctype="multipart/form-data">
                                <div id="loved">

                                </div>



                        </div>
                    </div>
                </div>

                <!-- end modal -->



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
<script src="../admin/vendor/jquery/jquery.min.js"></script>
<script src="../admin/vendor/bootstrap-confirmation/bootbox.min.js"></script>
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

                            $("#eee").html(
                                '<div class="alert alert-success text-center">New Record Added </div>'
                            );

                            document.getElementById("uploadForm").reset();


                        } else {

                            $("#eee").html(
                                '<div class="alert alert-danger text-center"> ' + data + ' </div>'
                            );

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
            var action = "update";
            // alert(id);

            $.ajax({
                url: 'includes/student.php',
                type: 'POST',
                // data: 'id=' + uid,
                data: {
                    id: id,
                    action: action

                },

                beforeSend: function() {
                    $("#loved").html('Working on Please wait ..');
                },
                success: function(data) {
                    $("#loved").html(data);
                },
            })

        });
    })
</script>


<script>
    function checkRollid() {

        jQuery.ajax({
            url: "register.php",
            data: 'rollid=' + $("#rollid").val(),
            type: "POST",
            success: function(data) {
                $("#feedback").html(data);
            },
            error: function() {}

        });
    }

    function checkName() {

        jQuery.ajax({
            url: "register.php",
            data: 'studentname=' + $("#studentname").val(),
            type: "POST",
            success: function(data) {
                $("#feedbackname").html(data);
            },
            error: function() {}

        });

    }

    function deletestudent(obj) {
        var id = obj.id;
        // alert(id);

        bootbox.confirm("Do you really want to delete record?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete.php?id=' + id + '&&type=delstudent',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {

                        if (response == 1) {
                            $(obj).closest('tr').css('background', 'tomato');
                            $(obj).closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            });

                            setTimeout(function() {
                                $('#dataTable').load('student.php #dataTable');
                            }, 500);
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
    $(document).on("submit", "#updateStudentForm", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "includes/student.php",
            type: "POST",
            cache: false,
            contentType: false, // you can also use multipart/form-data replace of false
            processData: false,
            data: formData,

            success: function(response) {

                if (response) {

                    swal({
                        title: "Updated Sucessfully",
                        type: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                    });
                    $("#dataTable").load('student.php #dataTable');


                }
            }
        });
    });
</script>




<!-- ending javascript works -->


<script src="../admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../admin/js/demo/datatables-demo.js"></script>

</body>

</html>