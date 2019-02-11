<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "media/static/uploads/";

        // Insertando el profesor en la base de datos
        // Preparando la consulta
        $statementprofesor =  $connect->prepare("INSERT INTO profesores(nombres,apellidos,dni,direccion,ciudad,sexo,celular) 
            VALUES(:nombres,:apellidos,:dni,:direccion,:ciudad,:sexo,:celular)");

        // Ejecutando la consulta
        $statementprofesor->execute([
            ':nombres'       => $_POST['nombres'],
            ':apellidos'       => $_POST['apellidos'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'],
            ':ciudad'       => $_POST['ciudad'],
            ':sexo'       => $_POST['sexo'],
            ':celular'       => $_POST['celular']
        ]);

        // Recuperando el ID del nuevo profesor insertado
        $profesor_id = $connect->lastInsertId();
        
        // Files
        if(!$_FILES['foto']['tmp_name'] == ''){
            // Actualizar la foto
            $statementFile =  $connect->prepare("UPDATE profesores SET foto=:foto WHERE id=:id");

            // Ejecutando la consulta
            $statementFile->execute([
                ':foto'       => $path_dir . $nombre_foto,
                ':id'       => $profesor_id,
            ]);

            // Copy temporal files
            if(!copy(
                $_FILES['foto']['tmp_name'],
                    __DIR__ . "/../$path_dir" . $nombre_foto)){
                    throw new Exception("Error al subir el archivo", 1);
            }
        }

        // Redirecionando al listado de profesores
        header('location:' . PUBLIC_PATH . '/profesor');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
