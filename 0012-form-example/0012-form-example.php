<?php
if (isset($_GET['nombre']) && isset($_GET['edad'])) {
    $nombre = htmlspecialchars($_GET['nombre']);
    $edad = (int) $_GET['edad'];

    echo "Nombre recibido: $nombre<br>";
    echo "Edad recibida: $edad";
} else {
    echo "Faltan datos en la solicitud.";
}
?>
