<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    $menus = $connect->query('SELECT * FROM menus WHERE id NOT IN (SELECT id_menu FROM ventas)')->fetchAll(PDO::FETCH_ASSOC);
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
                        Pructos no vendido
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Codigo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menus as $menu):?>
                                <tr>
                                    <td><?php echo $menu['nombre'] ?></td>
                                    <td><?php echo $menu['descripcion'] ?></td>
                                    <td><?php echo $menu['codigo'] ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>        
                </div>
            </div>
        </div> 
    </body>
</html>