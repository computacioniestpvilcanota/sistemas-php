<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el alumno en la base de datos
        // Preparando la consulta
        $statementalumno =  $connect->prepare("INSERT INTO alumnos(nombres,apellidos,dni,direccion,ciudad,sexo,celular) 
            VALUES(:nombres,:apellidos,:dni,:direccion,:ciudad,:sexo,:celular)");

        // Ejecutando la consulta
        $statementalumno->execute([
            ':nombres'       => $_POST['nombres'],
            ':apellidos'       => $_POST['apellidos'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'],
            ':ciudad'       => $_POST['ciudad'],
            ':sexo'       => $_POST['sexo'],
            ':celular'       => $_POST['celular']
        ]);

        // Redirecionando al listado de alumnos
        header('location:' . PUBLIC_PATH . '/alumno');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
