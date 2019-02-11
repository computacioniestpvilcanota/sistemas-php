<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {        
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE prestamos SET  
            fecha=:fecha,abservacion=:fecha,id_cliente=:id_cliente,id_libro=:id_libro WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':fecha'       => date("y-m-d"),
            ':abservacion'       => $_POST['abservacion'],
            ':id_cliente'       => $_POST['id_cliente'],
            ':id_libro'       => $_POST['id_libro'] ?? "",
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de prestamos
        header('location:' . PUBLIC_PATH . '/prestamo');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
