<?php
    require_once ('../../../private/initialize.php');
require_admin_login();
if (is_post_request()){
        $client = [];
        $client['id'] = getGUID();
        $client['nom'] = $_POST['nom'];
        $client['prenom'] = $_POST['prenom'];
        $client['tel'] = $_POST['tel'];
        $client['email'] = $_POST['email'];
        $client['password'] = $_POST['password'];
        $client['confirm_password'] = $_POST['confirm_password'];

        $result = insert_client($client);
        if ($result === true){
            $_SESSION['message'] = 'Client créé.';
            redirect_to(url_for('/admin/clients/index.php'));
        }else {
            $errors = $result;
        }
    } else{
        $client = [];
        $client['nom'] = '';
        $client['prenom'] = '';
        $client['tel'] = '';
        $client['email'] = '';
        $client['password'] = '';
        $client['confirm_password'] = '';
    }
?>

<?php $page_title = 'Ajouter Client' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ajouter Client</h1>
<div class="container">
    <?php echo display_errors($errors); ?>
    <form action="new.php" method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" value="<?php echo htmlspecialchars($client['nom']);?>" class="form-control col-xl-6" id="nom" name="nom" placeholder="Entrer le nom du client">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" value="<?php echo htmlspecialchars($client['prenom']);?>" class="form-control col-xl-6" id="prenom" name="prenom" placeholder="Entrer le prénom du client">
        </div>
        <div class="form-group">
            <label for="tel">Téléphone</label>
            <input type="text" value="<?php echo htmlspecialchars($client['tel']);?>" class="form-control col-xl-6" id="tel" name="tel" placeholder="Entrer un numéro de téléphone">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" value="<?php echo htmlspecialchars($client['email']);?>" class="form-control col-xl-6" id="email" name="email" placeholder="Entrer l'email du client">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" value="" class="form-control col-xl-6" id="password" name="password" placeholder="Mot de passe">
            <small id="passwordHelp" class="form-text text-muted">Le mot de passe doit etre au moins 8 caracteres et inclut au moins une lettre majuscule, une lettre miniscule et un chiffre.</small>
        </div>
        <div class="form-group">
            <label for="confirm_password">Répéter le mot de passe</label>
            <input type="password" value="" class="form-control col-xl-6" id="confirm_password" name="confirm_password" placeholder="Répéter le mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="<?php echo url_for('/client/admins/index.php') ?>" class="btn btn-danger">Annuler</a>
    </form>
</div>
<?php include(SHARED_PATH . '/admin_footer.php') ?>
