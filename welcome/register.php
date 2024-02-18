<?php
include('partials/_header.php');
include('partials/_navbar.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   require('../db/dbconn.php');

   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $contact = $_POST['contact'];
   $username = $_POST['username'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

   $employeeTypes = isset($_POST['employee_type']) ? $_POST['employee_type'] : [];

   if (empty($fname) || empty($lname) || empty($email) || empty($contact) ||empty($username) || empty($password)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: register?m=" . $message);
      exit();
   }

   if (empty($employeeTypes)) {
      $message = base64_encode('danger~Please select to register with.');
      header("Location: register?m=" . $message);
      exit();
   }

   $checkUsernameQuery = "SELECT COUNT(*) as count FROM users WHERE username = ?";
   $stmt = $conn->prepare($checkUsernameQuery);
   $stmt->bind_param('s', $username);
   $stmt->execute();
   $result = $stmt->get_result();
   $row = $result->fetch_assoc();

   if ($row['count'] > 0) {
      $message = base64_encode('danger~Username is already taken. Please choose another.');
      header("Location: register?m=" . $message);
      exit();
   }

   $insertUserQuery = "INSERT INTO users (firstname, lastname, email, contact, username, password, role) VALUES (?, ?, ?, ?, ?, ?, 2)";
   $stmt = $conn->prepare($insertUserQuery);
   $stmt->bind_param('ssssss', $fname, $lname, $email, $contact, $username, $password);

   if ($stmt->execute()) {
      $userId = $conn->insert_id;

      foreach ($employeeTypes as $employeeType) {
         $insertRegisteredSql = "INSERT INTO registered (user_id, system_id) VALUES (?, ?)";
         $stmt = $conn->prepare($insertRegisteredSql);
         $stmt->bind_param('ss', $userId, $employeeType);
         $stmt->execute();
      }

      $message = base64_encode('success~Account successfully registered!');
      header("Location: login?m=" . $message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: register?m=" . $message);
   }

   $stmt->close();
   $conn->close();
}

if(isset($_SESSION['user_id'])){
   header("Location: ../users/dashboard.php");
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
                              <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Phone Number" name="contact" pattern="[0-9\+]+" title="Please enter only numbers and the '+' symbol" required>
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
                           <div class="input-group row mb-3 pl-4">
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="E-ClothRider" name="employee_type[]" value="1">
                                 <label class="form-check-label" for="E-ClothRider">E-Cloth Rider</label>
                              </div>
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="SeafairEmployee" name="employee_type[]" value="2">
                                 <label class="form-check-label" for="SeafairEmployee">Seafair Employee</label>
                              </div>
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="RealEstateEmployee" name="employee_type[]" value="3">
                                 <label class="form-check-label" for="RealEstateEmployee">Real Estate Employee</label>
                              </div>
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="PISOEmployee" name="employee_type[]" value="4">
                                 <label class="form-check-label" for="PISOEmployee">PISO Employee</label>
                              </div>
                              <div class="form-check col-sm-6 col-12">
                                 <input type="checkbox" class="form-check-input" id="HypebeastEmployee" name="employee_type[]" value="5">
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