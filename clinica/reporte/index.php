<?php 
    require_once __DIR__ . "/../usuario/auth.php";

    require_once "./../database/connect.php";


    $orden = "DESC";
    $limite = 2;
    
    if(isset($_POST['orden']) || isset($_POST['limite'] )){
        $orden = $_POST['orden'];
        $limite = $_POST['limite'];
    }

    // Consulta de VENTAS
    $ventas = $connect->query("SELECT SUM(ventas.cantidad) AS cantidad, ventas.fecha_venta, medicinas.nombre AS medicina, ventas.precio, clientes.nombres AS cliente FROM ventas 
	INNER JOIN medicinas ON medicinas.id = ventas.id_medicina
	INNER JOIN clientes ON clientes.id = ventas.id_cliente
	GROUP BY ventas.id_medicina, ventas.fecha_venta, medicina, ventas.precio, cliente
	ORDER BY cantidad $orden
    LIMIT $limite")->fetchAll(PDO::FETCH_ASSOC);
    // Finalizando la consulta

?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <!-- Bootstrap Select Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    </head>
    <body class="theme-cyan">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="header">
                    <h1 style="text-align: center">
                        MAS Y MENOS VENDIDAS DE MEDICAMENTOS
                    </h1>
                </div>
                <div class="body">
                    <form method="POST" action="">
                        <select class="form-control show-tick" name="limite">
                            <option value="2">2</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>
                        <div class="demo-radio-button">
                            <input name="orden" type="radio" value="DESC" id="radio_1" <?php echo $orden == "DESC" ? 'checked' : '' ?>/>
                            <label for="radio_1">Mas vendidos</label>
                            <input name="orden" type="radio" value="ASC" id="radio_2" <?php echo $orden == "ASC" ? 'checked' : '' ?> />
                            <label for="radio_2">Menos vendidos</label>
                        </div>
                        <input type="submit" value="Filtrar">
                    </form>
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Fecha_venta</th>
                                <th>Medicina</th>
                                <th>Precio</th>
                                <th>Cliente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $venta):?>
                                <tr>
                                    <td><?php echo $venta['cantidad'] ?></td>
                                    <td><?php echo $venta['fecha_venta'] ?></td>
                                    <td><?php echo $venta['medicina'] ?></td>
                                    <td><?php echo $venta['precio'] ?></td>
                                    <td><?php echo $venta['cliente'] ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cantidad</th>
                                <th>Fecha_venta</th>
                                <th>Medicina</th>
                                <th>Precio</th>
                                <th>Cliente</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>