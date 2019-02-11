<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el empleado en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE empleados SET  
            nombres=:nombres,apellidos=:apellidos,dni=:dni,direccion=:direccion,ciudad=:ciudad,sexo=:sexo,telefono=:telefono,celular=:celular WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombres'       => $_POST['nombres'],
            ':apellidos'       => $_POST['apellidos'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'] ?? "",
            ':ciudad'       => $_POST['ciudad'] ?? "",
            ':sexo'       => $_POST['sexo'] ?? "",
            ':telefono'       => $_POST['telefono'] ?? "",
            ':celular'       => $_POST['celular'] ?? "",
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de empleados
        header('location:' . PUBLIC_PATH . '/empleado');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
