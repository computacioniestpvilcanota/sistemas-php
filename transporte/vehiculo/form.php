<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once __DIR__ . "/../database/connect.php";

    // Datos
    $data;

    // Modo del formulario
    $modo = 'guardar';
    
    // Validacion
    if(isset($_GET['id'])){

        // Obteniedno el id
        $id = $_GET['id'];

        // Realizando la consulta SQL
        $resultado = $connect->query("SELECT * FROM vehiculos WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }


    // Consulta de tipos
    $tipos = $connect->query("SELECT * FROM tipos")->fetchAll(PDO::FETCH_ASSOC);

    // Consulta de vehiculos
    $propietarios = $connect->query("SELECT * FROM propietarios")->fetchAll(PDO::FETCH_ASSOC);
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
                    Nuevo vehiculo
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/vehiculo/<?= $modo ?>.php" method="post" enctype="multipart/form-data">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-group">
                            <label for="placa">placa</label>
                            <input type="text" class="form-control" id="placa" name="placa" value="<?= $data['placa']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= $data['descripcion']?></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="numero_asientos">numero_asientos</label>
                                <input type="text" class="form-control" id="numero_asientos" name="numero_asientos" value="<?= $data['numero_asientos']?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_tipo">Tipo</label>
                                <select class="custom-select" id="id_tipo" name="id_tipo">
                                    <?php foreach($tipos as $tipo): ?> 
                                        <?php if ($tipo['id'] == $data['id_tipo']): ?>
                                            <option value="<?= $tipo['id']?>" selected><?= $tipo['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $tipo['id']?>"><?= $tipo['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_propietario">Propietario</label>
                                <select class="custom-select" id="id_propietario" name="id_propietario">
                                    <?php foreach($propietarios as $propietario): ?> 
                                        <?php if ($propietario['id'] == $data['id_propietario']): ?>
                                            <option value="<?= $propietario['id']?>" selected><?= $propietario['nombres']?></option>
                                        <?php else: ?>
                                            <option value="<?= $propietario['id']?>"><?= $propietario['nombres']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <div class="mb-3">
                            <?php if (!$data['foto'] == ''): ?>
                                <img src="<?= PUBLIC_PATH ?>/<?= $data['foto']?>" alt="<?= $data['placa']?>" width="400">
                            <?php endif ?>
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