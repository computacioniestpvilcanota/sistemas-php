<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    if(isset($_POST['marca']) && $_POST['marca'] != 'todos' ){
        $marca = $_POST['marca'];
        $vehiculos = $connect->query("SELECT vehiculos.id, vehiculos.descripcion, vehiculos.placa, vehiculos.viaje, vehiculos.foto, vehiculos.numero_asientos, vehiculos.id_tipo, propietarios.nombres AS propietario  
        FROM vehiculos LEFT JOIN propietarios ON propietarios.id = vehiculos.id_propietario WHERE vehiculos.id_tipo = $marca")->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $vehiculos = $connect->query("SELECT vehiculos.id, vehiculos.descripcion, vehiculos.placa, vehiculos.viaje, vehiculos.foto, vehiculos.numero_asientos, vehiculos.id_tipo, propietarios.nombres AS propietario  
        FROM vehiculos LEFT JOIN propietarios ON propietarios.id = vehiculos.id_propietario")->fetchAll(PDO::FETCH_ASSOC);
    }

    $marcas = $connect->query("SELECT * FROM tipos")->fetchAll(PDO::FETCH_ASSOC);
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
                        Vehiculos
                        <a href="<?php echo PUBLIC_PATH ?>/vehiculo/form.php" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <select class="custom-select" id="marca" name="marca">
                                    <option value="todos">Todos</option>
                                    <?php foreach($marcas as $marca): ?> 
                                        <?php if ($marca['id'] == $_POST['marca']): ?>
                                            <option value="<?= $marca['id']?>" selected><?= $marca['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $marca['id']?>"><?= $marca['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Filtrar" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <?php  foreach ($vehiculos as $vehiculo): ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                <?php if ($vehiculo['viaje'] == "1"):?>
                                    <div class="card text-white bg-success">
                                        <img class="card-img-top" src="<?= PUBLIC_PATH ?>/<?= $vehiculo['foto']?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">PLACA: <?= $vehiculo['placa']?></h5>
                                            <p>Dueño: <?= $vehiculo['propietario']?></p>
                                            <?php if ($vehiculo['descripcion'] != ''): ?>
                                                <p class="card-text"><?= $vehiculo['descripcion']?></p>
                                            <?php endif; ?>
                                            <span class="badge badge-pill badge-dark">Número de asientos: <?= $vehiculo['numero_asientos']?></span>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <a href="<?= PUBLIC_PATH ?>/vehiculo/eliminar.php?id=<?= $vehiculo['id']?>" class="badge badge-danger"><i class='fas fa-trash'></i></a>
                                            <a href="<?= PUBLIC_PATH ?>/vehiculo/venta.php?vehiculo=<?= $vehiculo['id']?>" class="badge badge-primary">Vender Asientos</a>
                                            <a href="<?= PUBLIC_PATH ?>/vehiculo/form.php?id=<?= $vehiculo['id']?>" class="badge badge-warning"><i class='fas fa-edit'></i></a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="card">
                                        <img class="card-img-top" src="<?= PUBLIC_PATH ?>/<?= $vehiculo['foto']?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">PLACA: <?= $vehiculo['placa']?></h5>
                                            <p>Dueño: <?= $vehiculo['propietario']?></p>
                                            <?php if ($vehiculo['descripcion'] != ''): ?>
                                                <p class="card-text"><?= $vehiculo['descripcion']?></p>
                                            <?php endif; ?>
                                            <span class="badge badge-pill badge-dark">Número de asientos: <?= $vehiculo['numero_asientos']?></span>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between">
                                            <a href="<?= PUBLIC_PATH ?>/vehiculo/eliminar.php?id=<?= $vehiculo['id']?>" class="badge badge-danger"><i class='fas fa-trash'></i></a>
                                            <a href="<?= PUBLIC_PATH ?>/vehiculo/venta.php?vehiculo=<?= $vehiculo['id']?>" class="badge badge-primary">Vender Asientos</a>
                                            <a href="<?= PUBLIC_PATH ?>/vehiculo/form.php?id=<?= $vehiculo['id']?>" class="badge badge-warning"><i class='fas fa-edit'></i></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>