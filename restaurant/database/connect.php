<?php
    try {
        $connect = new PDO("mysql:host=localhost;dbname=elevin","yoel","cascadesheet",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]
            );
    } catch (PDOException $e) {
        header('location:/505.php');
    }