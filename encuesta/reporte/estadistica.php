<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";


    if(isset($_POST['id_pregunta'])){
        $id_pregunta = $_POST['id_pregunta'];
        $estadisticas = $connect->query("SELECT SUM( case respuesta WHEN 'SI' THEN 1
        WHEN 'NO' THEN 0 END) as cantidadSI, SUM( case respuesta WHEN 'NO' THEN 1
        WHEN 'SI' THEN 0 END) as cantidadNO, profesores.id, profesores.nombres , respuestas.id_pregunta 
        FROM respuestas
        INNER JOIN profesores ON profesores.id = respuestas.id_profesor
        GROUP BY respuestas.id_pregunta, respuestas.id_profesor,  profesores.nombres
            HAVING respuestas.id_pregunta = $id_pregunta")->fetchAll(PDO::FETCH_ASSOC);

    }else{

        $estadisticas = $connect->query('SELECT SUM( case respuesta WHEN "SI" THEN 1
        WHEN "NO" THEN 0 END) as cantidadSI, SUM( case respuesta WHEN "NO" THEN 1
        WHEN "SI" THEN 0 END) as cantidadNO, profesores.id, profesores.nombres , respuestas.id_pregunta 
        FROM respuestas
        INNER JOIN profesores ON profesores.id = respuestas.id_profesor
        GROUP BY respuestas.id_pregunta, respuestas.id_profesor,  profesores.nombres')->fetchAll(PDO::FETCH_ASSOC);
    };


    $preguntas = $connect->query('SELECT * FROM preguntas')->fetchAll(PDO::FETCH_ASSOC);
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
                    <form action="" method="POST" class="mb-4">
                        <div class="form-group">
                            <label for="id_pregunta">Pregunta</label>
                            <select class="custom-select" id="id_pregunta" name="id_pregunta">
                                <?php foreach($preguntas as $pregunta): ?> 
                                    <?php if ($pregunta['id'] == $_POST['id_pregunta']): ?>
                                        <option value="<?= $pregunta['id']?>" selected><?= $pregunta['nombre']?></option>
                                    <?php else: ?>
                                        <option value="<?= $pregunta['id']?>"><?= $pregunta['nombre']?></option>
                                    <?php endif ?>
                                <?php  endforeach ?> 
                            </select>
                        </div>
                        <input type="submit" value="FILTRAR" class="btn btn-success">
                    </form>
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>ID PREGUNTA</th>
                                <th>Profesor</th>
                                <th>SI</th>
                                <th>NO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($estadisticas as $estadistica):?>
                                <tr>
                                    <td><?= $estadistica['id_pregunta'] ?></td>
                                    <td><?= $estadistica['nombres'] ?></td>
                                    <td><?= $estadistica['cantidadSI'] ?></td>
                                    <td><?= $estadistica['cantidadNO'] ?></td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID PREGUNTA</th>
                                <th>Profesor</th>
                                <th>SI</th>
                                <th>NO</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?> 
    </body>
</html>