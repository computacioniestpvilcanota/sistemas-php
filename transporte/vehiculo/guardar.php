<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "assets/static/uploads/";

        // Insertando el vehiculo en la base de datos
        // Preparando la consulta
        $statementvehiculo =  $connect->prepare("INSERT INTO vehiculos(descripcion,placa,viaje,foto,numero_asientos,id_tipo,id_propietario) 
            VALUES(:descripcion,:placa,:viaje,:foto,:numero_asientos,:id_tipo,:id_propietario)");

        // Ejecutando la consulta
        $statementvehiculo->execute([
            ':descripcion'       => $_POST['descripcion'],
            ':placa'       => $_POST['placa'],
            ':viaje'       => $_POST['viaje'],
            ':foto'       => $path_dir . $nombre_foto,
            ':numero_asientos'       => $_POST['numero_asientos'],
            ':id_tipo'       => $_POST['id_tipo'],
            ':id_propietario'       => $_POST['id_propietario']
        ]);

        if(!$_FILES['foto']['tmp_name'] == ''){
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
