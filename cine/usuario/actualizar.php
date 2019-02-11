<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {

        $clave = sha1($_POST['clave']);
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $id = $_POST['id'];

        $sql = "UPDATE usuarios SET usuario='$usuario',email='$email',clave='$clave' WHERE id = '$id'";
        $connect->query($sql);

        // Redirecionando al listado de usuarios
        header('location:' . PUBLIC_PATH . '/usuario');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
