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


                <div class="text-center" id="eee"></div>

                <h3 class="page-header pb-4">SubjectCombination <button style="float:right" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>






                <!-- //Start Modal -->

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Classes</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">




                                <form style="width :100% !important;" class="form-horizontal" method="post" id="user_form" action="includes/subject.php" enctype="multipart/form-data">

                                    <fieldset>
                                        <div class="container" style="width:100%">
                                            <div class="see" id="see"></div>


                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label ">ClassName</label>
                                                <div class="col-sm-10">
                                                    <div class="">
                                                        <select name="classes" class="form-control clid classes " id="classes" required="required">
                                                            <option value="">Select Class</option>
                                                            <?php $sql = "SELECT * from tblclasses";
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
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label ">SubjectName</label>
                                                <div class="col-sm-10">
                                                    <div class="" style="width:100%">
                                                        <select class="songs form-select" name="subject[]" id="subject" multiple style="width:100%">
                                                            <option value="select subject">Select Subject</option>
                                                            <?php $sql = " SELECT * from tblsubjects ";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            if ($query->rowCount() > 0) {
                                                                foreach ($results as $result) {   ?>
                                                                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->SubjectName); ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
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
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
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
                                            <th style="width:30%">Subject-Name</th>
                                            <th style="width:20%">Class</th>
                                            <th style="width:20%">Activate Subject</th>
                                            <th style="width:20%">Deactivate Subject</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width:30%">Subject-Name</th>
                                            <th style="width:20%">Class</th>
                                            <th style="width:20%">Activate Subject</th>
                                            <th style="width:20%">Deactivate Subject</th>
                                    </tfoot>
                                    <tbody id="">
                                        <?php

                                        $sql = " SELECT tblclasses.ClassName,tblsubjects.SubjectName,tblsubjectcombination.id as 
        scid,tblsubjectcombination.status from tblsubjectcombination join tblclasses on 
        tblclasses.id=tblsubjectcombination.ClassId  join 
        tblsubjects on tblsubjects.id=tblsubjectcombination.SubjectId ";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($results as $result) {
                                            $id =  $result->scid;
                                        ?>
                                            <tr>
                                                <td><?php echo htmlentities($result->ClassName); ?></td>
                                                <td><?php echo htmlentities($result->SubjectName); ?></td>
                                                <td><?php $stts = $result->status;
                                                    if ($stts == '0') {
                                                        echo "<p style='color:red'>Subject Deactivated</p>";
                                                    } else {
                                                        echo htmlentities('Subject Activated');
                                                    }
                                                    ?></td>
                                                <td>
                                                    <?php if ($stts == '0') {

                                                    ?>
                                                <td>
                                                    <button type="button" onclick="Activate(this)" class="btn btn-secondary" id='<?= $id; ?>'>
                                                        <i class="fa fa-check" title="Activate Record"></i>
                                                    </button>
                                                </td>
                                            <?php } else { ?>


                                                <button type="button" onclick="Dectivate(this)" class="btn btn-secondary" id='<?= $id; ?>'>
                                                    <i class="fa fa-times" title="Deactivate Record"></i>
                                                </button>
                                            <?php } ?>
                                            </td>


                                            </tr>

                                        <?php }


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


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.songs').select2();
    });

    $(document).on('click', '#addclass', function(event) {
        event.preventDefault();

        var classes = $("#classes").val();

        var action = "insert_combo";

        var subject = $("#subject").val();




        $.ajax({
            type: "POST",
            url: "includes/subject.php",
            data: {
                classes: classes,
                subject: subject,
                action: action

            },

            success: function(response) {


                $("#see ").html(
                    '<div class="alert alert-success text-center" style="font-size:20px"> Batch Added </div>'
                );
                document.getElementById("user_form").reset();

                $("#dataTable").load('manage_subject.php #dataTable');


            }
        });
        // });
    });
</script>

<script>
    function Dectivate(obj) {
        var id = obj.id;
        bootbox.confirm("Do you really want to deactivate  record?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete.php?id=' + id + '&&type=deactivateSubject',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {

                        $("#eee").html(
                            '<div class="alert alert-danger"> ' + response + ' </div>'
                        );
                        $("#dataTable").load('manage_subject.php #dataTable');
                    }
                });
            }
        });
    }
</script>

<script>
    function Activate(obj) {
        var id = obj.id;
        // alert(id);
        bootbox.confirm("Do you really want to Activate  record?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete.php?id=' + id + '&&type=ActivateRecord',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {

                        $("#eee").html(
                            '<div class="alert alert-success"> ' + response + ' </div>'
                        );
                        $("#dataTable").load('manage_subject.php #dataTable');
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