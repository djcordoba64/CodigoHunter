<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<div class="col-md-12">
    <h2>Gestionar trazabilidad del café</h2>
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
                      <label><span><?php echo $datos['leyenda']?></span>
                      <?php if ( isset($datos["nombreProceso"])) { ?>
                      <label style="color: #b89d64;font-size:25px"><span></span><?php echo $datos['nombreProceso']?></span> <?php }?></label>, el lote
                      <label style="color: #b89d64;font-size:25px"><?php echo $datos['codigoCafe']?></label>. 
                      <br>De clic en una de las opciones para:<!--Boton Modificar datos delproceso de trilla-->
                                    <?php if ( isset($datos["nombreModificar"])) { ?>
                                     <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/DatosTrilla/editar_crgarDatos/<?php echo $datos['idcafe']?>"><?php echo $datos["nombreModificar"]?></a><?php }?><br>

                                     <!--Boton iniciar siguiente proceso-->
                                    <?php if ( isset($datos["nombreSiguiente"])) { ?>
                                    <input type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#IniciarTrilla" onclick="registrar_estadoTR(<?php echo $datos['idcafe']?>)" value="<?php echo $datos["nombreSiguiente"]?>">
                                    <?php }?><br>
                                   
                                    <!--Boton detener  proceso-->
                                    <?php if ( isset($datos["nombreDetener"])) { ?>
                                      <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/cambiar_estado/<?php echo $datos['idcafe'].'/'.$datos['codigoDetener']?>"><?php echo $datos["nombreDetener"]?></a>   
                                    <?php }?>
                                    <!--Boton finalizar  proceso-->
                                    <?php if ( isset($datos["nombreFinalizar"])) { ?>
                                      <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/cambiar_estado/<?php echo $datos['idcafe'].'/'.$datos['codigoFinalizar']?>"><?php echo $datos["nombreFinalizar"]?></a>   
                                    <?php }?>
                        
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


<!-- Modal Registrar Trilla-->
<div class="modal fade" id="IniciarTrilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm " role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar Proceso de trilla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div >
          
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


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 