<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        // Creando un usuario
        // Preparando la consulta
        $statementUsuario =  $connect->prepare("INSERT INTO usuarios(usuario,email,clave,foto) 
        VALUES(:usuario,:email,:clave,:foto)");

        // Ejecutando la consulta
        $statementUsuario->execute([
            ':usuario'       => $_POST['dni'],
            ':email'       => $_POST['email'] ?? "",
            ':clave'       => sha1($_POST['dni']),
            ':foto'       => $_POST['foto'] ?? "",
        ]);

        // Recuperando el ID del nuevo usuario insertado
        $usuario_id = $connect->lastInsertId();


        // Insertando el tecnico en la base de datos
        // Preparando la consulta
        $statementtecnico =  $connect->prepare("INSERT INTO tecnicos(id_usuario,nombres,especialidad,dni,direccion,ciudad,sexo,telefono,cargo) 
            VALUES(:id_usuario,:nombres,:especialidad,:dni,:direccion,:ciudad,:sexo,:telefono,:cargo)");

        // Ejecutando la consulta
        $statementtecnico->execute([
            ':id_usuario'       => $usuario_id,
            ':nombres'       => $_POST['nombres'],
            ':especialidad'       => $_POST['especialidad'],
            ':dni'       => $_POST['dni'],
            ':direccion'       => $_POST['direccion'] ?? "",
            ':ciudad'       => $_POST['ciudad'] ?? "",
            ':sexo'       => $_POST['sexo'] ?? "",
            ':telefono'       => $_POST['telefono'] ?? "",
            ':cargo'       => $_POST['cargo'] ?? ""
        ]);

        // Redirecionando al listado de tecnicos
        header('location:' . PUBLIC_PATH . '/tecnico');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
