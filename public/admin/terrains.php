<?php require_once('../../private/initialize.php');?>

<?php
$terrain_set = find_all_terrains();
?>
<?php $page_title = 'Terrains' ;?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Terrains</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo url_for('/admin/new.php') ?>" class="m-0 btn btn-info fa-pull-right"><i class="fas fa-plus"></i> Ajouter une nouvelle produit</a>
            <h6 class="m-0 font-weight-bold text-primary">Détails Terrains</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Taille</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Taille</th>
                        <th>&nbsp;</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php while ($terrain = mysqli_fetch_assoc($terrain_set)){?>
                            <tr>
                                <td><a href="<?php echo url_for('/admin/show.php?id=' . htmlspecialchars(urlencode($terrain['id'])));?>"><?php echo h($terrain['nom_terrain']); ?></a></td>
                                <td><?php echo h($terrain['prix']); ?></td>
                                <td><?php echo h($terrain['taille']); ?></td>
                                <td><a class="btn btn-outline-primary" href="<?php echo url_for('/admin/edit.php?id=' . h(u($terrain['id'])));?>">Modifier</a>
                                <a class="btn btn-outline-danger" href="<?php echo url_for('/admin/delete.php?id=' . h(u($terrain['id'])));?>">Supprimer</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include(SHARED_PATH . '/admin_footer.php') ?>
