<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "assets/static/uploads/";

        // Insertando el havitacion en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE havitaciones SET  
            numero=:numero,en_uso=:en_uso,descripcion=:descripcion,precio=:precio,nivel=:nivel,id_categoria=:id_categoria WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':numero'       => $_POST['numero'],
            ':en_uso'       => $_POST['en_uso'],
            ':descripcion'       => $_POST['descripcion'],
            ':precio'       => $_POST['precio'] ?? "",
            ':nivel'       => $_POST['nivel'] ?? "",
            ':id_categoria'       => $_POST['id_categoria'] ?? "",
            ':id'       => $_POST['id'],
        ]);

        if(!$_FILES['foto']['tmp_name'] == ''){
            // Actualizar la foto
            $statementFile =  $connect->prepare("UPDATE havitaciones SET foto=:foto WHERE id=:id");

            // Ejecutando la consulta
            $statementFile->execute([
                ':foto'       => $path_dir . $nombre_foto,
                ':id'       => $_POST['id'],
            ]);

            if(!copy(
                $_FILES['foto']['tmp_name'],
                 __DIR__ . "/../$path_dir" . $nombre_foto)){
                    throw new Exception("Error al subir el archivo", 1);
            }
        }

        // Redirecionando al listado de havitaciones
        header('location:' . PUBLIC_PATH . '/havitacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
