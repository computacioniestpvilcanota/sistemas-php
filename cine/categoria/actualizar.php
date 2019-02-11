<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];

        $sql = "UPDATE categorias SET nombre='$nombre' WHERE id = '$id'";
        $connect->query($sql);

        // Redirecionando al listado de categorias
        header('location:' . PUBLIC_PATH . '/categoria');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
