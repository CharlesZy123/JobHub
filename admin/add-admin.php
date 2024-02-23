<?php include('partials/_header.php');
require('../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   $sys = $_POST['sys'];

   if (empty($username) || empty($email) || empty($sys)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: add-admin?m=");
      exit();
   }

   $insertUserQuery = "INSERT INTO admins (username, email, password, system_id, role) VALUES ('$username', '$email', '$password', '$sys', 1)";

   if (mysqli_query($conn, $insertUserQuery)) {
      $message = base64_encode('success~Admin ' . $username . ' successfully added!');
      header("Location: manage-admin?m=" . $message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: manage-admin?m=" . $message);
   }

   mysqli_close($conn);
}

$query = "SELECT * FROM systems";
$result = mysqli_query($conn, $query);

include('partials/_navbar.php');
include('partials/_sidebar.php');
?>

<div class="wrapper">
   <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-2"></div>
               <div class="col-sm-8">
                  <div class="card mt-5">
                     <div class="card-header">
                        <h5 class="mt-1">New Admin</h5>
                     </div>
                     <form action="" method="post">
                        <div class="card-body">
                           <div class="row" style="display:flex;justify-content:center;">
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Username:</label>
                                    <input type="text" class="form-control mr-3" placeholder="Write username here..." name="username" autofocus required>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Email:</label>
                                    <input type="email" class="form-control mr-3" placeholder="Write email address here..." name="email" required>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Password:</label>
                                    <input type="password" class="form-control mr-3" placeholder="Write password here..." name="password" required>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <select class="form-control text-center mb-4" name="sys" required>
                                    <option selected disabled value="">Select System</option>
                                    <?php foreach ($result as $value) : ?>
                                       <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="manage-admin" class="btn btn-secondary">Cancel</a>
                           <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-sm-2"></div>
            </div>
            <!-- /.row -->
         </div>
      </section>
      <!-- /.content -->
   </div>
</div>

<?php include('partials/_footer.php') ?>