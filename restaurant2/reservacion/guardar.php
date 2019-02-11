<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {

        // Insertando el reservacion en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO reservaciones(id_menu,fecha,cantidad) 
            VALUES(:id_menu,:fecha,:cantidad)");

        // Ejecutando la consulta
        $statement->execute([
            ':id_menu'       => $_POST['id_menu'],
            ':fecha'       => date("y-m-d"),
            ':cantidad'       => $_POST['cantidad'],
        ]);

        // Redirecionando al listado de reservaciones
        header('location:' . PUBLIC_PATH . '/reservacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
