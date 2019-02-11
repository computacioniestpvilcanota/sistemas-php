<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Creando un usuario
        // Preparando la consulta
        $statementUsuario =  $connect->prepare("INSERT INTO usuarios(usuario,email,clave,foto) 
        VALUES(:usuario,:email,:clave,:foto)");

        // Ejecutando la consulta
        $statementUsuario->execute([
            ':usuario'       => $_POST['dni'],
            ':email'       => $_POST['email'],
            ':clave'       => sha1($_POST['dni']),
            ':foto'       => $_POST['foto'],
        ]);

        // Recuperando el ID del nuevo usuario insertado
        $usuario_id = $connect->lastInsertId();


        // Insertando el alumno en la base de datos
        // Preparando la consulta
        $statementalumno =  $connect->prepare("INSERT INTO alumnos(id_usuario,nombres,apellidos,dni,direccion,ciudad,sexo,celular) 
            VALUES(:id_usuario,:nombres,:apellidos,:dni,:direccion,:ciudad,:sexo,:celular)");

        // Ejecutando la consulta
        $statementalumno->execute([
            ':id_usuario'       => $usuario_id,
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
