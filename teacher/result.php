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



            <h3 class="page-header pb-4">Upload Result <button style="float:right" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                    <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>



            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Result</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">



                            <form class="form-horizontal" method="post" action="includes/result.php" id="result_form">

                                <fieldset>
                                    <div class="container" style="width:100%">

                                        <div class="form-group">
                                            <label for="default" class=" control-label">Class</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="class" class="form-control clid" id="classid" onChange="getStudent(this.value);" required="required">
                                                    <option value="">Select Class</option>
                                                    <?php 
                                                  $classid = $_SESSION['ClassId'];
                                                  $sql = "SELECT * from tblclasses where id = '$classid'";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {   ?>
                                                            <option value="<?php echo htmlentities($result->id); ?>">
                                                                <?php echo htmlentities($result->ClassName) ?>
                                                            </option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="action">
                                            <label for="date" class=" control-label ">Student Name</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="studentid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-12 col-md-12">
                                                <div id="reslt">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="date" class=" control-label">Subjects</label>
                                            <div class="col-sm-12 col-md-12">
                                                <div id="subject">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="date" class=" control-label">Exam</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="exam_id" class="form-control  xed" id="exam_id" required="required" onChange="getresult(this.value);">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="date" class=" control-label">Session</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="session_idss" class="form-control  ses" id="session_idss" required="required" onChange="getresult(this.value);">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="date" class=" control-label">Term</label>
                                            <div class="col-sm-12 col-md-12">
                                                <select name="term_ids" class="form-control  term" id="term_ids" required="required" onChange="getresult(this.value);">
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="date" class=" control-label">Head Master's Comment</label>
                                            <div class="col-sm-12 col-md-12">
                                                <textarea name="head_master" id="txtarea" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>


                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="action" id="action" value="Add" />
                            <input type="hidden" name="hidden_id">
                            <!--<input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form">-->
                            <input id="add-result" type="submit" class="btn btn-success " name="submitb" value="Upload Result">

                            </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                        </fieldset>






                    </div>

                </div>

            </div>
            </div>


            <!-- End Modal -->


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Subject List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow-x: hidden;">
                        <form action="" method="post" id="show">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>Student-Name</th>
                                        <th>Class</th>
                                        <th>Session</th>
                                        <th>Term</th>
                                        <th>View Result</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Student-Name</th>
                                        <th>Class</th>
                                        <th>Session</th>
                                        <th>Term</th>
                                        <th>View Result</th>
                                        <th>Delete</th>
                                </tfoot>
                                <tbody id="">

                                    <?php

                                    $output = "";

                                    $classid = $_SESSION['ClassId'];


                                    $sql = "SELECT * FROM exam_test ";
                                    $sql .= " LEFT JOIN tblstudents on  tblstudents.StudentId=exam_test.StudentId";
                                    $sql .= " LEFT JOIN tblclasses on  tblclasses.id=exam_test.ClassId";
                                    $sql .= " LEFT JOIN tblsession on  tblsession.id=exam_test.session_ids";
                                    $sql .= " LEFT JOIN tblterm on  tblterm.id=exam_test.term_ids";
                                    $sql .= " LEFT JOIN exam_srms on  exam_srms.exam_id=exam_test.exam_id ";
                                    $sql .= " WHERE exam_test.ClassId = '$classid' ";

                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                                    foreach ($results as $result) {
                                         $id = $result->StudentId;
                                        $output .= '

                                                <tr>
                                            <input type="hidden" name="id"   id=  value=' . $result->StudentId  . '  style="border:0px" readonly>
                                        <td> <p> ' . $result->StudentName . '   </p> </td>
                                        <td> <p  > ' . $result->ClassName . '   </p> </td>
                                        <td> <p> ' . $result->session . '   </p> </td>
                                        <td> <p> ' . $result->term . '   </p> </td>
                                            <td><a data-toggle="modal" data-target="#edit_user"  class="btn  btn-dark btn-sm"  data-emp-id=' . $result->result_id . ' id="getUser">Check Result</a></td>
                                            <td><a data-toggle="modal" onclick="deleteresult(this)"  class="btn  btn-danger btn-sm"  data-emp-id=' . $result->result_id . ' id=' . $result->result_id . '>Delete</a></td>

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
            <div class="modal fade" id="edit_user" role="dialog">
                <div class="modal-dialog modal-lg ">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Record</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <form style="width :100% !important;" class="form-horizontal" method="post" id="user_form" action="includes/dates.php" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="container" style="width :100% !important;">
                                    <div id="love">

                                    </div>
                                </div>
                            </div>

                        <div class="modal-footer">

                        <button id="add" name="submit" type="submit" class="btn btn-info"> Update Result </button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
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
<script src="../admin/vendor/jquery/jquery.min.js"></script>
<script src="../admin/vendor/bootstrap-confirmation/bootbox.min.js"></script>
<!-- Javascript works -->

<script>
    $('#result_form').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "includes/result.php",
            method: "POST",
            data: $(this).serialize(),

            success: function(data) {
                if (data) {


                    swal({
                        title: "Uploaded",
                        type: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                    });

                    document.getElementById("result_form").reset();

                    $("#dataTable").load('result.php #dataTable');


                }
            },
        })
    });
</script>




<script>
    $(document).on('click', '#getUser', function() {

        var id = $(this).data('emp-id');

        $.ajax({

            url: "includes/result.php",

            method: "POST",

            data: {
                id: id,
                action: 'editId'
            },
            beforeSend: function() {
                $("#love").html('Working on Please wait ..');
            },


            // dataType: 'JSON',

            success: function(data) {

                $("#love").html(data);

                $('#hidden_id').val(id);
            }

        })

    });
</script>



<script>
    function deleteresult(obj) {
        var id = obj.id;
        // alert(id);
        bootbox.confirm("Do you really want to delete record?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete.php?id=' + id + '&&type=delresult',
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
                            alert('Invalid ID.');
                        }
                    }
                });
            }
        });
    }
</script>





<script>
    function getStudent(val) {
        $.ajax({
            type: "POST",
            url: "get_result.php",
            data: 'classid=' + val,
            success: function(data) {
                $("#studentid").html(data);

            }
        });
        $.ajax({
            type: "POST",
            url: "get_result.php",
            data: 'classid1=' + val,
            success: function(data) {
                $("#subject").html(data);

            }
        });

        $.ajax({
            type: "POST",
            url: "get_result.php",
            data: 'exam_id=' + val,
            success: function(data) {
                $("#exam_id").html(data);

            }
        });

        $.ajax({
            type: "POST",
            url: "get_result.php",
            data: 'session_idss=' + val,
            success: function(data) {
                $("#session_idss").html(data);

            }

        });

        $.ajax({
            type: "POST",
            url: "get_result.php",
            data: 'term_ids=' + val,
            success: function(data) {
                $("#term_ids").html(data);

            }

        });


    }




    function getresult(val, clid, xam, ses, tem) {

        var clid = $(".clid").val();
        var val = $(".stid").val();
        var xam = $(".xed").val();
        var ses = $(".ses").val();
        var tem = $(".term").val();
        var abh = clid + '$' + val + '$' + xam + '$' + ses + '$' + tem;
        // alert(abh);
        $.ajax({
            type: "POST",
            url: "get_result.php",
            data: 'studclassexamsesterm=' + abh,
            success: function(data) {
                $("#reslt").html(data);

            }
        });
    }
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