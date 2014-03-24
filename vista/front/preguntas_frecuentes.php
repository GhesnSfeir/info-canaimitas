<h1 class="text-center">Preguntas frecuentes</h1>

<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
	    <li><a id="first" data-toggle="tab" onclick="cargarSubContenido('preguntas_frecuentes_I.php')">Preguntas Frecuentes</a></li>
	    <li><a id="second" data-toggle="tab" onclick="cargarSubContenido('preguntas_frecuentes_II.php')">Exprese su(s) duda(s)</a></li>
	</ul>
	<div id="subContenido" class="tab-content">

	</div>
</div>


<script type="text/javascript">

    $('.nav-tabs li a').on('click', function() {
                $(this).parent().parent().find('.active').removeClass('active');
                $(this).parent().addClass('active');
            });

    $(document).ready(function()
    {
    	$('.nav-tabs #first').parent().addClass('active');
        $('#first').click();

    });

</script>