<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<h1>Editar datos trilla</h1>
<div class="container">
  <div class="col-md-12">
    <h2>Proceso de Trilla</h2>
  </div>
<?php var_dump($datos) ?>
  <div class="well well-sm">    
    <div class="row">
      <div class="col-md-12">                           
        <form class="contact-form" action="<?php echo RUTA_URL;?>/DatosTrilla/editar/<?php echo $datos['idDatoTrilla']?>" method="POST">
          <div class="row">               
            <div class="col-md-6" style="background-color:#fff">
              <h4>Datos a registrar del proceso</h4>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <input hidden class="contact-input" type="text" name="idDatoTrilla" value="<?php echo $datos['idDatoTrilla']?>"/>
                  <p>
                    <label for="codigoCafe" class="">Codigo café</label>
                    <input class="contact-input" type="text" disabled name="codigoCafe" value="<?php echo $datos['codigoCafe'] ?>"/>
                  </p>
                </div>
                <div  class="col-md-6">
                  <label for="fechaHora" class="">fecha</label>
                    <input class="contact-input" type="text" disabled name="fechaHora" value="<?php echo $datos['fechaHora'] ?>"/>                     
                </div>               
              </div>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <p>
                    <label for="mermaTrilla" class="">Merma en trilla</label>
                    <input class="contact-input" type="number" required  name="mermaTrilla" value="<?php echo $datos['mermaTrilla'] ?>"/>
                  </p>
                </div>
                <div  class="col-md-6">
                  <label for="mallas" class="">Mallas</label>
                    <input class="contact-input" type="number" required name="mallas" value="<?php echo $datos['mallas'] ?>"/>                     
                </div>               
              </div>
              <div class="col-md-12" >
                <div class="col-md-6">
                  <p>
                    <label for="pesoCafeVerde" class="">Peso Cafe Verde</label>
                    <input class="contact-input" type="number" required name="pesoCafeVerde" value="<?php echo $datos['pesoCafeVerde'] ?>""/>
                  </p>
                </div>             
              </div>
            </div>
            <div class="col-md-6" style="background-color: #fff;" >
              <h5 class="">Observación</h5>
              <div class="col-md-12" >
                  <textarea name="observacion" ><?php echo $datos['observacion'] ?></textarea>                                                                 
              </div>
               <div class="col-md-12 text-center" style="margin: 43px;">
                <input value="Actualizar" class="btn btn-lg btn-brown" type="submit"/>
            </div>
               
            </div>


          </div>  
        </form>         
      </div>
    </div>
  </div>
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 