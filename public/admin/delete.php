<?php
    require_once('../../private/initialize.php');
    $page_title = 'Supprimer Terrain';
    if (!isset($_GET['id'])){
        redirect_to(url_for('/admin/index.php'));
    }
    $id = $_GET['id'];

    if (is_post_request()){
        $result = delete_terrain($id);
        redirect_to(url_for('/admin/terrains.php'));

    } else{
        $terrain = find_terrain_by_id($id);
    }
?>

<?php include(SHARED_PATH . '/admin_header.php'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Supprimer Terrain</h1>
<div class="container">
    <p>Voulez-vous vraiment supprimer ce terrain?</p>
    <p><?php echo $terrain['nom_terrain'];?></p>
    <form action="" method="post">
        <button type="submit" class="btn btn-primary">Supprimer</button>
        <a href="terrains.php" class="btn btn-danger">Annuler</a>
    </form>
</div>
<?php include(SHARED_PATH . '/admin_footer.php') ?>
