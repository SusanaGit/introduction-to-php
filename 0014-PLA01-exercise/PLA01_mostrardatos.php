<?php
$nif = $_POST['nif'] ?? null;
if (empty($nif)) {
    $empty_nif = "Nif obligatori";
}

$nombre = $_POST['nombre'] ?? null;
if (empty($nombre)) {
    $empty_nombre = "Nom obligatori";
}

$apellidos = $_POST['apellidos'] ?? null;
if (empty($apellidos)) {
    $empty_apellidos = "Cognom obligatori";
}

$email = $_POST['email'] ?? null;
if (empty($email)) {
    $empty_email = "Email obligatori";
}

$nota = $_POST['nota'] ?? null;
$qualificacio = "";
if (empty($nota) || !is_numeric($nota) || $nota <= 0) {
    $error_nota = "Nota obligatòria, no numèrica o negativa";
} else {
    if ($nota < 5) {
        $qualificacio = "Suspens";
    } else if ($nota >= 5 && $nota < 7) {
        $qualificacio = "Aprobat";
    } else if ($nota >=7 && $nota < 9) {
        $qualificacio = "Notable";
    } else if ($nota >= 9) {
        $qualificacio = "Excel·lent";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PLA01</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css?v=1.0">
    </head>
    <body>
        <div class='container'>
            <h1 class='centrar'>PLA01: MOSTRAR DADES</h1>
            <div class='card'>
                <input type="text" placeholder="nif" disabled value='<?php echo $nif ?>'><br><br>

                <input type="text" placeholder="nom" disabled value='<?php echo $nombre ?>'>
                <input type="text" placeholder="cognoms" disabled value='<?php echo $apellidos ?>'><br><br>

                <input type="text" placeholder="qualificació" disabled value='<?php echo $qualificacio ?>'>

                <?php
                    $caixes_visualitzades = '';

                    for ($i = 1; $i <= $nota; $i++) {
                        if ($i < 5) {
                            $caixes_visualitzades .= "<aside class='rojo'></aside>";
                        } elseif ($i >= 5 && $i < 7) {
                            $caixes_visualitzades .= "<aside class='amarillo'></aside>";
                        } elseif ($i >= 7 && $i < 9) {
                            $caixes_visualitzades .= "<aside class='verde'></aside>";
                        } elseif ($i >= 9) {
                            $caixes_visualitzades .= "<aside class='azul'></aside>";
                        }
                    }

                    if ($caixes_visualitzades != '') {
                        echo $caixes_visualitzades;
                    }

                ?>

                <br><br>
                <input type="text" placeholder="email" disabled value='<?php echo $email ?>'><br><br>
                <textarea  cols='22' rows='5' disabled></textarea>
                <p class='errores'>
                    <?php echo $empty_nif; ?> <br>
                    <?php echo $empty_nombre; ?> <br>
                    <?php echo $empty_apellidos; ?> <br>
                    <?php echo $empty_email; ?> <br>
                    <?php echo $error_nota; ?> <br>
                </p>
            </div>
        </div>
    </body>
</html>