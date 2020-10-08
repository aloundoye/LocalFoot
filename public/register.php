<?php
require_once ('../private/initialize.php');

if (is_post_request()){
    session_start();
//connexion à la base de données
    $con = mysqli_connect("localhost","root","","locafoot");

    if (isset($_POST['register_btn']))
    {
        $nom =$_POST['nom'];
        $prenom =$_POST['prenom'];
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $password = $_POST['mdp'];
        $password2 = $_POST['mdp2'];

        if($password == $password2){
            //création de compte avec succès
            $password = md5($password);
            $req="insert into utilisateurs(nom, prenom, mail, username, password) values ('$nom', '$prenom', '$mail','$username','$password')";
            mysqli_query($con,$req);
            $_SESSION['message'] = "compte cree avec succes";
            $username = $_SESSION['username'];
        }
        else{
            echo "Echec";
        }
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
                        <form class="user" action="register.php" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Prénom">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nom">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Adresse Email">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mot de passe">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Répéter le mot de passe">
                                </div>
                            </div>
                            <a href="login.html" class="btn btn-primary btn-user btn-block">
                                S'inscrire
                            </a>
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
<script src="<?php echo url_for('/admin/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo url_for('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo url_for('/admin/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo url_for('/js/sb-admin-2.min.js');?>"></script>

</body>

</html>
