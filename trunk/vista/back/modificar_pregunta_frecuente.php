<script type="text/javascript">
    function modificarPreguntaFrecuente() {
        
        var id = document.getElementById('idFAQ').value;
        var pregunta = document.getElementById('pregunta').value;
        var respuesta = document.getElementById('respuesta').value;
        var parametros = 'pregunta=' + pregunta + '&respuesta=' + respuesta + '&id=' + id;
        var xmlhttp = new XMLHttpRequest();
        var url = 'scripts/modificar_pregunta_frecuente.php';

        xmlhttp.open('POST', url, false);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
                if (!xmlhttp.responseText.empiezaCon('¡Error!')) {
                    cargarContenido('preguntas_frecuentes.php');
                }
            }
        }

        xmlhttp.send(parametros);
    }
</script>
<h1 class="text-center">Modificar pregunta frecuente</h1>

<br/>
<input type="hidden" id="idFAQ">
<form class="form-horizontal" role="form" action="javascript: modificarPreguntaFrecuente();"> 
    
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