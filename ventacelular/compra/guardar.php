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

        // Insertando el compra en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO compras(id_producto,cantidad,precio,fecha_compra,id_empleado,id_proveedor) 
            VALUES(:id_producto,:cantidad,:precio,:fecha_compra,:id_empleado,:id_proveedor)");

        // Ejecutando la consulta
        $statement->execute([
            ':id_producto'       => $_POST['id_producto'],
            ':cantidad'       => $_POST['cantidad'],
            ':precio'       => $_POST['precio'],
            ':fecha_compra'       => date("d/m/Y"),
            ':id_empleado'       => $empleado['id'],
            ':id_proveedor'       => $_POST['id_proveedor']
        ]);

        // // Consulta de productos
        $producto;
        $id_producto = $_POST['id_producto'];
        $resultado = $connect->query("SELECT * FROM productos WHERE id = $id_producto")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $row) {
            $producto = $row;
        }

        // Actualizar el stock del producto
        $statementProducto =  $connect->prepare("UPDATE productos SET stock=:stock, precio=:precio WHERE id =:id ");

        // Ejecutando la consulta
        $nuevoStock = intval($_POST['cantidad']) + intval($producto['stock'] ?? 0);

        $statementProducto->execute([
            ':stock'       => $nuevoStock,
            ':precio'       => $_POST['precio'],
            ':id'       => $_POST['id_producto']
        ]);

        // Redirecionando al listado de compras
        header('location:' . PUBLIC_PATH . '/compra');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
