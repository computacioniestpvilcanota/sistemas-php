<?php 
    require_once __DIR__ . "/../usuario/auth.php";

    require_once "./../database/connect.php";

    // Consulta de proveedores
    $cantidades = [1,2,3,5,10,15,30,40,50,100,200];


    $orden = "DESC";
    $limite = 3;
    
    if(isset($_POST['orden']) || isset($_POST['cantidad'] )){
        $orden = $_POST['orden'];
        $limite = $_POST['cantidad'];
    }

    // Consulta de productos
    $productos = $connect->query("SELECT SUM(ventas.cantidad) AS cantidad, ventas.fecha_venta, productos.nombre AS producto, ventas.precio, clientes.nombres AS cliente FROM ventas 
	INNER JOIN productos ON productos.id = ventas.id_producto
	INNER JOIN clientes ON clientes.id = ventas.id_cliente
	GROUP BY ventas.id_producto, ventas.fecha_venta, producto, ventas.precio, cliente
	ORDER BY cantidad $orden
    LIMIT $limite")->fetchAll(PDO::FETCH_ASSOC);
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
                        Top productos mas vendidos
                    </h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cantidad">Top</label>
                                <select class="custom-select" id="cantidad" name="cantidad">
                                    <?php foreach($cantidades as $cantidad): ?> 
                                        <?php if ($cantidad == $_POST['cantidad']): ?>
                                            <option value="<?= $cantidad?>" selected><?= $cantidad?></option>
                                        <?php else: ?>
                                            <option value="<?= $cantidad?>"><?= $cantidad?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="demo-radio-button">
                                <input name="orden" type="radio" value="DESC" id="radio_1" <?php echo $orden == "DESC" ? 'checked' : '' ?>/>
                                <label for="radio_1">Mas vendidos</label>
                                <input name="orden" type="radio" value="ASC" id="radio_2" <?php echo $orden == "ASC" ? 'checked' : '' ?> />
                                <label for="radio_2">Menos vendidos</label>
                            </div>
                            <input type="submit" value="buscar" class="btn btn-success">
                            <input type="subimt" name="imprimir" value="imprimir" onClick="window.print();" class="btn btn-info">
                        </div>
                    </form>
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos as $producto): ?> 
                                <tr>
                                    <td><?php echo $producto['cantidad']?></td>
                                    <td><?php echo $producto['fecha_vencimiento']?></td>
                                    <td><?php echo $producto['producto']?></td>
                                    <td><?php echo $producto['precio']?></td>
                                    <td><?php echo $producto['cliente']?></td>
                                </tr>
                            <?php  endforeach ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Stock</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>