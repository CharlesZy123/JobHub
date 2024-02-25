<?php include('partials/_header.php');
require('../db/dbconn.php');
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
                                    <td class="pl-5 pr-5"><?= $value['name'] ?></td>
                                    <td><?= $value['description'] ?></td>
                                    <td>
                                       <a href="edit-subsystem?id=<?= $value['id'] ?>" class="btn btn-info m-1">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <a href="#" class="btn btn-danger m-1" role="button" data-toggle="modal" data-target="#modal-delete-<?= $value['id']?>">
                                          <i class="fas fa-trash"></i>
                                       </a>
                                       <div class="modal fade" id="modal-delete-<?= $value['id']?>">
                                          <div class="modal-dialog modal-sm">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <h4 class="modal-title">System Warning!</h4>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                   </button>
                                                </div>
                                                <div class="modal-body">
                                                   <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   <form action="delete-system?id=<?= $value['id']?>" method="POST">
                                                      <button type="submit" class="btn btn-danger">Yes</button>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </td>
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