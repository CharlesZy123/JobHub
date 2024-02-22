<?php include('partials/_header.php');
require('../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $usernameOrEmail = $_POST['email'];
   $password = $_POST['password'];
   $dept = $_POST['dept'];

   if (empty($usernameOrEmail) || empty($password)) {
      $message = base64_encode('danger~Please enter both username/email and password.');
      header("Location: login?m=" . $message);
      exit();
   }

   if (empty($dept)) {
      $message = base64_encode('danger~Please choose a department!');
      header("Location: login?m=" . $message);
      exit();
   }

   $query = "SELECT * FROM users WHERE username = '$usernameOrEmail' OR email = '$usernameOrEmail'";
   $result = $conn->query($query);

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      if (password_verify($password, $row['password'])) {
         if ($row['role'] == 1) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_role'] = $row['role'];
            $_SESSION['dept'] = $dept;

            header("Location: redirect");
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

$query = "SELECT * FROM systems";
$result = mysqli_query($conn, $query);

if (isset($_SESSION['admin_id']) && isset($_SESSION['dept'])) {
   header("Location: redirect");
}

$query = "SELECT * FROM systems";
$result = mysqli_query($conn, $query);
?>

<div class="login-box">
   <div class="text-center mb-4">
      <a class="h1" href="../index"><b>Job<span class="text-blue">Hub</span></b></a>
   </div>
   <div class="card card-outline">
      <div class="card-body m-2">
         <form action="" method="post">
            <p class="login-box-msg">Sign in as Administrator</p>
            <select class="form-control text-center mb-4" name="dept" required>
               <option selected disabled value="">Select Department</option>
               <?php foreach($result as $value):?>
                  <option value="<?= $value['id']?>"><?= $value['name']?></option>
               <?php endforeach;?>
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

<?php include('partials/_footer.php')?>