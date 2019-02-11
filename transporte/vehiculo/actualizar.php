<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";
    
    try {
        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "assets/static/uploads/";

        // Insertando el vehiculo en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE vehiculos SET descripcion=:descripcion,placa=:placa,numero_asientos=:numero_asientos,id_tipo=:id_tipo,id_propietario=:id_propietario WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':descripcion'       => $_POST['descripcion'],
            ':placa'       => $_POST['placa'],
            ':numero_asientos'       => $_POST['numero_asientos'],
            ':id_tipo'       => $_POST['id_tipo'],
            ':id_propietario'       => $_POST['id_propietario'],
            ':id'       => $_POST['id'],
        ]);

        // Files
        if(!$_FILES['foto']['tmp_name'] == ''){
            // Actualizar la foto
            $statementFile =  $connect->prepare("UPDATE vehiculos SET foto=:foto WHERE id=:id");

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

        // Redirecionando al listado de vehiculos
        header('location:' . PUBLIC_PATH . '/vehiculo');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
