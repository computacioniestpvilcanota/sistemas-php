<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT notas.id, alumnos.nombres as alumno, cursos.nombre as curso, notas.fecha, notas.nota1, notas.nota2, notas.nota3, notas.notafinal FROM notas
        INNER JOIN alumnos oN alumnos.id = notas.id_alumno
        INNER JOIN cursos ON cursos.id = notas.id_curso')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            $sub_array['acciones'] = "
                <a href='".PUBLIC_PATH."/nota/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='mdi mdi-delete'></i></button></a>
                <a href='".PUBLIC_PATH."/nota/form.php/?id=" .  $row['id'] . "'><button class='btn btn-primary btn-sm'><i class='mdi mdi-grease-pencil'></i></button></a>
            ";
            $data[] = $sub_array;
        }
    
        $repuesta = [
            "data" => $data
        ];
    
        echo json_encode($repuesta);
    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }

