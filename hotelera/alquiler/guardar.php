<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $idUsuario = $_SESSION['usuario']['id'];
        $getEmpleados = $connect->query("SELECT * FROM empleados WHERE id_usuario = $idUsuario")->fetchAll(PDO::FETCH_ASSOC);
        $empleado;
        foreach ($getEmpleados as $row) {
            $empleado = $row;
        }

        // Insertando el alquiler en la base de datos
        // Preparando la consulta
        $statementalquiler =  $connect->prepare("INSERT INTO alquileres(desde_fecha,hasta_fecha,observacion,id_cliente,id_havitacion,id_empleado) 
            VALUES(:desde_fecha,:hasta_fecha,:observacion,:id_cliente,:id_havitacion,:id_empleado)");

        // Ejecutando la consulta
        $statementalquiler->execute([
            ':desde_fecha'       => $_POST['desde_fecha'],
            ':hasta_fecha'       => $_POST['hasta_fecha'],
            ':observacion'       => $_POST['observacion'],
            ':id_cliente'       => $_POST['id_cliente'],
            ':id_havitacion'       => $_POST['id_havitacion'],
            ':id_empleado'       => $empleado['id'],
        ]);

        // Recuperando el ID del nuevo usuario insertado
        $alquiler_id = $connect->lastInsertId();

        if ($alquiler_id >=1 ) {
            // Insertando el havitacion en la base de datos
            // Preparando la consulta
            $statement =  $connect->prepare("UPDATE havitaciones SET en_uso =:en_uso WHERE id=:id");

            // Ejecutando la consulta
            $statement->execute([
                ':en_uso'       => '1',
                ':id'       => $_POST['id_havitacion'],
            ]);
        }

        // Redirecionando al listado de alquileres
        header('location:' . PUBLIC_PATH . '/havitacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
