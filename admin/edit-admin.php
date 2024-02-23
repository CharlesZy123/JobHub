<?php include('partials/_header.php');
require('../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   $sys = $_POST['sys'];

   if (empty($username) || empty($email) || empty($sys)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: edit-admin?id=" . $id . "&m=" . $message);
      exit();
   }


   if (!empty($password)) {
      $updateQuery = "UPDATE admins SET username = '$username', email = '$email', password = '$password', system_id = '$sys' WHERE id = '$id'";
   } else {
      $updateQuery = "UPDATE admins SET username = '$username', email = '$email', system_id = '$sys' WHERE id = '$id'";
   }

   if (mysqli_query($conn, $updateQuery)) {
      $message = base64_encode('success~Admin ' . $username . ' successfully updated!');
      header("Location: manage-admin?m=" . $message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: manage-admin?m=" . $message);
   }

   mysqli_close($conn);
}

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $query = "SELECT * FROM systems JOIN admins ON admins.system_id = systems.id WHERE admins.id = '$id'";
   $result = mysqli_query($conn, $query);
   $row = $result->fetch_assoc();

   $query2 = "SELECT * FROM systems";
   $result2 = mysqli_query($conn, $query2);
} else {
   $message = base64_encode('danger~Something went wrong!');
   header("Location: manage-admin?m=" . $message);
}

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
                        <h5 class="mt-1">Edit Admin</h5>
                     </div>
                     <form action="" method="post">
                        <div class="card-body">
                           <div class="row" style="display:flex;justify-content:center;">
                              <input type="hidden" class="form-control mr-3" name="id" value="<?= $row['id'] ?>" autofocus required>
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Username:</label>
                                    <input type="text" class="form-control mr-3" name="username" value="<?= $row['username'] ?>" autofocus required>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Email:</label>
                                    <input type="email" class="form-control mr-3" name="email" value="<?= $row['email'] ?>" required>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Password:</label>
                                    <input type="password" class="form-control mr-3" placeholder="Type new password here..." name="password">
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <select class="form-control text-center mb-4" name="sys" required>
                                    <option selected disabled>Select System</option>
                                    <?php foreach ($result2 as $value) : ?>
                                       <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="manage-admin" class="btn btn-secondary">Cancel</a>
                           <button type="submit" class="btn btn-success float-right">Update</button>
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