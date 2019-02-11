<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {

        $idUser = $_GET['id'];

        // Preparando la consulta de eliminar
        $connect->query("DELETE FROM reservaciones WHERE id = '$idUser'");

        // Redirecionando al listado de reservaciones
        header('location:' . PUBLIC_PATH . '/reservacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
