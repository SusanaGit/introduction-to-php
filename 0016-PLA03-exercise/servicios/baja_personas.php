<?php 
    session_start();

    //recuperar las personas del array
    if (isset($_SESSION['personas'])) {
        $personas = $_SESSION['personas'];
    }

	//inicializar el array

    //compactaremos en un array el array vacio de personas
    
    //Trasladar el contenido del array $personas a la variable de sesión
    $_SESSION['personas'] = $personas;

    //Retornar a la página principal
