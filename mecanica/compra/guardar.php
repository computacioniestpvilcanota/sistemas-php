<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Recuperando el usuario de la session
        $idUsuario = $_SESSION['usuario']['id'];

        // Recuperando el tecnico actual logueado
        $gettecnicos = $connect->query("SELECT * FROM tecnicos WHERE id_usuario = $idUsuario")->fetchAll(PDO::FETCH_ASSOC);

        $tecnico;
        foreach ($gettecnicos as $row) {
            $tecnico = $row;
        }

        // Insertando el compra en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO compras(id_repuesto,cantidad,precio,fecha_compra,id_tecnico,id_proveedor) 
            VALUES(:id_repuesto,:cantidad,:precio,:fecha_compra,:id_tecnico,:id_proveedor)");

        // Ejecutando la consulta
        $statement->execute([
            ':id_repuesto'       => $_POST['id_repuesto'],
            ':cantidad'       => $_POST['cantidad'],
            ':precio'       => $_POST['precio'],
            ':fecha_compra'       => date("d/m/Y"),
            ':id_tecnico'       => $tecnico['id'],
            ':id_proveedor'       => $_POST['id_proveedor']
        ]);

        // // Consulta de tecnicos
        $repuesto;
        $id_repuesto = $_POST['id_repuesto'];
        $resultado = $connect->query("SELECT * FROM repuestos WHERE id = $id_repuesto")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $row) {
            $repuesto = $row;
        }

        // Actualizar el stock del repuesto
        $statementRepuesto =  $connect->prepare("UPDATE repuestos SET stock=:stock, precio=:precio WHERE id =:id ");

        // Ejecutando la consulta
        $nuevoStock = intval($_POST['cantidad']) + intval($repuesto['stock'] ?? 0);

        $statementRepuesto->execute([
            ':stock'       => $nuevoStock,
            ':precio'       => $_POST['precio'],
            ':id'       => $_POST['id_repuesto']
        ]);

        // Redirecionando al listado de compras
        header('location:' . PUBLIC_PATH . '/compra');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
