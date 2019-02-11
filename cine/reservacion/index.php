<?php require_once __DIR__ . "/../usuario/verifica.php"; ?>
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
                    <h1 style="text-align:center"> reservaciones </h1>
                </div>
                <div class="card-body">
                    <a href="<?php echo PUBLIC_PATH ?>/reservacion/form.php" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Nuevo
                    </a>
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>fecha</th>
                                <th>fecha_reserva</th>
                                <th>hora_reserva</th>
                                <th>abservacion</th>
                                <th>precio</th>
                                <th>cliente</th>
                                <th>pelicula</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>fecha</th>
                                <th>fecha_reserva</th>
                                <th>hora_reserva</th>
                                <th>abservacion</th>
                                <th>precio</th>
                                <th>cliente</th>
                                <th>pelicula</th>
                                <th>acciones</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once "./../partes/footer.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/reservacion/main.js"></script>
    </body>
</html>