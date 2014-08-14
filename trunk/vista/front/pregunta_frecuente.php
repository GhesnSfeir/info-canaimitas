<h1 class="text-center">Preguntas frecuentes</h1>

<div class="col-md-8 col-md-offset-2" style="overflow-y:auto; height:350px;">

    <form class="form-horizontal" role="form" action="javascript: crearPregunta();"> 

        <div class="form-group">
            <label for="nuevaPregunta" class="col-md-4 control-label">Pregunta: </label>
            <textarea class="form-control largo" rows="2" 
                        id="nuevaPregunta" placeholder="Comentario al respecto">
            </textarea>
        </div>

        <br/>
        <div class="form-group block">
            <button type="submit" class="btn btn-default pequeno">Guardar</button>
            <button type="button" class="btn btn-default pequeno" onclick="cargarContenido('preguntas_frecuentes.php')">Cancelar</button>
        </div>  
    </form>

</div>


<script type="text/javascript">

    function crearPregunta() 
    {
        
        var mensajeCamposIncompletos = "Por favor, complete el campo.";
        var mensajeError = "No se ha podido completar su solicitud, intente luego.";
        var mensajeExitoso = "Se ha realizado la operaci'on correctamente";

        var pregunta = $('#nuevaPregunta').val();
        
        
        if (pregunta!="")
        { 
            url = "scripts/S_FAQ.php";

            $.post(url, 
                    {pregunta:pregunta}, 
                    function(resultado)
                        {
                            alert(resultado);
                            if(resultado == false)
                            {
                                alert(mensajeError);
                            }
                            else
                            {           
                                alert(mensajeExitoso);
                            }
                        });
        }else
        {
            alert(mensajeCamposIncompletos);
        }
    }

</script>