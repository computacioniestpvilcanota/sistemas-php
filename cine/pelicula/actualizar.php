<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $unidad = $_POST['unidad'];
        $id_categoria = $_POST['id_categoria'];
        $id = $_POST['id'];

        $sql = "UPDATE peliculas SET nombre='$nombre',descripcion='$descripcion',unidad='$unidad',id_categoria='$id_categoria' WHERE id = '$id'";
        $connect->query($sql);

        // Redirecionando al listado de peliculas
        header('location:' . PUBLIC_PATH . '/pelicula');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
