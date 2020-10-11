<?php
    require_once('../../../private/initialize.php');
    $client_set = find_all_clients();
?>

<?php $page_title = 'Clients' ?>
<?php include(SHARED_PATH . '/admin_header.php') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Clients</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?php echo url_for('/client/clients/new.php') ?>" class="m-0 btn btn-info fa-pull-right"><i class="fas fa-plus"></i> Ajouter un nouveau client</a>
        <h6 class="m-0 font-weight-bold text-primary">Details Clients</h6>
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
                    <?php while ($client = mysqli_fetch_assoc($client_set)){?>
                <tr>
                    <td><?php echo htmlspecialchars($client['nom']);?></td>
                    <td><?php echo htmlspecialchars($client['prenom']);?></td>
                    <td><?php echo htmlspecialchars($client['tel']);?></td>
                    <td><?php echo htmlspecialchars($client['email']);?></td>
                    <td>
                        <a class="btn btn-outline-primary" href="<?php echo url_for('/client/admins/edit?id=' . htmlspecialchars($client['id'])) ?>">Modifier</a>
                        <a class="btn btn-outline-danger" href="<?php echo url_for('/client/admins/delete?id=' . htmlspecialchars($client['id'])) ?>">Supprimer</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                <?php mysqli_free_result($client_set); ?>
            </table>
        </div>
    </div>
</div>
<?php include(SHARED_PATH . '/admin_footer.php') ?>


