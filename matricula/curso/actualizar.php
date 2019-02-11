<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el curso en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE cursos SET nombre=:nombre, id_grupo=:id_grupo,id_docente=:id_docente WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':id_grupo'       => $_POST['id_grupo'],
            ':id_docente'       => $_POST['id_docente'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de cursos
        header('location:' . PUBLIC_PATH . '/curso');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
