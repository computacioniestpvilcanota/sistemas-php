<?php
    require_once __DIR__ .  "/../config.php";
    try {
        $connect = new mysqli("localhost", "yoel", "cascadesheet","cine");
    } catch (Exception $e) {
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
