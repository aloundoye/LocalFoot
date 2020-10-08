<?php
require_once('../private/initialize.php');
$id = $_GET['id'] ?? '';
$terrain = find_terrain_by_id($id);
?>
<?php $page_title = 'Accueil'; ?>
<?php include(SHARED_PATH . '/public_header.php');?>
<div class="col-lg-9">

    <div class="card mt-4">
        <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
        <div class="card-body">
            <h3 class="card-title"><?php echo htmlspecialchars($terrain['nom_terrain']);?></h3>
            <h4><?php echo htmlspecialchars($terrain['prix']);?> FCFA</h4>
            <p class="card-text"><?php echo htmlspecialchars($terrain['description']);?></p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
        </div>
    </div>

</div>
<!-- /.col-lg-9 -->

</div>

</div>
