<nav class="navbar navbar-expand-lg navbar-dark" style="background: #043e80">
    <a class="navbar-brand" href="<?php echo PUBLIC_PATH ?>">
        <img src="<?php echo PUBLIC_PATH ?>/assets/static/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        REPARA RAPIDO
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
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/tecnico">Tecnicos</a>
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/proveedor">Proveedor</a>
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/categoria">Categorias</a>
                    <a class="dropdown-item" href="<?php echo PUBLIC_PATH ?>/repuesto">Repuestos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo PUBLIC_PATH ?>/reparacion">Reparacion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo PUBLIC_PATH ?>/compra">Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo PUBLIC_PATH ?>/configuracion.php">Configuracion</a>
            </li>
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
            <li class="nav-item">
                <style>
                    .profile_avatar{
                        width: 35px;
                        height: 35px;
                        border-radius: 35px;
                    }
                </style>
                <img src="<?= PUBLIC_PATH ?>/<?= $_SESSION['usuario']['foto']?>" alt="" class="profile_avatar">
            </li>
        </ul>
    </div>
</nav>