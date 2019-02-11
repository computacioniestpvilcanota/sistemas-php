<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el docente en la base de datos
        // Preparando la consulta
        $statementdocente =  $connect->prepare("INSERT INTO docentes(nombres,apellidos,dni,direccion,ciudad,sexo,celular) 
            VALUES(:nombres,:apellidos,:dni,:direccion,:ciudad,:sexo,:celular)");

        // Ejecutando la consulta
        $statementdocente->execute([
            ':nombres'       => $_POST['nombres'],
            ':apellidos'       => $_POST['apellidos'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'],
            ':ciudad'       => $_POST['ciudad'],
            ':sexo'       => $_POST['sexo'],
            ':celular'       => $_POST['celular']
        ]);

        // Redirecionando al listado de docentes
        header('location:' . PUBLIC_PATH . '/docente');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
