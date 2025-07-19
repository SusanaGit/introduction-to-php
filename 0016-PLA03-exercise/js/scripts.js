//definir función para trasladar los datos de la persona a modificar al formulario oculto
function trasladarDatos(event) {

    console.log("función trasladarDatos activada");
    console.log(event.target);

    // voy al navegador y abro la consola con F12 para ver qué botón he pulsado
    console.log(event.target)

    let botonPulsado = event.target

	//situarnos en la etiqueta tr que corresponda a la fila donde se encuentra el botón
    // buscar la etiqueta tr más cercana al button
    let tr = botonPulsado.closest('tr')

    console.log(tr)

	//recuperar los datos de la persona
	
	//trasladar los datos al formulario oculto

	//submit del formulario
	
}