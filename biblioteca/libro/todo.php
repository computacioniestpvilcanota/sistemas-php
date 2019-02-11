<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT libros.id, libros.nombre, libros.descripcion, libros.portada, libros.edicion, libros.cantidad, generos.nombre as genero, editoriales.nombre as editorial, autores.nombre as autor FROM libros
        INNER JOIN generos ON generos.id = libros.id_genero
        INNER JOIN editoriales ON editoriales.id = libros.id_editorial
        INNER JOIN autores ON autores.id = libros.id_autor')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            $sub_array['portada'] = "<img src='".PUBLIC_PATH."/".$row['portada']."' alt='portada' width='50px'>"; 
            $sub_array['acciones'] = "
                <a href='".PUBLIC_PATH."/libro/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='mdi mdi-delete'></i></button></a>
                <a href='".PUBLIC_PATH."/libro/form.php/?id=" .  $row['id'] . "'><button class='btn btn-primary btn-sm'><i class='mdi mdi-grease-pencil'></i></button></a>
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

