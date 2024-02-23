<?php include('partials/_header.php');
require('../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = $_POST['name'];
   $desc = $_POST['descrip'];

   if (empty($name) || empty($desc)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: add-subsystem?m=");
      exit();
   }

   $insertQuery = "INSERT INTO systems (name, description) VALUES ('$name', '$desc')";

   if (mysqli_query($conn, $insertQuery)) {
      $message = base64_encode('success~System ' . $name . ' successfully added!');
      header("Location: subsystems?m=" . $message);
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: subsystems?m=" . $message);
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
                        <h5 class="mt-1"><i class="fas fa-info mr-3" title="Note: You can add a system here but you need to upload it into the directory first!"></i> Create New System</h5>
                     </div>
                     <form action="" method="post">
                        <div class="card-body">
                           <div class="row" style="display:flex;justify-content:center;">
                              <div class="col-sm-12">
                                 <div class="input-group ml-2 mb-4">
                                    <label class="mt-2 mr-3">Name:</label>
                                    <input type="text" class="form-control mr-3" placeholder="Write name here..." name="name" autofocus required>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <label class="mt-2 ml-2">Description:</label>
                                 <div class="input-group ml-2 mb-4">
                                    <textarea class="form-control" name="descrip" cols="30" rows="5" placeholder="Write description here..."></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer">
                           <a href="subsystems" class="btn btn-secondary">Cancel</a>
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