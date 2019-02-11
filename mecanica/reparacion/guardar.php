<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el reparacion en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("INSERT INTO reparaciones(falla,cobro,id_repuesto,cantidad,precio,fecha,id_tecnico,id_cliente) 
            VALUES(:falla,:cobro,:id_repuesto,:cantidad,:precio,:fecha,:id_tecnico,:id_cliente)");

        // Ejecutando la consulta
        $statement->execute([
            ':falla'       => $_POST['falla'],
            ':cobro'       => $_POST['cobro'],
            ':id_repuesto'       => $_POST['id_repuesto'],
            ':cantidad'       => $_POST['cantidad'],
            ':precio'       => $_POST['precio'],
            ':fecha'       => date("d/m/Y"),
            ':id_tecnico'       => $_POST['id_tecnico'],
            ':id_cliente'       => $_POST['id_cliente']
        ]);

        // // Consulta de repuestos
        $repuesto;
        $id_repuesto = $_POST['id_repuesto'];
        $resultado = $connect->query("SELECT * FROM repuestos WHERE id = $id_repuesto")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $row) {
            $repuesto = $row;
        }

        // Actualizar el stock del repuesto
        $statementrepuesto =  $connect->prepare("UPDATE repuestos SET stock=:stock WHERE id =:id ");

        // Ejecutando la consulta
        $nuevoStock = intval($repuesto['stock'] ?? 0) - intval($_POST['cantidad']);

        $statementrepuesto->execute([
            ':stock'       => $nuevoStock,
            ':id'       => $_POST['id_repuesto']
        ]);

        // Redirecionando al listado de reparaciones
        header('location:' . PUBLIC_PATH . '/reparacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
