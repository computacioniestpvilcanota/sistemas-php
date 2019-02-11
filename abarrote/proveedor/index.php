<?php require_once __DIR__ . "/../usuario/auth.php" ?>
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
                        Proveedores
                        <a href="<?php echo PUBLIC_PATH ?>/proveedor/form.php" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>RUC</th>
                                <th>Rason Social</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Email</th>
                                <th>Actividad Principal</th>
                                <th>Telefono</th>
                                <th>Representante</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>RUC</th>
                                <th>Rason Social</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Email</th>
                                <th>Actividad Principal</th>
                                <th>Telefono</th>
                                <th>Representante</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/proveedor/main.js"></script>
    </body>
</html>