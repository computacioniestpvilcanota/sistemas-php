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
        $resultado = $connect->query("SELECT * FROM compras WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }

    // Consulta de medicinas
    $medicinas = $connect->query("SELECT * FROM medicinas")->fetchAll(PDO::FETCH_ASSOC);
    // Consulta de proveedores
    $proveedores = $connect->query("SELECT * FROM proveedores")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <!-- Bootstrap Select Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    </head>
    <body class="theme-cyan">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="header">
                    Nuevo compra
                </div>
                <div class="body">
                    <form action="<?php echo PUBLIC_PATH ?>/compra/<?= $modo ?>.php" method="post">
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
                                <label for="id_medicina">medicina</label>
                                <select class="custom-select" id="id_medicina" name="id_medicina">
                                    <?php foreach($medicinas as $medicina): ?> 
                                        <?php if ($medicina['id'] == $data['id_medicina']): ?>
                                            <option value="<?= $medicina['id']?>" selected><?= $medicina['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $medicina['id']?>"><?= $medicina['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cantidad">cantidad</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?= $data['cantidad']?>"  onblur="calcularTotal()" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="precio">precio</label>
                                <input type="text" class="form-control" id="precio" name="precio" value="<?= $data['precio']?>"  onblur="calcularTotal()" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="total">total</label>
                                <input type="text" class="form-control is-valid" id="total" name="total" disabled value="<?= $data['total']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_proveedor">Proveedor</label>
                                <select class="custom-select" id="id_proveedor" name="id_proveedor">
                                    <?php foreach($proveedores as $proveedor): ?> 
                                        <?php if ($proveedor['id'] == $data['id_proveedor']): ?>
                                            <option value="<?= $proveedor['id']?>" selected><?= $proveedor['rason_social']?></option>
                                        <?php else: ?>
                                            <option value="<?= $proveedor['id']?>"><?= $proveedor['rason_social']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Comprar' : 'Guardar Cambios de la compra'?></button>
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
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <!-- Select Plugin Js -->
        <script src="<?php echo PUBLIC_PATH ?>/assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    </body>
</html>