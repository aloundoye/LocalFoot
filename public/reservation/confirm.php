<?php
require_once ('../../private/initialize.php');

?>

<?php
$page_title = 'Confirmation Reservation';
include (SHARED_PATH . '/public_header.php');?>

<div class="col-lg-9 my-5">
    <p>Votre reservation a ete pris en compte</p>
    <a class="btn btn-outline-primary" href="<?php echo  url_for('/index.php');?>"> Retourner a l'accueil</a>
</div>

<?php
include (SHARED_PATH. '/admin_footer.php')
?>
