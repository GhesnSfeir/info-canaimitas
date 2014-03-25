<h1 class="text-center">Preguntas frecuentes</h1>

<br/><br/>



<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
	    <li><a id="first" data-toggle="tab" onclick="cargarContenido('preguntas_frecuentes_seccion_1.php')">Preguntas Frecuentes</a></li>
	    <li><a id="second" data-toggle="tab">Exprese su(s) duda(s)</a></li>
	</ul>
	<div class="tab-content">
	</div>
</div>


<script type="text/javascript">



    $('.nav-tabs li a').on('click', function() {
                $(this).parent().parent().find('.active').removeClass('active');
                $(this).parent().addClass('active');
            });

    $(document).ready(function()
    {
    	//
    	//$('.nav-tabs #first').parent().click();
    	    	$('.nav-tabs #first').parent().addClass('active').click();
    });





</script>