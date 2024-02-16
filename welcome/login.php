<?php include('partials/_header.php'); ?>
<?php include('partials/_navbar.php'); ?>
<div class="content-wrapper">
   <main id="main">
      <section class="content section-t8">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4 mt-4 mb-3">
                  <div class="text-center mb-3">
                     <a class="h1" href="index">Job <span class="color-b">Hunt</span></a>
                  </div>
                  <div class="card card-outline card-primary">
                     <div class="card-body">
                        <p class="login-box-msg">Sign in to start hunting your desired job!</p>
                        <form action="" method="post">
                           <div class="input-group mb-3">
                              <input type="email" class="form-control" placeholder="Email">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
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
                              <div class="col-8">
                                 <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                       Remember Me
                                    </label>
                                 </div>
                              </div>
                              <div class="col-4">
                                 <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                              </div>
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