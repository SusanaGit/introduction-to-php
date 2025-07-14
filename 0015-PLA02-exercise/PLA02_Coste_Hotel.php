<?php

    $noches = 0;
    $ciudad = '';
    $coche = 0;
    $total = 0;
    $errores = [];

    //print_r($_POST);

    if (isset($_POST['enviar'])) {

        try {
            // validación de datos
            $noches = $_POST['noches'] ?? null;
            $ciudad = $_POST['ciudad'] ?? null;
            $coche = $_POST['coche'] ?? null;

            if (empty($noches) || !is_numeric($noches) || $noches < 0) {
                $errores[] = "Noches debe ser numérico y mayor que 0.";
            }

            if (empty($ciudad)) {
                $errores[] = "Se debe seleccionar una ciudad.";
            }

            if (empty($coche) || !is_numeric($coche) || $coche < 0 ) {
                $errores[] = "Se debe seleccionar los días de alquiler del coche.";
            }

            $costeHotel = costeHotel((int)$noches);
            $costeVuelo = costeCiudad($ciudad);
            $costeCoche = costeCoche((int)$coche);

            $total = $costeHotel + $costeVuelo + $costeCoche;
        } catch (Exception $e) {
            $errores[] = $e -> getMessage();
        }
    }

    function costeHotel(int $noches) : int{
        return $noches * 60;
    }

    function costeCiudad($ciudad) : int{
        switch ($ciudad) {
            case 'Madrid':
                return 150;
            case 'Paris':
                return 250;
            case 'Los Angeles':
                return 450;
            case 'Roma':
                return 200;
            default:
                return throw new Exception("Ciudad no válida.");
        }
    }

    function costeCoche(int $dias): int {
        $alquilercoche = $dias * 40;

        if ($dias >= 7) {
            $alquilercoche = $alquilercoche - 50;
        } else if ($dias >= 3) {
            $alquilercoche = $alquilercoche - 20;
        }

        return $alquilercoche;
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>PLA02</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body>
        <main>
            <h1 class='centrar'>PLA02: COSTE HOTEL</h1>
            <br>
            <form method="post" action="#">
                <div class="row mb-3">
                    <label for="noches" class="col-sm-3 col-form-label">Número de noches:</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="noches" id="noches">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ciudad" class="col-sm-3 col-form-label">Destino:</label>
                    <div class="col-sm-9">
                        <select class="form-select" name='ciudad'>
                            <option selected value=''>Selecciona un destino</option>
                            <option>Madrid</option>
                            <option>Paris</option>
                            <option>Los Angeles</option>
                            <option>Roma</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="coche" class="col-sm-3 col-form-label">Días alquiler coche:</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="coche" id="coche">
                    </div>
                </div>
                <label class="col-sm-3 col-form-label"></label>
                <button type="submit" class="btn btn-primary" name='enviar'>Enviar datos</button>
                <button type="submit" class="btn btn-primary">Limpiar</button>
                <br><br>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Coste total: </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="total" id="total" disabled
                      value="<?php echo $total; ?>">
                    </div>
                </div><br>
                <span class='errores'>
                    <?php
                        for ($i = 0; $i < count($errores); $i++) {
                            echo $errores[$i];
                            echo "<br>";
                        }
                    ?>
                    <br>
                </span>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>