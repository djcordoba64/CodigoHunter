<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="container">
  <div class="col-md-12">
    <h2>Estabilización de café</h2>
  </div>
  <?php echo var_dump($datos) ?>
  <div class="well well-sm">    
    <div class="row">
      <div class="col-md-12">                           
        <form class="contact-form" action="<?php echo RUTA_URL;?>/DatosEstabilizacion/registrar_datos/" method="POST">
          <div class="row">               
            <div class="col-md-6" style="background-color:#fff">
              <h4>Datos a registrar</h4>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <input hidden  name="codigoSiguiente" value="<?php echo $datos['codigoSiguiente'] ?>"/>
                  <input hidden  name="idcafe" value="<?php echo $datos['idcafe'] ?>"/>
                  <input hidden  name="codigoCafe" value="<?php echo $datos['codigoCafe'] ?>"/>
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
                    <label for="estabilizacion" class="">estabilizacion</label>
                    <input class="contact-input" type="number" min="1" required  name="estabilizacion" value=""/>
                  </p>
                </div>              
              </div>
            </div>
            <div class="col-md-6" style="background-color: #fff">
              <h5 class="">Observación</h5>
              <div class="col-md-12" >
                  <textarea name="observacion"></textarea>                                                                 
              </div>
               <div class="col-md-12 text-center" style="margin: 42px;">
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