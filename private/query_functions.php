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