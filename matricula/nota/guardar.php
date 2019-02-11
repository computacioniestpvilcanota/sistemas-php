<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el nota en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO notas(id_alumno,id_curso,fecha,nota1,nota2,nota3,notafinal) 
            VALUES(:id_alumno,:id_curso,:fecha,:nota1,:nota2,:nota3,:notafinal)");

        // Ejecutando la consulta
        $statement->execute([
            ':id_alumno'       => $_POST['id_alumno'],
            ':id_curso'       => $_POST['id_curso'],
            ':fecha'       => date('y-m-d'),
            ':nota1'       => $_POST['nota1'],
            ':nota2'       => $_POST['nota2'],
            ':nota3'       => $_POST['nota3'],
            ':notafinal'       => $_POST['notafinal'],
        ]);

        // Redirecionando al listado de notas
        header('location:' . PUBLIC_PATH . '/nota');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
