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

            // Recuperando el ID del nuevo usuario insertado
            $usuario_id = $connect->lastInsertId();


            // Insertando el empleado en la base de datos
            // Preparando la consulta
            $statementEmpleado =  $connect->prepare("INSERT INTO empleados(id_usuario,nombres,apellidos,dni,direccion,ciudad,sexo,telefono,celular) 
                VALUES(:id_usuario,:nombres,:apellidos,:dni,:direccion,:ciudad,:sexo,:telefono,:celular)");

            // Ejecutando la consulta
            $statementEmpleado->execute([
                ':id_usuario'       => $usuario_id,
                ':nombres'       => 'admin',
                ':apellidos'       => 'admin',
                ':dni'       => '',
                ':direccion'       => '',
                ':ciudad'       => '',
                ':sexo'       => '',
                ':telefono'       => '',
                ':celular'       => ''
            ]);

            $configs = $connect->query("SELECT * FROM configuracion")->fetchAll(PDO::FETCH_ASSOC);
            if(count($result) === 0){
                // Insertando el empleado en la base de datos
                // Preparando la consulta
                $statementEmpleado =  $connect->prepare("INSERT INTO configuracion(ruc,empresa) 
                    VALUES(:ruc,:empresa)");
    
                // Ejecutando la consulta
                $statementEmpleado->execute([
                    ':ruc'       => "99999999999",
                    ':empresa'       => 'ABC COMPANY',
                ]);
            }
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
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Sign In | Bootstrap Based Admin Template - Material Design</title>

        <link rel="icon" href="<?php echo PUBLIC_PATH ?>/assets/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/css/style.css" rel="stylesheet">
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Sistema<b>FARMACIA</b></a>
                <small>VIRGEN INMACULADA</small>
            </div>
            <div class="card">
                <div class="body">
                    <form id="sign_in" method="POST">
                        <div class="msg">INGRESE SU USUARIO Y CLAVE</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="usuario" placeholder="usuario" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="clave" placeholder="clave" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">EMPEZAR</button>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">
                                <a href="sign-up.html">Register Now!</a>
                            </div>
                            <div class="col-xs-6 align-right">
                                <a href="forgot-password.html">Forgot Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="<?php echo PUBLIC_PATH ?>/assets/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo PUBLIC_PATH ?>/assets/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo PUBLIC_PATH ?>/assets/plugins/node-waves/waves.js"></script>

        <!-- Validation Plugin Js -->
        <script src="<?php echo PUBLIC_PATH ?>/assets/plugins/jquery-validation/jquery.validate.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo PUBLIC_PATH ?>/assets/js/admin.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/assets/js/pages/examples/sign-in.js"></script>
    </body>
</html>