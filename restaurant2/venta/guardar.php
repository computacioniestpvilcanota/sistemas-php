<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {

        // Insertando el venta en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO ventas(id_menu,cantidad,precio,fecha_venta,id_cliente) 
            VALUES(:id_menu,:cantidad,:precio,:fecha_venta,:id_cliente)");

        // Ejecutando la consulta
        $statement->execute([
            ':id_menu'       => $_POST['id_menu'],
            ':cantidad'       => $_POST['cantidad'],
            ':precio'       => $_POST['precio'],
            ':fecha_venta'       => date("y-m-d"),
            ':id_cliente'       => $_POST['id_cliente']
        ]);

        // Redirecionando al listado de ventas
        header('location:' . PUBLIC_PATH . '/venta');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
