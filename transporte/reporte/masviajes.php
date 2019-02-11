<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    $vehiculos = $connect->query("SELECT COUNT(*) AS cantidad, clientes.nombres, clientes.apellidos FROM ventas
	INNER JOIN clientes ON clientes.id = ventas.id_cliente
	GROUP BY ventas.id_cliente, clientes.nombres, clientes.apellidos
    ORDER BY cantidad ASC")->fetchAll(PDO::FETCH_ASSOC);
    
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
                        Clientes con mas viajes
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Cantiddad de viajes</th>
                                <th>nombres</th>
                                <th>apellidos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vehiculos as $vehiculo):?>
                                <tr>
                                    <td><?= $vehiculo['cantidad']?></td>
                                    <td><?= $vehiculo['nombres']?></td>
                                    <td><?= $vehiculo['apellidos']?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cantiddad de viajes</th>
                                <th>nombres</th>
                                <th>apellidos</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>