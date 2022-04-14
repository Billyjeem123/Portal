
<script>
            $('.side-nav li a').each(function() {
                if ((location.href).includes($(this).attr('href')) == true) {
                    $(this).closest('li').addClass("active")
                    console.log($(this).closest('li').parent('ul').attr('id'))
                    if ($(this).closest('li').parent('ul').hasClass('collapse') == true) {
                        $('[data-target="#' + $(this).closest('li').parent('ul').attr('id') + '"]').click()
                    }
                }
            })
        </script>

        <script type="text/javascript">
           $(function($) {
            $('#example').DataTable();

            $('#example2').DataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false
            });

            $('#example3').DataTable();
        });
        </script>




</body>

</html>