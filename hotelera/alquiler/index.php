<?php require_once __DIR__ . "/../usuario/auth.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/alquiler/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    <h1 style="text-align:center"> Alquileres </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>observacion</th>
                                <th>Cliente</th>
                                <th>Havitacion</th>
                                <th>Empleado</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>observacion</th>
                                <th>Cliente</th>
                                <th>Havitacion</th>
                                <th>Empleado</th>
                                <th>Precio</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
    </body>
</html>