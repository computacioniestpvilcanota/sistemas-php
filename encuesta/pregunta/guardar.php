<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {

        // Insertando el pregunta en la base de datos
        // Preparando la consulta
        $statementpregunta =  $connect->prepare("INSERT INTO preguntas(nombre) 
            VALUES(:nombre)");

        // Ejecutando la consulta
        $statementpregunta->execute([
            ':nombre'       => $_POST['nombre']
        ]);

        // Redirecionando al listado de preguntas
        header('location:' . PUBLIC_PATH . '/pregunta');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
