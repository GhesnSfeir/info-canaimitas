<h1 class="text-center">&#191;Olvid&oacute; su contrase&ntilde;a?</h1> 

<!--Dos columnas de margen (una de cada lado)-->
<div class="col-md-8 col-md-offset-2"> 
    <form class="form-horizontal" role="form"> 
        <p class="text-justify">Paso 1 de 3: ¿Olvidó su contraseña? Escriba a
           continuación la dirección de correo electrónico con la que fue registrado y le 
           enviaremos las instrucciones para su restablecimiento.</p>
     <div class="col-md-offset-1"> 
        <div class="form-group">  
            <div class="col-md-6">
                <label for="correo" class="control-label">Introduzca su Correo: </label>
            </div>
            <div class="col-md-6">
                <input type="email" id="correo" name="correo" class="form-control">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6">
                <label for="captcha"> Escriba los caracteres de la im&aacute;gen</label>
            </div>
            <div class="col-md-6">
                 <input type="text" id="captcha" name="captcha" class="form-control">
                
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6">
                <img alt="100x100" src="http://lorempixel.com/140/140/" />
            </div>
        </div>
         
     </div>

        <div class="form-group">
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-default pequeno" onclick="cargarContenido('olvido_contrasena_paso2.php')">Aceptar</button>
            </div>
        </div>     
    </form>
</div>
