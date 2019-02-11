<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el tecnico en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE tecnicos SET  
            nombres=:nombres,especialidad=:especialidad,dni=:dni,direccion=:direccion,ciudad=:ciudad,sexo=:sexo,telefono=:telefono,cargo=:cargo WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombres'       => $_POST['nombres'],
            ':especialidad'       => $_POST['especialidad'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'] ?? "",
            ':ciudad'       => $_POST['ciudad'] ?? "",
            ':sexo'       => $_POST['sexo'] ?? "",
            ':telefono'       => $_POST['telefono'] ?? "",
            ':cargo'       => $_POST['cargo'] ?? "",
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de tecnicos
        header('location:' . PUBLIC_PATH . '/tecnico');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
