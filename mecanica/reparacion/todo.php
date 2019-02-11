<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT reparaciones.id, reparaciones.cantidad, reparaciones.falla, reparaciones.cobro, reparaciones.precio, reparaciones.fecha, repuestos.nombre as repuesto, tecnicos.nombres as tecnico, clientes.nombres as cliente FROM reparaciones
        INNER JOIN repuestos ON repuestos.id = reparaciones.id_repuesto
        INNER JOIN tecnicos ON tecnicos.id = reparaciones.id_tecnico
        INNER JOIN clientes ON clientes.id = reparaciones.id_cliente')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            // $sub_array['acciones'] = "
            //     <a href='".PUBLIC_PATH."/reparacion/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='fas fa-trash'></i></button></a>

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

