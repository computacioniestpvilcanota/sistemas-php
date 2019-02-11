<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el tiket en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO tikets(titulo,descripcion,fecha,id_usuario,id_proyecto,id_prioridad,id_categoria,id_estado) 
        VALUES(:titulo,:descripcion,:fecha,:id_usuario,:id_proyecto,:id_prioridad,:id_categoria,:id_estado)");

        // Ejecutando la consulta
        $statement->execute([
            ':titulo'       => $_POST['titulo'],
            ':descripcion'       => $_POST['descripcion'],
            ':fecha'       => date('y-m-d'),
            ':id_usuario'       => $_SESSION['usuario']['id'],
            ':id_proyecto'       => $_POST['id_proyecto'],
            ':id_prioridad'       => $_POST['id_prioridad'],
            ':id_categoria'       => $_POST['id_categoria'],
            ':id_estado'       => $_POST['id_estado'],
        ]);

        // Redirecionando al listado de tikets
        header('location:' . PUBLIC_PATH . '/tiket');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
