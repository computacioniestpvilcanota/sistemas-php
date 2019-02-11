<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    $vehiculos = $connect->query("SELECT vehiculos.id, vehiculos.descripcion, vehiculos.foto, vehiculos.placa, propietarios.nombres AS propietario FROM vehiculos 
	INNER JOIN propietarios ON propietarios.id = vehiculos.id_propietario")->fetchAll(PDO::FETCH_ASSOC);
    
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
                        vehiculos con propietarios
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Descripcion</th>
                                <th>Placa</th>
                                <th>Propietario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vehiculos as $vehiculo):?>
                                <tr>
                                    <td>
                                        <img src="<?= PUBLIC_PATH ?>/<?= $vehiculo['foto']?>" alt="foto" width="70px">
                                    </td>
                                    <td><?= $vehiculo['descripcion']?></td>
                                    <td><?= $vehiculo['placa']?></td>
                                    <td><?= $vehiculo['propietario']?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Foto</th>
                                <th>Descripcion</th>
                                <th>Placa</th>
                                <th>Propietario</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>