<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el medicina en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE medicinas SET  
            nombre=:nombre,descripcion=:descripcion,stock=:stock,codigo=:codigo,id_categoria=:id_categoria WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':descripcion'       => $_POST['descripcion'],
            ':stock'       => $_POST['stock'],
            ':codigo'       => $_POST['codigo'],
            ':id_categoria'       => $_POST['id_categoria'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de medicinas
        header('location:' . PUBLIC_PATH . '/medicina');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
