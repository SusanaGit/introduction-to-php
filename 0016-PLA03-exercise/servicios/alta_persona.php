<?php

session_start();

    //incorporar función validación
    require_once('funciones/validardatos.php');

    //incorporo ValidarDatosException
    require_once('../exception/ValidarDatosException.php');
	
    //recuperar las personas del array
    $datos = $_SESSION['datos'];
    $personas = $datos['personas'];
    
    //recuperar los datos sin espacios en blanco -trim()-
    $nif = trim($_POST['nif'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    
    try {
        //validar datos obligatorios
        validarDatos($nif, $nombre, $direccion);
       
        //validar que el nif no exista en la base de datos
        if (array_key_exists($nif, $personas)) {
            throw new ValidarDatosException(["El NIF ya existe."]);
        }
        
        //guardar la persona en el array
        $personas[$nif] = [
            'nombre' => $nombre,
            'direccion' => $direccion
        ];

        //mensaje de alta efectuada
        $mensajes = $datos['mensajes'] ?? '';
        $mensajes = "Alta efectuada";

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
    $_SESSION['datos'] = [
        'mensajes' => $mensajes,
        'nif' => $nif,
        'nombre' => $nombre,
        'direccion' => $direccion,
        'personas' => $personas
    ];

    $datos['personas'] = $personas;
   
    //Retornar a la página principal
    header("Location: ../personas.php");
    