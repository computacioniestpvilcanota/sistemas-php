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
        $resultado = $connect->query("SELECT * FROM preparacion WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }

    // Consulta de menus
    $menus = $connect->query("SELECT * FROM menus")->fetchAll(PDO::FETCH_ASSOC);

    // Consulta de insumos
    $insumos = $connect->query("SELECT * FROM insumos")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/preparacion/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo preparacion
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/preparacion/<?= $modo ?>.php" method="post">
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
                                <label for="id_menu">Menu</label>
                                <select class="custom-select" id="id_menu" name="id_menu">
                                    <?php foreach($menus as $producto): ?> 
                                        <?php if ($producto['id'] == $data['id_menu']): ?>
                                            <option value="<?= $producto['id']?>" selected><?= $producto['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $producto['id']?>"><?= $producto['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cantidad">cantidad</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?= $data['cantidad']?>"  onblur="calcularTotal()" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="insumo_1">insumo_1</label>
                                <select class="custom-select" id="insumo_1" name="insumo_1">
                                    <?php foreach($insumos as $insumo): ?> 
                                        <?php if ($insumo['nombre'] == $data['insumo_1']): ?>
                                            <option value="<?= $insumo['nombre']?>" selected><?= $insumo['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $insumo['nombre']?>"><?= $insumo['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cantidad_1">cantidad_1</label>
                                <input type="number" class="form-control" id="cantidad_1" name="cantidad_1" value="<?= $data['cantidad_1']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="insumo_2">insumo_2</label>
                                <select class="custom-select" id="insumo_2" name="insumo_2">
                                    <?php foreach($insumos as $insumo): ?> 
                                        <?php if ($insumo['nombre'] == $data['insumo_2']): ?>
                                            <option value="<?= $insumo['nombre']?>" selected><?= $insumo['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $insumo['nombre']?>"><?= $insumo['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cantidad_2">cantidad_1</label>
                                <input type="number" class="form-control" id="cantidad_2" name="cantidad_2" value="<?= $data['cantidad_2']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="insumo_3">insumo_3</label>
                                <select class="custom-select" id="insumo_3" name="insumo_3">
                                    <?php foreach($insumos as $insumo): ?> 
                                        <?php if ($insumo['nombre'] == $data['insumo_3']): ?>
                                            <option value="<?= $insumo['nombre']?>" selected><?= $insumo['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $insumo['nombre']?>"><?= $insumo['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cantidad_3">cantidad_3</label>
                                <input type="number" class="form-control" id="cantidad_3" name="cantidad_3" value="<?= $data['cantidad_3']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="insumo_4">insumo_4</label>
                                <select class="custom-select" id="insumo_4" name="insumo_4">
                                    <?php foreach($insumos as $insumo): ?> 
                                        <?php if ($insumo['nombre'] == $data['insumo_4']): ?>
                                            <option value="<?= $insumo['nombre']?>" selected><?= $insumo['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $insumo['nombre']?>"><?= $insumo['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cantidad_4">cantidad_4</label>
                                <input type="number" class="form-control" id="cantidad_4" name="cantidad_4" value="<?= $data['cantidad_4']?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Vender' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>   
        <script>
            const calcularTotal = ()=>{
                let cantidadELE = document.getElementById('cantidad');
                let precioELE = document.getElementById('precio');
                let totalELE = document.getElementById('total');
                
                
                let cantidad = cantidadELE.value;
                let precio = precioELE.value;

                let total = parseInt(cantidad) * parseFloat(precio);

                totalELE.value = isNaN(total) ? '' : total;
            }
        </script>
    </body>
</html>