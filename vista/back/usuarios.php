<h1 class="text-center">Usuarios</h1>

<div class="navbar">
    <ul id="search" class="nav">
        <li>
            <form class="navbar-form" role="search">
                <div class="form-group">
                    <input id="inptSearch" type="text" class="form-control" placeholder="Buscar">
                </div>
                <button id="btnSearch" type="submit" class="btn btn-default">
                    <img class="glyphicon" src="../fonts/glyphicons_search.png"></img>
                </button>
            </form>

        <li>
            <button id="btnNew" class="btn btn-default" onclick="cargarContenido('agregar_cuenta_usuario.php')">
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
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Suspendido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    
</div>


<script type="text/javascript">



    function GetUsers()
    {
        $.get("scripts/USERS-cargar-usuarios.php", function(resultado){
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
        GetUsers();
        $('input[type="checkbox"]').checkbox(); 
    });




</script>