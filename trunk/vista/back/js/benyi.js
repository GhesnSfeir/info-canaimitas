var nextinput = 1;
function agregarCampos()
{
    nextinput++;
    campo = ' <div class="form-group"> <div class="col-md-4" align="right"> <label for="ruta'+nextinput+'">'+nextinput+'. </label></div> <div class="col-md-8"> <input type="text" class="form-control" id="ruta' + nextinput + '"> </div> </div>';
//        campo = '<li id="ruta'+nextinput+'">'+nextinput+'.<input type="text" size="20" id="campo' + nextinput + '"  name="campo' + nextinput + '"  /></li>';
    $("#campos").append(campo);
}

function inicializarVariables()
{
    nextinput = 1;
}