<?php
$servername = "localhost"; // Nombre del servidor MySQL (normalmente localhost)
$username = "root"; // Nombre de usuario de MySQL
$password = "123456"; // Contraseña de MySQL
$database = "discharchar1"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Establecer juego de caracteres a UTF-8
$conn->set_charset("utf8");
