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

        // Insertando el vehiculo en la base de datos
        // Preparando la consulta
        $statementvehiculo =  $connect->prepare("INSERT INTO ventas(asiento,origen,destino,monto,correlativo,id_cliente,id_empleado,id_vehiculo,fecha) 
            VALUES(:asiento,:origen,:destino,:monto,:correlativo,:id_cliente,:id_empleado,:id_vehiculo,:fecha)");

        // Ejecutando la consulta
        $statementvehiculo->execute([
            ':asiento'       => $_POST['asiento'],
            ':origen'       => $_POST['origen'],
            ':destino'       => $_POST['destino'],
            ':monto'       => $_POST['monto'],
            ':correlativo'       => $_POST['correlativo'],
            ':id_cliente'       => $_POST['id_cliente'],
            ':id_empleado'       => $empleado['id'],
            ':id_vehiculo'       => $_POST['id_vehiculo'],
            ':fecha'       => date('y-m-d')
        ]);

        // Redirecionando al listado de vehiculos
        header('location:' . PUBLIC_PATH . '/vehiculo/venta.php?vehiculo=' . $_POST['id_vehiculo']);
    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
