<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    $libros = $connect->query("SELECT COUNT(*) AS cantidad, libros.nombre, libros.descripcion, libros.portada, autores.nombre as autor FROM prestamos 
	INNER JOIN libros ON libros.id = prestamos.id_libro
    INNER JOIN autores ON autores.id = libros.id_autor
    GROUP BY prestamos.id_libro, libros.nombre, libros.descripcion, libros.portada")->fetchAll(PDO::FETCH_ASSOC);
    
    $anios = [5,10,15,30,20,50,100,200];
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
                        Libros mas usados
                    </h1>
                </div>
                <div class="card-body">
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>cantidad</th>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>portada</th>
                                <th>autor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($libros as $libro):?>
                                <tr>
                                    <td><?php echo $libro['cantidad']?></td>
                                    <td><?php echo $libro['nombre']?></td>
                                    <td><?php echo $libro['descripcion']?></td>
                                    <td><?php echo $libro['portada']?></td>
                                    <td><?php echo $libro['autor']?></td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>cantidad</th>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>portada</th>
                                <th>autor</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once "./../partes/footer.php" ?>
    </body>
</html>