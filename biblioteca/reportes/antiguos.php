<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    if(isset($_POST['anio'])){
        $anioActual = date('Y');
        $antiguedad = intval($anioActual) - intval($_POST['anio']);

        $libros = $connect->query("SELECT libros.id, libros.nombre, libros.descripcion, libros.portada, libros.edicion, libros.cantidad, generos.nombre as genero, editoriales.nombre as editorial, autores.nombre as autor FROM libros
        INNER JOIN generos ON generos.id = libros.id_genero
        INNER JOIN editoriales ON editoriales.id = libros.id_editorial
        INNER JOIN autores ON autores.id = libros.id_autor
        WHERE libros.edicion < '$antiguedad'")->fetchAll(PDO::FETCH_ASSOC);

    }else{
        $libros = $connect->query("SELECT libros.id, libros.nombre, libros.descripcion, libros.portada, libros.edicion, libros.cantidad, generos.nombre as genero, editoriales.nombre as editorial, autores.nombre as autor FROM libros
        INNER JOIN generos ON generos.id = libros.id_genero
        INNER JOIN editoriales ON editoriales.id = libros.id_editorial
        INNER JOIN autores ON autores.id = libros.id_autor")->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $anios = [5,10,15,20,25,30];
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
                        Libros por años de antiguedad
                    </h1>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="mb-4">
                        <div class="form-group">
                            <label for="anio">Año</label>
                            <select class="custom-select" id="anio" name="anio">
                                <?php foreach($anios as $anio): ?> 
                                    <?php if ($anio== $_POST['anio']): ?>
                                        <option value="<?= $anio?>" selected><?= $anio?></option>
                                    <?php else: ?>
                                        <option value="<?= $anio?>"><?= $anio?></option>
                                    <?php endif ?>
                                <?php  endforeach ?> 
                            </select>
                        </div>
                        <input type="submit" value="FILTRAR" class="btn btn-success">
                    </form>
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>portada</th>
                                <th>cantidad</th>
                                <th>genero</th>
                                <th>editorial</th>
                                <th>autor</th>
                                <th>edicion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($libros as $libro):?>
                                <tr>
                                    <td><?php echo $libro['nombre']?></td>
                                    <td><?php echo $libro['descripcion']?></td>
                                    <td><?php echo $libro['portada']?></td>
                                    <td><?php echo $libro['cantidad']?></td>
                                    <td><?php echo $libro['genero']?></td>
                                    <td><?php echo $libro['editorial']?></td>
                                    <td><?php echo $libro['autor']?></td>
                                    <td><?php echo $libro['edicion']?></td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>portada</th>
                                <th>cantidad</th>
                                <th>genero</th>
                                <th>editorial</th>
                                <th>autor</th>
                                <th>edicion</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once "./../partes/footer.php" ?>
    </body>
</html>