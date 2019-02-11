<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";


    $profesores = $connect->query('SELECT * FROM profesores WHERE id NOT IN (SELECT id_profesor FROM respuestas)')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Profesores no evaluados
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Foto</th>
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
                            <?php  foreach ($profesores as $profesor):?>
                                <tr>
                                    <td>
                                        <img src="<?= PUBLIC_PATH ?>/<?= $profesor['foto'] ?>" alt="foto" width="50px">
                                    </td>
                                    <td><?= $profesor['nombres'] ?></td>
                                    <td><?= $profesor['apellidos'] ?></td>
                                    <td><?= $profesor['dni'] ?></td>
                                    <td><?= $profesor['direccion'] ?></td>
                                    <td><?= $profesor['ciudad'] ?></td>
                                    <td><?= $profesor['sexo'] ?></td>
                                    <td><?= $profesor['celular'] ?></td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Foto</th>
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
    </body>
</html>