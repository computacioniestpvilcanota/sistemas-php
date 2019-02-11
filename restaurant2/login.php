<?php 
    require_once __DIR__ . "/config.php";
    require_once __DIR__ . "/database/connect.php";
    
    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        // usuario
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        // Clave
        $clave = sha1($clave);

        // Crear un usuario por primera vez
        $result = $connect->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) === 0){


            $statementUsuario =  $connect->prepare("INSERT INTO usuarios(usuario,email,clave,foto) 
            VALUES(:usuario,:email,:clave,:foto)");
    
            // Ejecutando la consulta
            $statementUsuario->execute([
                ':usuario'       => 'admin',
                ':email'       => '',
                ':clave'       => sha1('admin'),
                ':foto'       => '',
            ]);
        }
    
        // Realizando la consulta SQL
        $sql = "SELECT * FROM usuarios WHERE clave = '$clave' AND usuario = '$usuario'";
        $resultado = $connect->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        // FOR - EACH
        $usuarioActual;
        foreach ($resultado as $row) {
            $usuarioActual = $row;
        }

        // INICIANDO SESSION EN LA APP
        if($usuarioActual){
            $_SESSION['usuario'] = $usuarioActual;
            header('location:' . PUBLIC_PATH);
        }else{
            echo "<script>alert('Usuario o Contraseña Invalida')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/partes/head.php" ?>
        <style>
            body{
                background: url("<?= PUBLIC_PATH ?>/assets/static/tiendita.jpg");
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        </style>
    </head>
    <body>
        <div class="card" style="width: 350px">
            <div class="card-body">
                <h1 style="text-align: center">Login</h1>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <div class="form-group">
                        <label for="clave">Contraseña</label>
                        <input type="password" class="form-control" id="clave" name="clave">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%">Iniciar Session</button>
                </form>
            </div>
        </div>
    </body>
</html>