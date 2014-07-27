<h1 class="text-center">Preguntas frecuentes</h1>

<div class="col-md-8 col-md-offset-2" style="overflow-y:auto; height:400px;">

    <div id="subContenido" class="tab-content" >

        <div id="accordion" class="panel-group" >
         
        </div>
    </div>

</div>




<script type="text/javascript">

    $('.collapse').collapse();

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