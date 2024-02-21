<?php
require('../db/dbconn.php');
include('../welcome/partials/_header.php');
include('../welcome/partials/_navbar.php');
$id = $_SESSION['user_id'];
if (!isset($id)) {
    header("Location: ../index.php");
}
$query = "SELECT * FROM registered JOIN systems ON registered.system_id = systems.id WHERE registered.user_id = $id";
$result = mysqli_query($conn, $query);
?>
<div class="content-wrapper">
    <main id="main">
        <section class="content section-t8">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="row" style="display: flex; justify-content: center;">
                            <?php
                            $bgColors = ['bg-lightblue', 'bg-info', 'bg-navy', 'bg-maroon', 'bg-olive'];
                            $colorIndex = 0;
                            ?>
                            <?php foreach ($result as $test) : ?>
                                <div class="col-sm-5 m-2 col-12">
                                    <div class="small-box text-center <?= $bgColors[$colorIndex++] ?>">
                                        <div class="inner pt-3" style="cursor: default;">
                                            <h3><?= $test['name'] ?></h3>
                                            <p>Description here</p>
                                        </div>
                                        <a href="redirect?id=<?= $test['id']?>" class="small-box-footer">Continue <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </main>
</div>

<?php include('../welcome/partials/_footer.php') ?>