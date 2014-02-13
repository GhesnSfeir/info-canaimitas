<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSS -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css">
        
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/benyi.js"></script>
        <script type="text/javascript" src="js/ghesn.js"></script>
        <script type="text/javascript" src="js/mimia.js"></script>
        
        <title>InfoCanaimitas (BackOffice)</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <header>
                        <img class="center-block" src="img/banner3.png" alt="banner" onclick="cargarContenido('inicio.php')">
                    </header>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <ul id ="menu-principal" class="nav navbar-nav navbar-justified">
                            <li class="active"><a onclick="cargarContenido('preguntas_frecuentes.php')">Preguntas frecuentes</a></li>
                            <li><a onclick="cargarContenido('recursos.php')">Recursos</a></li>
                            <li><a onclick="cargarContenido('cuentas_de_usuario.php')">Cuentas de usuario</a></li>
                            <li><a onclick="cargarContenido('mi_cuenta.php')">Mi cuenta</a></li>
                            <li><a onclick="cargarContenido('ayuda.php')">Ayuda</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="container">    
            <div class="row">
                <div class="col-sm-12">
                    <div class="contenido" id="contenido"></div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <footer>
                        <p class="text-center">Hecho por Ghesn Sfeir, Mimia Lo y Benyi Tarazona.</p>
                    </footer>
                </div>
            </div>
            
        </div>

        <script type="text/javascript" >
            if (document.getElementById("contenido").innerHTML == "") {
                    $("#contenido").load("inicio.php");
            }
        </script>
    </body>
</html>