<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Creando un usuario
        // Preparando la consulta de eliminar
        $statement =  $connect->prepare("DELETE FROM preguntas WHERE id = :id");

        // Ejecutando la consulta
        $statement->execute([
            ':id'       => $_GET['id'],
        ]);

        // Redirecionando al listado de preguntas
        header('location:' . PUBLIC_PATH . '/pregunta');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
