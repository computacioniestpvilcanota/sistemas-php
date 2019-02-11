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

        // Insertando el produccion en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO producciones(id_producto,fecha,cantidad,id_empleado) 
            VALUES(:id_producto,:fecha,:cantidad,:id_empleado)");

        // Ejecutando la consulta
        $statement->execute([
            ':id_producto'       => $_POST['id_producto'],
            ':fecha'       => date("d/m/Y"),
            ':cantidad'       => $_POST['cantidad'],
            ':id_empleado'       => $empleado['id']
        ]);

        // // Consulta de productos
        $producto;
        $id_producto = $_POST['id_producto'];
        $resultado = $connect->query("SELECT * FROM productos WHERE id = $id_producto")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $row) {
            $producto = $row;
        }

        // Actualizar el stock del producto
        $statementProducto =  $connect->prepare("UPDATE productos SET stock=:stock WHERE id =:id ");

        // Ejecutando la consulta
        $nuevoStock = intval($producto['stock'] ?? 0) + intval($_POST['cantidad']);

        $statementProducto->execute([
            ':stock'       => $nuevoStock,
            ':id'       => $_POST['id_producto']
        ]);

        // Redirecionando al listado de producciones
        header('location:' . PUBLIC_PATH . '/produccion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
