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
                                       <a href="#" class="btn btn-info m-1">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <a href="#" class="btn btn-danger m-1">
                                          <i class="fas fa-trash"></i>
                                       </a>
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