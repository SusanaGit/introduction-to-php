<?php
if (isset($_POST['nombre'])) {
    echo "Nombre recibido: " . htmlspecialchars($_POST['nombre']);
} else {
    echo "No se ha recibido ningún dato.";
}
?>