<?php
include('partials/_header.php');
include('partials/_navbar.php');
if (isset($_SESSION['user_id'])) {
   header("Location: ../users/dashboard.php");
}
?>

<div class="content-wrapper">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 mt-3 mb-3">
                  <div class="card">
                     <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                           <div>
                              <h3>Job <span class="color-b">Hunt</span></h3>
                              <p class="lead mb-5">San Isidro, Tomas Oppus Southern Leyte<br>
                                 Phone: 09052986495 <!-- Textmate ta hahaha -->
                              </p>
                           </div>
                        </div>
                        <div class="col-7">
                           <div class="form-group mt-2">
                              <label for="inputName">Name</label>
                              <input type="text" id="inputName" class="form-control" autofocus />
                           </div>
                           <div class="form-group">
                              <label for="inputEmail">E-Mail</label>
                              <input type="email" id="inputEmail" class="form-control" />
                           </div>
                           <div class="form-group">
                              <label for="inputSubject">Subject</label>
                              <input type="text" id="inputSubject" class="form-control" />
                           </div>
                           <div class="form-group">
                              <label for="inputMessage">Message</label>
                              <textarea id="inputMessage" class="form-control" rows="4"></textarea>
                           </div>
                           <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Send message">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- /.content -->
   </main>
</div>

<?php include('partials/_footer.php') ?>