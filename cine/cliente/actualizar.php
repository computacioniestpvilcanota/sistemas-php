<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $edad = $_POST['edad'];
        $id = $_POST['id'];

        $sql = "UPDATE clientes SET nombres='$nombres',apellidos='$apellidos',dni='$dni',direccion='$direccion',ciudad='$ciudad',sexo='$sexo',telefono='$telefono',celular='$celular',edad='$edad' WHERE id = '$id'";
        $connect->query($sql);

        // Redirecionando al listado de clientes
        header('location:' . PUBLIC_PATH . '/cliente');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
