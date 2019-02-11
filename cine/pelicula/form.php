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
        $data = $connect->query("SELECT * FROM peliculas WHERE id = $id")->fetch_assoc();

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }

    // Realizando la consulta SQL
    $categorias = $connect->query("SELECT * FROM categorias");
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/pelicula/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo pelicula
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/pelicula/<?= $modo ?>.php" method="post">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div class="form-group">
                            <label for="nombre">nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['nombre']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $data['descripcion']?>" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="unidad">unidad</label>
                                <input type="text" class="form-control" id="unidad" name="unidad" value="<?= $data['unidad']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_categoria">Categoria</label>
                                <select class="form-control" id="id_categoria" name="id_categoria">
                                    <?php while ($categoria = $categorias->fetch_assoc()):?> 
                                        <?php if ($categoria['id'] == $data['id_categoria']): ?>
                                            <option value="<?= $categoria['id']?>" selected><?= $categoria['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $categoria['id']?>"><?= $categoria['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endwhile; ?> 
                                </select>
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