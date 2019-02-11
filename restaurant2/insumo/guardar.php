<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el insumo en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO insumos(nombre,descripcion) 
            VALUES(:nombre,:descripcion)");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':descripcion'       => $_POST['descripcion'],
        ]);

        // Redirecionando al listado de insumos
        header('location:' . PUBLIC_PATH . '/insumo');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
