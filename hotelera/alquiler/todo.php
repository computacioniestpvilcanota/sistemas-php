<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT alquileres.id, alquileres.desde_fecha, alquileres.hasta_fecha, alquileres.observacion, clientes.nombres as cliente, havitaciones.numero as havitacion, empleados.nombres as empleado, alquileres.precio  FROM alquileres
        INNER JOIN clientes ON clientes.id = alquileres.id_cliente
        INNER JOIN havitaciones on havitaciones.id = alquileres.id_havitacion
        INNER JOIN empleados on empleados.id = alquileres.id_empleado')->fetchAll(PDO::FETCH_ASSOC);
        $repuesta = [
            "data" => $resultado
        ];
    
        echo json_encode($repuesta);
    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }

