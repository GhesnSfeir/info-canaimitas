<script type="text/javascript">
    function crearUsuario() {
        
        var xmlhttp = new XMLHttpRequest();
        var parametros = 'email=' + document.getElementById('email').value;
        parametros = parametros + '&nombreUsuario=' + document.getElementById('usuario').value;
        parametros = parametros + '&clave=' + document.getElementById('clave').value;
        var url = 'scripts/crear_nuevo_usuario.php' + '?' + parametros;
        
        xmlhttp.open('GET', url, true);
        
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
                $("#contenido").load("usuarios.php");
            }
        }
        
        xmlhttp.send(parametros);
    }
</script>
<h1 class="text-center">Agregar Usuario</h1>
<br/>
<div>

    <form id="formulario" class="form-horizontal" role="form">
        
        <div class="col-md-3">
        </div>
        
        <div class="col-md-6">
            <div class="row">
                 <div class="col-md-4 text-right">
                      <label for="email">Correo Electr&oacute;nico: </label>
                 </div>
                 <div class="col-md-5">
                     <input type="text" class="form-control" id="email"> 
                 </div>
            </div>
            <br/>
            <div class="row">
                 <div class="col-md-4 text-right">
                      <label for="usuario">Nombre Completo: </label>
                 </div>
                 <div class="col-md-5">
                     <input type="text" class="form-control" id="usuario"> 
                 </div>
            </div>
            <br/>
            <div class="row">
                     <div class="col-md-4 text-right">
                          <label for="clave">Clave provisional: </label>
                     </div> 
                     <div class="col-md-5">
                         <input type="password" class="form-control" id="clave"> 
                     </div>
            </div> 

            <br/>
            <br/>
            <div class="row row-custom">
                <ul class="row-inline">
                    <li>
                    <button id="cancelar" class="btn btn-default">Cancelar</button>
                    </li>
                    <li> 
                    <button id="guardar" type="button" onclick="javascript: crearUsuario();" class="btn btn-default">Guardar</button>
                    </li>
                  
            </div>
    </form>
</div>




     