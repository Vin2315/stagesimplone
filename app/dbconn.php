<?php
require_once("config.php");
$db_config = $config['db'];
// $conexion = NULL;
try {
    $conexion = new PDO('mysql:host=' . $db_config['host'] . ';dbname=' . $db_config['dbname'], $db_config['username'], $db_config['password']);
} catch (PDOException $e) {
    echo ("Error:" . $e->getMessage());
}
