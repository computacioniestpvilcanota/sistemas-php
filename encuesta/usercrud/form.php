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
        $resultado = $connect->query("SELECT * FROM usuarios WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

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
    </head>
    <body>
        <?php require_once __DIR__ . "/../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo usercrud
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/usercrud/<?= $modo ?>.php" method="post"  enctype="multipart/form-data">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="usuario">usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $data['usuario']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="clave">Contraseña</label>
                                <input type="password" class="form-control" id="clave" name="clave">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <div class="mb-3">
                            <?php if (!$data['foto'] == ''): ?>
                                <img src="<?= PUBLIC_PATH ?>/<?= $data['foto']?>" alt="<?= $data['ruc']?>" width="400">
                            <?php endif ?>
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