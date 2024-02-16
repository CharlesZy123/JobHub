<?php include('partials/_header.php'); ?>
<?php include('partials/_navbar.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   require('../db/dbconn.php');

   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $contact = $_POST['contact'];
   $username = $_POST['username'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   $sql = "INSERT INTO users (firstname, lastname, email, contact, username, password) VALUES ('$fname', '$lname', '$email', '$contact', '$username', '$password')";

   if ($conn->query($sql) === TRUE) {
      $message = base64_encode('success~Account successfully registered!');
      header("Location: login?m=".$message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: register?m=".$message);
   }

   $conn->close();
}
?>
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
                              <input type="text" class="form-control" placeholder="Firstname" name="fname" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Lastname" name="lname" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="email" class="form-control" placeholder="Email Address" name="email">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Phone Number" name="contact" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Username" name="username" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user-secret"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Password" name="password" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                 </div>
                              </div>
                           </div>
                           <label for="">Choose to Register:</label>
                           <div class="input-group row mb-3 pl-4 required">
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="E-ClothRider">
                                 <label class="form-check-label" for="E-ClothRider">E-Cloth Rider</label>
                              </div>
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="SeafairEmployee">
                                 <label class="form-check-label" for="SeafairEmployee">Seafair Employee</label>
                              </div>
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="RealEstateEmployee">
                                 <label class="form-check-label" for="RealEstateEmployee">Real Estate Employee</label>
                              </div>
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="PISOEmployee">
                                 <label class="form-check-label" for="PISOEmployee">PISO Employee</label>
                              </div>
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="HypebeastEmployee">
                                 <label class="form-check-label" for="HypebeastEmployee">Hypebeast Employee</label>
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