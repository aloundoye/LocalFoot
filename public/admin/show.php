<?php

require_once('../../private/initialize.php');
$id = $_GET['id'] ?? '1';
$terrain = find_terrain_by_id($id);

?>



<?php $page_title = ' Terrain' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
<div class="container">
    <div>
        <?php echo $terrain['nom_terrain'];?>

    </div>
    <a class="btn btn-primary" href="<?php echo url_for('/admin/terrains.php');?>">Retourner à la liste</a>

</div>


<?php include(SHARED_PATH . '/admin_footer.php') ?>
