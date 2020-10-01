<?php

require_once('../../private/initialize.php');

if (is_post_request()){
    $terrain = [];
$terrain['nom_terrain'] = $_POST['nom_terrain'] ?? '';
$terrain['taille'] = $_POST['taille'] ?? '';
$terrain['description'] = $_POST['description'] ?? '';
$terrain['prix'] = $_POST['prix'] ?? '';
$terrain['new_id'] = getGUID();
$result = insert_terrain($terrain);
redirect_to(url_for('/terrain.php?id=' . $terrain['new_id']));
}else{
    redirect_to(url_for('/admin/new.php'));
}
?>



