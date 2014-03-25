<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSS -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" src="css/bootstrap-checkbox.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css">
        
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>        
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-checkbox.js"></script>
        <script type="text/javascript" src="js/benyi.js"></script>
        <script type="text/javascript" src="js/ghesn.js"></script>
        <script type="text/javascript" src="js/mimia.js"></script>
        
        <title>InfoCanaimitas</title>
    </head>
    <body>
<!--        <div class="encabezado">
            <img src="img/banner3.png" alt="banner">
        </div>

        <div class="menu">
            <ul>
                <li onclick="cargarContenido('inicio.html')">Inicio</li>
                <li onclick="cargarContenido('buscar.html')">Buscar recursos</li>
                <li onclick="cargarContenido('preguntas_frecuentes.html')">Preguntas frecuentes</li>
                <li onclick="cargarContenido('contacto.html')">Contacto</li>
            </ul>
            <ul>
                <li>Iniciar sesi&oacute;n</li>
                <li onclick="cargarContenido('registrarse.html')">Registrarse</li>
            </ul>
        </div>

        <div class="contenido" id="contenido"></div>-->

        <div class="container">
            <header>
                <img src="img/banner3.png" alt="banner" onclick="cargarContenido('inicio.php')">
            </header>
            
            <nav class="navbar navbar-default" role="navigation">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a onclick="cargarContenido('inicio.php')">Inicio</a></li>
                    <li><a onclick="cargarContenido('recursos.php')">Buscar recursos</a></li>
                    <li><a onclick="cargarContenido('inicio.php')">Preguntas frecuentes</a></li>
                    <!--<li><a onclick="cargarContenido('preguntas_frecuentes.php')">Preguntas frecuentes</a></li>-->
                    <li><a onclick="cargarContenido('contacto.php')">Contacto</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a onclick="cargarContenido('inicio.php')">Iniciar Sesi&oacute;n</a></li>
                    <li><a onclick="cargarContenido('registrarse.php')">Registrarse</a></li>
                </ul>
            </nav>
            
            <div class="contenido" id="contenido"></div>
            
        </div>

        <script type="text/javascript" >
            $('.nav li a').on('click', function() {
                $(this).parent().parent().find('.active').removeClass('active');
                $(this).parent().addClass('active');
            });

            if (document.getElementById("contenido").innerHTML == "") {
                    $("#contenido").load("inicio.php");
            }
            
        </script>
    </body>
</html>