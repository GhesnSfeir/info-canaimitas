<h1 class="text-center">Gestionar cuenta de Usuario</h1>

<br/>
<div>

    <form class="form-horizontal" role="form">
        
        <div class="col-md-3">
        </div>
        
        <div class="col-md-6">
            <div class="row">
                 <div class="col-md-4 text-right">
                      <label for="usuario">Usuario: </label>
                 </div>
                 <div class="col-md-5">
                     <input type="text" class="form-control" id="usuario" placeholder="batr.26@gmail.com"> 
                 </div>
            </div>
            <br/>
            <div class="row">
                     <div class="col-md-4 text-right">
                          <label for="clave">Clave: </label>
                     </div> 
                     <div class="col-md-5">
                         <input type="password" class="form-control" id="clave" placeholder="12345678">
                     </div>
            </div> 

            <div class="row row-custom">
                <ul class="row-inline">
                    <li>
                        <label>Mostrar Clave</label>
                    </li>
                    <li> 
                        <input type="checkbox" class="checkbox" data-label="Mostrar Clave" checked></input>
                    </li>
                  
            </div>

            <br/>
            <div class="row row-custom">
                <ul class="row-inline">
                    <li>
                        <button id="cancelar" class="btn btn-defaul">Cancelar</button>
                    </li>
                    <li> 
                        <button id="guardar" type="submit" class="btn btn-defaul">Guardar</button>
                    </li>
            </div>
    </form>
</div>




     