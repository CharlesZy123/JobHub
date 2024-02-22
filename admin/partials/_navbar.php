<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <li class="nav-item">
         <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="#" role="button" data-toggle="modal" data-target="#modal-logout">
            <i class="fas fa-power-off"></i>
         </a>
      </li>
   </ul>
</nav>
<!-- /.navbar -->

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
            <form id="logout-form" action="logout.php" method="POST">
               <button type="submit" class="btn btn-danger">Yes</button>
            </form>
         </div>
      </div>
   </div>
</div>