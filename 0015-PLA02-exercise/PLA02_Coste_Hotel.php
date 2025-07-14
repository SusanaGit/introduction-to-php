<?php
	// CONSTANTES

    // inicializar las variables que utilicemos en el documento html
    $noches = 0;
    $ciudad = '';
    $coche = 0;
    $total = 0;

    // datos que tiene el servidor
    // print_r: para visualizar contenido de un array
    // las claves coinciden con el valor que hemos dado a los atributos name del formulario
    print_r($_POST);

    // ver si existe el índice del array del servidor 'enviar'
    if (isset($_POST['enviar'])) {
        // recoger los tres datos del formulario (noches, ciudad, coche)
        try {
            // validación de datos
            $noches = $_POST['noches'] ?? null;
            $ciudad = $_POST['ciudad'] ?? null;
            $coche = $_POST['coche'] ?? null;

            if (empty($noches) || !is_numeric($noches) || $noches < 0) {
                throw new Exception("Noches debe ser numérico y mayor que 0.");
            }

            if (empty($ciudad)) {
                throw new Exception("Se debe seleccionar una ciudad.");
            }

            if (empty($coche) || !is_numeric($coche) || $coche < 0 ) {
                throw new Exception("Se deben seleccionar los días de alquiler.");
            }

            $costeHotel = costeHotel($noches);
            $costeVuelo = costeCiudad($ciudad);
            $costeCoche = costeCoche($coche);

            $costeTotal = $costeHotel + $costeVuelo + $costeCoche;
        } catch (Exception $e) {
            echo $e -> getMessage();
        }
    }

    // devolver el precio total del hotel, considerando que cada noche cuesta 60 euros
    function costeHotel(int $noches) : int{
        return $noches * 60;
    }

    // devolver el precio del avión según la ciudad
    function costeCiudad(int $ciudad) : int{
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

    // devolver el precio del alquiler del coche
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
            <button type="reset" class="btn btn-primary">Limpiar</button>
            <br><br>
		  	<div class="row mb-3">
			    <label class="col-sm-3 col-form-label">Coste total: </label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="total" id="total" disabled>
			    </div>
			</div><br>
			<span class='errores'>

            </span>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>