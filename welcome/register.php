<?php include('partials/_header.php'); ?>
<?php include('partials/_navbar.php'); ?>
<div class="content-wrapper">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4 mt-2 mb-3">
                  <div class="card card-outline card-primary">
                     <div class="card-body mb-2">
                        <h3 class="login-box-msg">Register Form</h3>
                        <form action="" method="post">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Firstname">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Lastname">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="email" class="form-control" placeholder="Email Address">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Phone Number">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Username">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user-secret"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Password">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-2"></div>
                              <div class="col-8 mt-2">
                                 <button type="submit" class="btn btn-primary btn-block">Register</button>
                              </div>
                              <div class="col-2"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-sm-4"></div>
            </div>
         </div>
      </section>
   </main>
</div>

<?php include('partials/_footer.php') ?>