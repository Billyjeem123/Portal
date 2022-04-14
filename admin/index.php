<?php  include("includes/header.php")?>
<?php  include("includes/config.php")?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php  include("includes/sidebar.php")  ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php  include("includes/navbar.php") ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="javascript:void(0)" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i></a>
          </div>

          <!-- Content Row -->
          <div class="row">

           
            
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      Registered Students
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                                    <?php 
             $sql1 ="SELECT StudentId from tblstudents ";
             $query1 = $dbh -> prepare($sql1);
             $query1->execute();
             $results1=$query1->fetchAll(PDO::FETCH_OBJ);
             $totalstudents=$query1->rowCount();
?>
                           <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="student.php"><?php echo htmlentities($totalstudents);?></a></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $totalstudents ; ?>%" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="20000"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-fw fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>







            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Classes
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                                    <?php 
            $sql2 ="SELECT id from  tblclasses ";
            $query2 = $dbh -> prepare($sql2);
            $query2->execute();
            $results2=$query2->fetchAll(PDO::FETCH_OBJ);
            $totalclasses=$query2->rowCount();
?>
                           <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="class.php"><?php echo htmlentities($totalclasses);?></a></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $totalclasses ; ?>%" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="20000"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>




            
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                          Result Declared
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                                    <?php 
            $sql ="SELECT  result_id from exam_test ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $totalclassesresult=$query->rowCount();
?>
                           <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="result.php"><?php echo htmlentities($totalclassesresult);?></a></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $totalclassesresult ; ?>%" aria-valuenow=""
                              aria-valuemin="0" aria-valuemax="20000"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-fw fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>





            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      Registered Teacher
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                                    <?php 
            $sql ="SELECT teacher_id from  tblteacher ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $tacher=$query->rowCount();
?>
                           <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="staff.php"><?php echo htmlentities($tacher);?></a></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $tacher ; ?>%" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="20000"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-fw fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      Subjects Listed 
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                                    <?php 
            $sql ="SELECT id from  tblsubjects ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $totalsubjects=$query->rowCount();
?>
                           <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="subject.php"><?php echo htmlentities($totalsubjects);?></a></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $totalsubjects ; ?>%" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="20000"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                         Visitors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-fw fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

        

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">General Info</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Registered Teachers <span class="float-right"> <?php echo $tacher ; ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $tacher ; ?>%" aria-valuenow="20"
                      aria-valuemin="0" aria-valuemax="30000"></div>
                  </div>
                  <h4 class="small font-weight-bold">   Result Declared <span class="float-right"><?php echo $totalclassesresult ; ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $totalclassesresult ; ?>%" aria-valuenow="40"
                      aria-valuemin="0" aria-valuemax="<?php echo $totalclassesresult ; ?>"></div>
                  </div>
                  <h4 class="small font-weight-bold">Registered Classes <span class="float-right"><?php echo $totalclasses ; ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $totalclasses ; ?>%" aria-valuenow="60" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Registered Student <span class="float-right"><?php echo $totalstudents ; ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $totalstudents ; ?>%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="<?php echo $totalstudents ; ?>"></div>
                  </div>
                  <h4 class="small font-weight-bold">Visitors <span class="float-right">Visitors!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

             

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <?php
                     $sql = "SELECT  * from about";
                     $query = $dbh->prepare($sql);
                     $query->execute();
                     $results = $query->fetchAll(PDO::FETCH_OBJ);
                     foreach ($results as $keys) {

                   ?>
                    <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" -->
                      <!-- src="img/undraw_posting_photo.svg" alt="..."> -->

                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" 
                       src="upload/<?php   echo $keys->photo ?>" alt="..."> 
                  </div>
                  <p>School background Image</p>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">About School</h6>
                </div>
                <div class="card-body">

                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                    CSS bloat and poor page performance. Custom CSS classes are used to create
                    custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the
                    Bootstrap framework, especially the utility classes.</p>
                </div>
              </div>
              <?php  } ?>





            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Developed By BillyJeem </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>