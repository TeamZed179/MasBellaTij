<?php
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$existencias = $_POST['existencias'];

if (isset($_POST['descuento_check'])) {
    $descuento = $_POST['descuento'] ? $_POST['descuento'] : 0; 
} else {
    $descuento = 0; 
}

$imagen_nombre_original = $_FILES['imagen']['name']; 
$imagen_extension = pathinfo($imagen_nombre_original, PATHINFO_EXTENSION); 

$imagen_nuevo_nombre = $nombre . '.' . $imagen_extension;

$carpeta_destino = 'imagenes/';
$ruta_imagen = $carpeta_destino . $imagen_nuevo_nombre; 
move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bella";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql_check = "SELECT * FROM producto WHERE Nombre = '$nombre'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "Error: El nombre del producto ya existe en la base de datos.";
} else {
    $sql = "INSERT INTO producto (Nombre, Descripcion, Precio, Existencias, Descuento, Imagen) 
            VALUES ('$nombre', '$descripcion', $precio, $existencias, $descuento, '$ruta_imagen')";

    if ($conn->query($sql) === TRUE) {
        $id_producto = $conn->insert_id;
        
        header("Location: Carga.php?nombre_producto=$nombre");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
