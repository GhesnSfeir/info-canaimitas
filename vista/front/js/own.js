
var mensajeCamposIncompletos = "Por favor, ingrese lo(s) dato(s) necesario(s).";
var mensajeError = "No se ha podido completar su solicitud, intente luego.";
var mensajeExitoso = "Se ha realizado la operaci'on correctamente";



function cargarContenido(archivo) {
	$("#contenido").load(archivo);
       // inicializarVariables();
}


function validarVacioEspacios(campo)
{
	var reEspacios = "^\s*$/";
	estado = false;

	if (campo.match(reEspacios))
	{
		estado = true;
	}

	return estado;
}

function validarTextoNumerico(campo)
{
	//var RegExPatternPass = /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/;
	var rePatron = /^[^\s][a-zA-Z0-9\,\.-_!\/\s¿?():<>@$#&\*\+%{}"']{50,1000}$/;
    
    var mensajeError = 'Caracteres no validos';
    var estado = false;

    if (!validarVacioEspacios(campo))
    {
	    if ((!campo.match(rePatron)) && (campo!='')) 
	    {
	        estado = true;
	    } else {
	        alert(mensajeError);
	    } 
	}
	return estado;
}