<h1 class="text-center">Recusos</h1>

<div class="navbar">
    <ul id="search" class="nav" >
        <li>
                <select id="tipo-select" class="form-control">
                    <option value="0">Grado</option>
                    <option value="1">1ro</option>
                    <option value="2">2do</option>
                    <option value="3">3ro</option>
                    <option value="4">4to</option>
                    <option value="5">5to</option>
                    <option value="6">6to</option>
                    <option value="7">7mo</option>
                    <option value="8">8vo</option>
                    <option value="9">9no</option>
                    <option value="10">Primer Ciclo D.</option>
                    <option value="11">Segundo Ciclo D.</option>
                </select>            
        </li>
        <li>
                <select id="tipo-select" class="form-control">
                    <option value="0">Asignatura</option>
                    <option value="ciencias">Ciencias</option>   
                    <option value="geografia">Geografia</option>                                     
                    <option value="historia">Historia</option>                    
                    <option value="lenguaje">Lenguaje</option>
                    <option value="literatura">Literatura</option>
                    <option value="matematica" selected>Matematica</option>
                </select>
        </li>
        <li>
                <select id="tipo-select" class="form-control">
                    <option value="0">Tema</option>
                    <option value="suma">Suma</option>
                    <option value="resta">resta</option>
                    <option value="multiplicacion">Multiplicacion</option>
                    <option value="division">Division</option>
                    <option value="nprimos">Numeros Primos</option>
                </select>
        </li>
        <li>
                <select id="tipo-select" class="form-control">
                    <option value="0">Formato</option>
                    <option value="all">Todos</option>
                    <option value="video">Video</option>
                    <option value="pdf">PDF</option>                    
                    <option value="jclick">JClick</option>
                </select>            
        </li>
        <li>
            <button id="btnSearchComplete" type="submit" class="btn btn-default">
                <img class="glyphicon " src="../fonts/glyphicons_search.png"></img>
                <label class="between-margin-left">Buscar</label>
            </button>

        </li>
        <li>
            <button id="btnNew" class="btn btn-default" onclick="cargarContenido('agregar_recurso.php')">
                <img class="glyphicon search" src="../fonts/glyphicons_plus.png"></img>
                <label class="between-margin-left">Nuevo</label>
            </button>

        </li>
    </ul>

</div>

<div id="table" class="table">
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Grado</th>
                <th>Asignatura</th>
                <th>Tema</th>
                <th>Titulo</th>
                <th>Tipo</th>
                <th>Autor</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    
</div>


<script type="text/javascript">

    function GetResources()
    {
        $.get("scripts/RESOURCES-cargar-recursos.php", function(resultado){
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
        GetResources();
        $('input[type="checkbox"]').checkbox(); 
    });
    
</script>