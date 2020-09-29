<?php
require_once('../private/initialize.php');
$id = $_GET['id'] ?? '1';
$terrain = find_terrain_by_id($id);

echo $terrain['nom_terrain'];