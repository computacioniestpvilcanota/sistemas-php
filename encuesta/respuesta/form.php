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
        $resultado = $connect->query("SELECT * FROM respuestas WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }

    // Consulta de profesores
    $profesores = $connect->query("SELECT * FROM profesores")->fetchAll(PDO::FETCH_ASSOC);

    // Consulta de preguntas
    $preguntas = $connect->query("SELECT * FROM preguntas")->fetchAll(PDO::FETCH_ASSOC);

    // Consulta de preguntas
    $alumnos = $connect->query("SELECT * FROM alumnos")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <link href="<?php echo PUBLIC_PATH ?>/media/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
        <link href="<?php echo PUBLIC_PATH ?>/media/assets/libs/jquery-steps/steps.css" rel="stylesheet">
        <style>
            .card_teacher{
                width: 100%;
                height: 300px;
                object-fit: cover;
            }
            .inputGroup {
            background-color: #fff;
            display: block;
            margin: 10px 0;
            position: relative;

            label {
            padding: 12px 30px;
            width: 100%;
            display: block;
            text-align: left;
            color: #3C454C;
            cursor: pointer;
            position: relative;
            z-index: 2;
            transition: color 200ms ease-in;
            overflow: hidden;

            &:before {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                content: '';
                background-color: #5562eb;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%) scale3d(1, 1, 1);
                transition: all 300ms cubic-bezier(0.4, 0.0, 0.2, 1);
                opacity: 0;
                z-index: -1;
            }

            &:after {
                width: 32px;
                height: 32px;
                content: '';
                border: 2px solid #D1D7DC;
                background-color: #fff;
                background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
                background-repeat: no-repeat;
                background-position: 2px 3px;
                border-radius: 50%;
                z-index: 2;
                position: absolute;
                right: 30px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                transition: all 200ms ease-in;
            }
            }

            input:checked ~ label {
            color: #fff;

            &:before {
                transform: translate(-50%, -50%) scale3d(56, 56, 1);
                opacity: 1;
            }

            &:after {
                background-color: #54E0C7;
                border-color: #54E0C7;
            }
            }

            input {
            width: 32px;
            height: 32px;
            order: 1;
            z-index: 2;
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            visibility: hidden;
            }
        }


        </style>
    </head>
    <body>
        <?php require_once __DIR__ . "/../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo respuesta
                </div>
                <div class="card-body">
                    <p>Alumno</p>
                    <select class="custom-select mb-4" id="alumno" name="alumno">
                        <?php foreach ($alumnos as $alumno): ?>
                            <option value="<?= $alumno['id']?>"><?= $alumno['nombres']?></option>
                        <?php endforeach; ?>
                    </select>

                    <div id="respuestasPasAPaso">
                        <?php $paso = 0; foreach ($preguntas as $pregunta): $paso++; ?>
                            <h3></h3>
                            <section>
                                <h1 style="text-align: center; margin: 1rem 0"><?php echo $pregunta['nombre'] ?></h1>
                                <form action="" method="post" style="width:100%" id="form<?php echo $paso; ?>">
                                    <!---  Mostrando todo los profesores  -->
                                    <div class="row">
                                        <?php $key = 0; foreach ($profesores as $profesor): $key++; ?>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                                <div class="card">
                                                    <img class="card-img-top card_teacher" src="<?= PUBLIC_PATH ?>/<?= $profesor['foto']?>" alt="Card image cap">
                                                    <div class="card-body">
                                                        <div><?php echo $profesor['nombres']?></div>
                                                        <div style="display:none">
                                                            <label for="id_profesor">id_profesor</label>
                                                            <input type="text" value="<?= $profesor['id']?>" class="form-control" id="id_profesor" name="id_profesor">
                                                        </div>
                                                        <div class="form-check inputGroup">
                                                            <input class="form-check-input" type="radio" name="respuesta_<?php echo $key?>" id="respuesta_<?php echo $key?>" VALUE="SI">
                                                            <label class="form-check-label" for="respuesta_<?php echo $key?>">
                                                                SI
                                                            </label>
                                                        </div>
                                                        <div class="form-check inputGroup">
                                                            <input class="form-check-input" type="radio" name="respuesta_<?php echo $key?>" id="respuesta_<?php echo $key?>_2" value="NO" checked>
                                                            <label class="form-check-label" for="respuesta_<?php echo $key?>">
                                                                NO
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <!---  FIN Mostrando todo los profesores  -->

                                    <!-- <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button> -->
                                    <input type="submit" value="enviar" id="submit<?= $paso; ?>" class="btn btn-primary">
                                    <?php
                                        echo 
                                        "<script>
                                            var sbm". $paso." = document.getElementById('submit".$paso."');
                                            sbm".$paso.".addEventListener('click',(e)=>{
                                                e.preventDefault();
                                                enviarDatos(".$pregunta['id'].",'form".$paso."' );
                                            });
                                        </script>
                                        "
                                    ?>
                                    
                                </form>
                            </section>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>   
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/media/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
        <script src="<?php echo PUBLIC_PATH ?>/media/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
        <script>
            $("#respuestasPasAPaso").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                autoFocus: true
            });

            const enviarDatos = (id_pregunta, formID)=>{

                const formData = $("#" + formID).serializeArray();
                let alumno = document.getElementById("alumno");

                const data = {
                    id_pregunta: parseInt(id_pregunta),
                    id_alumno: parseInt(alumno.value),
                    respuestas: formData,
                }

                fetch('/ana/respuesta/guardar.php', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                    .then(e=>{
                        alert("Se guardo exitosamente");
                    })
            }
        </script>
    </body>
</html>