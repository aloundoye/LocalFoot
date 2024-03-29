<?php
    require_once('../../../private/initialize.php');
require_admin_login();
$admin_set = find_all_admins();
?>

<?php $page_title = 'Admins' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Admins</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo url_for('/admin/admins/new.php') ?>" class="m-0 btn btn-info fa-pull-right"><i class="fas fa-plus"></i> Ajouter un nouveau admin</a>
        <h6 class="m-0 font-weight-bold text-primary">Details Admins</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                </tfoot>
                <tbody>
                    <?php while ($admin = mysqli_fetch_assoc($admin_set)){?>
                <tr>
                    <td><?php echo htmlspecialchars($admin['nom']);?></td>
                    <td><?php echo htmlspecialchars($admin['prenom']);?></td>
                    <td><?php echo htmlspecialchars($admin['tel']);?></td>
                    <td><?php echo htmlspecialchars($admin['email']);?></td>
                    <td>
                        <a class="btn btn-outline-primary" href="<?php echo url_for('/admin/admins/edit?id=' . htmlspecialchars($admin['id'])) ?>">Modifier</a>
                        <a class="btn btn-outline-danger" href="<?php echo url_for('/admin/admins/delete?id=' . htmlspecialchars($admin['id'])) ?>">Supprimer</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                <?php mysqli_free_result($admin_set); ?>
            </table>
        </div>
    </div>
</div>
<?php include(SHARED_PATH . '/admin_footer.php') ?>


