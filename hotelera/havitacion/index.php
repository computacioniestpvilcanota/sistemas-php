<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    $havitaciones = $connect->query("SELECT * FROM havitaciones")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Havitaciones
                        <a href="<?php echo PUBLIC_PATH ?>/havitacion/form.php" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </h1>
                </div>
                <div class="card-body">
                    <!-- <div class="container"> -->
                        <div class="row">
                            <?php  foreach ($havitaciones as $havitacion): ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <?php if ($havitacion['en_uso'] == "1"):?>
                                        <div class="card text-white bg-success">
                                            <img class="card-img-top" src="<?= PUBLIC_PATH ?>/<?= $havitacion['foto']?>" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $havitacion['numero']?></h5>
                                                <?php if ($havitacion['descripcion'] != ''): ?>
                                                    <p class="card-text"><?= $havitacion['descripcion']?></p>
                                                <?php endif; ?>
                                                <span class="badge badge-pill badge-primary">S/. <?= $havitacion['precio']?></span>
                                                <span class="badge badge-pill badge-dark">Nivel: <?= $havitacion['nivel']?></span>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between">
                                                <a href="<?= PUBLIC_PATH ?>/alquiler/finalizar.php?havitacion=<?= $havitacion['id']?>" class="badge badge-warning">Finalizar Alquiler</a>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="card">
                                            <img class="card-img-top" src="<?= PUBLIC_PATH ?>/<?= $havitacion['foto']?>" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $havitacion['numero']?></h5>
                                                <?php if ($havitacion['descripcion'] != ''): ?>
                                                    <p class="card-text"><?= $havitacion['descripcion']?></p>
                                                <?php endif; ?>
                                                <span class="badge badge-pill badge-dark">S/. <?= $havitacion['precio']?></span>
                                                <span class="badge badge-pill badge-dark">Nivel: <?= $havitacion['nivel']?></span>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between">
                                                <a href="<?= PUBLIC_PATH ?>/alquiler/form.php?havitacion=<?= $havitacion['id']?>" class="badge badge-primary">Alquilar</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach;?>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div> 
    </body>
</html>