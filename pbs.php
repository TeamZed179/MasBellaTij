<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bella";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los productos
$sql = "SELECT * FROM producto LIMIT 3";
$result = $conn->query($sql);

$productos = [];

if ($result->num_rows > 0) {
    // Obtener los datos de cada producto y agregarlos al arreglo
    while ($row = $result->fetch_assoc()) {
        $producto = [
            'SKU' => $row['SKU'],
            'Nombre' => $row['Nombre'],
            'Descripcion' => $row['Descripcion'],
            'Precio' => $row['Precio'],
            'Imagen' => $row['Imagen']
        ];
        $productos[] = $producto;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Devolver los productos como datos JSON
header('Content-Type: application/json');
echo json_encode($productos);
?>
