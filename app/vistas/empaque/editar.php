<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="container">
  <div class="col-md-12">
    <h2>Empaque</h2>
  </div>
  <div class="well well-sm">    
    <div class="row">
      <div class="col-md-12">                           
        <form class="contact-form" action="<?php echo RUTA_URL;?>/DatosEmpaque/editar/<?php echo $datos['iddatosEmpaque'] ?>" method="POST">
          <div class="row">               
            <div class="col-md-6" style="background-color:#fff">
              <h4>Datos a registrar</h4>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <input hidden  name="idcafe" value="<?php echo $datos['idcafe'] ?>"/>
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
                    <label for="empaque" class="">Empaque</label>
                    <input class="contact-input" type="number" min="1" required  name="empaque" value="<?php echo $datos['empaque'] ?>"/>
                  </p>
                </div>              
              </div>
            </div>
            <div class="col-md-6" style="background-color: #fff">
              <h5 class="">Observación</h5>
              <div class="col-md-12" >
                  <textarea name="observacion"><?php echo $datos['observacion'] ?></textarea>                                                                 
              </div>              
            </div>
            <div class="col-md-12 text-center" style="margin: 20px;">
                <a href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_inicio" class="btn  btn-bordered">Cancelar</a>
                <input value="Guardar" class="btn  btn-brown" type="submit"/>
              </div>
          </div>  
        </form>         
      </div>
    </div>
  </div>
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 