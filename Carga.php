<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bella";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($conn) && $conn instanceof mysqli) {
    if (isset($_GET['nombre_producto'])) {
        $nombre_producto = $_GET['nombre_producto'];

         $nombre_producto_escaped = $conn->real_escape_string($nombre_producto);
        $sql = "SELECT * FROM producto WHERE Nombre = '$nombre_producto_escaped'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre_producto = $row['Nombre'];
            $descripcion_producto = $row['Descripcion'];
            $precio_producto = $row['Precio'];
            $descuento_producto = $row['Descuento'];
            $imagen_producto = $row['Imagen'];
        } else {
            echo "No se encontró el producto";
        }
    } else {
        echo "No se ha enviado el nombre del producto por la URL.";
    }
} else {
    echo "Error: No se ha establecido la conexión a la base de datos.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            margin-top: 50px;
        }

        .container {
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
        }

        img {
            max-width: 300px; 
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalle del Producto</h1>
        <?php if (isset($nombre_producto)): ?>
            <p>Nombre: <?php echo $nombre_producto; ?></p>
            <p>Descripción: <?php echo $descripcion_producto; ?></p>
            <p>Precio: <?php echo $precio_producto; ?></p>
            <p>Descuento: <?php echo $descuento_producto; ?></p>
            <img src="<?php echo $imagen_producto; ?>" alt="Imagen del Producto">
        <?php endif; ?>
    </div>
</body>
</html>


