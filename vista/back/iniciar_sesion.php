<script type="text/javascript">
    function iniciarSesion() {
        
        var email = document.getElementById('email').value;
        var clave = document.getElementById('clave').value;
        var respuesta = '';
        var xmlhttp = new XMLHttpRequest();
        var parametros = 'email=' + email + '&clave=' + clave;
        var url = 'scripts/iniciar_sesion.php';
        
        xmlhttp.open('POST', url, true);
        
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        //xmlhttp.setRequestHeader('Content-length', parametros.length);
        //xmlhttp.setRequestHeader('Connection', 'close');
        
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                respuesta = xmlhttp.responseText;
                if (respuesta.empiezaCon('¡Error!')) {
                    alert(respuesta);
                }
                else {
                    $("#contenido").load("inicio.php");
                }
            }
        }
        
        xmlhttp.send(parametros);
    }
    
    
</script>
<h1 class="text-center">Administraci&oacute;n de InfoCanaimitas</h1>  

<br/>

<div class="col-md-3"></div>

<div class="col-md-6">
    <form class="form-horizontal" role="form" action="javascript: iniciarSesion();"> 
        <div class="form-group">
            <label for="email" class="col-md-5 control-label">Email: </label>
            <input type="email" id="email" name="email" class="form-control mediano" required maxlength="99" autofocus>
        </div>
        
        <div class="form-group">
            <label for="clave" class="col-md-5 control-label">Clave: </label>
            <input type="password" id="clave" name="clave" class="form-control mediano">
        </div>
        
        <div class="form-group">
            <div class="col-md-9 text-right">
                <a onclick="cargarContenido('olvido_contrasena_paso1.php')">Olvid&eacute; mi clave</a> 
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-default pequeno">Iniciar sesi&oacute;n</button>
            </div>
        </div>     
    </form>
</div>

<div class="col-md-3">
</div>