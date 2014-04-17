<h1 class="text-center">Preguntas frecuentes</h1>

<div class="navbar">
    <ul id="search" class="nav">
        <li>
                <select id="tipo" class="form-control">
                    <option value="0">Tipo</option>
                    <option value="all">Todos</option>
                    <option value="sugeridos">Sugeridos</option>
                    <option value="predeterminados">Predeterminados</option>
                </select>            
        </li>
        <li>
            <form class="navbar-form" role="search">
                <div class="form-group">
                    <input id="inptSearch" type="text" class="form-control" placeholder="Buscar">
                </div>
                <button id="btnSearch" type="submit" class="btn btn-default">
                    <img class="glyphicon" src="../fonts/glyphicons_search.png"></img>
                </button>
            </form>
                            
        </li>
        <li>
            <button id="btnNew" class="btn btn-default" onclick="cargarContenido('agregar_pregunta_frecuente.php')">
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
                <th>Nro</th>
                <th>Pregunta</th>
                <th>Tipo</th>
                <th>Visible</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    
</div>


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
        GetFaq();
        $('input[type="checkbox"]').checkbox(); 
    });

</script>