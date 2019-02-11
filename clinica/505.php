<?php require_once __DIR__ . "/config.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>/assets/datatables.min.css"/>
        <style>
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                height: 100vh;
                background: url("<?= PUBLIC_PATH ?>/assets/static/tiendita.jpg");
                background-size: cover;
            }
            h1{
                font-size: 7rem;
            }
        </style>
    </head>
    <body class="theme-cyan">
        <h1>505</h1>
        <h2>Error en el servidor</h2>
        <p><?= $_GET['error'] ?></p>
    </body>
</html>