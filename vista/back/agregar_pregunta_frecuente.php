<script type="text/javascript">
    function crearPreguntaFrecuente() {
        
        var respuesta = '';
        var xmlhttp = new XMLHttpRequest();
        var parametros = 'pregunta=' + document.getElementById('pregunta').value;
        parametros = parametros + '&respuesta=' + document.getElementById('respuesta').value;
        var url = 'scripts/crear_nueva_pregunta_frecuente.php';
        
        xmlhttp.open('POST', url, true);
        
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.setRequestHeader('Content-length', parametros.length);
        xmlhttp.setRequestHeader('Connection', 'close');
        
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                respuesta = xmlhttp.responseText;
                alert(respuesta);
                if (respuesta.empiezaCon('¡Enhorabuena!')) {
                    $("#contenido").load("preguntas_frecuentes.php");
                }
            }
        }
        
        xmlhttp.send(parametros);
    }
</script>
<h1 class="text-center">Nueva pregunta frecuente</h1> 

<br/>

<form class="form-horizontal" role="form" action="javascript: crearPreguntaFrecuente();"> 
    <div class="form-group">
        <label for="pregunta" class="col-md-4 control-label">Pregunta: </label>
        <input type="text" id="pregunta" name="pregunta" class="form-control largo" required maxlength="999" autofocus>
    </div>
    
    <div class="form-group">
        <label for="respuesta" class="col-md-4 control-label">Respuesta: </label>
        <textarea class="form-control largo" rows="3" id="respuesta" required maxlength="999"></textarea>
    </div>

    <br/>
    <div class="form-group block">
        <button type="submit" class="btn btn-default pequeno">Guardar</button>
        <button type="button" class="btn btn-default pequeno" onclick="cargarContenido('preguntas_frecuentes.php')">Cancelar</button>
    </div>  
</form>
