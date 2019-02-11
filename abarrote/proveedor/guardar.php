<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el proveedor en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO proveedores(rason_social,ruc,direccion,ciudad,email,actividad_principal,telefono,representante) 
            VALUES(:rason_social,:ruc,:direccion,:ciudad,:email,:actividad_principal,:telefono,:representante)");

        // Ejecutando la consulta
        $statement->execute([
            ':rason_social'       => $_POST['rason_social'],
            ':ruc'       => $_POST['ruc'],
            ':direccion'       => $_POST['direccion'],
            ':ciudad'       => $_POST['ciudad'] ,
            ':email'       => $_POST['email'] ,
            ':actividad_principal'       => $_POST['actividad_principal'] ,
            ':telefono'       => $_POST['telefono'] ,
            ':representante'       => $_POST['representante'] 
        ]);

        // Redirecionando al listado de proveedores
        header('location:' . PUBLIC_PATH . '/proveedor');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
