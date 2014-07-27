<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSS -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" src="css/bootstrap-checkbox.css">
        <link type="text/css" rel="stylesheet" href="css/estilo.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap-tagsinput.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap-select.css">



        
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap-checkbox.js"></script>
        <script type="text/javascript" src="js/benyi.js"></script>
        <script type="text/javascript" src="js/ghesn.js"></script>
        <script type="text/javascript" src="js/mimia.js"></script>
        <script type="text/javascript" src="js/bootstrap-tagsinput.js"></script> 
        <script type="text/javascript" src="js/bootstrap-select.js"></script>




        </script>
        
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
                        <div class="container text-center">
                            <ul id ="menu-principal" class="nav navbar-nav">
                                <li class="tab active"><a onclick="cargarContenido('preguntas_frecuentes.php')">Preguntas frecuentes</a></li>
                                <li><a onclick="cargarContenido('recursos.php')">Recursos</a></li>
                                <li><a onclick="cargarContenido('usuarios.php')">Cuentas de usuario</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        Mi cuenta <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu text-left">
                                        <li><a onclick="cargarContenido('agregar_cuenta_usuario.php')">Agregar cuenta</a></li>
                                        <li><a onclick="cargarContenido('iniciar_sesion.php')">Cerrar sesi&oacute;n</a></li>
                                        <li><a onclick="cargarContenido('gestionar_cuenta_usuario.php')">Gestionar</a></li>
                                    </ul>
                                </li>
                                <li><a onclick="cargarContenido('ayuda.php')">Ayuda</a></li>

                             
                            </ul>
                        </div>
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
                        <p class="footer text-center" style="color:white;">Desarrollado por Benyi Tarazona, Ghesn Sfeir y Mimia Lo. Todos los derechos reservados.</p>
                    </footer>
                </div>
            </div>
            
        </div>

        <script type="text/javascript" >
            if (document.getElementById("contenido").innerHTML == "") {
                    $("#contenido").load("comentarios.php");
            }
            $('.nav li a').on('click', function() {
                $(this).parent().parent().find('.active').removeClass('active');
                $(this).parent().addClass('active');
            });
        </script>
       
    </body>
</html>