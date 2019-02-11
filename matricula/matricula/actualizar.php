<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el matricula en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE matriculas SET pago=:pago, id_grupo=:id_grupo,id_alumno=:id_alumno WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':pago'       => $_POST['pago'],
            ':id_grupo'       => $_POST['id_grupo'],
            ':id_alumno'       => $_POST['id_alumno'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de matriculas
        header('location:' . PUBLIC_PATH . '/matricula');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
