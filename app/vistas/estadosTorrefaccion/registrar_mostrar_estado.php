<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<section class="cart-wrap">
<div class="col-md-12">
    <h2>Torrefacción</h2>
  </div>
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1" style="border-left: 4px solid #b89d64;" >
            <div class="">
                <div class="form-horizontal">
                    <fieldset >                     
                    <div class="col-md-12" style="background-color:#fff;" >
                      <div style="background-color: #fff;margin: 40px;">
                      El lote <label style="color: #b89d64;font-size:20px"><span><?php echo $datos['codigoCafe']?></span></label>, actualmente<span><?php echo $datos['leyenda']?></span><?php if ( isset($datos["nombreProceso"])) { ?>
                      <label style="color: #b89d64;font-size:20px"><span></span><?php echo $datos['nombreProceso']?></span> <?php }?></label>. 
                      <br>De clic en una de las opciones para:
                      <div style="margin: 15px;">
                      <!--Boton iniciar siguiente proceso o (Primer proceso)-->
                        <?php if ( isset($datos["nombreSiguiente"])) { ?>
                          <div class="col-md-5">
                            <div class="product-item">
                              <a  class="btn btn-sm btn-default"  data-toggle="modal" data-target="#IniciarProceso"><?php echo $datos["nombreSiguiente"]?></a>
                            </div> 
                          </div>  
                        <?php }?>
                      <!--Boton Modificar-->
                        <!--Boton Modificar datos delproceso de trilla-->
                        <?php if ( isset($datos["nombreModificar"])) { ?>
                          <div class="col-md-3">
                            <div class="product-item">
                               <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosTrilla/editar_crgarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificar"]?></a>
                            </div>
                          </div>
                        <?php }?>
                        <!--Boton Modificar datos delproceso de Pruebas Laboratorio-->
                        <?php if ( isset($datos["nombreModificarP"])) { ?>
                          <div class="col-md-3">
                            <div class="product-item">
                              <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosPruebasLaboratorio/editar_cargarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificarP"]?></a>
                            </div>
                          </div>
                        <?php }?>
                        <!--Boton Modificar datos del proceso Torrefactor-->
                        <?php if ( isset($datos["nombreModificarTo"])) { ?>
                         <div class="col-md-3"> 
                          <div class="product-item">
                                <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosTorrefactor/editar_cargarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificarTo"]?></a>
                          </div>
                        </div>
                        <?php }?>
                        <!--Boton Modificar datos del proceso Estabilización-->
                        <?php if ( isset($datos["nombreModificarEs"])) { ?>
                          <div class="col-md-3">
                            <div class="product-item"> 
                                     <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosEstabilizacion/editar_cargarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificarEs"]?></a>
                            </div>
                          </div>
                        <?php }?>
                        <!--Boton Modificar datos del proceso Laboratotio-->
                        <?php if ( isset($datos["nombreModificarLa"])) { ?>
                          <div class="col-md-3">
                            <div class="product-item"> 
                                     <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosLaboratorio/editar_cargarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificarLa"]?></a>
                            </div>
                          </div>
                        <?php }?>
                        <!--Boton Modificar datos del proceso Empaque-->
                        <?php if ( isset($datos["nombreModificarEm"])) { ?>
                          <div class="col-md-3">
                            <div class="product-item">
                                     <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosEmpaque/editar_cargarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificarEm"]?></a>
                            </div>
                          </div>
                        <?php }?>
                        <!--Boton detener  proceso-->
                        <?php if ( isset($datos["nombreDetener"])) { ?>
                          <div class="col-md-3">
                            <div class="product-item"> 
                              <a  class="btn btn-sm btn-default"  data-toggle="modal" data-target="#detener"><?php echo $datos["nombreDetener"]?></a>
                            </div>
                          </div>   
                        <?php }?>
                        <!--Boton Reanudar proceso-->
                        <?php if ( isset($datos["nombreReanudar"])) { ?>
                          <div class="col-md-3">
                            <div class="product-item">
                              <a  class="btn btn-sm btn-default"  data-toggle="modal" data-target="#reanudar"><?php echo $datos["nombreReanudar"]?></a>
                            </div>
                          </div>   
                        <?php }?>
                       <!--Boton finalizar  proceso-->
                        <?php if ( isset($datos["nombreFinalizar"])) { ?>
                          <div class="col-md-3">
                            <div class="product-item">
                              <a  class="btn btn-sm btn-default"  data-toggle="modal" data-target="#finalizar"><?php echo $datos["nombreFinalizar"]?></a>
                            </div>
                          </div>  
                        <?php }?>
                        <!--Boton finalizar  proceso-->
                        <?php if ( isset($datos["nombreFinalizarT"])) { ?>
                          <div class="col-md-5">
                            <div class="product-item">
                              <a href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/TerminarProceso/<?php echo $datos["idcafe"].'/'.$datos['codigoFinalizar']?>" class="btn btn-sm btn-default"><?php echo $datos["nombreFinalizarT"]?></a> 
                            </div>
                          </div>
                        <?php }?>                                  
                      </div>
                      </div>
                             <div class="form-group">
                            <div class="col-md-12 text-center">
                                <a  class="btn btn-lg btn-bordered" href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_inicio">Cancelar</a>
                            </div>
                    </div>                 
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Modal iniciar proceso-->
<div class="modal fade" id="IniciarProceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm " role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar Proceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
          <div  >
            <input hidden name="codigoSiguiente" value="<?php echo $datos['codigoSiguiente'] ?>" />
             <input hidden type="text"name="nombreSiguiente" value="<?php echo $datos['nombreProceso'] ?>" />
             <input hidden name="codigoCafe" type="text"  value="<?php echo $datos['codigoCafe'] ?>" size="10"/>
            <p>
               <label>Proceso:</label><span><?php echo $datos['nombreProceso'] ?></span>
            </p>       
             <p>
                <label>Lote:</label><span> <?php echo $datos['codigoCafe'] ?></span>
            </p>
            <p>
              <label>Fecha:</label><span> <?php echo date("m/d/Y g:ia"); ?></span>
            </p>
          </div>                          
      </div>
      <div class="modal-footer">
         
       <a  class="btn btn-sm btn-brown"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/cambiar_estado/<?php echo $datos['idcafe'].'/'.$datos['codigoSiguiente']?>">Iniciar</a>
      
      </div>       
      </div>

  </div>
