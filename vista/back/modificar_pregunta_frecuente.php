<h1 class="text-center">Nueva pregunta frecuente</h1>
<form class="form-horizontal" role="form">

    <div class="row">
        <div class="form-group">
            <div class="col-md-4">
                <label for="nuevaPregunta">Pregunta: </label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="nuevaPregunta" placeholder=" Pregunta a modificar "> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <div class="col-md-4">
                <label for="nuevaRespuesta">Respuesta: </label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control" rows="3" id="nuevaRespuesta" placeholder=" Respuesta a modificar "></textarea>
            </div>
        </div>
    </div>
    
    <div class="row">
        <Div  class = "checkbox" > 
            <label> 
                <input  type = "checkbox"  value = "" > Visible
            </label> 
        </div>
    </div>
    
    <div class="row">
            <button type="submit" class="btn btn-default">Guardar</button>
            <button type="submit" class="btn btn-default">Cancelar</button>
    </div>
</form>
