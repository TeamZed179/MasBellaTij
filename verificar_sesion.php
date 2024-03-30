<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    http_response_code(401);
} else {
    http_response_code(200);
}
?>
