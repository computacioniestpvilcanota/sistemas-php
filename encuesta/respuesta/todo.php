<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT respuestas.id, preguntas.nombre as pregunta, respuestas.respuesta, alumnos.nombres as alumno, profesores.nombres as profesor FROM respuestas
        INNER JOIN preguntas ON preguntas.id = respuestas.id_pregunta
        INNER JOIN profesores on profesores.id = respuestas.id_profesor
        INNER JOIN alumnos on alumnos.id = respuestas.id_alumno')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            $sub_array['acciones'] = "
                <a href='".PUBLIC_PATH."/respuesta/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='fas fa-trash'></i></button></a>
                <a href='".PUBLIC_PATH."/respuesta/form.php/?id=" .  $row['id'] . "'><button class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></button></a>
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

