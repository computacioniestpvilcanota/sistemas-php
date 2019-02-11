<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT tikets.id, tikets.titulo, usuarios.usuario as usuario, proyectos.nombre as proyecto, prioridades.nombre as prioridad, categorias.nombre as categoria, estados.nombre as estado FROM tikets
        INNER JOIN usuarios ON usuarios.id = tikets.id_usuario
        INNER JOIN proyectos ON proyectos.id = tikets.id_proyecto
        INNER JOIN prioridades ON prioridades.id = tikets.id_prioridad
        INNER JOIN categorias ON categorias.id = tikets.id_categoria
        INNER JOIN estados ON estados.id = tikets.id_estado')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            $sub_array['acciones'] = "
                <a href='".PUBLIC_PATH."/tiket/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='mdi mdi-delete'></i></button></a>
                <a href='".PUBLIC_PATH."/tiket/form.php/?id=" .  $row['id'] . "'><button class='btn btn-primary btn-sm'><i class='mdi mdi-grease-pencil'></i></button></a>
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

