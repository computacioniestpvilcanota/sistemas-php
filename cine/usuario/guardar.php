<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        // Creando un usuariox
        // Preparando la consulta
    
        $clave = sha1($_POST['clave']);
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $sql = "INSERT INTO usuarios(usuario,email,clave) VALUES('$usuario','$email','$clave')";
        $connect->query($sql);

        // // Redirecionando al listado de usuarios
        header('location:' . PUBLIC_PATH . '/usuario');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
