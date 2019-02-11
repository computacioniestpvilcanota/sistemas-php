<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el proyecto en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE proyectos SET nombre=:nombre WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de proyectos
        header('location:' . PUBLIC_PATH . '/proyecto');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
