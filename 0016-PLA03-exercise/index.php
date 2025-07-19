<?php

    # el fichero index.php es el primero que se va a ejecutar
    # activo las variables de sesión
	session_start();

    # creo la variable de sesión, que hasta que no cerremos el navegador va a estar activa
    $_SESSION['datos'] = [];

    # para cargar el archivo personas.php que es donde tenemos el formulario
    # redirige: desde index directamente vamos a personas.php
    header("Location: personas.php");

	//eliminar datos de accesos anteriores


	//acciones a realizar al entrar en la aplicación
