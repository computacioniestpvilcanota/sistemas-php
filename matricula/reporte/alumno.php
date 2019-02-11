<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    if(isset($_POST['id_grupo'])){
        $id_grupo = $_POST['id_grupo'];
        $alumnos = $connect->query("SELECT alumnos.id, alumnos.nombres, alumnos.apellidos, alumnos.dni, alumnos.direccion, alumnos.ciudad, alumnos.sexo, alumnos.celular FROM matriculas
        INNER JOIN alumnos ON alumnos.id = matriculas.id_alumno
        WHERE matriculas.id_grupo = $id_grupo")->fetchAll(PDO::FETCH_ASSOC);

    }else{
        $alumnos = $connect->query('SELECT alumnos.id, alumnos.nombres, alumnos.apellidos, alumnos.dni, alumnos.direccion, alumnos.ciudad, alumnos.sexo, alumnos.celular FROM matriculas
        INNER JOIN alumnos ON alumnos.id = matriculas.id_alumno')->fetchAll(PDO::FETCH_ASSOC);
    };


    $grupos = $connect->query('SELECT * FROM grupos')->fetchAll(PDO::FETCH_ASSOC);
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
                        Alumnos por grupo
                    </h1>
                </div>
                <div class="box-body">
                    <form action="" method="POST" class="mb-4">
                        <div class="form-group">
                            <label for="id_grupo">Grupo</label>
                            <select class="custom-select" id="id_grupo" name="id_grupo">
                                <?php foreach($grupos as $grupo): ?> 
                                    <?php if ($grupo['id'] == $_POST['id_grupo']): ?>
                                        <option value="<?= $grupo['id']?>" selected><?= $grupo['nombre']?></option>
                                    <?php else: ?>
                                        <option value="<?= $grupo['id']?>"><?= $grupo['nombre']?></option>
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
                                <th>nombres</th>
                                <th>apellidos</th>
                                <th>dni</th>
                                <th>direccion</th>
                                <th>ciudad</th>
                                <th>sexo</th>
                                <th>celular</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($alumnos as $alumno):?>
                                <tr>
                                    <td><?= $alumno['nombres'] ?></td>
                                    <td><?= $alumno['apellidos'] ?></td>
                                    <td><?= $alumno['dni'] ?></td>
                                    <td><?= $alumno['direccion'] ?></td>
                                    <td><?= $alumno['ciudad'] ?></td>
                                    <td><?= $alumno['sexo'] ?></td>
                                    <td><?= $alumno['celular'] ?></td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>nombres</th>
                                <th>apellidos</th>
                                <th>dni</th>
                                <th>direccion</th>
                                <th>ciudad</th>
                                <th>sexo</th>
                                <th>celular</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?> 
    </body>
</html>