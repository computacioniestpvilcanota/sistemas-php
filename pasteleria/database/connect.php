<?php
    require_once __DIR__ .  "/../config.php";
    try {
        $connect = new PDO("mysql:host=localhost;dbname=indira","yoel","cascadesheet",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]
            );
    } catch (PDOException $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }