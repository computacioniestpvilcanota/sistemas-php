<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT compras.id, compras.cantidad, compras.precio, compras.fecha_compra, productos.nombre as producto, empleados.nombres as empleado, proveedores.rason_social as proveedor FROM compras
        INNER JOIN productos ON productos.id = compras.id_producto
        INNER JOIN empleados ON empleados.id = compras.id_empleado
        INNER JOIN proveedores ON proveedores.id = compras.id_proveedor')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            // $sub_array['acciones'] = "
            //     <a href='".PUBLIC_PATH."/compra/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='fas fa-trash'></i></button></a>

            // ";
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

