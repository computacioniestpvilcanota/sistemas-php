<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el propietario en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE propietarios SET  
            nombres=:nombres,apellidos=:apellidos,dni=:dni,direccion=:direccion,ciudad=:ciudad,sexo=:sexo,telefono=:telefono,celular=:celular WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombres'       => $_POST['nombres'],
            ':apellidos'       => $_POST['apellidos'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'],
            ':ciudad'       => $_POST['ciudad'],
            ':sexo'       => $_POST['sexo'],
            ':telefono'       => $_POST['telefono'],
            ':celular'       => $_POST['celular'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de propietarios
        header('location:' . PUBLIC_PATH . '/propietario');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
