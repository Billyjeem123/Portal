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


            



            <!-- //Start Modal -->

            <h3 class="page-header pb-3">School Event <button style="float:right" type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
               <i class="glyphicon glyphicon-plus"></i> New Entry</button></h3>


               <div class="text-center" id="eee"></div>


         <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">


               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Event</h5>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">


                     <div class="" id="eee"></div>

                     <form style="width :100% !important;" class="form-horizontal" method="post" id="uploadForm" action="includes/event.php" enctype="multipart/form-data">

                        <fieldset>
                           <div class="container" style="width:100%">

                              <div class="form-group">
                                 <label for="date" class=" control-label ">Images</label>
                                 <div class="col-sm-12">
                                    <div class="">
                                       <input type="file" name="files[]" id="files" multiple>
                                    </div>
                                 </div>
                              </div>

                              <div id="image_preview"></div>

                              <div class="form-group">
                                 <label for="date" class=" control-label ">Event-Tittle</label>
                                 <div class="col-sm-12">
                                    <div class="">
                                       <input type="text" class="form-control" name="tittle" id="tittle">
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label for="date" class=" control-label ">Date</label>
                                 <div class="col-sm-12">
                                    <div class="">
                                       <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                 </div>
                              </div>

                              <input type="hidden" name="action" id="action" value="Add" />




                              <div class="form-group">
                                 <label for="date" class=" control-label ">Narrate Event</label>
                                 <div class="col-sm-12">
                                    <div class="">
                                       <textarea name="details" id="details" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                 </div>
                              </div>




                           </div>


                  </div>
                  </fieldset>



                  <div class="modal-footer">
                     <input type="button" class="btn btn-success " id="addevent" name="submit" value="Submit Form" class="btn btn-info">
                     <!-- <button id="addevent" type="button" class="btn btn-info">Submit Form</button> -->

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
                  <h6 class="m-0 font-weight-bold text-primary">Event List</h6>
               </div>
               <div class="card-body">
                  <div class="table-responsive" style="overflow-x: hidden;">
                     <form action="" method="post" id="show">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>Tittle</th>
                                 <th>Date</th>
                                 <th>View Record</th>
                                 <th>Delete Record</th>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
                                 <th>Tittle</th>
                                 <th>Date</th>
                                 <th>View Record</th>
                                 <th>Delete Record</th>
                           </tfoot>
                           <tbody id="">
                           <?php
                     $output = '';
                     $sql = "SELECT  * from tblevent";
                     $query = $dbh->prepare($sql);
                     $query->execute();
                     $results = $query->fetchAll(PDO::FETCH_OBJ);

                     foreach ($results as $result) {
                        $id = $result->id;
                        $tittle = $result->tittle;
                        $date = $result->date;

                     ?>

                        <tr>
                           <input type="hidden" name="id" id="<?php echo  $result->id   ?>" style="border:0px" readonly>
                           <td>
                              <?php echo $result->tittle   ?>

                           </td>
                           <td>
                              <?php echo $result->date ?>
                           </td>
                           <td><a href="edit-event.php?id=<?php  echo $result->id ?>" class="btn btn-dark btn-sm" data-id='<?php echo  $result->id   ?>' id="getUser">View-Event</a></td>
                           <td><button type="button" onclick="deleteevent(this)" name="delete" class="btn btn-danger btn-sm " id="<?php echo  $result->id   ?>"> <i class="fa fa-trash" title="Delete Record"></i></button></td>
                        <?php  }  ?>

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
                  <form class="form-group" id="sameUploadForm" method="POST" action="includes/event.php" enctype="multipart/form-data" id="userForm">
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

<script type="text/javascript">
      $(document).ready(function(e) {
         $('#addevent').on('click', function() {
            var form_data = new FormData();
            var ins = document.getElementById('files').files.length;
            for (var x = 0; x < ins; x++) {
               form_data.append("files[]", document.getElementById('files').files[x]);
               form_data.append("date",  document.getElementById('date').value);
               form_data.append("tittle", document.getElementById('tittle').value);
               form_data.append("details", document.getElementById('details').value);
               form_data.append("action", document.getElementById('action'));
            }
            $.ajax({
               url: 'includes/event.php', // point to server-side PHP script 
               dataType: 'text', // what to expect back from the PHP script
               cache: false,
               contentType: false,
               processData: false,
               data: form_data,
               type: 'post',
               success: function(response) {

                  $("#eee").html(
                     '<div class="alert alert-success text-center " style="font-size:20px"> Uploaded Sucessfully </div>'
                  );
                  document.getElementById("uploadForm").reset();



                  $("#dataTable").load('event.php #dataTable');
               },
               error: function(response) {
                  alert(respose);
               }
            });
         });
      });
   </script>

 


   <script>
      function deleteevent(obj) {
         var id = obj.id;
         // alert(id);
         bootbox.confirm("Do you really want to delete record?", function(result) {
            if (result == true) {
               // AJAX Request
               $.ajax({
                  url: 'includes/date.php?id=' + id + '&&type=delevent',
                  type: 'GET',
                  data: {
                     id: id
                  },
                  success: function(response) {

                      // Remove row from HTML Table
                      $(obj).closest('tr').css('background', 'tomato');
                            $(obj).closest('tr').fadeOut(800, function() {
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