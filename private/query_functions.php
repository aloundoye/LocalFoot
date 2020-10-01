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

function update_terrain($terrain){
    global $db;

    $sql = "UPDATE terrain SET ";
    $sql .= "nom_terrain='" . $terrain['nom_terrain'] . "', ";
    $sql .= "description='" . $terrain['description'] . "', ";
    $sql .= "prix='" . $terrain['prix'] . "', ";
    $sql .= "taille='" . $terrain['taille'] . "' ";
    $sql .= "WHERE id='" . $terrain['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    }else{
        echo  mysqli_error($db);
        db_disconnect($db);
        exit();
    }

}

function insert_terrain($terrain){
    global  $db;

    $sql = "INSERT INTO terrain ";
    $sql .= "(id, nom_terrain, taille, prix, description) ";
    $sql .= "VALUES (";
    $sql .= "'" . $terrain['id'] . "',";
    $sql .= "'" . $terrain['nom_terrain'] . "',";
    $sql .= "'" . $terrain['taille'] . "',";
    $sql .= "'" . $terrain['prix'] . "',";
    $sql .= "'" . $terrain['description'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if ($result){
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}

function delete_terrain($id) {
    global $db;
    $sql = "DELETE FROM terrain ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    //For DELETE statements, $result is true/false
    if ($result){
        return true;
    } else {
        //DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit();
    }
}