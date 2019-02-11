<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        // Insertando el propietario en la base de datos
        // Preparando la consulta
        $statementpropietario =  $connect->prepare("INSERT INTO propietarios(nombres,apellidos,dni,direccion,ciudad,sexo,telefono,celular) 
            VALUES(:nombres,:apellidos,:dni,:direccion,:ciudad,:sexo,:telefono,:celular)");

        // Ejecutando la consulta
        $statementpropietario->execute([
            ':nombres'       => $_POST['nombres'],
            ':apellidos'       => $_POST['apellidos'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'],
            ':ciudad'       => $_POST['ciudad'],
            ':sexo'       => $_POST['sexo'],
            ':telefono'       => $_POST['telefono'],
            ':celular'       => $_POST['celular']
        ]);

        // Redirecionando al listado de propietarios
        header('location:' . PUBLIC_PATH . '/propietario');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
