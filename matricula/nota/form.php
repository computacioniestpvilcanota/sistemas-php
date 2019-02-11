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
        $resultado = $connect->query("SELECT * FROM notas WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }
    // Consulta de grupos
    $cursos = $connect->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_ASSOC);

    // Consulta de profesores
    $alumnos = $connect->query("SELECT * FROM alumnos WHERE id IN (SELECT id_alumno FROM matriculas)")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/nota/main.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="box">
                <div class="box-header">
                    Nuevo nota
                </div>
                <div class="box-body">
                    <form action="<?php echo PUBLIC_PATH ?>/nota/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="id_curso">Curso</label>
                                <select class="custom-select" id="id_curso" name="id_curso">
                                    <?php foreach($cursos as $curso): ?> 
                                        <?php if ($curso['id'] == $data['id_curso']): ?>
                                            <option value="<?= $curso['id']?>" selected><?= $curso['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $curso['id']?>"><?= $curso['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_alumno">Alumno</label>
                                <select class="custom-select" id="id_alumno" name="id_alumno">
                                    <?php foreach($alumnos as $alumno): ?> 
                                        <?php if ($alumno['id'] == $data['id_alumno']): ?>
                                            <option value="<?= $alumno['id']?>" selected><?= $alumno['nombres']?></option>
                                        <?php else: ?>
                                            <option value="<?= $alumno['id']?>"><?= $alumno['nombres']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nota1">nota1</label>
                                <input type="number" class="form-control" id="nota1" name="nota1" value="<?= $data['nota1']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nota2">nota2</label>
                                <input type="number" class="form-control" id="nota2" name="nota2" value="<?= $data['nota2']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nota3">nota3</label>
                                <input type="number" class="form-control" id="nota3" name="nota3" value="<?= $data['nota3']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="notafinal">Nota final</label>
                                <input type="number" class="form-control" id="notafinal" name="notafinal" value="<?= $data['notafinal']?>" required>
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