</div>

<!-- Modal detener proceso-->
<div class="modal fade" id="detener" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm " role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detener Proceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
          <div>
            <input hidden name="codigoSiguiente" type="text" value="<?php echo $datos['codigoDetener'] ?>" />
            <input hidden name="nombreSiguiente" type="text" value="<?php echo $datos['nombreProceso'] ?>" />
            <input hidden name="codigoCafe" type="text"  value="<?php echo $datos['codigoCafe'] ?>" size="10" />
            <p>
               <label>Proceso:</label><span> <?php echo $datos['nombreProceso'] ?></span>
            </p>       
             <p>
                <label>Lote:</label><span> <?php echo $datos['codigoCafe'] ?></span>
            </p>
            <p>
              <label>Fecha:</label><span> <?php echo date("m/d/Y g:ia"); ?></span>
            </p>
                  
          </div>                          
      </div>
      <div class="modal-footer">
         
       <a  class="btn btn-sm btn-brown"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/detener_estado/<?php echo $datos['idcafe'].'/'.$datos['codigoDetener']?>">Detener</a>
      
      </div>       
      </div>

  </div>
</div>

<!-- Modal reanudar proceso-->
<div class="modal fade" id="reanudar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm " role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reanudar Proceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
          <div>
            <input hidden name="codigoSiguiente" value="<?php echo $datos['codigoReanudar'] ?>" />
            <input hidden type="text"name="nombreSiguiente" value="<?php echo $datos['nombreProceso'] ?>" />
            <input hidden name="fecha" type="text" id="fecha" value="<?php echo $datos['codigoCafe'] ?>" size="10" />
            <p>
               <label>Proceso</label><span><?php echo $datos['nombreProceso'] ?></span>
            </p>       
             <p>
                <label>codigo Cafe</label><span><?php echo $datos['codigoCafe'] ?></span>
              </p>
              <p>
                <label>Fecha</label><span><?php echo date("m/d/Y g:ia"); ?></span>
              </p>
          </div>                          
      </div>
      <div class="modal-footer">
         
       <a  class="btn btn-sm btn-brown"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/reanudar_estado/<?php echo $datos['idcafe'].'/'.$datos['codigoReanudar']?>">Reanudar</a>
      
      </div>       
      </div>

  </div>
</div>

<!-- Modal finalizar proceso-->
<div class="modal fade" id="finalizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm " role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Finalizar Proceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
          <div>
            <input hidden name="codigoSiguiente" value="<?php echo $datos['codigoFinalizar'] ?>" />
            <input hidden name="codigoCafe" type="text" id="codigoCafe" value="<?php echo $datos['codigoCafe'] ?>" size="10" />
            
            <p>
               <label>Proceso:</label><span> <?php echo $datos['nombreProceso'] ?></span>
            </p>       
             <p>
                <label>Lote:</label><span> <?php echo $datos['codigoCafe'] ?></span>
            </p>
            <p>
              <label>Fecha:</label><span> <?php echo date("m/d/Y g:ia"); ?></span>
            </p>
          </div>                          
      </div>
      <div class="modal-footer">
         
       <a  class="btn btn-sm btn-brown"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/finalizar_estado/<?php echo $datos['idcafe'].'/'.$datos['codigoFinalizar']?>">Finalizar</a>
      
      </div>       
      </div>

  </div>
</div


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 