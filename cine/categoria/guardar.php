<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        // Creando un categoria
        // Preparando la consulta
    
        $nombre = $_POST['nombre'];
        $sql = "INSERT INTO categorias(nombre) VALUES('$nombre')";
        $connect->query($sql);

        // // Redirecionando al listado de categorias
        header('location:' . PUBLIC_PATH . '/categoria');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
