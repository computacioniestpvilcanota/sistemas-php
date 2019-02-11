<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    // Datos
    $data;

    // Modo del formulario
    $modo = 'guardar';
    
    // Validacion
    if(isset($_GET['id'])){

        // Obteniedno el id
        $id = $_GET['id'];

        // Realizando la consulta SQL
        $resultado = $connect->query("SELECT * FROM clientes WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <!-- Bootstrap Select Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    </head>
    <body class="theme-cyan">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="header">
                    Nuevo Cliente
                </div>
                <div class="body">
                    <form action="<?php echo PUBLIC_PATH ?>/cliente/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                         
                         <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="nombres">Nombres</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $data['nombres']?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="apellidos">Apellidos</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $data['apellidos']?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="dni">DNI</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="dni" name="dni" value="<?= $data['dni']?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 clearfix">
                                <label for="sexo">Sexo</label>
                                <select class="form-control show-tick" id="sexo" name="sexo">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="direccion">Direccion</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $data['direccion']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="ciudad">Ciudad</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= $data['ciudad']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="telefono">Telefono</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $data['telefono']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="celular">Celular</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    <input type="text" class="form-control" id="celular" name="celular" value="<?= $data['celular']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>   
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <!-- Select Plugin Js -->
        <script src="<?php echo PUBLIC_PATH ?>/assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    </body>
</html>