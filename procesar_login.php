<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "bella"; 
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM admins WHERE Usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       $row = $result->fetch_assoc();
        $hash_guardado = $row['Contraseña'];

        // Verificar si la contraseña está cifrada
        if (password_needs_rehash($hash_guardado, PASSWORD_DEFAULT)) {
            // Si la contraseña necesita ser rehasheada, cifrarla de nuevo y actualizar en la base de datos
            $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $id_usuario = $row['ID']; 
            $sql_update_password = "UPDATE admins SET Contraseña = '$contrasena_hash' WHERE ID = '$id_usuario'";
            $conn->query($sql_update_password);
        }

        // Verificar la contraseña
        if (password_verify($contrasena, $hash_guardado)) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: menu.html");
            exit;
        } else {
            echo '<script>alert("Claves de acceso incorrectas"); window.location.href = "Login.html";</script>';
            exit;
        }
    } else {
        echo '<script>alert("Claves de acceso incorrectas"); window.location.href = "Login.html";</script>';
        exit;
    }
    $conn->close();
} else {
    header("Location: Login.html");
    exit;
}
?>
