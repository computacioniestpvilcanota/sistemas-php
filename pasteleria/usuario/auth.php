<?php 
    require_once __DIR__ . "/../config.php";

    // Verificando la session
    if(!isset($_SESSION['usuario'])){
        header('location:' . PUBLIC_PATH . '/login.php');
        return;
    }

