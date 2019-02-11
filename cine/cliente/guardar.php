<?php
    require_once __DIR__ . "/../usuario/verifica.php";
    require_once "./../database/connect.php";

    try {
        // Creando un cliente
        // Preparando la consulta
    
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $dni = $_POST['dni'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $edad = $_POST['edad'];


        $sql = "INSERT INTO clientes(nombres,apellidos,dni,direccion,ciudad,sexo,telefono,celular,edad)
         VALUES('$nombres','$apellidos','$dni','$direccion','$ciudad','$sexo','$telefono','$celular','$edad')";
        $connect->query($sql);

        // // Redirecionando al listado de clientes
        header('location:' . PUBLIC_PATH . '/cliente');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
