<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        // Creando un pelicula
        // Preparando la consulta
    
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $unidad = $_POST['unidad'];
        $id_categoria = $_POST['id_categoria'];

        $sql = "INSERT INTO peliculas(nombre,descripcion,unidad,id_categoria)
         VALUES('$nombre','$descripcion','$unidad','$id_categoria')";
        $connect->query($sql);

        // // Redirecionando al listado de peliculas
        header('location:' . PUBLIC_PATH . '/pelicula');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
