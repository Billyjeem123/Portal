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
                <h3 class="page-header pb-4">Subject <button style="float:right" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                        <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">


                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Subject</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">


                                <div class="" id="eee"></div>

                                <form style="width :100% !important;" class="form-horizontal" method="post" id="user_form" action="" enctype="multipart/form-data">

                                    <fieldset>
                                        <div class="container" style="width:100%">


                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label ">SubjectName</label>
                                                <div class="col-sm-10">
                                                    <div class="">
                                                        <input type="text" name="subjectname" class="form-control" onInput="checkSubject()" id="subjectname" placeholder="Add Subject">
                                                        <span id="feedback" class="" style='color:red;font-size:12px;font-weight:bold' ;></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label ">SubjectCode</label>
                                                <div class="col-sm-10">
                                                    <div class="">
                                                        <input type="number" name="subjectcode" class="form-control" id="subjectcode" placeholder="Subject Code" required="required">
                                                        <span id="feedback" class="" style='color:red;font-size:12px;font-weight:bold' ;></span>
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



                <!-- //Start Modal -->


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
                                            <th style="width:30%;">SubjectName</th>
                                            <th style="width:30%;">SubjectCode</th>
                                            <th style="width:20%;">Edit</th>
                                            <th style="width:20%;"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width:30%;">SubjectName</th>
                                            <th style="width:30%;">SubjectCode</th>
                                            <th style="width:20%;">Edit</th>
                                            <th style="width:20%;"></th>
                                    </tfoot>
                                    <tbody id="">
                                        <?php

                                        $output = "";

                                        $sql = "SELECT  * from tblsubjects";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($results as $result) {
                                            $id = $result->id;
                                            $output .= '

                                        <tr>
                                    <input type="hidden" name="id"   id=  value=' . $result->id  . '  style="border:0px" readonly>
                                <td> <p> ' . $result->SubjectName . '   </p> </td>
                                <td> <p> ' . $result->SubjectCode . '   </p> </td>
                            <td><a data-toggle="modal" data-target="#edit_user" class="btn btn-dark btn-sm"  data-id=' . $result->id . ' id="getUser"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></td>
                            <td><button type="button"  onclick="deletes(this)"   name="delete" class="btn btn-danger btn-sm" id="' .  $result->id . '"> <i class="fa fa-trash" title="Delete Record"></i></button></td>

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
                <div class="modal-dialog modal-lg">


                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Edit Record</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <form class="form-group" method="POST" action="includes/subject.php" enctype="multipart/form-data" id="userForm">

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
         function checkSubject() {

            jQuery.ajax({
               url: "register.php",
               data: 'subjectname=' + $("#subjectname").val(),
               type: "POST",
               success: function(data) {
                  $("#feedback").html(data);
               },
               error: function() {}

            });
         }
      </script>

      <script>
         $(document).on('click', '#addsubject', function(e) {

            e.preventDefault();
            var subjectname = $('#subjectname').val();
            var subjectcode = $('#subjectcode').val();
            var action = "insert";
            // alert(action);
            $.ajax({
                  type: "POST",
                  url: "includes/subject.php",
                  // data: data,
                  // action: action,
                  data: {
                     subjectname: subjectname,
                     subjectcode: subjectcode,
                     action: action
                  },
                  // dataType: "json",
                  encode: true,
               })

               .done(function(data) {

                  $('#subjectname').val('');
                  $('#subjectcode').val('');

                  swal({
                        title: "Done",
                        icon: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                     }),

                  $("#dataTable").load('subject.php #dataTable');


               });

         });
      </script>



      <script>
         $(document).ready(function() {

            $(document).on('click', '#getUser', function(e) {

               e.preventDefault();

               var id = $(this).data('id');
               var action = "edit";
               // alert(action);

               $.ajax({
                  url: 'includes/subject.php',
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
         function deletes(obj) {
            var id = obj.id;
            bootbox.confirm("Do you really want to delete record?", function(result) {
               if (result == true) {
                  // AJAX Request
                  $.ajax({
                     url: 'delete.php?id=' + id + '&&type=subject',
                     type: 'GET',
                     data: {
                        id: id
                     },
                     success: function(response) {

                        if (response == 1) {
                           $("#students").load('subject.php #students');
                        } else {
                           alert('Invalid ID.');
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