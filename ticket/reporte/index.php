<?php 
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";


    if(isset($_POST['id_estado'])){
        $id_usuario = $_POST['id_usuario'];
        $id_proyecto = $_POST['id_proyecto'];
        $id_prioridad = $_POST['id_prioridad'];
        $id_categoria = $_POST['id_categoria'];
        $id_estado = $_POST['id_estado'];
        $tikets = $connect->query("SELECT tikets.id, tikets.titulo, usuarios.usuario as usuario, proyectos.nombre as proyecto, prioridades.nombre as prioridad, categorias.nombre as categoria, estados.nombre as estado FROM tikets
        INNER JOIN usuarios ON usuarios.id = tikets.id_usuario
        INNER JOIN proyectos ON proyectos.id = tikets.id_proyecto
        INNER JOIN prioridades ON prioridades.id = tikets.id_prioridad
        INNER JOIN categorias ON categorias.id = tikets.id_categoria
        INNER JOIN estados ON estados.id = tikets.id_estado
        WHERE usuarios.id = '$id_usuario' AND proyectos.id = '$id_proyecto' AND prioridades.id = '$id_prioridad' 
            AND categorias.id = '$id_categoria' AND estados.id = '$id_estado'")->fetchAll(PDO::FETCH_ASSOC); 
    }else{
        $tikets = $connect->query("SELECT tikets.id, tikets.titulo, usuarios.usuario as usuario, proyectos.nombre as proyecto, prioridades.nombre as prioridad, categorias.nombre as categoria, estados.nombre as estado FROM tikets
        INNER JOIN usuarios ON usuarios.id = tikets.id_usuario
        INNER JOIN proyectos ON proyectos.id = tikets.id_proyecto
        INNER JOIN prioridades ON prioridades.id = tikets.id_prioridad
        INNER JOIN categorias ON categorias.id = tikets.id_categoria
        INNER JOIN estados ON estados.id = tikets.id_estado")->fetchAll(PDO::FETCH_ASSOC);
    }

    // consulta de estadoss
    $estados = $connect->query("SELECT * FROM estados")->fetchAll(PDO::FETCH_ASSOC);
    // consulta de categorias
    $categorias = $connect->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
    // consulta de proyectos
    $proyectos = $connect->query("SELECT * FROM proyectos")->fetchAll(PDO::FETCH_ASSOC);
    // consulta de prioridades
    $prioridades = $connect->query("SELECT * FROM prioridades")->fetchAll(PDO::FETCH_ASSOC);
    // consulta de prioridades
    $usuarios = $connect->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
    </head>
    <body class="nav-md">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Reportes
                    </h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="id_usuario">usuario</label>
                                <select class="form-control" id="id_usuario" name="id_usuario">
                                    <?php foreach($usuarios as $usuario): ?> 
                                        <?php if ($usuario['id'] == $_POST['id_usuario']): ?>
                                            <option value="<?= $usuario['id']?>" selected><?= $usuario['usuario']?></option>
                                        <?php else: ?>
                                            <option value="<?= $usuario['id']?>"><?= $usuario['usuario']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_estado">estado</label>
                                <select class="form-control" id="id_estado" name="id_estado">
                                    <?php foreach($estados as $estado): ?> 
                                        <?php if ($estado['id'] == $_POST['id_estado']): ?>
                                            <option value="<?= $estado['id']?>" selected><?= $estado['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $estado['id']?>"><?= $estado['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_categoria">Categoria</label>
                                <select class="form-control" id="id_categoria" name="id_categoria">
                                    <?php foreach($categorias as $categoria): ?> 
                                        <?php if ($categoria['id'] == $_POST['id_categoria']): ?>
                                            <option value="<?= $categoria['id']?>" selected><?= $categoria['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $categoria['id']?>"><?= $categoria['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_proyecto">proyecto</label>
                                <select class="form-control" id="id_proyecto" name="id_proyecto">
                                    <?php foreach($proyectos as $proyecto): ?> 
                                        <?php if ($proyecto['id'] == $_POST['id_proyecto']): ?>
                                            <option value="<?= $proyecto['id']?>" selected><?= $proyecto['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $proyecto['id']?>"><?= $proyecto['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_prioridad">prioridad</label>
                                <select class="form-control" id="id_prioridad" name="id_prioridad">
                                    <?php foreach($prioridades as $prioridad): ?> 
                                        <?php if ($prioridad['id'] == $_POST['id_prioridad']): ?>
                                            <option value="<?= $prioridad['id']?>" selected><?= $prioridad['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $prioridad['id']?>"><?= $prioridad['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" >Filtrar</button>
                    </form>
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>titulo</th>
                                <th>usuario</th>
                                <th>proyecto</th>
                                <th>prioridad</th>
                                <th>categoria</th>
                                <th>estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($tikets as $tiket):?>
                                <tr>
                                    <td><?= $tiket['titulo'] ?></td>
                                    <td><?= $tiket['usuario'] ?></td>
                                    <td><?= $tiket['proyecto'] ?></td>
                                    <td><?= $tiket['prioridad'] ?></td>
                                    <td><?= $tiket['categoria'] ?></td>
                                    <td><?= $tiket['estado'] ?></td>
                                </tr>
                            <?php  endforeach; ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
    </body>
</html>