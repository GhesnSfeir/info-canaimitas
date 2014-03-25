<h1 class="text-center">Nuevo Recurso</h1>
<form class="form-horizontal" role="form">

    <div class="col-md-6">
        <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="titulo">T&iacute;tulo: </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="titulo"> 
                </div>
            </div>
        </div>
        
         <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="grado">Grado: </label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="grado" name="grado">
                        <option>Todos</option>
                        <option>1ro</option>
                        <option>2do</option>
                        <option>3ro</option>
                        <option>4to</option>
                        <option>5to</option>
                        <option>6to</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="asignatura">Asignatura: </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="asignatura"> 
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="temas">Temas: </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="temas"> 
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="tipo">Tipo: </label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" id="tipo" name="tipo">
                        <option>Cualquiera</option>
                        <option>Video</option>
                        <option>PDF</option>
                        <option>JClic</option>
                    </select>                
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="autor">Autor: </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="autor"> 
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4" align="left">
                
            </div>
        
            <div class="col-md-8" >
                <button type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-plus"></span> Agregar Caracterizaci&oacute;n
               </button>
                <button type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-plus"></span> Agregar Recurso
               </button>
            </div>
            </div>
    </div>
     
<!--Lado izquierdo del formulario-->
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-4" align="right">
                <label>Ruta de acceso: </label>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4" align="right">
                    <label for="ruta1" >1. </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="ruta1"> 
                </div>
            </div>
        </div>
     
            <div class="row" >
                <div id="campos"> </div>
            </div>
        
        <div class="row">
            <br></br>
            <div class="col-md-4" align="right">
                <button type="button" class="btn btn-default btn-sm" onclick="agregarCampos();">
                    <span class="glyphicon glyphicon-plus"></span> Agregar Campos
                </button>
            </div>
        </div>
       
        
        <div class="row">
            <div class="col-md-12" align="right">
                <button type="submit" class="btn btn-default">Guardar</button>
                <button type="submit" class="btn btn-default">Cancelar</button>
            </div>
        </div>
        
    </div>
    
   
    
   
</form>
