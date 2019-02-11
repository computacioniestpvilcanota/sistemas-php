<aside class="sidebar-left-collapse">
    <a href="#" class="company-logo">
    <img src="<?= PUBLIC_PATH ?>/<?= $_SESSION['usuario']['foto']?>" style="border-radius: 100%; width: 7.5rem; height: 7.5rem" alt="" class="profile_avatar">
    </a>
    <div class="sidebar-links">
        <div class="link-yellow">
            <a href="#">
                <i class="fa fa-keyboard-o"></i>Mantenimiento
            </a>
            <ul class="sub-links">
                <li><a href="<?php echo PUBLIC_PATH ?>/cliente">Cliente</a></li>
                <li><a href="<?php echo PUBLIC_PATH ?>/empleado">Empleado</a></li>
                <li><a href="<?php echo PUBLIC_PATH ?>/proveedor">Proveedor</a></li>
                <li><a href="<?php echo PUBLIC_PATH ?>/categoria">Categorias</a></li>
                <li><a href="<?php echo PUBLIC_PATH ?>/marca">Marcas</a></li>
                <li><a href="<?php echo PUBLIC_PATH ?>/producto">Productos</a></li>
            </ul>
        </div>
        <div class="link-green">
            <a href="#">
                <i class="fa fa-map-marker"></i>Movimientos
            </a>
            <ul class="sub-links">
                <li><a href="<?php echo PUBLIC_PATH ?>/compra">Compras</a></li>
                <li><a href="<?php echo PUBLIC_PATH ?>/venta">Ventas</a></li>
            </ul>
        </div>
        <div class="link-blue selected">
            <a href="#">
                <i class="fa fa-picture-o"></i>Config
            </a>
            <ul class="sub-links">
                <li><a href="<?php echo PUBLIC_PATH ?>/configuracion.php">Configuracion</a></li>
            </ul>
        </div>
        <div class="link-green">
            <a href="#">
                <i class="fa fa-map-marker"></i>Usuario
            </a>
            <ul class="sub-links">
                <li><a href="<?php echo PUBLIC_PATH ?>/usuario/perfil.php">Perfil</a></li>
                <li><a href="<?php echo PUBLIC_PATH ?>/usuario/logout.php">Salir</a></li>
            </ul>
        </div>
    </div>
</aside>
<div class="main-content">