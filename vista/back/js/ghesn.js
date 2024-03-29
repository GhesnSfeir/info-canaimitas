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
            document.getElementById('menu-principal').innerHTML = '';
        }
    }

    xmlhttp.send();
    
}

function obtenerNombreUsuario() {
    
    var xmlhttp = new XMLHttpRequest();
    var url = 'scripts/obtener_nombre_usuario.php';

    xmlhttp.open('GET', url, false);
    xmlhttp.send();
    
    return xmlhttp.responseText;
    
}

function obtenerTipoUsuario() {
    
    var xmlhttp = new XMLHttpRequest();
    var url = 'scripts/chequear_sesion.php';

    xmlhttp.open('GET', url, false);
    xmlhttp.send();
    
    return xmlhttp.responseText;
}

function chequearSesion() {
    
    var tipoUsuario = obtenerTipoUsuario();
    
    if (tipoUsuario == "administrador") {
        $('#contenido').load('inicio-administrador.php');
        if (document.getElementById('menu-principal').innerHTML == '') {
            $('#menu-principal').load('menu_administrador.php');
        }
    }
    else if (tipoUsuario == "gestor") {
        $('#contenido').load('inicio-gestor.php');
        if (document.getElementById('menu-principal').innerHTML == '') {
            $('#menu-principal').load('menu_gestor.php');
        }
    }
    else {
        $('#contenido').load('iniciar_sesion.php');
        document.getElementById('menu-principal').innerHTML = '';
    }
    
}

function clickNavMenu(elemento, pagina) {
    
    cargarContenido(pagina);
    $(elemento).parent().parent().find('.active').removeClass('active');
    $(elemento).parent().addClass('active');
    
}

function clickNavSubMenu(elemento, pagina) {
    
    cargarContenido(pagina);
    $(elemento).parent().parent().parent().parent().find('.active').
        removeClass('active');
    $(elemento).parent().parent().parent().addClass('active');
    
}

String.prototype.empiezaCon = function (str){
        return this.indexOf(str) == 0;
};