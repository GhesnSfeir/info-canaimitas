<h1 class="text-center">Preguntas frecuentes</h1>

<div class="col-md-10 col-md-offset-1">

    <div id="subContenido" class="tab-content">

        <div id="accordion" class="panel-group" >
         
        </div>
    </div>

</div>




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
                $('#subContenido div#accordion').append(resultado);
            }
        }); 
    }


    $(document).ready(function()
    {
        GetListFaq();
    });

</script>