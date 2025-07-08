<?php
$nif = $_POST['nif'] ?? null;
try {
    if (empty($nif)) {
        throw new Exception("Nif obligatori");
    }
} catch (Exception $e) {
    $empty_nif = $e->getMessage();
}

$nombre = $_POST['nombre'] ?? null;
try {
    if (empty($nombre)) {
        throw new Exception("Nom obligatori");
    }
} catch (Exception $e) {
    $empty_nombre = $e->getMessage();
}

$apellidos = $_POST['apellidos'] ?? null;
try {
    if (empty($apellidos)) {
        throw new Exception("Cognom obligatori");
    }
} catch (Exception $e) {
    $empty_apellidos = $e->getMessage();
}


$email = $_POST['email'] ?? null;
try {
    if (empty($email)) {
        throw new Exception("Email obligatori");
    }
} catch (Exception $e) {
    $empty_email = $e->getMessage();
}

$nota = $_POST['nota'] ?? null;
$qualificacio = "";
try {
    if (empty($nota) || !is_numeric($nota) || $nota <= 0 || $nota > 10) {
        throw new Exception("Nota obligatòria o no vàlida");
    } else {
        if ($nota < 5) {
            $qualificacio = "Suspens";
        } else if ($nota >= 5 && $nota < 7) {
            $qualificacio = "Aprobat";
        } else if ($nota >=7 && $nota < 9) {
            $qualificacio = "Notable";
        } else if ($nota >= 9 && $nota <= 10) {
            $qualificacio = "Excel·lent";
        }
    }
} catch (Exception $e) {
    $error_nota = $e->getMessage();
}

$missatge = $_POST["mensaje"] ?? null;
try {
    if (empty($missatge)) {
        throw new Exception("Missatge obligatori");
    }
} catch (Exception $e) {
    $empty_missatge = $e->getMessage();
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
                        } elseif ($i >= 9 && $i <= 10) {
                            $caixes_visualitzades .= "<aside class='azul'></aside>";
                        }
                    }

                    if ($caixes_visualitzades != '') {
                        echo $caixes_visualitzades;
                    }

                ?>

                <br><br>

                <input type="text" placeholder="email" disabled value='<?php echo $email ?>'>

                <br><br>

                <textarea  cols='22' rows='5' disabled><?php echo $missatge; ?></textarea>

                <p class='errores'>
                    <?php echo $empty_nif; ?> <br>
                    <?php echo $empty_nombre; ?> <br>
                    <?php echo $empty_apellidos; ?> <br>
                    <?php echo $empty_email; ?> <br>
                    <?php echo $error_nota; ?> <br>
                    <?php echo $empty_missatge; ?> <br>
                </p>

            </div>
        </div>
    </body>
</html>