<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";


    $alumnos = $connect->query('SELECT * FROM alumnos WHERE id IN (SELECT id_alumno FROM respuestas)')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
    </head>
    <body>
        <?php require_once __DIR__ . "/../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Estudiantes que realizaron la encuesta obotacoion
                    </h1>
                </div>
                <div class="card-body">
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