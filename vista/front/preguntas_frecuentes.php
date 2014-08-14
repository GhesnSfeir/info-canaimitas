<h1 class="text-center">Preguntas frecuentes</h1>

<div id="subContenido" class="col-md-8 col-md-offset-2 ">

    <div class="tab-content overflowY subSubContenido">

        <div id="accordion" class="panel-group" >
         
        </div>
    </div>

    <div class="col-md-2 col-md-offset-10 noPadding">
        <button id="agregarFaq" class="btn btn-default float-right "
                onclick="cargarContenido('pregunta_frecuente.php')">
            <img class="glyphicon " src="../fonts/glyphicons_plus.png"></img>
            <label class="between-margin-left">Pregunta</label>

        </button>

    </div>

</div>





<script type="text/javascript">

    $('.collapse').collapse();

    function GetListFaq()
    {
        $.get("scripts/S_FAQ.php", function(resultado)
        {
            if(resultado == false)
            {
                console.log("resultado", resultado);
            }
            else
            {   
                $('div#accordion').append(resultado);
            }
        }); 
    }


    $(document).ready(function()
    {
        GetListFaq();
    });

</script>