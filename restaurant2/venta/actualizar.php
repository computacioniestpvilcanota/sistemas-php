<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el venta en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE ventas SET  
            nombre=:nombre,descripcion=:descripcion,stock=:stock,codigo=:codigo,id_categoria=:id_categoria WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':id_menu'       => $_POST['id_menu'],
            ':cantidad'       => $_POST['cantidad'],
            ':insumo_1'       => $_POST['insumo_1'],
            ':cantidad_1'       => $_POST['cantidad_1'],
            ':insumo_2'       => $_POST['insumo_2'],
            ':cantidad_2'       => $_POST['cantidad_2'],
            ':insumo_3'       => $_POST['insumo_3'],
            ':cantidad_3'       => $_POST['cantidad_3'],
            ':insumo_4'       => $_POST['insumo_4'],
            ':cantidad_4'       => $_POST['cantidad_4'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de ventas
        header('location:' . PUBLIC_PATH . '/venta');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
