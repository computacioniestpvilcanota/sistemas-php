<?php require_once __DIR__ . "/../../usuario/auth.php"; ?>
<?php $havitacion = $_GET['havitacion']; ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/havitacion/servicio/main.js"></script>
    </head>
    <body>
        <?php require_once "./../../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    <h1>
                        servicios
                        <a href="<?php echo PUBLIC_PATH ?>/havitacion/servicio/form.php?havitacion=<?= $havitacion?>" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>foto</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>foto</th>
                                <th>acciones</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
    </body>
</html>