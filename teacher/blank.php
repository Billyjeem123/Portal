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
    $(document).ready(function() {

        $(document).on('click', '#getUser', function(e) {

            e.preventDefault();

            var id = $(this).data('id');
            var action = "edit";
            // alert(action);

            $.ajax({
                url: 'includes/classes.php',
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
                    //  alert(data);
                },
            })

        });
    })
</script>




<script>
    $(document).on('click', '#addclass', function(e) {

        e.preventDefault();
        var classname = $('#classname').val();
        var action = "insert";
        $.ajax({
                type: "POST",
                url: "includes/classes.php",
                data: {
                    classname: classname,
                    action: action
                },

                // dataType: "json",
                encode: true,
            })

            .done(function(data) {


                swal({
                        title: "Added",
                        icon: "success",
                        confirmButtonClass: "btn-success",
                        closeModal: false
                    }),

                    $('#classname').val('');
                $("#dataTable").load('class.php #dataTable');


            });

    });
</script>





<script>
    function checkUsername() {

        jQuery.ajax({
            url: "register.php",
            data: 'classname=' + $("#classname").val(),
            type: "POST",
            success: function(data) {
                $("#feedback").html(data);
            },
            error: function() {}

        });
    }
</script>








<script>
    function deletesclass(obj) {
        var id = obj.id;
        bootbox.confirm("Do you really want to delete record?", function(result) {
            if (result == true) {
                // AJAX Request
                $.ajax({
                    url: 'delete.php?id=' + id + '&&type=delclass',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {

                        if (response == 1) {
                            // Remove row from HTML Table
                            $(obj).closest('tr').css('background', 'tomato');
                            $(obj).closest('tr').fadeOut(200, function() {
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