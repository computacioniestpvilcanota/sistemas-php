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
        $resultado = $connect->query("SELECT * FROM proveedores WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

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
        <script src="<?php echo PUBLIC_PATH ?>/proveedor/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo proveedor
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/proveedor/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                         <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ruc">RUC</label>
                                <input type="text" class="form-control" id="ruc" name="ruc" value="<?= $data['ruc']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rason_social">Rason Social</label>
                                <input type="text" class="form-control" id="rason_social" name="rason_social" value="<?= $data['rason_social']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $data['direccion']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= $data['ciudad']?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="actividad_principal">Actividad Principal</label>
                                <input type="text" class="form-control" id="actividad_principal" name="actividad_principal" value="<?= $data['actividad_principal']?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $data['telefono']?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="representante">Representante</label>
                                <input type="text" class="form-control" id="representante" name="representante" value="<?= $data['representante']?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>  
    </body>
</html>