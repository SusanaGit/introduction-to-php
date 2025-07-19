<?php

session_start();

    //incorporar función validación
    require_once('funciones/validardatos.php');

    //incorporo ValidarDatosException
    require_once('../exception/ValidarDatosException.php');
	
    //recuperar las personas del array
    if (isset($_SESSION['datos'])) {
        $personas = $_SESSION['personas'];
    }
    
    //recuperar los datos sin espacios en blanco -trim()-
    $nif = $_POST['nif'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    
    try {
        //validar datos obligatorios
        validarDatos($nif, $nombre, $direccion);
       
        //validar que el nif no exista en la base de datos
        
        //guardar la persona en el array
       
        //mensaje de alta efectuada

        //limpiar el formulario

    } catch (ValidarDatosException $errores) {
        // capturo los mensajes de error
        $erroresCapturados = $errores->getErrores();

        // imprimo los errores
        for ($i = 0; $i < count($erroresCapturados); $i++) {
            echo $erroresCapturados[$i];
        }
    }

    //compactaremos en un array las variables php que se muestran en el documento HTML y que correspondan a la operativa de alta
    
    //Trasladar el contenido del array $personas a la variable de sesión
    $_SESSION['personas'] = $personas;
   
    //Retornar a la página principal
    