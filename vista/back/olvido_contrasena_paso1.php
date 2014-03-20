<h1 class="text-center">&#191;Olvid&oacute; su contrase&ntilde;a?</h1>
<form class="form-horizontal" role="form">
    
    <div class="col-md-3">
    </div>
    
    <div class="col-md-6">
        <div class="panel-body">
            <p>Paso 1 de 3: ¿Olvidó su contraseña? No es un problema. Simplemente escriba a 
               continuación la dirección de correo electrónico con la que se registró y le 
               enviaremos las instrucciones para su restablecimiento.
            </p>          
        </div>

        <div class="form-group">
            <div class="row">
                <label for="correo"> Introduzca su Correo: </label>
            </div>
            <div class="row"> 
                <input type="email"  class="form-control" id="correo">             
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <label for="captcha"> Por favor, escriba las palabras que aparecen en la im&aacute;gen captcha</label>
            </div>
            <div class="row">
                <input type="text"  class="form-control" id="captcha">    
            </div>
        </div>

        <div class="row">
             <button type="button" class="btn btn-default" onclick="cargarContenido('olvido_contrasena_paso2.php')"> Aceptar</button>
        </div>
        
    </div>
    <div class="col-md-3">
    </div>
    
</form>
