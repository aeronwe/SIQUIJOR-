<?php

// Master Superadmin Security Password (required to authorize admin account and credential changes)
if (!defined('SUPERADMIN_PASSWORD')) {
    define('SUPERADMIN_PASSWORD', 'SuperAdmin@2026');
}

function getConnection(): PDO
{
    $host = 'localhost';
    $db   = 'myhotel';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$db;charset=utf8mb4",
            $user,
            $pass
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}