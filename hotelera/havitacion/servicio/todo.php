<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../../database/connect.php";
    require_once "./../../config.php";

    try {
        $resultado = $connect->query('SELECT * FROM servicios')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            $sub_array['acciones'] = "
                <a href='".PUBLIC_PATH."/havitacion/servicio/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='fas fa-trash'></i></button></a>
                <a href='".PUBLIC_PATH."/havitacion/servicio/form.php/?id=" .  $row['id'] . "'><button class='btn btn-primary btn-sm mr-2'><i class='fas fa-edit'></i></button></a>
            ";
            $sub_array['foto'] = "<img src='".PUBLIC_PATH."/".$row['foto']."' alt='Foto' width='90'>";
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

