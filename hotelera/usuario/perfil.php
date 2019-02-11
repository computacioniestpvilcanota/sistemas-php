<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    // Current user query
    $usuario;
    
    // Session usuario id
    $id = $_SESSION['usuario']['id'];

    try {
        // Cuando se envian datos desde el formulario
        if(isset($_POST['id'])) {
            $nombre_foto = $_FILES['foto']['name'];
            $path_dir = "assets/static/uploads/";

            // Insertando el cliente en la base de datos
            // Preparando la consulta
            $statement =  $connect->prepare("UPDATE usuarios SET usuario=:usuario,email=:email WHERE id=:id");

            // Ejecutando la consulta
            $statement->execute([
                ':usuario'       => $_POST['usuario'],
                ':email'       => $_POST['email'],
                ':id'       => $_POST['id'],
            ]);

            // Guaradar contraseña
            if($_POST['clave'] != "" && isset($_POST['clave'])){
                // Preparando la consulta
                $statement =  $connect->prepare("UPDATE usuarios SET clave=:clave WHERE id=:id");
    
                // Ejecutando la consulta
                $statement->execute([
                    ':clave'       => sha1($_POST['clave']),
                    ':id'       => $_POST['id'],
                ]);
            }


            // Files
            if(!$_FILES['foto']['tmp_name'] == ''){
                // Actualizar la foto
                $statementFile =  $connect->prepare("UPDATE usuarios SET foto=:foto WHERE id=:id");

                // Ejecutando la consulta
                $statementFile->execute([
                    ':foto'       => $path_dir . $nombre_foto,
                    ':id'       => $_POST['id'],
                ]);

                // Copy temporal files
                if(!copy(
                    $_FILES['foto']['tmp_name'],
                        __DIR__ . "/../$path_dir" . $nombre_foto)){
                        throw new Exception("Error al subir el archivo", 1);
                }
            }

            header('location:' . PUBLIC_PATH . '/usuario/perfil.php');

        // Cuando esta en modo guardar
        } else {
            // Quey result
            $resultado = $connect->query("SELECT * FROM usuarios WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);
            
            // Obteniedno el item actual
            foreach ($resultado as $row) {
                $usuario = $row;
            }
        }
    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
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
                    Nuevo proveedor
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div style="display:none">
                            <label for="id">id:</label>
                            <input type="text" value="<?= $usuario['id']?>" class="form-control" id="id" name="id">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $usuario['usuario']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $usuario['email']?>" required>
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
                            <?php if (!$usuario['foto'] == ''): ?>
                                <img src="<?= PUBLIC_PATH ?>/<?= $usuario['foto']?>" alt="<?= $usuario['placa']?>" width="400">
                            <?php endif ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>