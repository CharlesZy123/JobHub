<?php include('../welcome/partials/_header.php'); ?>
<?php include('../welcome/partials/_navbar.php'); ?>
<?php
if(!isset($_SESSION['user_id'])){
   header("Location: ../index.php");
}
?>
<div class="content-wrapper">
    <main id="main">
        <section class="content section-t8">
            <div class="container-fluid">
                <div class="row" style="display: flex; justify-content: center;">
                    <div class="col-sm-4 mt-4">
                        <div class="card">
                            <div class="card-body">
                                Registered Employee Type Here!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </main>
</div>

<?php include('../welcome/partials/_footer.php') ?>