<?php

    require_once('../../private/initialize.php');
require_admin_login();
if (is_post_request()){
        $terrain = [];
        $terrain['nom_terrain'] = $_POST['nom_terrain'] ?? '';
        $terrain['taille'] = $_POST['taille'] ?? '';
        $terrain['description'] = $_POST['description'] ?? '';
        $terrain['prix'] = $_POST['prix'] ?? '';
        $terrain['id'] = getGUID();
        $result = insert_terrain($terrain);

        if ($result===true){
            redirect_to(url_for('/admin/show.php?id=' . $terrain['id']));
        }else{
            $errors = $result;
        }
    }else{
        $terrain = [];
        $terrain['nom_terrain'] = '';
        $terrain['taille'] = '';
        $terrain['description'] = '';
        $terrain['prix'] = '';
    }
?>






<?php $page_title = 'Ajouter Terrain' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ajouter Terrain</h1>
<div class="container">
    <?php echo display_errors($errors); ?>
<form action="new.php" method="post">
    <div class="form-group">
        <label for="nom_terrain">Nom du terrain</label>
        <input type="text" value="<?php echo htmlspecialchars($terrain['nom_terrain']);?>" class="form-control col-xl-6 form-control-sm" id="nom_terrain" name="nom_terrain" placeholder="Entrer le nom du terrain">
    </div>
    <div class="form-group">
        <label for="taille">Taille</label>
        <input type="text" value="<?php echo htmlspecialchars($terrain['taille']);?>" class="form-control col-xl-6 form-control-sm" id="taille" name="taille" placeholder="Entrer la taille du terrain ex: 30x40">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control col-xl-6 form-control-sm" id="description" cols="30" rows="10" placeholder="Entrer la description du terrain"><?php echo htmlspecialchars($terrain['description']);?></textarea>
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" value="<?php echo htmlspecialchars($terrain['prix']);?>" class="form-control col-xl-6 form-control-sm" id="prix" name="prix" placeholder="Entrer le prix pour une reservation du terrain">
    </div>

    <div class="form-group">
        <label for="photo">Photo du terrain</label>
        <input type="file" class="form-control-file" name="photo" id="photo">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="terrains.php" class="btn btn-danger">Annuler</a>
</form>
</div>
<?php include(SHARED_PATH . '/admin_footer.php') ?>
