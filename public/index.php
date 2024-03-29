<?php
    require_once ('../private/initialize.php');
    $terrain_set = find_all_terrains();

?>
<?php $page_title = 'Accueil'; ?>
<?php include(SHARED_PATH . '/public_header.php');?>

<div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php echo url_for('/images/Nouveau-terrain-bis-e1566481537914.jpg');?>" width="900" height="350" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo url_for('/images/maxresdefault.jpg');?>"  width="900" height="350" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" height="350" width="900" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row">
    <?php while ($terrain = mysqli_fetch_assoc($terrain_set)){?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="<?php echo url_for('/terrain.php?id=' . $terrain['id'])?>"><img class="card-img-top" src="<?php echo url_for('/admin/images/') . $terrain['image'];?>" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="<?php echo url_for('/terrain.php?id=' . $terrain['id'])?>"><?php echo $terrain['nom_terrain'];?></a>
                    </h4>
                    <h5><?php echo $terrain['prix'];?> FCFA</h5>
                    <p class="card-text"><?php echo $terrain['description'];?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>
    <?php
        }
        mysqli_free_result($terrain_set);
    ?>


    </div>
    <!-- /.row -->

</div>
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->
<?php

?>
<?php include(SHARED_PATH . '/public_footer.php');