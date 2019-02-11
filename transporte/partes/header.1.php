<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #563D7C;">
    <a class="navbar-brand" href="<?php echo PUBLIC_PATH ?>">
        <img src="<?php echo PUBLIC_PATH ?>/assets/static/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        TRANSPORTE
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mantenimiento
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/cliente">Cliente</a>
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/empleado">Empleado</a>
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/propietario">Propietario</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Vehiculos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/tipo">Tipos</a>
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/vehiculo">Vehiculos</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reportes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/venta">Ventas</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo PUBLIC_PATH ?>/configuracion.php">Configuracion</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               
                Reporte
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/marca">marca</a>
                </div>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/masviajes">masviajes</a>
                </div>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/propietarios">propietarios</a>
                </div>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               
            












        </ul>
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['usuario']['usuario'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/usuario/perfil.php">Perfil</a>
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/usuario/logout.php">Salir</a>
                </div>
            </li>
        </ul>
    </div>
</nav>