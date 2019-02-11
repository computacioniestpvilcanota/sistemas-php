<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el editorial en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO editoriales(nombre) VALUES(:nombre)");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
        ]);

        // Redirecionando al listado de editoriales
        header('location:' . PUBLIC_PATH . '/editorial');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
