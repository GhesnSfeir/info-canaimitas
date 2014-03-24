
<form class="form-horizontal" role="form"> 
    <div class="form-group">
        <label for="nuevaPregunta" class="col-md-4 control-label">Motivo: </label>
        <input type="text" id="nuevaPregunta" name="nuevaPregunta" class="form-control largo">
    </div>
    
    <div class="form-group">
        <label for="nuevaRespuesta" class="col-md-4 control-label">Respuesta: </label>
        <textarea class="form-control largo" rows="3" id="nuevaRespuesta" placeholder="Comentario al respecto"></textarea>
    </div>

    <br/>
    <div class="form-group block">
        <button type="submit" class="btn btn-default pequeno">Guardar</button>
        <button type="button" class="btn btn-default pequeno" onclick="cargarContenido('inicio.php')">Cancelar</button>
    </div>  
</form>



<script type="text/javascript">

    function GetListFaq()
    {
        $.get("scripts/FAQ-cargar-faq.php", function(resultado){
            console.log("Recibo: ");
            if(resultado == false)
            {
                console.log("resultado");
                alert("Error");
            }
            else
            {   
                $('#faq').append(resultado);
            }
        }); 
    }


    $(document).ready(function()
    {
        GetListFaq();
    });

</script>