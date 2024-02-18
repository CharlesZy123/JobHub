<?php include('partials/_header.php');
require('../db/dbconn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   require('../db/dbconn.php');

   $usernameOrEmail = $_POST['email'];
   $password = $_POST['password'];
   $dept = $_POST['department'];

   if (empty($usernameOrEmail) || empty($password)) {
      $message = base64_encode('danger~Please enter both username/email and password.');
      header("Location: login?m=" . $message);
      exit();
   }

   if (empty($dept)) {
      $message = base64_encode('danger~Please select a department.');
      header("Location: login?m=" . $message);
      exit();
   }

   $query = "SELECT * FROM staff WHERE username = '$usernameOrEmail' OR email = '$usernameOrEmail'";
   $result = $conn->query($query);

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      if (password_verify($password, $row['password'])) {
         if ($row['role'] == 1) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_role'] = $row['role'];

            $message = base64_encode('success~Login successful!');
            header("Location: index?m=" . $message);
            exit();
         } else {
            $message = base64_encode('danger~Access denied. You do not have the required role.');
            header("Location: login?m=" . $message);
            exit();
         }
      } else {
         $message = base64_encode('danger~Incorrect password.');
         header("Location: login?m=" . $message);
         exit();
      }
   } else {
      $message = base64_encode('danger~User not found.');
      header("Location: login?m=" . $message);
      exit();
   }

   $conn->close();
}

if (isset($_SESSION['staff_id'])) {
   header("Location: ../staff/index");
}

$query = "SELECT * FROM systems";
$result = mysqli_query($conn, $query);
?>

<div class="content-wrapper">
   <main id="main">
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4 mt-5 mb-3">
                  <div class="text-center mt-5 mb-4">
                     <a class="h1" href="../index"><b>Job <span class="text-blue">Hunt</span></b></a>
                  </div>
                  <div class="card card-outline">
                     <div class="card-body m-2">
                        <h3 class="login-box-msg">Sign in as Staff</h3>
                        <form action="" method="post">
                           <select class="form-control text-center mb-3" name="department">
                              <option selected disabled value="">Select a Department</option>
                              <?php foreach ($result as $option) : ?>
                                 <option value="<?= $option['id'];?>"><?= $option['name'];?> Department</option>
                              <?php endforeach; ?>
                           </select>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Email or username" name="email">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Password" name="password">
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
                              <div class="col-12 mt-1">
                                 <a href="../welcome/login">Sign in as User</a>
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