<?php

require_once('../../private/initialize.php');

if (is_post_request()){
$nom_terrain = $_POST['nom_terrain'] ?? '';
$taille = $_POST['taille'] ?? '';
$description = $_POST['description'] ?? '';
$prix = $_POST['prix'] ?? '';
$new_id = getGUID();
$result = insert_terrain($new_id, $nom_terrain, $taille, $prix, $description);
redirect_to(url_for('/terrain.php?id=' . $new_id));
}else{
    redirect_to(url_for('/admin/new.php'));
}
?>



