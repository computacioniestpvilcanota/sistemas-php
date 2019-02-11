<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        // Creando un reservacion
        // Preparando la consulta
    
        $fecha = date('y-m-d');
        $fecha_reserva = $_POST['fecha_reserva'];
        $hora_reserva = $_POST['hora_reserva'];
        $abservacion = $_POST['abservacion'];
        $id_cliente = $_POST['id_cliente'];
        $id_pelicula = $_POST['id_pelicula'];
        $precio = $_POST['precio'];

        $sql = "INSERT INTO reservaciones(fecha,fecha_reserva,hora_reserva,abservacion,id_cliente,id_pelicula,precio)
         VALUES('$fecha','$fecha_reserva','$hora_reserva','$abservacion','$id_cliente','$id_pelicula','$precio')";
        $connect->query($sql);

        // // Redirecionando al listado de reservaciones
        header('location:' . PUBLIC_PATH . '/reservacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
