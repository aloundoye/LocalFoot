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

    function find_all_admins(){
        global $db;
        $sql = "SELECT * FROM client";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

function find_admin_by_id($id){
    global $db;
    $sql = "SELECT * FROM client ";
    $sql .= "WHERE id='" . mysqli_real_escape_string($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin; //return an assoc. array
}



function validate_admin($admin, $options=[]){
    $errors = [];
    $password_required = $options['password_required'] ?? true;
    if (is_blank($admin['nom'])){
        $errors[] = "Le nom de l'administrateur ne peut pas être vide.";
    }
    if (is_blank($admin['prenom'])){
        $errors[] = "Le prénom de l'administrateur ne peut pas être vide.";
    }
    if (is_blank($admin['tel'])){
        $errors[] = "Le numero de l'administrateur ne peut pas être vide.";
    }
    if (is_blank($admin['email'])){
        $errors[] = "L'email de l'administrateur ne peut pas être vide.";
    } elseif (!has_valid_email_format($admin['email'])){
        $errors[] = "L'email de l'administrateur est incorrect";
    }elseif (!has_unique_email('client', $admin['email'], $admin['id'] ?? 0)){
        $errors[] = "L'email existe deja choisissez un autre";
    }

    if($password_required) {
        if(is_blank($admin['password'])) {
            $errors[] = "Le mot de passe ne peut pas etre vide.";
        } elseif (!has_length($admin['password'], array('min' => 8))) {
            $errors[] = "Le mot de passe doit contenir au moins 8 caracteres";
        } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins une lettre majuscule";
        } elseif (!preg_match('/[a-z]/', $admin['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins une lettre miniscule";
        } elseif (!preg_match('/[0-9]/', $admin['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins un chiffre";
        }

        if(is_blank($admin['confirm_password'])) {
            $errors[] = "La confirmation du mot de passe ne peut pas etre vide.";
        } elseif ($admin['password'] !== $admin['confirm_password']) {
            $errors[] = "Le mot de passe et le mot de passe de confirmation doivent correspondre.";
        }
    }
    return $errors;
}

function update_admin($admin){
    global $db;
    $password_sent = !is_blank($admin['password']);
    $errors = validate_admin($admin);
    if (!empty($errors)){
        return $errors;
    }
    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);
    $sql = "UPDATE client SET ";
    $sql .= "nom='" . mysqli_real_escape_string($db,$admin['nom']) . "', ";
    $sql .= "prenom='" . mysqli_real_escape_string($db,$admin['prenom']) . "', ";
    $sql .= "tel='" . mysqli_real_escape_string($db,$admin['tel']) . "', ";
    $sql .= "email='" . mysqli_real_escape_string($db,$admin['email']) . "', ";
    if ($password_sent){
        $sql .= "password='" . mysqli_real_escape_string($db,$hashed_password) . "' ";
    }
    $sql .= "WHERE id='" . mysqli_real_escape_string($db,$admin['id'] ). "' ";
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

function insert_admin($admin){
    global  $db;

    $errors = validate_admin($admin);
    if (!empty($errors)){
        return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO client ";
    $sql .= "(id, nom, prenom, tel, email, password) ";
    $sql .= "VALUES (";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['id']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['nom']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['prenom']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['tel']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $admin['email']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $hashed_password) . "'";
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

function find_all_clients(){
    global $db;
    $sql = "SELECT * FROM client";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_client_by_id($id){
    global $db;
    $sql = "SELECT * FROM client ";
    $sql .= "WHERE id='" . mysqli_real_escape_string($db, $id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin; //return an assoc. array
}
function find_client_by_email($email){
    global $db;
    $sql = "SELECT * FROM client ";
    $sql .= "WHERE email='" . mysqli_real_escape_string($db, $email) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $client = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $client; //return an assoc. array
}



function validate_client($client, $options=[]){
    $errors = [];
    $password_required = $options['password_required'] ?? true;
    if (is_blank($client['nom'])){
        $errors[] = "Votre nom ne peut pas être vide.";
    }
    if (is_blank($client['prenom'])){
        $errors[] = "Votre prénom ne peut pas être vide.";
    }
    if (is_blank($client['tel'])){
        $errors[] = "Votre numero ne peut pas être vide.";
    }
    if (is_blank($client['email'])){
        $errors[] = "Votre email ne peut pas être vide.";
    } elseif (!has_valid_email_format($client['email'])){
        $errors[] = "Votre email est incorrect";
    }elseif (!has_unique_email("client", $client['email'], $client['id'] ?? 0)){
        $errors[] = "L'email existe deja choisissez un autre";
    }

    if($password_required) {
        if(is_blank($client['password'])) {
            $errors[] = "Le mot de passe ne peut pas etre vide.";
        } elseif (!has_length($client['password'], array('min' => 8))) {
            $errors[] = "Le mot de passe doit contenir au moins 8 caracteres";
        } elseif (!preg_match('/[A-Z]/', $client['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins une lettre majuscule";
        } elseif (!preg_match('/[a-z]/', $client['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins une lettre miniscule";
        } elseif (!preg_match('/[0-9]/', $client['password'])) {
            $errors[] = "Le mot de passe doit contenir au moins un chiffre";
        }

        if(is_blank($client['confirm_password'])) {
            $errors[] = "La confirmation du mot de passe ne peut pas etre vide.";
        } elseif ($client['password'] !== $client['confirm_password']) {
            $errors[] = "Le mot de passe et le mot de passe de confirmation doivent correspondre.";
        }
    }
    return $errors;
}

function update_client($client){
    global $db;
    $password_sent = !is_blank($client['password']);
    $errors = validate_client($client);
    if (!empty($errors)){
        return $errors;
    }
    $hashed_password = password_hash($client['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE client SET ";
    $sql .= "nom='" . mysqli_real_escape_string($db,$client['nom']) . "', ";
    $sql .= "prenom='" . mysqli_real_escape_string($db,$client['prenom']) . "', ";
    $sql .= "tel='" . mysqli_real_escape_string($db,$client['tel']) . "', ";
    $sql .= "email='" . mysqli_real_escape_string($db,$client['email']) . "', ";
    if ($password_sent){
    $sql .= "password='" . mysqli_real_escape_string($db,$hashed_password) . "' ";
    }
    $sql .= "WHERE id='" . mysqli_real_escape_string($db,$client['id'] ). "' ";
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

function insert_client($client){
    global  $db;

    $errors = validate_client($client);
    if (!empty($errors)){
        return $errors;
    }
    $hashed_password = password_hash($client['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO client ";
    $sql .= "(id, nom, prenom, tel, email, password) ";
    $sql .= "VALUES (";
    $sql .= "'" . mysqli_real_escape_string($db, $client['id']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $client['nom']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $client['prenom']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $client['tel']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $client['email']) . "',";
    $sql .= "'" . mysqli_real_escape_string($db, $hashed_password) . "'";
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
?>