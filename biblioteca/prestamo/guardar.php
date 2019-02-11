<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Preparando la consulta
        $statementprestamo =  $connect->prepare("INSERT INTO prestamos(fecha,abservacion,id_cliente,id_libro) 
            VALUES(:fecha,:abservacion,:id_cliente,:id_libro)");

        // Ejecutando la consulta
        $statementprestamo->execute([
            ':fecha'       => date("y-m-d"),
            ':abservacion'       => $_POST['abservacion'],
            ':id_cliente'       => $_POST['id_cliente'],
            ':id_libro'       => $_POST['id_libro'] ,
        ]);
        
        // Redirecionando al listado de prestamos
        header('location:' . PUBLIC_PATH . '/prestamo');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
