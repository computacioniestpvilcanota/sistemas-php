<?php 
    require_once __DIR__ . "/usuario/auth.php";
    require_once "./database/connect.php";

    // Datos
    $data;

    $modo = "guardar";

    // Cuando se envian datos desde el formulario
    if(isset($_POST['id'])){
        $nombre_logo = $_FILES['logo']['name'];
        $path_dir = "assets/static/uploads/";

        // Insertando el cliente en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE configuracion SET  
            ruc=:ruc,empresa=:empresa,email=:email,telefono=:telefono,direccion=:direccion WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':ruc'       => $_POST['ruc'],
            ':empresa'       => $_POST['empresa'],
            ':email'       => $_POST['email'],
            ':telefono'       => $_POST['telefono'] ?? "",
            ':direccion'       => $_POST['direccion'] ?? "",
            ':id'       => $_POST['id'],
        ]);

        // Files
        if(!$_FILES['logo']['tmp_name'] == ''){
            // Actualizar la logo
            $statementFile =  $connect->prepare("UPDATE configuracion SET logo=:logo WHERE id=:id");

            // Ejecutando la consulta
            $statementFile->execute([
                ':logo'       => $path_dir . $nombre_logo,
                ':id'       => $_POST['id'],
            ]);

            if(!copy(
                $_FILES['logo']['tmp_name'],
                    __DIR__ . "/$path_dir" . $nombre_logo)){
                    throw new Exception("Error al subir el archivo", 1);
            }
        }

        header('location:' . PUBLIC_PATH . '/configuracion.php');

    // Cuando esta en modo guardar
    }else{
        // Realizando la consulta SQL
        $resultado = $connect->query("SELECT * FROM configuracion WHERE id = '1'")->fetchAll(PDO::FETCH_ASSOC);
    
        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
            $modo = "actualizar";
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/partes/head.php" ?>
    </head>
    <body>
        <?php require_once "./partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    configuracion
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
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
                                <label for="ruc">ruc</label>
                                <input type="text" class="form-control" id="ruc" name="ruc" value="<?= $data['ruc']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="empresa">empresa</label>
                                <input type="text" class="form-control" id="empresa" name="empresa" value="<?= $data['empresa']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telefono">telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $data['telefono']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="direccion">empresa</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $data['direccion']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo">logo</label>
                            <input type="file" class="form-control-file" id="logo" name="logo">
                        </div>
                        <div class="mb-3">
                            <?php if (!$data['logo'] == ''): ?>
                                <img src="<?= PUBLIC_PATH ?>/<?= $data['logo']?>" alt="<?= $data['ruc']?>" width="400">
                            <?php endif ?>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>