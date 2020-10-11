<?php
require_once ('../private/initialize.php');

$errors = [];
$email = '';
$password = '';

if(is_post_request()) {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

// Validations
    if (is_blank($email)) {
        $errors[] = "L'e-mail ne peut pas être vide.";
    }
    if (is_blank($password)) {
        $errors[] = "Le mot de passe ne peut pas être vide.";
    }

// if there were no errors, try to login
    if (empty($errors)) {
        // Using one variable ensures that msg is the same
        $login_failure_msg = "La connexion a échoué.";

        $client = find_client_by_email($email);
        if ($client) {

            if (password_verify($password, $client['password'])) {
                // password matches
                log_in_client($client);
                redirect_to(url_for('/index.php'));
            } else {
                // username found, but password does not match
                $errors[] = $login_failure_msg;
            }

        } else {
            // no username found
            $errors[] = "Compte non trouvé";
        }

    }
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
                                <?php echo display_errors($errors);?>

                                <form class="user" action="login.php" method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Entrer votre adresse email...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Votre mot de passe">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Se rappeler de moi</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Se connecter
                                    </button>
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
