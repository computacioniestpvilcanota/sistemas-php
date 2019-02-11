<?php 
    require_once __DIR__ . "/../usuario/verifica.php";
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
        $data = $connect->query("SELECT * FROM reservaciones WHERE id = $id")->fetch_assoc();

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }

    // Realizando la consulta SQL
    $clientes = $connect->query("SELECT * FROM clientes");
    // Realizando la consulta SQL
    $peliculas = $connect->query("SELECT * FROM peliculas");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/reservacion/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo reservacion
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/reservacion/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_pelicula">Pelicula</label>
                                <select class="form-control" id="id_pelicula" name="id_pelicula">
                                    <?php while ($pelicula = $peliculas->fetch_assoc()):?> 
                                        <?php if ($pelicula['id'] == $data['id_pelicula']): ?>
                                            <option value="<?= $pelicula['id']?>" selected><?= $pelicula['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $pelicula['id']?>"><?= $pelicula['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endwhile; ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_cliente">Cliente</label>
                                <select class="form-control" id="id_cliente" name="id_cliente">
                                    <?php while ($cliente = $clientes->fetch_assoc()):?> 
                                        <?php if ($cliente['id'] == $data['id_cliente']): ?>
                                            <option value="<?= $cliente['id']?>" selected><?= $cliente['nombres']?></option>
                                        <?php else: ?>
                                            <option value="<?= $cliente['id']?>"><?= $cliente['nombres']?></option>
                                        <?php endif ?>
                                    <?php  endwhile; ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precio">precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" value="<?= $data['precio']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="abservacion">Observacion</label>
                            <input type="text" class="form-control" id="abservacion" name="abservacion" value="<?= $data['abservacion']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_reserva">fecha_reserva</label>
                            <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" value="<?= $data['fecha_reserva']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="hora_reserva">hora_reserva</label>
                            <input type="number" class="form-control" id="hora_reserva" name="hora_reserva" value="<?= $data['hora_reserva']?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>   
        <?php require_once "./../partes/footer.php" ?>
    </body>
</html>