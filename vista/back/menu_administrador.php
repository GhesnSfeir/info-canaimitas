<li class="tab active">
    <a onclick="clickNavMenu(this, 'preguntas_frecuentes.php')">
        Preguntas frecuentes
    </a>
</li>
<li>
    <a onclick="clickNavMenu(this, 'recursos.php')">
        Recursos
    </a>
</li>
<li>
    <a onclick="clickNavMenu(this, 'usuarios.php')">
        Cuentas de usuario
    </a>
</li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown">
        Mi cuenta 
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu text-left">
        <li>
            <a onclick="cargarContenido('agregar_cuenta_usuario.php')">
                Agregar cuenta
            </a>
        </li>
        <li>
            <a onclick="cerrarSesion()">
                Cerrar sesi&oacute;n
            </a>
        </li>
        <li>
            <a onclick="cargarContenido('gestionar_cuenta_usuario.php')">
                Gestionar
            </a>
        </li>
    </ul>
</li>
<li>
    <a onclick="clickNavMenu(this, 'ayuda.php')">
        Ayuda
    </a>
</li>
