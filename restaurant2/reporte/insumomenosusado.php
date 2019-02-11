<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    $preparaciones = $connect->query('SELECT * FROM preparacion ORDER BY cantidad DESC')->fetchAll(PDO::FETCH_ASSOC);
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
                                <th>Insumo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($preparaciones as $preparacion):?>
                                <tr>
                                    <td><?php echo $preparacion['insumo_1'] ?></td>
                                    <td><?php echo $preparacion['cantidad_1'] ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>        
                </div>
            </div>
        </div> 
    </body>
</html>