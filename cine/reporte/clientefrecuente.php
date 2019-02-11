<?php 
    require_once __DIR__ . "/../usuario/verifica.php";

    require_once "./../database/connect.php";

    // Realizando la consulta SQL
    $clientes = $connect->query("SELECT COUNT(reservaciones.id_cliente) as cantidad, clientes.nombres, clientes.apellidos, clientes.dni, clientes.direccion, clientes.ciudad, clientes.sexo, clientes.telefono FROM reservaciones
        INNER JOIN clientes on clientes.id = reservaciones.id_cliente
        GROUP BY reservaciones.id_cliente
        ORDER BY cantidad DESC");
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
                    <h1 style="text-align:center"> Clientes frecuentes </h1>
                </div>
                <div class="card-body">
                    <a onClick="window.print()"  class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Imprimir
                    </a>
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>apellidos</th>
                                <th>dni</th>
                                <th>direccion</th>
                                <th>sexo</th>
                                <th>telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($cliente = $clientes->fetch_assoc()):?> 
                                <tr>
                                    <td><?php echo $cliente['cantidad'] ?></td>
                                    <td><?php echo $cliente['nombres'] ?></td>
                                    <td><?php echo $cliente['apellidos'] ?></td>
                                    <td><?php echo $cliente['dni'] ?></td>
                                    <td><?php echo $cliente['direccion'] ?></td>
                                    <td><?php echo $cliente['sexo'] ?></td>
                                    <td><?php echo $cliente['telefono'] ?></td>
                                </tr>
                            <?php  endwhile; ?> 
                        </tbody>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once "./../partes/footer.php" ?>
    </body>
</html>



