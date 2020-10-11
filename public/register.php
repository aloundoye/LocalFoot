<?php
require_once ('../private/initialize.php');

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
        $_SESSION['message'] = 'Votre compte est créé.';
        redirect_to(url_for('/index.php'));
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


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Local Foot - Inscription</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo url_for('/admin/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo url_for('/stylesheets/sb-admin-2.min.css');?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<?php include (SHARED_PATH . '/public_navigation.php');?>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Creer un compte!</h1>
                        </div>
                        <?php echo display_errors($errors);?>
                        <form class="user" action="register.php" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" value="<?php echo htmlspecialchars($client['prenom']);?>" class="form-control form-control-user" id="prenom" name="prenom" placeholder="Prénom">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" value="<?php echo htmlspecialchars($client['nom']);?>" class="form-control form-control-user" id="nom" name="nom" placeholder="Nom">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" value="<?php echo htmlspecialchars($client['tel']);?>" name="tel" class="form-control form-control-user" id="tel" placeholder="Telephone">
                            </div>
                            <div class="form-group">
                                <input type="email" value="<?php echo htmlspecialchars($client['email']);?>" class="form-control form-control-user" id="email" name="email" placeholder="Adresse Email">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Mot de passe">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="confirm_password" name="confirm_password" placeholder="Répéter le mot de passe">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                S'inscrire
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Mot de passe oublié?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo url_for('login.php') ?>">Vous avez déja un compte? Se connecter!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo url_for('/client/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo url_for('/client/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo url_for('/client/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo url_for('/js/sb-client-2.min.js');?>"></script>

</body>

</html>
