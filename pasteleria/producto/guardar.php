<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el producto en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO productos(nombre,descripcion,stock,codigo,id_categoria) 
            VALUES(:nombre,:descripcion,:stock,:codigo,:id_categoria)");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':descripcion'       => $_POST['descripcion'],
            ':stock'       => $_POST['stock'],
            ':codigo'       => $_POST['codigo'] ?? "",
            ':id_categoria'       => $_POST['id_categoria'] ?? "",
        ]);

        // Redirecionando al listado de productos
        header('location:' . PUBLIC_PATH . '/producto');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
