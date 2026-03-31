<?php
$db_host = "gaming-center_db";

$db_user = "gaming_user";
$db_pass = "gaming_password123";
$db_name = "gaming_center";

$charset = "utf8mb4";
$attr = "mysql:host=$db_host;dbname=$db_name;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
?>