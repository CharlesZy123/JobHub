<?php include('partials/_header.php');
require('../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $name = $_POST['name'];
   $desc = $_POST['descrip'];
   $status = $_POST['status'];

   if (empty($name) || empty($desc)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: edit-subsystem?id=" . $id . "&m=" . $message);
      exit();
   }
   
   $updateQuery = "UPDATE systems SET name = '$name', description = '$desc', sys_true = '$status' WHERE id = '$id'";
   
   if (mysqli_query($conn, $updateQuery)) {
      $message = base64_encode('success~Successfully updated!');
      header("Location: subsystems?m=" . $message);
      exit();
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: subsystems?m=" . $message);
      exit();
   }
   
   mysqli_close($conn);
}

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $query = "SELECT * FROM systems WHERE id = '$id'";
   $result = mysqli_query($conn, $query);
   $row = $result->fetch_assoc();
   
   $query2 = "SELECT * FROM systems";
   $result2 = mysqli_query($conn, $query2);
} else {
   $message = base64_encode('danger~Something went wrong!');
   header("Location: subsytems?m=" . $message);
   exit();
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
                        <h5 class="mt-1">Edit System</h5>
                     </div>
                     <form action="" method="post">
                        <div class="card-body">
                           <div class="row" style="display:flex;justify-content:center;">
                              <input type="hidden" class="form-control mr-3" name="id" value="<?= $row['id'] ?>" autofocus required>
                              <div class="col-sm-7">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Name:</label>
                                    <input type="text" class="form-control mr-3" placeholder="Write name here..." name="name" value="<?= $row['name'] ?>" autofocus required>
                                 </div>
                              </div>
                              <div class="col-sm-5">
                                 <div class="pl-2 custom-control custom-switch custom-switch-off-danger custom-switch-on-success mt-2">
                                    <label class="mr-5">Status:</label>
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                    <label class="custom-control-label" for="customSwitch3">Offline</label>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <label class="mt-2 ml-2">Description:</label>
                                 <div class="input-group ml-2 mb-4">
                                    <textarea class="form-control" name="descrip" cols="30" rows="5" placeholder="Write description here..."><?= $row['description'] ?></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="subsystems" class="btn btn-secondary">Cancel</a>
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