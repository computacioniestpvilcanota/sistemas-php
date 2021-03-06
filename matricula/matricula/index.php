<?php require_once __DIR__ . "/../usuario/auth.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="box">
                <div class="box-header">
                    <h1>
                        matriculas
                        <a href="<?php echo PUBLIC_PATH ?>/matricula/form.php" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </h1>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>alumno</th>
                                <th>grupo</th>
                                <th>pago</th>
                                <th>fecha</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>alumno</th>
                                <th>grupo</th>
                                <th>pago</th>
                                <th>fecha</th>
                                <th>acciones</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/matricula/main.js"></script>
    </body>
</html>