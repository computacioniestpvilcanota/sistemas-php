<?php 
    require_once __DIR__ . "/../usuario/auth.php";

    require_once "./../database/connect.php";

    // Consulta de proveedores
    $proveedores = $connect->query("SELECT * FROM proveedores")->fetchAll(PDO::FETCH_ASSOC);

    
    if(isset($_POST['id_proveedor'])){
        $id_proveedor = $_POST['id_proveedor'];
        // Consulta de productos
        $productos = $connect->query("SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.stock, COUNT(compras.id) AS cantidad, compras.id_proveedor FROM compras 
        INNER JOIN productos ON productos.id = compras.id_proveedor
        GROUP BY productos.id, productos.nombre, productos.descripcion, productos.precio, productos.stock, compras.id_proveedor
        HAVING compras.id_proveedor =  $id_proveedor")->fetchAll(PDO::FETCH_ASSOC);
    }else{
        // Consulta de productos
        $productos = $connect->query("SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.stock, COUNT(compras.id) AS cantidad, compras.id_proveedor FROM compras 
        INNER JOIN productos ON productos.id = compras.id_proveedor
        GROUP BY productos.id, productos.nombre, productos.descripcion, productos.precio, productos.stock, compras.id_proveedor")->fetchAll(PDO::FETCH_ASSOC);
    }

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
                        Proveedores con sus respectivos productos
                    </h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_proveedor">Proveedor</label>
                                <select class="custom-select" id="id_proveedor" name="id_proveedor">
                                    <?php foreach($proveedores as $proveedor): ?> 
                                        <?php if ($proveedor['id'] == $data['id_proveedor']): ?>
                                            <option value="<?= $proveedor['id']?>" selected><?= $proveedor['rason_social']?></option>
                                        <?php else: ?>
                                            <option value="<?= $proveedor['id']?>"><?= $proveedor['rason_social']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="submit" value="buscar" class="btn btn-success">
                                <input type="subimt" name="imprimir" value="imprimir" onClick="window.print();" class="btn btn-info">
                            </div>
                        </div>
                    </form>
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
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
                                    <td><?php echo $producto['nombre']?></td>
                                    <td><?php echo $producto['descripcion']?></td>
                                    <td><?php echo $producto['precio']?></td>
                                    <td><?php echo $producto['stock']?></td>
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