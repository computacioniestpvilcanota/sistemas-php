<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";


    if(isset($_POST['id_tipo'])){
        $id_tipo = $_POST['id_tipo'];
        $vehiculos = $connect->query("SELECT vehiculos.id, vehiculos.descripcion, vehiculos.foto, vehiculos.placa, propietarios.nombres AS propietario FROM vehiculos 
        INNER JOIN propietarios ON propietarios.id = vehiculos.id_propietario 
        WHERE vehiculos.id_tipo = '$id_tipo'")->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $vehiculos = $connect->query("SELECT vehiculos.id, vehiculos.descripcion, vehiculos.foto, vehiculos.placa, propietarios.nombres AS propietario FROM vehiculos 
        INNER JOIN propietarios ON propietarios.id = vehiculos.id_propietario")->fetchAll(PDO::FETCH_ASSOC);
    }

    
    $tipos = $connect->query("SELECT * FROM tipos")->fetchAll(PDO::FETCH_ASSOC);
    
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
                        Marcas
                    </h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_tipo">Tipo</label>
                            <select class="custom-select" id="id_tipo" name="id_tipo">
                                <?php foreach($tipos as $tipo): ?> 
                                    <?php if ($tipo['id'] == $_POST['id_tipo']): ?>
                                        <option value="<?= $tipo['id']?>" selected><?= $tipo['nombre']?></option>
                                    <?php else: ?>
                                        <option value="<?= $tipo['id']?>"><?= $tipo['nombre']?></option>
                                    <?php endif ?>
                                <?php  endforeach ?> 
                            </select>
                        </div>
                        <input type="submit" value="FILTRAR" class="btn btn-success">
                    </form>
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Descripcion</th>
                                <th>Placa</th>
                                <th>Propietario</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vehiculos as $vehiculo):?>
                                <tr>
                                    <td>
                                        <img src="<?= PUBLIC_PATH ?>/<?= $vehiculo['foto']?>" alt="foto" width="70px">
                                    </td>
                                    <td><?= $vehiculo['descripcion']?></td>
                                    <td><?= $vehiculo['placa']?></td>
                                    <td><?= $vehiculo['propietario']?></td>
                                    <td><?= $vehiculo['nombre']?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Foto</th>
                                <th>Descripcion</th>
                                <th>Placa</th>
                                <th>Propietario</th>
                                <th>Tipo</th>
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>