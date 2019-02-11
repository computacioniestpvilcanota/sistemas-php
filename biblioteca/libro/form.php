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
        $resultado = $connect->query("SELECT * FROM libros WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }
    // Conculata de generos
    $generos = $connect->query("SELECT * FROM generos")->fetchAll(PDO::FETCH_ASSOC);
    // Conculata de editoriales
    $editoriales = $connect->query("SELECT * FROM editoriales")->fetchAll(PDO::FETCH_ASSOC);
    // Conculata de autores
    $autores = $connect->query("SELECT * FROM autores")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/libro/main.js"></script>
    </head>
    <body>
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo libro
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/libro/<?= $modo ?>.php" method="post"  enctype="multipart/form-data">
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
                                <label for="nombre">Titulo del libro</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['nombre']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?= $data['cantidad']?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="edicion">Año edicion</label>
                                <input type="number" class="form-control" id="edicion" name="edicion" value="<?= $data['edicion']?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="id_genero">Genero</label>
                                <select class="custom-select" id="id_genero" name="id_genero">
                                    <?php foreach($generos as $genero): ?> 
                                        <?php if ($genero['id'] == $data['id_genero']): ?>
                                            <option value="<?= $genero['id']?>" selected><?= $genero['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $genero['id']?>"><?= $genero['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_editorial">Editorial</label>
                                <select class="custom-select" id="id_editorial" name="id_editorial">
                                    <?php foreach($editoriales as $editorial): ?> 
                                        <?php if ($editorial['id'] == $data['id_editorial']): ?>
                                            <option value="<?= $editorial['id']?>" selected><?= $editorial['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $editorial['id']?>"><?= $editorial['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_autor">Autor</label>
                                <select class="custom-select" id="id_autor" name="id_autor">
                                    <?php foreach($autores as $autor): ?> 
                                        <?php if ($autor['id'] == $data['id_autor']): ?>
                                            <option value="<?= $autor['id']?>" selected><?= $autor['nombre']?></option>
                                        <?php else: ?>
                                            <option value="<?= $autor['id']?>"><?= $autor['nombre']?></option>
                                        <?php endif ?>
                                    <?php  endforeach ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $data['descripcion']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="portada">Foto</label>
                            <input type="file" class="form-control-file" id="portada" name="portada">
                        </div>
                        <div class="mb-3">
                            <?php if (!$data['portada'] == ''): ?>
                                <img src="<?= PUBLIC_PATH ?>/<?= $data['portada']?>" alt="<?= $data['nombre']?>" width="400">
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