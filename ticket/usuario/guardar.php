<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "media/static/uploads/";

        // Creando un usuario
        // Preparando la consulta
        $statementUsuario =  $connect->prepare("INSERT INTO usuarios(usuario,email,clave) 
        VALUES(:usuario,:email,:clave)");

        // Ejecutando la consulta
        $statementUsuario->execute([
            ':usuario'       => $_POST['usuario'],
            ':email'       => $_POST['email'],
            ':clave'       => sha1($_POST['clave']),
        ]);


        // Recuperando el ID del nuevo profesor insertado
        $usuario_id = $connect->lastInsertId();

        // Files
        if(!$_FILES['foto']['tmp_name'] == ''){
            // Actualizar la foto
            $statementFile =  $connect->prepare("UPDATE usuarios SET foto=:foto WHERE id=:id");

            // Ejecutando la consulta
            $statementFile->execute([
                ':foto'       => $path_dir . $nombre_foto,
                ':id'       => $usuario_id,
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
