<?php require_once __DIR__ . "/../usuario/auth.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <link href="<?php echo PUBLIC_PATH ?>/media/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    </head>
    <body>
        <?php require_once __DIR__ . "/../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Preguntas
                        <a href="<?php echo PUBLIC_PATH ?>/pregunta/form.php" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>nombre</th>
                                <th>acciones</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?> 
        <script src="<?php echo PUBLIC_PATH ?>/media/assets/extra-libs/DataTables/datatables.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/pregunta/main.js"></script>
    </body>
</html>