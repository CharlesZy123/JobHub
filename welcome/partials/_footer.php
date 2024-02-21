<footer class="bg-white">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <nav class="nav-footer">
               <ul class="list-inline">
                  <li class="list-inline-item">
                     <a href="index">Home</a>
                  </li>
                  <li class="list-inline-item">
                     <a href="about">About</a>
                  </li>
                  <li class="list-inline-item">
                     <a href="contact">Contact</a>
                  </li>
               </ul>
            </nav>
            <div class="socials-a">
               <ul class="list-inline">
                  <li class="list-inline-item">
                     <a href="https://www.facebook.com/charlesfonzy.cahapay">
                        <i class="bi bi-facebook" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a href="#">
                        <i class="bi bi-instagram" aria-hidden="true"></i>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="copyright-footer">
               <p class="copyright color-text-a">
                  &copy; Copyright
                  <span class="color-a">Job Hunt</span> All Rights Reserved.
               </p>
            </div>
            <div class="credits">
               Designed by <a href="#">Hugaw</a>
            </div>
         </div>
      </div>
   </div>
</footer>
</div>
<div class="modal fade" id="modal-logout">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Logging Out?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p>Are you sure you want to Logout?</p>
         </div>
         <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            <form id="logout-form" action="../welcome/logout.php" method="POST">
               <button type="submit" class="btn btn-danger">Yes</button>
            </form>
         </div>
      </div>
   </div>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- jQuery -->
<script src="../assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Vendor JS Files -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
   });
</script>
</body>

</html>