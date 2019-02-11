<?php require_once __DIR__ . "/../usuario/auth.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <!-- TABLE ADAPTER START -->
        <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <!-- TABLE ADAPTER END -->
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Marcas
                        <a href="<?php echo PUBLIC_PATH ?>/tipo/form.php" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <!-- TABLE ADAPTER START -->
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/jszip/dist/jszip.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/assets/js/init-scripts/data-table/datatables-init.js"></script>
        <!-- TABLE ADAPTER END -->

        <script src="<?php echo PUBLIC_PATH ?>/tipo/main.js"></script>
    </body>
</html>