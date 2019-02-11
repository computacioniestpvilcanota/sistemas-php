<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        // Insertando el havitacion en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE havitaciones SET en_uso =:en_uso WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':en_uso'       => '0',
            ':id'       => $_GET['havitacion'],
        ]);

        // Redirecionando al listado de alquileres
        header('location:' . PUBLIC_PATH . '/havitacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
