<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {

        $nombre_foto = $_FILES['foto']['name'];
        $path_dir = "assets/static/uploads/";

        // Insertando el havitacion en la base de datos
        // Preparando la consulta
        $statementhavitacion =  $connect->prepare("INSERT INTO havitaciones(numero,en_uso,descripcion,foto,precio,nivel,id_categoria) 
            VALUES(:numero,:en_uso,:descripcion,:foto,:precio,:nivel,:id_categoria)");

        // Ejecutando la consulta
        $statementhavitacion->execute([
            ':numero'       => $_POST['numero'],
            ':en_uso'       => $_POST['en_uso'],
            ':descripcion'       => $_POST['descripcion'],
            ':foto'       => $path_dir . $nombre_foto ?? "",
            ':precio'       => $_POST['precio'] ?? "",
            ':nivel'       => $_POST['nivel'] ?? "",
            ':id_categoria'       => $_POST['id_categoria'] ?? ""
        ]);


        if(!$_FILES['foto']['tmp_name'] == ''){
            if(!copy(
                $_FILES['foto']['tmp_name'],
                 __DIR__ . "/../$path_dir" . $nombre_foto)){
                    throw new Exception("Error al subir el archivo", 1);
            }
        }

        // Redirecionando al listado de havitaciones
        header('location:' . PUBLIC_PATH . '/havitacion');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
