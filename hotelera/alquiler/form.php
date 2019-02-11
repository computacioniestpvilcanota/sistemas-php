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
        $resultado = $connect->query("SELECT * FROM alquileres WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }

    // Consulta de clientes
    $clientes = $connect->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/alquiler/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo alquiler
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/alquiler/<?= $modo ?>.php" method="post" enctype="multipart/form-data">
                        <div style="display:none">
                            <label for="id_havitacion">id_havitacion</label>
                            <input type="text" value="<?= $_GET['havitacion']?>" class="form-control" id="id_havitacion" name="id_havitacion">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="desde_fecha">Desde</label>
                                <input  class="form-control" type="date"  id="desde_fecha" name="desde_fecha" value="<?= $data['desde_fecha']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="hasta_fecha">Hasta</label>
                                <input class="form-control" type="date"  id="hasta_fecha" name="hasta_fecha" value="<?= $data['hasta_fecha']?>" required>
                            </div>
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
                        </div>
                        <div class="form-group">
                            <label for="observacion">observacion</label>
                            <textarea class="form-control"  id="observacion" name="observacion" cols="30" rows="5"><?= $data['observacion']?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>