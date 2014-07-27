<h1 class="text-center">Nuevo Recurso</h1>

<br/>

<form class="form-horizontal" role="form">


<div class="row"> <!-- Parte A -->

    <!--Lado izquierdo del formulario-->
    <div class="col-md-6">
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 text-right">
                    <label for="titulo" class="control-label">T&iacute;tulo: </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="titulo"> 
                </div>
            </div>
        </div>
        
         <div class="row">
            <div class="form-group">
                <div class="col-md-4 text-right">
                    <label for="grado" class="control-label">Grado: </label>
                </div>
                <div class="col-md-8">
                    <select class="form-control selectpicker" id="grado" 
                            name="grado" title="Nivel(es)"
                            multiple data-selected-text-format="count>3">
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
                <div class="col-md-4 text-right">
                    <label for="asignatura" class="control-label">Asignatura: </label>
                </div>
                <div class="col-md-8">
                    <select class="form-control selectpicker" id="asignatura" 
                            name="asignatura" title="Asignatura(s)"
                            multiple data-selected-text-format="count>3">
                        <option>Ciencias</option>
                        <option>Educaci&oacute;n Social</option>
                        <option>Educaci&oacute;n del Trabajo</option>
                        <option>F&iacute;sica</option>
                        <option>Qu&iacute;mica</option>
                        <option>Lenguaje</option>
                        <option>Matem&aacute;ticas</option>
                        
                    </select>
                </div>
            </div>
        </div>
               
        <div class="row">
            <div class="form-group">
                <div class="col-md-4 text-right">
                    <label for="tipo">Formato: </label>
                </div>
                <div class="col-md-8">
                    <select class="form-control selectpicker" 
                            id="formato" name="formato">
                        <option>JClic</option>
                        <option>PDF</option>
                        <option>Video</option>
                        <option>Otro</option>
                    </select>                
                </div>
            </div>
        </div>
    </div>


<!--Lado derecho del formulario-->
    <div class="col-md-6">
        <div class="row">
            <div class="form-group">
                <div class="col-md-4" align="right">
                    <label for="temas">Temas: </label>
                </div>
                <div class="col-md-8">
                    <input  class="form-control" id="temas" 
                            type="text"
                            data-role="tagsinput" 
                            placeholder="Tema(s)" 
                            /> 
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group">
                <div class="col-md-4" align="right">
                    <label for="autor">Autor: </label>
                </div>
                <div class="col-md-8">
                    <input  class="form-control" id="autor" 
                            type="text"
                            data-role="tagsinput" 
                            placeholder="Autore(s)" 
                            /> 
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4" align="right">
                
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

</div> <!--     Fin parte A -->

<div class="row">
    <hr style="border-width:2px;">
</div>

<div class="row"> <!--     Parte B -->

    <div class="col-md-6">

            <div class="row">
                <div class="col-md-12" align="center">
                    <h3>Recomendaciones </h3><br>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4" align="right">
                        <label for="recomendacion1" >1. </label>
                    </div>
                    <div class="col-md-8">
                        <input  class="form-control" id="recomendacion" 
                                type="text"
                                /> 
                    </div>
                </div>
            </div>
         
            <div class="row" >
                    <div id="camposRecomendacion"> </div>
            </div>
            
            <div class="row">
                <br></br>
                <div class="col-md-12" align="right">
                    <button type="button" class="btn btn-default btn-sm" onclick="agregarRecomendacion();">
                        <span class="glyphicon glyphicon-plus"></span> Agregar Recomendaci&oacute;n
                    </button>
                </div>
            </div>
           
           
    </div>

    <div class="col-md-6">

            <div class="row">
                <div class="col-md-12" align="center">
                    <h3>Ruta de acceso</h3><br>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4" align="right">
                        <label for="ruta1" >1. </label>
                    </div>
                    <div class="col-md-8">
                        <input  class="form-control" id="ruta" 
                                type="text"
                                /> 
                    </div>
                </div>
            </div>
         
            <div class="row" >
                    <div id="campos"> </div>
            </div>
            
            <div class="row">
                <br></br>
                <div class="col-md-12" align="right">
                    <button type="button" class="btn btn-default btn-sm" onclick="agregarCampos();">
                        <span class="glyphicon glyphicon-plus"></span> Agregar Campos
                    </button>
                </div>
            </div>
           

    </div>
    

    
 </div>  <!--     Fin parte B -->
    
   <br><br><br>
<div class="row">
    <div class="col-md-12" align="center">
        <button type="submit" class="btn btn-default">Guardar</button>
        <button type="submit" class="btn btn-default">Cancelar</button>
    </div>
</div>
            
</form>


<script type="text/javascript">
    $('input').tagsinput({

      typeahead: {
        source: function(query) {
          source: ['amsterda1m@dd.com']
        }
      }
    });
</script>

<script type="text/javascript"> 
    
    $('.selectpicker').selectpicker({
      size: 4
  });
</script>
