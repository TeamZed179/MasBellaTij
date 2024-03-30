<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Produc.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mas Bella</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id="header">   
    <a href="#" ><img src="img/logo.png" class="logo" alt=""></a>
    <div> 
        <ul id="navbar">
            <li><a href="Catalogo.php" class="active">Catalogo</a></li>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="#">Nosotros</a></li>
            <li><a href="Contacto.html">Contacto</a></li>
        </ul>
        
    </div>
</section>
    <section id="productos1" class="productosclass">  
        <h2>Catalogo</h2>
        <p></p>
        <input type="text" id="searchInput" placeholder="Buscar productos...">
        <div id="searchResults"></div>

        <div id="productos-container" class="contenedor">
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
                        echo "<h3>" . $row['Nombre'] . "</h3>";
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
    </section>

<script src="rl.js"></script>
<script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        buscarProductos();
    });

    $('#searchButton').on('click', function() {
        buscarProductos();
    });

    function buscarProductos() {
        var query = $('#searchInput').val();
        $.ajax({
            url: 'buscar_productos.php',
            type: 'GET',
            data: { query: query },
            success: function(response) {
                $('#productos-container').html(response);
            }
        });
    }
});
</script>
</script>
</body>
</html>
