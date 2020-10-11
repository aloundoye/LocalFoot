<?php
require_once('../../private/initialize.php');
require_admin_login();
$page_title = 'Modifier Terrain';
if (!isset($_GET['id'])){
    redirect_to(url_for('/admin/index.php'));
}
$id = $_GET['id'];

if (is_post_request()){
    $terrain = [];
    $terrain['nom_terrain'] = $_POST['nom_terrain'] ?? '';
    $terrain['taille'] = $_POST['taille'] ?? '';
    $terrain['description'] = $_POST['description'] ?? '';
    $terrain['prix'] = $_POST['prix'] ?? '';
    $result = update_terrain($terrain);

    if ($result===true){
        redirect_to(url_for('/admin/show.php?id=' . $terrain['id']));
    }else{
        $errors = $result;
    }

} else{
    $terrain = find_terrain_by_id($id);
}
?>

<?php include(SHARED_PATH . '/admin_header.php'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Modifier Terrain</h1>
<div class="container">
    <?php echo display_errors($errors); ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="nom_terrain">Nom du terrain</label>
            <input type="text" class="form-control form-control-sm col-xl-6" id="nom_terrain" name="nom_terrain" placeholder="Entrer le nom du terrain" value="<?php echo h($terrain['nom_terrain']);?>">
        </div>
        <div class="form-group">
            <label for="taille">Taille</label>
            <input type="text" class="form-control form-control-sm col-xl-6" id="taille" name="taille" placeholder="Entrer la taille du terrain ex: 30x40" value="<?php echo h($terrain['taille']);?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control form-control-sm col-xl-6" id="description" cols="30" rows="10" placeholder="Entrer la description du terrain" ><?php echo h($terrain['description']);?></textarea>
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="text" class="form-control form-control-sm col-xl-6" id="prix" name="prix" placeholder="Entrer le prix pour une reservation du terrain" value="<?php echo h($terrain['prix']);?>">
        </div>
        <div class="form-group">
            <label for="photo">Photo du terrain</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="terrains.php" class="btn btn-danger">Annuler</a>
    </form>
</div>
<?php include(SHARED_PATH . '/admin_footer.php') ?>
