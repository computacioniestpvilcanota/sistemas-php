<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    if(isset($_POST['id_alumno'])){
        $id_alumno = $_POST['id_alumno'];
        $estadisticas = $connect->query("SELECT grupos.id, grupos.nombre, cursos.nombre as curso FROM grupos
        INNER JOIN matriculas on matriculas.id_grupo = grupos.id
        INNER JOIN cursos on cursos.id_grupo = grupos.id
        WHERE matriculas.id_alumno = $id_alumno")->fetchAll(PDO::FETCH_ASSOC);

    }else{
        $estadisticas = $connect->query('SELECT grupos.id, grupos.nombre, cursos.nombre as curso FROM grupos
        INNER JOIN matriculas on matriculas.id_grupo = grupos.id
        INNER JOIN cursos on cursos.id_grupo = grupos.id')->fetchAll(PDO::FETCH_ASSOC);
    };


    $alumnos = $connect->query('SELECT * FROM alumnos WHERE id IN (SELECT id_alumno FROM matriculas)')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php require_once __DIR__ . "/../partes/header.php" ?>
        <div class="main-container">
            <div class="box">
                <div class="box-header">
                    <h1>
                        Ficha de matricula
                    </h1>
                </div>
                <div class="box-body">
                    <form action="" method="POST" class="mb-4">
                        <div class="form-group">
                            <label for="id_alumno">Alumno</label>
                            <select class="custom-select" id="id_alumno" name="id_alumno">
                                <?php foreach($alumnos as $alumno): ?> 
                                    <?php if ($alumno['id'] == $_POST['id_alumno']): ?>
                                        <option value="<?= $alumno['id']?>" selected><?= $alumno['nombres']?></option>
                                    <?php else: ?>
                                        <option value="<?= $alumno['id']?>"><?= $alumno['nombres']?></option>
                                    <?php endif ?>
                                <?php  endforeach ?> 
                            </select>
                        </div>
                        <input type="submit" value="FILTRAR" class="btn btn-success">
                    </form>
                    <button class="btn btn-primary mb-4 mt-4" onClick="window.print()" >Imprimir</button>
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Curso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($estadisticas as $estadistica):?>
                                <tr>
                                    <td><?= $estadistica['nombre'] ?></td>
                                    <td><?= $estadistica['curso'] ?></td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Curso</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?> 
    </body>
</html>