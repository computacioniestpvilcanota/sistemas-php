<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>dosentes</title>
    <!--CSS-->    
    <link rel="stylesheet" href="media/css/bootstrap.css">
    <link rel="stylesheet" href="media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="media/font-awesome/css/font-awesome.css">
    <!--Javascript-->    
    <script src="media/js/jquery-1.10.2.js"></script>
    <script src="media/js/jquery.dataTables.min.js"></script>
    <script src="media/js/dataTables.bootstrap.min.js"></script>          
    <script src="media/js/bootstrap.js"></script>
    <script src="media/js/lenguajeusuario.js"></script>     
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
    </script>   
</head>

<body>
<div class="col-md-12 col-md-offset-0">
    <h1>listar docentes
        <a href="fregistrousuarios.php" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nuevo usuario</a>
    
        <a href="login.php" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; salir</a>
</h1>  
</div>
</i>&nbsp;Nuevo docentes</a>
<div class="col-md-12 col-md-offset-0">    
    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead bgcolor="#C4C4C4">
        <tr>
            <th>curso</th>
            <th>horaio</th>
            <th>credito</th>
            <th>iddocente</th>               
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot bgcolor="#C4C4C4">
        <tr>
        <th>curso</th>
            <th>horaio</th>
            <th>credito</th>
            <th>iddocente</th>               
            <th>Acciones</th>
        </tr>
        </tfoot>
    </table>        
</div>
</body>
</html>