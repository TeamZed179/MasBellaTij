<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="Produc.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Productos</title>
    <style>
    </style>
</head>
<body>
    <h1>Tabla de Productos</h1>
    <div class="productos-container">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bella";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM producto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='producto'>";
                    echo "<img src='" . $row['Imagen'] . "' alt='imagen' data-id='" . $row['SKU'] . "'>";
                    echo "<h2>" . $row['Nombre'] . "</h2>";
                    echo "<p><strong>Descripción:</strong> " . $row['Descripcion'] . "</p>";
                    echo "<p><strong>Precio:</strong> " . $row['Precio'] . "</p>";
                    echo "<p><strong>Existencias:</strong> " . $row['Existencias'] . "</p>";
                    echo "<p><strong>Descuento:</strong> " . $row['Descuento'] . "</p>";
                    echo "<a href='detalle_producto.php?sku=" . $row['SKU'] . "' class='detalle-btn'>Ver Detalle</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay productos en la base de datos</p>";
            }
            $conn->close();
        ?>
    </div>
    <script>
        document.querySelectorAll('.producto img').forEach(img => {
            img.addEventListener('click', function() {
                const sku = this.getAttribute('data-id');
                window.open('detalle_producto.php?sku=' + sku, '_blank');
            });
        });
    </script>
    <script src="rl.js"></script>
</body>
</html>
