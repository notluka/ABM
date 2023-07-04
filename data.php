<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Ejecutar consulta SQL para obtener los datos de papas fritas
$papasQuery = "SELECT dia, cantidad FROM ventas WHERE producto = 'papas fritas'";
$papasResult = $conn->query($papasQuery);

// Crear un array para almacenar los datos de papas fritas
$papasData = array();
while ($row = $papasResult->fetch_assoc()) {
    $papasData[] = $row['cantidad'];
}

// Repetir el proceso para hamburguesas y panchos
// ...

// Cerrar la conexión a la base de datos
$conn->close();

// Convertir los arrays de datos en formato JSON
$papasDataJSON = json_encode($papasData);
$hamburguesasDataJSON = json_encode($hamburguesasData);
$panchosDataJSON = json_encode($panchosData);

// Retornar los datos como respuesta
$data = array(
  'papasData' => $papasDataJSON,
  'hamburguesasData' => $hamburguesasDataJSON,
  'panchosData' => $panchosDataJSON
);
echo json_encode($data);
?>
