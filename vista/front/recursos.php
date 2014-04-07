<h1 class="text-center">Recursos</h1>

<div class="col-md-10 col-md-offset-1">

<div class="navbar">
    <ul id="search" class="nav" >
        <li>
            <select id="tipo-select" class="form-control">
                <option value="0">Grado ...</option>
                <option value="1">1ro</option>
                <option value="2">2do</option>
                <option value="3">3ro</option>
                <option value="4">4to</option>
                <option value="5">5to</option>
                <option value="6" selected>6to</option>
                <option value="7">7mo</option>
                <option value="8">8vo</option>
                <option value="9">9no</option>
                <option value="10">Primer Ciclo D.</option>
                <option value="11">Segundo Ciclo D.</option>
            </select>
        </li>
        <li>
                <select id="tipo-select" class="form-control">
                    <option value="0">Asignatura ...</option>
                    <option value="naturaleza" selected>Estudios de la naturaleza</option>   
                    <option value="geografia">Geografia</option>                                     
                    <option value="historia">Historia</option>                    
                    <option value="lenguaje">Lenguaje</option>
                    <option value="literatura">Literatura</option>
                    <option value="matematica">Matematica</option>
                </select>        
        </li>
        <li>
           
                <select id="tipo-select" class="form-control">
                    <option value="0">Tema ...</option>
                    <option value="plantas" selected>Plantas</option>
                    <option value="arboles">Arboles</option>
                </select>
        </li>
        <li>
            
                <select id="tipo-select" class="form-control">
                    <option value="0">Formato ...</option>
                    <option value="all">Todos</option>
                    <option value="video">Video</option>
                    <option value="pdf" selected>PDF</option>                    
                    <option value="jclick">JClick</option>

                </select>
            
        </li>
         <li>
            <button id="btnSearchComplete" type="submit" class="btn btn-default">
                <img class="glyphicon " src="../fonts/glyphicons_search.png"></img>
                <label class="between-margin-left">Buscar</label>
            </button>

        </li>
    </ul>

</div>

<div id="table" class="table">
    <table id="tableResource" class="table table-hover">

        <thead>
            <tr>
                <th>Grado</th>
                <th>Asignatura</th>
                <th>Tema</th>
                <th>Titulo</th>
                <th>Formato</th>
                <th>Autor</th>
                <th>Caracterizaci&oacute;n</th>
                <th>Descarga</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    
</div>
</div>


<script type="text/javascript">


    function GetResources()
    {
        $.get("scripts/RESOURCES-cargar-recursos.php", function(resultado){

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