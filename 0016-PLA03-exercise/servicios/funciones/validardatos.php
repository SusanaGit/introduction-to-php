<?php 

    //FUNCION DE VALIDACION DE DATOS COMUNES
use exception\ValidarDatosException;

function validarDatos($nif, $nombre, $direccion) {

        $errores = [];

        if (empty($nif)) {
            $errores[] = "Nif obligatorio";
        }

        if (empty($nombre)) {
            $errores[] = "Nombre obligatorio";
        }

        if (empty($direccion)) {
            $errores[] = "Direccion obligatorio";
        }

        // lanzo la excepción si el array errores no está vacío
        if (sizeof($errores)) {
            throw new ValidarDatosException($errores);
        }

	}
