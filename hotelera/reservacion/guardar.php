<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el reservacion en la base de datos
        // Preparando la consulta
        $statementreservacion =  $connect->prepare("INSERT INTO reservaciones(fecha,fechaEntrega,abservacion,id_cliente,id_havitacion,precio) 
            VALUES(:fecha,:fechaEntrega,:abservacion,:id_cliente,:id_havitacion,:precio)");

        // Ejecutando la consulta
        $statementreservacion->execute([
            ':fecha'       => time(),
            ':fechaEntrega'       => $_POST['fechaEntrega'],
            ':abservacion'       => $_POST['abservacion'],
            ':id_cliente'       => $_POST['id_cliente'],
            ':id_havitacion'       => $_POST['id_havitacion'],
            ':precio'       => $_POST['precio']
        ]);

        // Redirecionando al listado de reservaciones
        header('location:' . PUBLIC_PATH . '/reservacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
