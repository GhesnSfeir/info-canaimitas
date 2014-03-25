<h1 class="text-center">Registrarse</h1>
<div class="row">
    <div class="col-md-3"></div>
    
    <div class="col-md-6">
        <form class="form-horizontal">
            
           <div class="form-group">
                <label for="nombre" class="col-md-5 control-label">Nombre: </label>
                <input type="text" id="nombre" name="nombre" class="form-control mediano">
            </div>
            
            <div class="form-group">
                <label for="apellido" class="col-md-5 control-label">Apellido: </label>
                <input type="text" id="apellido" name="apellido" class="form-control mediano">
            </div>
            
            <div class="form-group">
                <label for="email" class="col-md-5 control-label">E-mail: </label>
                <input type="text" id="email" name="email" class="form-control mediano">
            </div>
            <div class="form-group">
                <label for="sexo" class="col-md-5 control-label">Sexo: </label>
                <select id="sexo" name="sexo" class="form-control mediano">
                    <option>Femenino</option>
                    <option>Masculino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento" class="col-md-5 control-label">Fecha de nacimiento: </label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control mediano">
            </div>
            <div class="form-group">
                <label for="contrasena" class="col-md-5 control-label">Contrase&ntilde;a: </label>
                <input type="password" id="contrasena" name="contrasena" class="form-control mediano">
            </div>
            <div class="form-group">
                <label for="verificar_contrasena" class="col-md-5 control-label">Verificar contrase&ntilde;a: </label>
                <input type="password" id="verificar_contrasena" name="verificar_contrasena" class="form-control mediano">
            </div>
            <br>
            <div class="form-group">
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-default pequeno">Registrarse</button>
                </div>
                <div class="col-md-6 text-left">
                    <button type="button" class="btn btn-default pequeno">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="col-md-3"></div>
</div>