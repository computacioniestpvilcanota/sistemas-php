<?php 
    require_once __DIR__ . "/../config.php";

    session_destroy();

    header('location:' . PUBLIC_PATH);

