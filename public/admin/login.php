<?php
require_once ('../private/initialize.php');

if (is_post_request()){
    $username = isset($_POST['username']) ? $_POST['username'] : NULL;
    $password = isset($_POST['password']) ? $_POST['password'] : NULL;
//eviter les injections sql
    $username = stripcslashes($username);
    $password = stripcslashes($password);

// connexion à la base
    $con=mysqli_connect("localhost","root","","locafoot");
    $req="select * from utilisateurs where username='$username' and password='$password'";
    $result=mysqli_query($con,$req);
    $ligne=mysqli_fetch_array($result);
    if($ligne['username']== $username && $ligne['password']== $password){
        echo "connexion reussie".$ligne['username'];
    }
    else{
        echo"Echec de la connexion";
    }
}else{

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

    <title>Local Foot - Connexion</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo url_for('/admin/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo url_for('/stylesheets/sb-admin-2.min.css');?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<?php include (SHARED_PATH . '/public_navigation.php');?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bon retour!</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Entrer votre adresse email...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Votre mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Se rappeler de moi</label>
                                        </div>
                                    </div>
                                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                                        Se connecter
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo url_for('/forgot-password.php') ?>">Mot de passe oublié?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?php echo url_for('/register.php') ?>">Créer un compte!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo url_for('/admin/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo url_for('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo url_for('/admin/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo url_for('/js/sb-admin-2.min.js');?>"></script>

</body>

</html>
