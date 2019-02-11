<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el reservacion en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE reservaciones SET  
            fecha=:fecha,fechaEntrega=:fechaEntrega,abservacion=:abservacion,id_cliente=:id_cliente,id_havitacion=:id_havitacion,precio=:precio WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':fecha'       => time(),
            ':fechaEntrega'       => $_POST['fechaEntrega'],
            ':abservacion'       => $_POST['abservacion'],
            ':id_cliente'       => $_POST['id_cliente'],
            ':id_havitacion'       => $_POST['id_havitacion'],
            ':precio'       => $_POST['precio'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de reservaciones
        header('location:' . PUBLIC_PATH . '/reservacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
