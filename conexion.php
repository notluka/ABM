<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dbname";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
