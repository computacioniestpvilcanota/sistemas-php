<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {        
        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "assets/static/uploads/";

        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE libros SET  
            nombre=:nombre,descripcion=:descripcion,cantidad=:cantidad,id_genero=:id_genero,id_editorial=:id_editorial,id_autor=:id_autor,edicion=:edicion WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':descripcion'       => $_POST['descripcion'],
            ':cantidad'       => intval($_POST['cantidad']),
            ':id_genero'       => $_POST['id_genero'],
            ':id_editorial'       => $_POST['id_editorial'],
            ':id_autor'       => $_POST['id_autor'],
            ':edicion'       => intval($_POST['edicion']),
            ':id'       => $_POST['id'],
        ]);

        // Copiando la imagen
        if(!$_FILES['foto']['tmp_name'] == ''){
            if(!copy(
                $_FILES['foto']['tmp_name'],
                    __DIR__ . "/../$path_dir" . $nombre_foto)){
                    throw new Exception("Error al subir el archivo", 1);
            }
        }

        // Redirecionando al listado de libros
        header('location:' . PUBLIC_PATH . '/libro');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
