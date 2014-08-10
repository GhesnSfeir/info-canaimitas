function cargarContenido(archivo) {
	$("#contenido").load(archivo);
        inicializarVariables();
}

String.prototype.empiezaCon = function (str){
        return this.indexOf(str) == 0;
};