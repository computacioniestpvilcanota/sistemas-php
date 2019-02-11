<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    // Datos
    $data;

    // Modo del formulario
    $modo = 'guardar';
    
    // Validacion
    if(isset($_GET['id'])){

        // Obteniedno el id
        $id = $_GET['id'];

        // Realizando la consulta SQL
        $resultado = $connect->query("SELECT * FROM preguntas WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }

    // Consulta de profesores
    $profesores = $connect->query("SELECT * FROM profesores")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/pregunta/main.js"></script>
    </head>
    <body>
        <?php require_once __DIR__ . "/../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo pregunta
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/pregunta/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-group col-md-6">
                            <label for="nombre">Pregunta</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['nombre']?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>   
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>