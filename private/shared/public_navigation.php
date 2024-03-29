<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo url_for('/index.php')?>"><i class="fas fa-volleyball-ball"></i> Local Foot</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo url_for('/index.php');?>">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php if (!is_client_logged_in()){?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/login.php');?>">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/register.php');?>">S'inscrire</a>
                </li>
                <?php } else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo url_for('/logout.php');?>">Se deconnecter</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>