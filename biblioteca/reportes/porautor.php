<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    if(isset($_POST['nacionalidad'])){
        $nacionalidad = $_POST['nacionalidad'];
        $libros = $connect->query("SELECT libros.id, libros.nombre, libros.descripcion, libros.portada, libros.cantidad, generos.nombre as genero, autores.nombre as autor, autores.nacionalidad as nacionalidad FROM libros
        INNER JOIN autores ON autores.id = libros.id_autor
        INNER JOIN generos ON generos.id = libros.id_genero
        WHERE autores.nacionalidad = '$nacionalidad'")->fetchAll(PDO::FETCH_ASSOC);

    }else{
        $libros = $connect->query("SELECT libros.id, libros.nombre, libros.descripcion, libros.portada, libros.cantidad, generos.nombre as genero, autores.nombre as autor, autores.nacionalidad as nacionalidad FROM libros
        INNER JOIN autores ON autores.id = libros.id_autor
        INNER JOIN generos ON generos.id = libros.id_genero")->fetchAll(PDO::FETCH_ASSOC);
    }
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
                        Libros por autor nacionalidad
                    </h1>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="mb-4">
                        <div class="form-group">
                            <label for="nacionalidad">Nacionalidad</label>
                            <input type="search" class="form-control" name="nacionalidad" id="nacionalidad">
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
                                <th>autor</th>
                                <th>nacionalidad</th>
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
                                    <td><?php echo $libro['autor']?></td>
                                    <td><?php echo $libro['nacionalidad']?></td>
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
                                <th>autor</th>
                                <th>nacionalidad</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once "./../partes/footer.php" ?>
    </body>
</html>