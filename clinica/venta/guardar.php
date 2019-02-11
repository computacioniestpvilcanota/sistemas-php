<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Recuperando el usuario de la session
        $idUsuario = $_SESSION['usuario']['id'];

        // Recuperando el empleado actual logueado
        $getEmpleados = $connect->query("SELECT * FROM empleados WHERE id_usuario = $idUsuario")->fetchAll(PDO::FETCH_ASSOC);

        $empleado;
        foreach ($getEmpleados as $row) {
            $empleado = $row;
        }

        // Insertando el venta en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO ventas(id_medicina,cantidad,precio,fecha_venta,id_empleado,id_cliente) 
            VALUES(:id_medicina,:cantidad,:precio,:fecha_venta,:id_empleado,:id_cliente)");

        // Ejecutando la consulta
        $statement->execute([
            ':id_medicina'       => $_POST['id_medicina'],
            ':cantidad'       => $_POST['cantidad'],
            ':precio'       => $_POST['precio'],
            ':fecha_venta'       => date('Y-m-d'),
            ':id_empleado'       => $empleado['id'],
            ':id_cliente'       => $_POST['id_cliente']
        ]);

        // // Consulta de medicinas
        $medicina;
        $id_medicina = $_POST['id_medicina'];
        $resultado = $connect->query("SELECT * FROM medicinas WHERE id = $id_medicina")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $row) {
            $medicina = $row;
        }

        // Actualizar el stock del medicina
        $statementmedicina =  $connect->prepare("UPDATE medicinas SET stock=:stock WHERE id =:id ");

        // Ejecutando la consulta
        $nuevoStock = intval($medicina['stock']) - intval($_POST['cantidad']);

        $statementmedicina->execute([
            ':stock'       => $nuevoStock,
            ':id'       => $_POST['id_medicina']
        ]);

        // Redirecionando al listado de ventas
        header('location:' . PUBLIC_PATH . '/venta');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
