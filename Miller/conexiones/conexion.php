<?php
$conexion = null;
$servidor = 'localhost';
$bd = 'mayam';
$user = 'root';
try {
$conexion = new PDO('mysql:host=localhost;dbname=mayam;charset=utf8mb4','root',);
} catch (PDOException $e) {
    echo "Error de conexion";
    exit;
}
return $conexion;
?>