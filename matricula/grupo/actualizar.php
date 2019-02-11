<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el grupo en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE grupos SET nombre=:nombre WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de grupos
        header('location:' . PUBLIC_PATH . '/grupo');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
