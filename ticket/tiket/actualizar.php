<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el tiket en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE tikets 
        SET titulo=:titulo,descripcion=:descripcion,fecha_modificacion=:fecha_modificacion,id_usuario=:id_usuario,id_proyecto=:id_proyecto,id_prioridad=:id_prioridad,id_categoria=:id_categoria,id_estado=:id_estado WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':titulo'       => $_POST['titulo'],
            ':descripcion'       => $_POST['descripcion'],
            ':fecha_modificacion'       => date('y-m-d'),
            ':id_usuario'       => $_SESSION['usuario']['id'],
            ':id_proyecto'       => $_POST['id_proyecto'],
            ':id_prioridad'       => $_POST['id_prioridad'],
            ':id_categoria'       => $_POST['id_categoria'],
            ':id_estado'       => $_POST['id_estado'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de tikets
        header('location:' . PUBLIC_PATH . '/tiket');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
