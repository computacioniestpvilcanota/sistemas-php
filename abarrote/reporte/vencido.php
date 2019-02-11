<?php 
    require_once __DIR__ . "/../usuario/auth.php";

    require_once "./../database/connect.php";

    // Consulta de productos
    $productos = $connect->query("SELECT * FROM  productos
	WHERE productos.fecha_vencimiento <= '2018-12-17'")->fetchAll(PDO::FETCH_ASSOC);
  
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
                        Top productos vencidos
                    </h1>
                </div>
                    <input type="button" name="imprimir" value="imprimir" onClick="window.print();" class="btn btn-info">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Fecha_vencimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos as $producto): ?> 
                                <tr>
                                    <td><?php echo $producto['nombre']?></td>
                                    <td><?php echo $producto['descripcion']?></td>
                                    <td><?php echo $producto['precio']?></td>
                                    <td><?php echo $producto['fecha_vencimiento']?></td>
                                </tr>
                            <?php  endforeach ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Fecha_vencimiento</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>