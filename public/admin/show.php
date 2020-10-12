<?php

require_once('../../private/initialize.php');
require_admin_login();
$id = $_GET['id'] ?? '1';
$terrain = find_terrain_by_id($id);

?>



<?php $page_title = ' Terrain' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
<div class="container">
    <div class="col-lg-9">

        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="<?php echo url_for('/admin/images/') . $terrain['image'];?>" alt="">
            <div class="card-body">
                <h3 class="card-title"><?php echo htmlspecialchars($terrain['nom_terrain']);?></h3>
                <h4><?php echo htmlspecialchars($terrain['prix']);?> FCFA</h4>
                <p class="card-text"><?php echo htmlspecialchars($terrain['description']);?></p>
            </div>
        </div>

    </div>
    <div class="my-5">
        <a class="btn btn-primary" href="<?php echo url_for('/admin/terrains.php');?>">Retourner à la liste</a>

    </div>

</div>


<?php include(SHARED_PATH . '/admin_footer.php') ?>
