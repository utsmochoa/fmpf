<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'rptvcompany');
define('DB_PASS', 'rptv2024@');
define('DB_NAME', 'fmpf');

try {
    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conexion->connect_error) {
        throw new Exception("Error de conexión: " . $conexion->connect_error);
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>