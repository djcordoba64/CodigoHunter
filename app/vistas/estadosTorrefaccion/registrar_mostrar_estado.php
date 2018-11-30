<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<div class="col-md-12">
    <h2>Gestionar trazabilidad de al Torrefacción</h2>
  </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <div class="form-horizontal" style="background: #f5f2eb">
                    <fieldset >
                    <legend class="text-center header">Administrar</legend>                     
                    <div class="col-md-12" style="background-color:#fff;" >
                      <div style="background-color: #fff;margin: 40px;">
                      El lote <label style="color: #b89d64;font-size:20px"><span><?php echo $datos['codigoCafe']?></span></label>, actualmente<span><?php echo $datos['leyenda']?></span><?php if ( isset($datos["nombreProceso"])) { ?>
                      <label style="color: #b89d64;font-size:20px"><span></span><?php echo $datos['nombreProceso']?></span> <?php }?></label>. 
                      <br>De clic en una de las opciones para:

                      <div style="margin: 20px;">
                                     <!--Boton iniciar siguiente proceso o (Primer proceso)-->
                                    <?php if ( isset($datos["nombreSiguiente"])) { ?>
                                    <a  class="btn btn-sm btn-default"  data-toggle="modal" data-target="#IniciarProceso"><?php echo $datos["nombreSiguiente"]?></a>   
                                    <?php }?>

                                    <!--Boton Modificar datos delproceso de trilla-->
                                    <?php if ( isset($datos["nombreModificar"])) { ?>
                                     <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosTrilla/editar_crgarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificar"]?></a><?php }?>

                                      <!--Boton Modificar datos delproceso de Pruebas Laboratorio-->
                                    <?php if ( isset($datos["nombreModificarP"])) { ?>
                                     <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosPruebasLaboratorio/editar_crgarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificarP"]?></a><?php }?>
                                  
                                    <!--Boton detener  proceso-->
                                    <?php if ( isset($datos["nombreDetener"])) { ?>
                                      <a  class="btn btn-sm btn-default"  data-toggle="modal" data-target="#detener"><?php echo $datos["nombreDetener"]?></a>   
                                    <?php }?>

                                    <!--Boton Reanudar proceso-->
                                    <?php if ( isset($datos["nombreReanudar"])) { ?>
                                      <a  class="btn btn-sm btn-default"  data-toggle="modal" data-target="#reanudar"><?php echo $datos["nombreReanudar"]?></a>   
                                    <?php }?>

                                    <!--Boton finalizar  proceso-->
                                    <?php if ( isset($datos["nombreFinalizar"])) { ?>
                                      <a  class="btn btn-sm btn-default"  data-toggle="modal" data-target="#finalizar"><?php echo $datos["nombreFinalizar"]?></a>  
                                    <?php }?>

                                   
                      </div>
                      </div>
                      <div class="form-group">
                            <div class="col-md-12 text-center">
                                <a  class="btn btn-lg btn-brown" href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_inicio">Cancelar</a>
                            </div>
                    </div>                        
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

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
          <div>
            <input hidden name="codigoSiguiente" value="<?php echo $datos['codigoSiguiente'] ?>" />
            <p>
               <label>Nombre del proceso</label>
               <input type="text"name="nombreSiguiente" value="<?php echo $datos['nombreProceso'] ?>" />
            </p>       
             <p>
                <label>codigo Cafe</label>
                <input  name="fecha" type="text" id="fecha" value="<?php echo $datos['codigoCafe'] ?>" size="10" />
              </p>
              <p>
                <label>Fecha</label>
                <input  name="fecha" type="text" id="fecha" value="<?php echo date("m/d/Y g:ia"); ?>" size="20"/>
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
            <input hidden name="codigoSiguiente" value="<?php echo $datos['codigoDetener'] ?>" />
            <p>
               <label>Nombre del proceso</label>
               <input type="text"name="nombreSiguiente" value="<?php echo $datos['nombreProceso'] ?>" />
            </p>       
             <p>
                <label>codigo Cafe</label>
                <input  name="fecha" type="text" id="fecha" value="<?php echo $datos['codigoCafe'] ?>" size="10" />
              </p>
              <p>
                <label>Fecha</label>
                <input  name="fecha" type="text" id="fecha" value="<?php echo date("m/d/Y g:ia"); ?>" size="20"/>
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
            <p>
               <label>Nombre del proceso</label>
               <input type="text"name="nombreSiguiente" value="<?php echo $datos['nombreProceso'] ?>" />
            </p>       
             <p>
                <label>codigo Cafe</label>
                <input  name="fecha" type="text" id="fecha" value="<?php echo $datos['codigoCafe'] ?>" size="10" />
              </p>
              <p>
                <label>Fecha</label>
                <input  name="fecha" type="text" id="fecha" value="<?php echo date("m/d/Y g:ia"); ?>" size="20"/>
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
            <p>
               <label>Nombre del proceso</label>
               <input type="text"name="nombreSiguiente" value="<?php echo $datos['nombreProceso'] ?>" />
            </p>       
             <p>
                <label>codigo Cafe</label>
                <input  name="fecha" type="text" id="fecha" value="<?php echo $datos['codigoCafe'] ?>" size="10" />
              </p>
              <p>
                <label>Fecha</label>
                <input  name="fecha" type="text" id="fecha" value="<?php echo date("m/d/Y g:ia"); ?>" size="20"/>
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