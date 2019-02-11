<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT peliculas.id, peliculas.nombre, peliculas.descripcion, peliculas.portada, peliculas.unidad, categorias.nombre as categoria FROM peliculas
        INNER JOIN categorias ON categorias.id = peliculas.id_categoria');

        $data = [];
        while ($row = $resultado->fetch_assoc()) {
            $sub_array = $row;
            $sub_array['acciones'] = "
                <a href='".PUBLIC_PATH."/pelicula/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='fas fa-trash'></i></button></a>
                <a href='".PUBLIC_PATH."/pelicula/form.php/?id=" .  $row['id'] . "'><button class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></button></a>
            ";
            $data[] = $sub_array;
        }
    
        $repuesta = [
            "data" => $data
        ];
    
        echo json_encode($repuesta);
    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }

