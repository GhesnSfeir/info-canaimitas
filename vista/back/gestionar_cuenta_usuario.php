<script type="text/javascript">
    function cargarDatos() {
        
        var nombre = obtenerNombreUsuario();
        
        $('#usuario').val(nombre);
    }
    
    function modificarUsuario() {
        
        if (document.getElementById('clave1').value != 
            document.getElementById('clave2').value) {
            
            alert("¡Error!\n\nLas claves introducidas no coinciden.");
            document.getElementById('clave1').focus();
            
        }
        else {
            
            var nombre = document.getElementById('usuario').value;
            var clave = document.getElementById('clave1').value;
            var parametros = 'nombre=' + nombre + '&clave=' + clave;
            var xmlhttp = new XMLHttpRequest();
            var url = 'scripts/modificar_usuario.php';

            xmlhttp.open('POST', url, false);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText.empiezaCon('¡Error!')) {
                        alert(xmlhttp.responseText);
                    }
                    else {
                        alert(xmlhttp.responseText);
                        chequearSesion();
                    }
                }
            }

            xmlhttp.send(parametros);
        }
    }
    
    cargarDatos();
</script>
<h1 class="text-center">Gestionar cuenta de Usuario</h1>

<br/>
<div>

    <form class="form-horizontal" role="form" action="javascript: modificarUsuario();">
        
        <div class="col-md-3">
        </div>
        
        <div class="col-md-6">
            <div class="row">
                 <div class="col-md-4 text-right">
                      <label for="usuario">Nombre: </label>
                 </div>
                 <div class="col-md-5">
                     <input type="text" class="form-control" id="usuario" maxlength="99" required> 
                 </div>
            </div>
            <br/>
            <div class="row">
                     <div class="col-md-4 text-right">
                          <label for="clave1">Nueva Clave: </label>
                     </div> 
                     <div class="col-md-5">
                         <input type="password" class="form-control" id="clave1" required>
                     </div>
            </div> 
            <br/>
            <div class="row">
                     <div class="col-md-4 text-right">
                          <label for="clave2">Confirmar Clave: </label>
                     </div> 
                     <div class="col-md-5">
                         <input type="password" class="form-control" id="clave2" required>
                     </div>
            </div> 

            <br/><br/>
            <div class="row row-custom">
                <ul class="row-inline">
                    <li>
                        <button id="cancelar" type="button" class="btn btn-default" onclick="chequearSesion()">Cancelar</button>
                    </li>
                    <li> 
                        <button id="guardar" class="btn btn-default">Guardar</button>
                    </li>
            </div>
    </form>
</div>