<?php
define('DB_HOST', 'localhost'); // Host de la base de datos
define('DB_USER', 'root'); // Usuario de la base de datos
define('DB_PASS', ''); // Contraseña de la base de datos
define('DB_NAME', 'usuarios_db'); // Nombre de la base de datos

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>