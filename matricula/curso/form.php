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
        $resultado = $connect->query("SELECT * FROM cursos WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }
    // Consulta de grupos
    $grupos = $connect->query("SELECT * FROM grupos")->fetchAll(PDO::FETCH_ASSOC);

    // Consulta de profesores
    $docentes = $connect->query("SELECT * FROM docentes")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="box">
                <div class="box-header">
                    Nuevo curso
                </div>
                <div class="box-body">
                    <form action="<?php echo PUBLIC_PATH ?>/curso/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['nombre']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_grupo">Grupo</label>
                                <select class="custom-select" id="id_grupo" name="id_grupo">
                                    <?php foreach($grupos as $grupo): ?> 
                                        <?php if ($grupo['id'] == $data['id_grupo']): ?>
                                            <option value="<?= $grupo['id']?>" selected><?= $grupo['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $grupo['id']?>"><?= $grupo['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_docente">Docente</label>
                                <select class="custom-select" id="id_docente" name="id_docente">
                                    <?php foreach($docentes as $docente): ?> 
                                        <?php if ($docente['id'] == $data['id_docente']): ?>
                                            <option value="<?= $docente['id']?>" selected><?= $docente['nombres']?></option>
                                        <?php else: ?>
                                            <option value="<?= $docente['id']?>"><?= $docente['nombres']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
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