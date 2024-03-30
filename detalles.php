<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .product-details {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .product-image {
            flex: 1;
        }

        .product-info {
            flex: 2;
            padding: 0 20px;
        }

        .product-info h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .product-info p {
            font-size: 16px;
            color: #666;
            margin-bottom: 5px;
        }

        .product-info strong {
            font-weight: bold;
        }

        .product-image img {
            max-width: 300px;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();

        if(isset($_GET['sku'])) {
           
            $producto_sku = $_GET['sku'];
           
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
                // Mostrar los detalles del producto
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product-details'>";
                    echo "<div class='product-image'>";
                    echo "<img src='" . $row['Imagen'] . "' alt='imagen'>";
                    echo "</div>";
                    echo "<div class='product-info'>";
                    echo "<h1>Detalles del Producto</h1>";
                    echo "<p><strong>Nombre:</strong> " . $row['Nombre'] . "</p>";
                    echo "<p><strong>Descripción:</strong> " . $row['Descripcion'] . "</p>";
                    echo "<p><strong>Precio:</strong> $" . $row['Precio'] . "</p>";
                    echo "<p><strong>Existencias:</strong> " . $row['Existencias'] . "</p>";
                    echo "<p><strong>Descuento:</strong> " . $row['Descuento'] . "%</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No se encontraron detalles para este producto.</p>";
            }
            
            $conn->close();
        } else {
            echo "<p>No se proporcionó un SKU de producto válido.</p>";
        }
        ?>
    </div>
    <script src="rl.js"></script>
</body>
</html>
