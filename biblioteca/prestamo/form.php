<?php 
    require_once __DIR__ . "/../usuario/auth.php";
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
        $resultado = $connect->query("SELECT * FROM prestamos WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }
    // Conculata de clientes
    $clientes = $connect->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
    // Conculata de libros
    $libros = $connect->query("SELECT * FROM libros")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/prestamo/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo prestamo
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/prestamo/<?= $modo ?>.php" method="post"  enctype="multipart/form-data">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-group">
                            <label for="id_libro">Libro</label>
                            <select class="custom-select" id="id_libro" name="id_libro">
                                <?php foreach($libros as $libro): ?> 
                                    <?php if ($libro['id'] == $data['id_libro']): ?>
                                        <option value="<?= $libro['id']?>" selected><?= $libro['nombre']?></option>
                                    <?php else: ?>
                                        <option value="<?= $libro['id']?>"><?= $libro['nombre']?></option>
                                    <?php endif ?>
                                <?php  endforeach ?> 
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="id_cliente">Cliente</label>
                                <select class="custom-select" id="id_cliente" name="id_cliente">
                                    <?php foreach($clientes as $cliente): ?> 
                                        <?php if ($cliente['id'] == $data['id_cliente']): ?>
                                            <option value="<?= $cliente['id']?>" selected><?= $cliente['nombres']?></option>
                                        <?php else: ?>
                                            <option value="<?= $cliente['id']?>"><?= $cliente['nombres']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="abservacion">Observacion</label>
                                <input type="text" class="form-control" id="abservacion" name="abservacion" value="<?= $data['abservacion']?>" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>  
    </body>
</html>