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
        $resultado = $connect->query("SELECT * FROM tikets WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }
    // consulta de estadoss
    $estados = $connect->query("SELECT * FROM estados")->fetchAll(PDO::FETCH_ASSOC);
    // consulta de categorias
    $categorias = $connect->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
    // consulta de proyectos
    $proyectos = $connect->query("SELECT * FROM proyectos")->fetchAll(PDO::FETCH_ASSOC);
    // consulta de prioridades
    $prioridades = $connect->query("SELECT * FROM prioridades")->fetchAll(PDO::FETCH_ASSOC);
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
                    Nuevo tiket
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/tiket/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-group">
                            <label for="titulo">titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $data['titulo']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $data['descripcion']?>" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_estado">estado</label>
                                <select class="form-control" id="id_estado" name="id_estado">
                                    <?php foreach($estados as $estado): ?> 
                                        <?php if ($estado['id'] == $data['id_estado']): ?>
                                            <option value="<?= $estado['id']?>" selected><?= $estado['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $estado['id']?>"><?= $estado['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_categoria">Categoria</label>
                                <select class="form-control" id="id_categoria" name="id_categoria">
                                    <?php foreach($categorias as $categoria): ?> 
                                        <?php if ($categoria['id'] == $data['id_categoria']): ?>
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
                                        <?php if ($proyecto['id'] == $data['id_proyecto']): ?>
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
                                        <?php if ($prioridad['id'] == $data['id_prioridad']): ?>
                                            <option value="<?= $prioridad['id']?>" selected><?= $prioridad['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $prioridad['id']?>"><?= $prioridad['nombre']?></option>
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
    </body>
</html>