<?php require_once __DIR__ . "/../usuario/auth.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <!-- JQuery DataTable Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    </head>
    <body class="theme-red">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="header">
                    <h2>
                        Clientes
                    </h2>
                </div>
                <div class="body">
                    <a href="<?php echo PUBLIC_PATH ?>/cliente/form.php" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Nuevo
                    </a>
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>nombres</th>
                                <th>apellidos</th>
                                <th>dni</th>
                                <th>direccion</th>
                                <th>ciudad</th>
                                <th>sexo</th>
                                <th>telefono</th>
                                <th>celular</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>nombres</th>
                                <th>apellidos</th>
                                <th>dni</th>
                                <th>direccion</th>
                                <th>ciudad</th>
                                <th>sexo</th>
                                <th>telefono</th>
                                <th>celular</th>
                                <th>acciones</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/cliente/main.js"></script>
    </body>
</html>