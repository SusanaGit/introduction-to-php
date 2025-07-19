<?php

    # el fichero index.php es el primero que se va a ejecutar
    # activo las variables de sesión
	session_start();

    # creo la variable de sesión si no está creada
    # hasta que no cerremos el navegador va a estar activa
    $datos = $_SESSION['datos'] = [
        'mensajes' => '',
        'nif' => '',
        'nombre' => '',
        'direccion' => '',
        'personas' => []
    ];

    # para cargar el archivo personas.php que es donde tenemos el formulario
    # redirige: desde index directamente vamos a personas.php
    header("Location: personas.php");

	//eliminar datos de accesos anteriores


	//acciones a realizar al entrar en la aplicación
