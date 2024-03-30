function validarSesion() {
    fetch('verificar_sesion.php')
    .then(response => {
        if (!response.ok) {
            window.location.href = 'Login.html';
        } else {
            // Si la sesión está válida, no se necesita hacer nada más.
        }
    })
    .catch(error => {
        console.error('Error al verificar la sesión:', error);
    });
}

document.addEventListener('DOMContentLoaded', validarSesion);

function cerrarSesion() {
    // Realizar acciones para cerrar la sesión, como redireccionar a la página de inicio de sesión.
    window.location.href = "cerrar_sesion.php"; // Cambia "cerrar_sesion.php" por la URL adecuada para cerrar la sesión en tu aplicación.
}

