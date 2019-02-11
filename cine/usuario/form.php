<?php 
    require_once __DIR__ . "/../usuario/verifica.php";
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
        $data = $connect->query("SELECT * FROM usuarios WHERE id = $id")->fetch_assoc();

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }
?>
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
                    Nuevo usuario
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/usuario/<?= $modo ?>.php" method="post">
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
                                <label for="usuario">usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $data['usuario']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']?>" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="clave">Contraseña</label>
                                <input type="password" class="form-control" id="clave" name="clave">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                            <button type="reset" class="btn btn-secondary">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>