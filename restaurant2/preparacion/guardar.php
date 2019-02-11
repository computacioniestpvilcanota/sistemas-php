<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {

        // Insertando el preparacion en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO preparacion(id_menu,cantidad,insumo_1,cantidad_1,insumo_2,cantidad_2,insumo_3,cantidad_3,insumo_4,cantidad_4)
            VALUES(:id_menu,:cantidad,:insumo_1,:cantidad_1,:insumo_2,:cantidad_2,:insumo_3,:cantidad_3,:insumo_4,:cantidad_4)");

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
        ]);

        // Redirecionando al listado de preparacion
        header('location:' . PUBLIC_PATH . '/preparacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
