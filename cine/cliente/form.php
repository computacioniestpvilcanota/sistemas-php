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
        $data = $connect->query("SELECT * FROM clientes WHERE id = $id")->fetch_assoc();

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/cliente/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo Cliente
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/cliente/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $data['nombres']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $data['apellidos']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="edad">edad</label>
                                <input type="number" class="form-control" id="edad" name="edad" value="<?= $data['edad']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" value="<?= $data['dni']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sexo">Sexo</label>
                                <select class="custom-select" id="sexo" name="sexo">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $data['direccion']?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?= $data['ciudad']?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $data['telefono']?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" value="<?= $data['celular']?>">
                            </div>
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