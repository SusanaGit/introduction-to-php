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
    //en la etiqueta tr búscame dentro
    let nif = tr.querySelector('.nif').innerText
    let nombre = tr.querySelector('.nombre').value
    let direccion = tr.querySelector('.direccion').value

    console.log(nif, nombre, direccion)
	
	//trasladar los datos al formulario oculto
    // quiero enviar los datos del nif, nombre y direccion al formulario
    document.querySelector('#nifModi').value = nif
    document.querySelector('#nombreModi').value = nombre
    document.querySelector('#direccionModi').value = direccion

	//submit del formulario
    // enviar el formulario al servidor
    document.querySelector('#formularioModi').submit()
	
}