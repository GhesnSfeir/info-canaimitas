<script type="text/javascript">
    function desactivar(email) {
        
        var mensaje = '¿Seguro de que desea cambiar el estado de la cuenta de '+
                'usuario "' + email + '"?';
        if (confirm(mensaje)) {
            
            var xmlhttp = new XMLHttpRequest();
            var parametros = 'email=' + email;
            var url = 'scripts/desactivar_usuario.php';
            
            xmlhttp.open('POST', url, true);

            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    respuesta = xmlhttp.responseText;
                    alert(respuesta);
                    buscarUsuarios();
                }
            }

            xmlhttp.send(parametros);
            
        }
        else {
            
            buscarUsuarios();
            
        }
    }
    
    function buscarUsuarios() {
        
        var respuesta = '';
        var tabla = document.getElementById('tabla');
        var xmlhttp = new XMLHttpRequest();
        var parametros = 'busqueda=' + document.getElementById('inptSearch').value;
        var url = 'scripts/consultar_usuarios.php';
        
        xmlhttp.open('POST', url, true);
        
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                respuesta = xmlhttp.responseText;
                tabla.innerHTML = respuesta;
            }
        }
        
        xmlhttp.send(parametros);
    }
    
    
</script>
<h1 class="text-center">Usuarios</h1>

<div class="navbar">
    <ul id="search" class="nav">
        <li>
            <form class="navbar-form" role="search" action="javascript: buscarUsuarios();">
                <div class="form-group">
                    <input id="inptSearch" type="text" class="form-control" placeholder="Buscar" autofocus>
                </div>
                <button id="btnSearch" type="submit" class="btn btn-default">
                    <img class="glyphicon" src="../fonts/glyphicons_search.png">
                </button>
            </form>

        <li>
            <button id="btnNew" class="btn btn-default" onclick="cargarContenido('agregar_cuenta_usuario.php')">
                <img class="glyphicon search" src="../fonts/glyphicons_plus.png">
                <label class="between-margin-left">Nuevo</label>
            </button>

        </li>
    </ul>

</div>

<div id="tabla"></div>


<script type="text/javascript">



    function GetUsers()
    {
        $.get("scripts/USERS-cargar-usuarios.php", function(resultado){
            console.log("Recibo: ");
            if(resultado == false)
            {
                console.log("resultado");
                alert("Error");
            }
            else
            {   
                $('#table').find('tbody').append(resultado);            
                $('#table').find('tbody').append('</tr>'); 

            }
        }); 
    }

    $(document).ready(function()
    {
        //GetUsers();
        //$('input[type="checkbox"]').checkbox();
        buscarUsuarios();
    });


    

</script>