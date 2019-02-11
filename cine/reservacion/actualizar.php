<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        $fecha_reserva = $_POST['fecha_reserva'];
        $hora_reserva = $_POST['hora_reserva'];
        $abservacion = $_POST['abservacion'];
        $id_cliente = $_POST['id_cliente'];
        $id_pelicula = $_POST['id_pelicula'];
        $precio = $_POST['precio'];
        $id = $_POST['id'];

        $sql = "UPDATE reservaciones SET fecha_reserva='$fecha_reserva',hora_reserva='$hora_reserva',abservacion='$abservacion',id_cliente='$id_cliente',id_pelicula='$id_pelicula',precio='$precio' WHERE id = '$id'";
        $connect->query($sql);

        // Redirecionando al listado de reservaciones
        header('location:' . PUBLIC_PATH . '/reservacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
