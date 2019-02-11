<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");

    require_once "./../database/connect.php";

    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    // guardar datos

    $correlativo = 1;

    $result = $data->respuestas;
    
    $id_profesor = 0;
    foreach ($data->respuestas as $item) {
        if($correlativo % 2 == 0){
            $statementprofesor =  $connect->prepare("INSERT INTO respuestas(id_pregunta,respuesta,id_alumno,id_profesor) 
            VALUES(:id_pregunta,:respuesta,:id_alumno,:id_profesor)");
    
            // // Ejecutando la consulta
            $statementprofesor->execute([
                ':id_pregunta'       => $data->id_pregunta,
                ':respuesta'       => $item->value,
                ':id_alumno'       => $data->id_alumno,
                ':id_profesor'       => $id_profesor,
            ]);
        }else{
            $id_profesor =  intval($item->value);
        }
        $correlativo++;
    }

    // set response code - 201 created
    http_response_code(201);
 
    // tell the user
    echo json_encode(array("message" => "Se guardo correctamente"));


