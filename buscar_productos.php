<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $query = $_GET['query'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bella";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM producto WHERE Nombre LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='producto'>";
            echo "<img src='" . $row['Imagen'] . "' alt='imagen' data-id='" . $row['SKU'] . "'>";
            echo "<h3>" . $row['Nombre'] . "</h3>";
            echo "<p><strong>Descripción:</strong> " . $row['Descripcion'] . "</p>";
            echo "<p><strong>Precio:</strong> " . $row['Precio'] . "</p>";
            echo "<p><strong>Existencias:</strong> " . $row['Existencias'] . "</p>";
            echo "<p><strong>Descuento:</strong> " . $row['Descuento'] . "</p>";
            echo "<a href='detalle_producto.php?sku=" . $row['SKU'] . "' class='detalle-btn'>Ver Detalle</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No se encontraron productos con ese nombre</p>";
    }
    $conn->close();
} else {
    echo "<p>Error: No se proporcionó una consulta de búsqueda</p>";
}
?>
