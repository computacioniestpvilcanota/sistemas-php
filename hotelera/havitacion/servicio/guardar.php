<?php
    require_once __DIR__ . "/../../usuario/auth.php";
    require_once "./../../database/connect.php";

    try {

        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "assets/static/uploads/";

        // Insertando el servicio en la base de datos
        // Preparando la consulta
        $statementservicio =  $connect->prepare("INSERT INTO servicios(nombre,descripcion,foto,id_havitacion) 
            VALUES(:nombre,:descripcion,:foto,:id_havitacion)");

        // Ejecutando la consulta
        $statementservicio->execute([
            ':nombre'       => $_POST['nombre'],
            ':descripcion'       => $_POST['descripcion'],
            ':foto'       => $path_dir . $nombre_foto ?? "",
            ':id_havitacion'       => $_POST['id_havitacion'],
        ]);


        if(!$_FILES['foto']['tmp_name'] == ''){
            if(!copy(
                $_FILES['foto']['tmp_name'],
                 __DIR__ . "/../../$path_dir" . $nombre_foto)){
                    throw new Exception("Error al subir el archivo", 1);
            }
        }

        // Redirecionando al listado de servicios
        header('location:' . PUBLIC_PATH . '/havitacion/servicio/?havitacion=' . $_POST['id_havitacion']);

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
