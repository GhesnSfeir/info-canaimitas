function cargarContenido(archivo) {
	$("#contenido").load(archivo);
        inicializarVariables();
}

function cerrarSesion() {
    
    var xmlhttp = new XMLHttpRequest();
    var url = 'scripts/cerrar_sesion.php';

    xmlhttp.open('GET', url, false);

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("#contenido").load('iniciar_sesion.php');
        }
    }

    xmlhttp.send();
    
}

function obtenerTipoUsuario() {
    
    var xmlhttp = new XMLHttpRequest();
    var url = 'scripts/chequear_sesion.php';

    xmlhttp.open('GET', url, false);

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
        }
    }

    xmlhttp.send();
    return xmlhttp.responseText;
}

function chequearSesion() {
    
    var tipoUsuario = obtenerTipoUsuario();
    
    if (tipoUsuario == "administrador") {
        $('#contenido').load('inicio.php');
    }
    else if (tipoUsuario == "gestor") {
        $('#contenido').load('inicio.php');
    }
    else {
        $('#contenido').load('iniciar_sesion.php');
    }
    
}

String.prototype.empiezaCon = function (str){
        return this.indexOf(str) == 0;
};