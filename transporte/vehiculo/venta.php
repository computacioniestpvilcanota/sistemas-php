<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    $id_vehiculo = $_GET['vehiculo'];
    $resultado = $connect->query("SELECT * FROM vehiculos WHERE id = $id_vehiculo")->fetchAll(PDO::FETCH_ASSOC);
    $vehiculo;
    foreach ($resultado as $row) {
        $vehiculo = $row;
    }
    $clientes = $connect->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
    $ventas = $connect->query("SELECT * FROM ventas WHERE id_vehiculo = $id_vehiculo")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <style>
            .seats{
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                align-items: center;
            }
            .seats__item{
                width: 70px;
                padding: .6rem;
                cursor: pointer;
                position: relative;
            }
            .seats__item .seat-n{
                position: absolute;
                top: 50%;
                left: 50%;
                color: #fff;
                transform: translate(-50%,-50%);
            }
            .seats__item img{
                max-width: 100%;
            }
            .hidden{
                display: none;
            }
        </style>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="seats">
                        <?php  
                            $vendido;
                            for ($i=1; $i <= $vehiculo['numero_asientos']; $i++): 
                        ?>
                            <?php foreach ($ventas as $venta):?>
                                <?php if($venta['asiento'] == $i): $vendido = $i?>
                                    <div class="seats__item">
                                        <strong class="seat-n"><?= $i?></strong>
                                        <img src="<?= PUBLIC_PATH ?>/assets/static/seat-2.png" alt="">
                                    </div>   
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if($vendido != $i): ?>
                                <div class="seats__item" onclick="escojerAsiento(<?= $i?>)">
                                    <strong class="seat-n"><?= $i?></strong>
                                    <img src="<?= PUBLIC_PATH ?>/assets/static/seat.png" alt="">
                                </div>   
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="card hidden" id="card-vender">
                <div class="card-header">
                    <h1>ASIENTO <span id="seatN"></span></h1>
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/vehiculo/vender.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div style="display:none">
                            <label for="id_vehiculo">id_vehiculo</label>
                            <input type="text" value="<?= $id_vehiculo?>" class="form-control" id="id_vehiculo" name="id_vehiculo">
                        </div>
                        <div style="display:none">
                            <label for="asiento">asiento</label>
                            <input type="text" class="form-control" id="asiento" name="asiento" value="<?= $data['asiento']?>" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="origen">origen</label>
                                <input type="text" class="form-control" id="origen" name="origen" value="<?= $data['origen']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="destino">Destino</label>
                                <input type="text" class="form-control" id="destino" name="destino" value="<?= $data['destino']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="monto">Monto</label>
                                <input type="text" class="form-control" id="monto" name="monto" value="<?= $data['monto']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="destino">Cliente</label>
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
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <script>
            let ventaSeat = document.getElementById('seatN');
            let asiento = document.getElementById('asiento');
            let cardVender = document.getElementById('card-vender');
            const escojerAsiento = param =>{
                ventaSeat.innerHTML = param;
                asiento.value = param;
                cardVender.classList.remove('hidden');
            }
        </script>
    </body>
</html>