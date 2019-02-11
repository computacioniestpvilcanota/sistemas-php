<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el autor en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE autores SET nombre=:nombre, nacionalidad=:nacionalidad WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':nacionalidad'       => $_POST['nacionalidad'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de autores
        header('location:' . PUBLIC_PATH . '/autor');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
