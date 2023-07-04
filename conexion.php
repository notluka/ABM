<?php
$servername = "localhost";
$username = "id20664148_datitos";
$password = "1!aAbbbb";
$dbname = "id20664148_database1";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>