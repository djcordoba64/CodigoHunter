
<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container">
  <div class="col-md-12">
    <h2>Proceso de Trilla</h2>
  </div>
<?php var_dump($datos) ?>
  <div class="contact-wrap">    
    <div class="row">
      <div class="col-md-12">                           
        <form class="contact-form" action="<?php echo RUTA_URL;?>/DatosTrilla/registrar_datos/<?php echo $datos['idcafe']?>" method="POST">
          <div class="row">               
            <div class="col-md-6" style="background-color:#fff">
              <h4>Datos a registrar del proceso</h4>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <p>
                    <label for="codigoCafe" class="">Codigo café</label>
                    <input class="contact-input" type="text" disabled name="codigoCafe" value="<?php echo $datos['codigoCafe'] ?>"/>
                  </p>
                </div>
                <div  class="col-md-6">
                  <label for="fechaHora" class="">fecha</label>
                    <input class="contact-input" type="text" disabled name="fechaHora" value="<?php echo date("m/d/Y g:ia"); ?>"/>                     
                </div>               
              </div>
               <div class="col-md-12" >
                <div class="col-md-6">
                  <p>
                    <label for="mermaTrilla" class="">Merma en trilla</label>
                    <input class="contact-input" type="number"   name="mermaTrilla" value=""/>
                  </p>
                </div>
                <div  class="col-md-6">
                  <label for="mallas" class="">Mallas</label>
                    <input class="contact-input" type="number"   name="mallas" value=""/>                     
                </div>               
              </div>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <p>
                    <label for="pesoCafeVerde" class="">Peso Cafe Verde</label>
                    <input class="contact-input" type="number"   name="pesoCafeVerde" value=""/>
                  </p>
                </div>             
              </div>
            </div>
            <div class="col-md-6" style="background-color: #fff">
              <h5 class="">Observación</h5>
              <div class="col-md-12" >
                  <textarea name="observacion"></textarea>                                                                 
              </div>
              <div class="col-md-12 text-center">
                <input value="Guardar" class="btn btn-lg btn-brown" type="submit"/>
            </div>  
            </div>

          </div>  
        </form>         
      </div>
    </div>
  </div>
</div>


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 