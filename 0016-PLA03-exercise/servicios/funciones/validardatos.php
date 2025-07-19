<?php 

    //FUNCION DE VALIDACION DE DATOS COMUNES
	function validarDatos($nif, $nombre, $direccion) {

		try {
			// validar NIF
            if (empty($nif)) {
                throw new Exception("NIF obligatori.");
            }

            // validar nombre
            if (empty($nombre)) {
                throw new Exception("Nom obligatori.");
            }

            // validar direccion
            if (empty($direccion)) {
                throw new Exception("Dirección obligatoria.");
            }
			
		} catch (Exception $error) {
			//relanzar la excepción
			throw new Exception($error->getMessage());
		}
	}
?>