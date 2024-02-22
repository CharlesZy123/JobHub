<?php
$current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
?>
<!-- Main Footer -->
<?php if ($current_page != 'login') { ?>
   <footer class="main-footer">
      <strong>Copyright &copy; 2024-2025 <a href="#">PISO</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 1.0.0
      </div>
   </footer>
<?php } ?>

<!-- jQuery -->
<script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="../assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets/adminlte/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/adminlte/dist/js/adminlte.min.js"></script>
<script>
   $(function() {
      <?php
      $decodedM = isset($_GET['m']) ? base64_decode(urldecode($_GET['m'])) : null;

      if ($decodedM != null) {
         $message = explode('~', $decodedM)[1];
         $design = explode('~', $decodedM)[0];

         if ($design == 'success') {
            echo 'toastr.success("' . $message . '");';
         } else {
            echo 'toastr.error("' . $message . '");';
         }
      }
      ?>

      $('#table').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": false,
         "responsive": true,
      });
   });
</script>
</body>

</html>