<script type="text/javascript">
    function cambiarEstado(id) {
        
        var mensaje = '¿Seguro de que desea cambiar el estado de la pregunta frecuente?';
        if (confirm(mensaje)) {
            
            var xmlhttp = new XMLHttpRequest();
            var parametros = 'id=' + id;
            var url = 'scripts/cambiar_estado_pregunta_frecuente.php';
            
            xmlhttp.open('POST', url, true);

            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    respuesta = xmlhttp.responseText;
                    alert(respuesta);
                    buscarPreguntasFrecuentes();
                }
            }

            xmlhttp.send(parametros);
            
        }
        else {
            
            buscarPreguntasFrecuentes();
            
        }
    }
    
    function buscarPreguntasFrecuentes() {
        
        var respuesta = '';
        var tabla = document.getElementById('tabla');
        var xmlhttp = new XMLHttpRequest();
        var parametros = 'busqueda=' + document.getElementById('inptSearch').value;
        var url = 'scripts/consultar_preguntas_frecuentes.php';
        
        xmlhttp.open('POST', url, true);
        
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                respuesta = xmlhttp.responseText;
                tabla.innerHTML = respuesta;
            }
        }
        
        xmlhttp.send(parametros);
    }
    
    function verPreguntaFrecuente(id, pregunta, respuesta) {
        
        $("#contenido").load('modificar_pregunta_frecuente.php', function() {
            
            document.getElementById('idFAQ').value = id;
            document.getElementById('pregunta').value = pregunta;
            document.getElementById('respuesta').value = respuesta;
            
        });
        
    }
    
</script>
<h1 class="text-center">Preguntas frecuentes</h1>

<div class="navbar">
    <ul id="search" class="nav">
        <li>
            <form class="navbar-form" role="search" action="javascript: buscarPreguntasFrecuentes();">
                <div class="form-group">
                    <input id="inptSearch" type="text" class="form-control" placeholder="Buscar">
                </div>
                <button id="btnSearch" type="submit" class="btn btn-default">
                    <img class="glyphicon" src="../fonts/glyphicons_search.png">
                </button>
            </form>
                            
        </li>
        <li>
            <button id="btnNew" class="btn btn-default" onclick="cargarContenido('agregar_pregunta_frecuente.php')">
                <img class="glyphicon search" src="../fonts/glyphicons_plus.png">
                <label class="between-margin-left">Nuevo</label>
            </button>

        </li>
    </ul>

</div>

<div id="tabla"></div>


<script type="text/javascript">

    function GetFaq()
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
                $('#table').find('tbody').append(resultado);            
                $('#table').find('tbody').append('</tr>'); 

            }
        }); 
    }

    $(document).ready(function()
    {
        //GetFaq();
        //$('input[type="checkbox"]').checkbox(); 
        buscarPreguntasFrecuentes();
    });

</script>