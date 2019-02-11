<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";



    $ventas = $connect->query("SELECT ventas.id, ventas.asiento, ventas.origen,ventas.fecha, ventas.destino, ventas.correlativo, clientes.nombres as cliente, empleados.nombres as empleado, ventas.monto FROM ventas 
	INNER JOIN empleados ON ventas.id_empleado = empleados.id
    INNER JOIN clientes ON ventas.id_cliente = clientes.id")->fetchAll(PDO::FETCH_ASSOC);
    if ($_POST['buscar'])
    {
        $nombres=$_POST['txtbuscar'];
        $id_cliente = $_POST['id_cliente'];

        $ventas = $connect->query("SELECT ventas.id, ventas.asiento, ventas.origen,ventas.destino,ventas.fecha, ventas.correlativo, clientes.nombres as cliente, empleados.nombres as empleado, ventas.monto FROM ventas 
        INNER JOIN empleados ON ventas.id_empleado = empleados.id
        INNER JOIN clientes ON ventas.id_cliente = clientes.id 
        WHERE ventas.origen LIKE '%$nombres%' AND clientes.id = $id_cliente")->fetchAll(PDO::FETCH_ASSOC);

        // $buscar="SELECT * FROM talumno WHERE nombres 
        // LIKE '%$nombres%' OR apellido LIKE '%$nombres%' OR dni LIKE '%$nombres%'";
        // $resulconsulta=$conexion->query($buscar);
        
    }

    $clientes = $connect->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);

    $empleados = $connect->query("SELECT * FROM empleados")->fetchAll(PDO::FETCH_ASSOC);

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
                        Ventas
                       
                    </h1>

                    <form action="" method="POST">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label for="txtbuscar">filtrar</label>
                                <input type="search" class="form-control form-control-sm"
                                placeholder aria-controls="example" name="txtbuscar">
                            </div>
                            <div class="col-auto">
                                <label for="id_cliente">Cliente</label>
                                <select class="custom-select" id="id_cliente" name="id_cliente">
                                    <?php foreach($clientes as $cliente): ?> 
                                        <option value="<?= $cliente['id']?>"><?= $cliente['nombres']?></option>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="col-auto">
                                <input type="submit"name="buscar" value="buscar" class="btn btn-info">
                            </div>
                            <div class="col-auto">
                                <input type="button"name="imprimir" value="imprimir" onclick="window.print();" class="btn btn-access">
                            </div>
                        </div>
                    </form>



                     <!--FIN GROUP-->
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Monto</th>
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total; foreach ($ventas as $venta): ?>
                                <tr>
                                    <td><?= $venta['origen']?></td>
                                    <td><?= $venta['destino']?></td>
                                    <td><?= $venta['monto']?></td>
                                    <td><?= $venta['cliente']?></td>
                                    <td><?= $venta['empleado']?></td>
                                    <td><?= $venta['Fecha']?></td>
                                </tr>
                            <?php $total += $venta['monto']; endforeach; ?>
                            <tr>
                                <td></td>
                                <td>Total: </td>
                                <td><?= $total ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>