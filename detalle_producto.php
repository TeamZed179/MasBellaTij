<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
</head>
<body>
<?php
session_start();

if(isset($_GET['sku'])) {
    $producto_sku = $_GET['sku'];
    $_SESSION['producto_sku'] = $producto_sku;
}
if(isset($_SESSION['producto_sku'])) {
    $producto_sku = $_SESSION['producto_sku'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bella";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM producto WHERE SKU = '$producto_sku'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h1>Detalles del Producto</h1>";
            echo "<div style='display:flex; align-items:center;'>";
            echo "<img src='" . $row['Imagen'] . "' alt='imagen' style='max-width: 350px; max-height: 350px; margin-right: 20px;'>";
            echo "<div>";
            echo "<p><strong>Nombre:</strong> " . $row['Nombre'] . "</p>";
            echo "<p><strong>Descripción:</strong> " . $row['Descripcion'] . "</p>";
            echo "<p><strong>Precio:</strong> $" . $row['Precio'] . "</p>";
            echo "<p><strong>Existencias:</strong> " . $row['Existencias'] . "</p>";
            echo "<p><strong>Descuento:</strong> " . $row['Descuento'] . "%</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No se encontraron detalles para este producto.";
    }
    $conn->close();
} else {
    echo "No se proporcionó un SKU de producto válido.";
}
?>
<script src="rl.js"></script>
</body>
</html>
