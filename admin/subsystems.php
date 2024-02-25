<?php include('partials/_header.php');
require('../db/dbconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $status = $_POST['status'];
   $name = $_POST['name'];

   if (empty($id) || empty($name)) {
      $message = base64_encode('danger~All fields are required.');
      header("Location: subsystems?id=" . $id . "&m=" . $message);
      exit();
   }
   
   $updateQuery = "UPDATE systems SET sys_true = '$status' WHERE id = '$id'";
   
   if (mysqli_query($conn, $updateQuery)) {
      if($status == 0){
         $stat = 'Offline';
      }else{
         $stat = 'Online';
      }
      $message = base64_encode('success~The '.$name.' system is now '.$stat.'!');
      header("Location: subsystems?m=" . $message);
      exit();
   } else {
      $message = base64_encode('danger~Something went wrong!');
      header("Location: subsystems?m=" . $message);
      exit();
   }
   
   mysqli_close($conn);
}

include('partials/_navbar.php');
include('partials/_sidebar.php');

$query = "SELECT * FROM systems";
$result = mysqli_query($conn, $query);
?>

<div class="wrapper">
   <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12 mt-5">
                  <div class="card">
                     <div class="card-header">
                        <a href="add-subsystem" class="btn btn-primary float-right">Add Subsystem</a>
                        <h5 class="mt-1">Subsystem List</h5>
                     </div>
                     <div class="card-body">
                        <table id="table" class="table table-bordered text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>System</th>
                                 <th>Description</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($result as $key => $value) : ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td class="p-3">
                                       <?= $value['name'] ?><br>
                                       <?php if ($value['sys_true'] == 1) : ?>
                                          <a href="#" class="badge badge-success" role="button" data-toggle="modal" data-target="#modal-sys_true-<?= $value['id'] ?>">Online</a>
                                       <?php else : ?>
                                          <a href="#" class="badge badge-secondary" role="button" data-toggle="modal" data-target="#modal-sys_false-<?= $value['id'] ?>">Offline</a>
                                       <?php endif; ?>
                                    </td>
                                    <td class="p-3"><?= $value['description'] ?></td>
                                    <td class="p-3 text-sm">
                                       <a href="edit-subsystem?id=<?= $value['id'] ?>" class="btn btn-info m-1">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <a href="#" class="btn btn-danger m-1" role="button" data-toggle="modal" data-target="#modal-delete-<?= $value['id'] ?>">
                                          <i class="fas fa-trash"></i>
                                       </a>
                                    </td>

                                    <!-- Modals -->
                                    <div class="modal fade" id="modal-sys_true-<?= $value['id'] ?>">
                                       <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                             <div class="modal-header bg-success">
                                                <h4 class="modal-title">System is Online!</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body text-center">
                                                <p>Are you sure you want to make it offline?</p>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                <form action="" method="POST">
                                                   <input type="hidden" name="id" value="<?= $value['id']?>">
                                                   <input type="hidden" name="status" value="0">
                                                   <input type="hidden" name="name" value="<?= $value['name']?>">
                                                   <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="modal fade" id="modal-sys_false-<?= $value['id'] ?>">
                                       <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                             <div class="modal-header bg-secondary">
                                                <h4 class="modal-title">System is Offline!</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body text-center">
                                                <p>Do you want to make the <?= $value['name']?> system online?</p>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                <form action="" method="POST">
                                                   <input type="hidden" name="id" value="<?= $value['id']?>">
                                                   <input type="hidden" name="status" value="1">
                                                   <input type="hidden" name="name" value="<?= $value['name']?>">
                                                   <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="modal fade" id="modal-delete-<?= $value['id'] ?>">
                                       <div class="modal-dialog modal-sm">
                                          <div class="modal-content">
                                             <div class="modal-header bg-danger">
                                                <h4 class="modal-title">System Warning!</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body text-center">
                                                <p>Are you sure you want to delete <?= $value['name']?> system?</p>
                                             </div>
                                             <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="delete-system?id=<?= $value['id'] ?>" method="POST">
                                                   <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- End of Modals -->
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.row -->
         </div>
      </section>
      <!-- /.content -->
   </div>
</div>

<?php include('partials/_footer.php') ?>