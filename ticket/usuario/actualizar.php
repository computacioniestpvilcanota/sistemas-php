<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "media/static/uploads/";

        // Insertando el usuario en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE usuarios SET  
            usuario=:usuario,email=:email,clave=:clave WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':usuario'       => $_POST['usuario'],
            ':email'       => $_POST['email'],
            ':clave'       => sha1($_POST['clave']),
            ':id'       => $_POST['id'],
        ]);

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

        // Redirecionando al listado de usuarios
        header('location:' . PUBLIC_PATH . '/usuario');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
