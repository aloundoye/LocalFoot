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
        $sql .= "WHERE id='" . mysqli_real_escape_string($db, $id) . "'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $terrain = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $terrain; //return an assoc. array
    }

    function update_terrain($terrain){
        global $db;

        $errors = validate_terrain($terrain);
        if (!empty($errors)){
            return $errors;
        }

        $sql = "UPDATE terrain SET ";
        $sql .= "nom_terrain='" . mysqli_real_escape_string($db,$terrain['nom_terrain']) . "', ";
        $sql .= "description='" . mysqli_real_escape_string($db,$terrain['description']) . "', ";
        $sql .= "prix='" . mysqli_real_escape_string($db,$terrain['prix']) . "', ";
        $sql .= "taille='" . mysqli_real_escape_string($db,$terrain['taille']) . "' ";
        $sql .= "WHERE id='" . mysqli_real_escape_string($db,$terrain['id'] ). "' ";
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

        $errors = validate_terrain($terrain);
        if (!empty($errors)){
            return $errors;
        }

        $sql = "INSERT INTO terrain ";
        $sql .= "(id, nom_terrain, taille, prix, description) ";
        $sql .= "VALUES (";
        $sql .= "'" . mysqli_real_escape_string($db, $terrain['id']) . "',";
        $sql .= "'" . mysqli_real_escape_string($db, $terrain['nom_terrain']) . "',";
        $sql .= "'" . mysqli_real_escape_string($db, $terrain['taille']) . "',";
        $sql .= "'" . mysqli_real_escape_string($db, $terrain['prix']) . "',";
        $sql .= "'" . mysqli_real_escape_string($db, $terrain['description']) . "'";
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
        $sql .= "WHERE id='" . mysqli_real_escape_string($db, $id) . "' ";
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
     function validate_terrain($terrain){
        $errors = [];

        if (is_blank($terrain['nom_terrain'])){
            $errors[] = "Le nom du terrain ne peut pas être vide.";
        }
        if (is_blank($terrain['taille'])){
            $errors[] = "La taille du terrain ne peut pas être vide.";
        }
        if (is_blank($terrain['prix'])){
            $errors[] = "Le prix du terrain ne peut pas être vide.";
        }
        if (is_blank($terrain['description'])){
            $errors[] = "La description du terrain ne peut pas être vide.";
        }

        return $errors;
     }
?>