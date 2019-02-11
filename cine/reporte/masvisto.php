<?php 
    require_once __DIR__ . "/../usuario/verifica.php";

    require_once "./../database/connect.php";

    // Realizando la consulta SQL
    $peliculas = $connect->query("SELECT COUNT(reservaciones.id_pelicula) as cantidad, peliculas.nombre, peliculas.descripcion FROM reservaciones
	INNER JOIN peliculas On peliculas.id = reservaciones.id_pelicula
    GROUP BY reservaciones.id_pelicula
    ORDER BY cantidad DESC");
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
                    <h1 style="text-align:center"> Peliculas mas vistas </h1>
                </div>
                <div class="card-body">
                    <a onClick="window.print()"  class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i> Imprimir
                    </a>
                    <table id="example" class="table" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($pelicula = $peliculas->fetch_assoc()):?> 
                                <tr>
                                    <td><?php echo $pelicula['cantidad'] ?></td>
                                    <td><?php echo $pelicula['nombre'] ?></td>
                                    <td><?php echo $pelicula['descripcion '] ?></td>
                                </tr>
                            <?php  endwhile; ?> 
                        </tbody>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once "./../partes/footer.php" ?>
    </body>
</html>



