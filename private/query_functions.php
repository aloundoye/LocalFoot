<?php

    function find_all_terrains(){
        global $db;
        $sql = "SELECT * FROM terrain";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_terrain_by_id($id){
    global $db;
    $sql = "SELECT * FROM terrain ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; //return an assoc. array
    }

function insert_terrain($id, $nom_terrain , $taille, $prix, $description){
    global  $db;

    $sql = "INSERT INTO terrain ";
    $sql .= "(id, nom_terrain, taille, prix, description) ";
    $sql .= "VALUES (";
    $sql .= "'" . $id . "',";
    $sql .= "'" . $nom_terrain . "',";
    $sql .= "'" . $taille . "',";
    $sql .= "'" . $prix . "',";
    $sql .= "'" . $description . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if ($result){
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect();
        exit();
    }
}