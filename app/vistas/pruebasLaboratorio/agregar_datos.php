<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="container">
  <div class="col-md-12">
    <h2>Proceso de Pruebas de Laboratorio</h2>
  </div>
  <div class="well well-sm">    
    <div class="row">
      <div class="col-md-12">                           
        <form class="contact-form" action="<?php echo RUTA_URL;?>/DatosPruebasLaboratorio/registrar_datos/" method="POST">
          <div class="row">               
            <div class="col-md-6" style="background-color:#fff">
              <h4>Datos a registrar del proceso</h4>
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
                    <label for="humedad" class="">Humedad</label>
                    <input class="contact-input" type="number" min="1" required  name="humedad" value=""/>
                  </p>
                </div>
                <div  class="col-md-6">
                  <label for="densiad" class="">Densidad</label>
                    <input class="contact-input" type="number" min="1" required name="densidad" value=""/>                     
                </div>               
              </div>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <p>
                    <label for="actividadAcuosa" class="">Actividad Acuosa</label>
                    <input class="contact-input" min="1" type="number" required name="actividadAcuosa" value=""/>
                  </p>
                </div>
                <div class="col-md-6">
                  <p>
                    <label for="disenoCurva" class="">Diseño de curva</label>
                    <input class="contact-input" min="1" type="number" required name="disenoCurva" value=""/>
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