<?php 
    require_once __DIR__ . "/../config.php";
    require_once "./../database/connect.php";

    session_destroy();

    header('location:' . PUBLIC_PATH);

