<?php include('partials/_header.php');
require('../db/dbconn.php');
include('partials/_navbar.php');
include('partials/_sidebar.php');

$query = "SELECT * FROM systems JOIN admins ON admins.system_id = systems.id";
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
                        <a href="add-admin" class="btn btn-primary float-right">
                           <i class="fas fa-plus"></i> Add Admin
                        </a>
                        <h5 class="mt-1">Admin List</h5>
                     </div>
                     <div class="card-body">
                        <table id="table" class="table text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Action</th>
                                 <th>Username</th>
                                 <th>Email</th>
                                 <th>System</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($result as $key => $value) : ?>
                                 <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                       <a href="edit-admin?id=<?= $value['id']?>" class="btn btn-info m-1">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <a href="#" class="btn btn-danger m-1">
                                          <i class="fas fa-trash"></i>
                                       </a>
                                    </td>
                                    <td><?= $value['username'] ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td><?= $value['name'] ?></td>
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