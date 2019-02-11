<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT prestamos.id, prestamos.fecha, prestamos.abservacion, clientes.nombres as cliente, libros.nombre as libro, libros.portada as libro_portada FROM prestamos
        INNER JOIN clientes ON clientes.id = prestamos.id_cliente
        INNER JOIN libros ON libros.id = prestamos.id_libro')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            // $sub_array['acciones'] = "
            //     <a href='".PUBLIC_PATH."/prestamo/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='mdi mdi-delete'></i></button></a>
            //     <a href='".PUBLIC_PATH."/prestamo/form.php/?id=" .  $row['id'] . "'><button class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></button></a>
            // ";
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

