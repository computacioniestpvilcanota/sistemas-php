<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {

        // Insertando el cliente en la base de datos
        // Preparando la consulta
        $statementCliente =  $connect->prepare("INSERT INTO clientes(nombres,apellidos,dni,direccion,ciudad,sexo,telefono,celular) 
            VALUES(:nombres,:apellidos,:dni,:direccion,:ciudad,:sexo,:telefono,:celular)");

        // Ejecutando la consulta
        $statementCliente->execute([
            ':nombres'       => $_POST['nombres'],
            ':apellidos'       => $_POST['apellidos'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'],
            ':ciudad'       => $_POST['ciudad'],
            ':sexo'       => $_POST['sexo'],
            ':telefono'       => $_POST['telefono'],
            ':celular'       => $_POST['celular']
        ]);

        // Redirecionando al listado de clientes
        header('location:' . PUBLIC_PATH . '/cliente');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
