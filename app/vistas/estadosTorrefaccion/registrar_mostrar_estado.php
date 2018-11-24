<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<div class="col-md-12">
    <h2>Gestionar trazabilidad del café</h2>
  </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <div class="form-horizontal" >
                    <fieldset>
                        <legend class="text-center header">Estado</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><p>Código del café</p><i class=""></i></span>
                            <div class="col-md-4">
                                <input id="" disabled name="name" type="text"  class="form-control"  value="<?php echo $datos['codigoCafe'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Acciones<i class=""></i></span>
                            <div class="col-md-8">
                                  <!--Boton iniciar siguiente proceso-->
                                <?php if ( isset($datos["nombreSiguiente"])) { ?>
                                <input type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#IniciarTrilla" onclick="registrar_estadoTR(<?php echo $datos['idcafe']?>)" value="<?php echo $datos["nombreSiguiente"]?>">
                                <?php }?>
                                <!--Boton detener  proceso-->
                                <?php if ( isset($datos["nombreDetener"])) { ?>
                                  <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/cambiar_estado/<?php echo $datos['idcafe'].'/'.$datos['codigoDetener']?>"><?php echo $datos["nombreDetener"]?></a>   
                                <?php }?>
                                <!--Boton finalizar  proceso-->
                                <?php if ( isset($datos["nombreFinalizar"])) { ?>
                                  <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/cambiar_estado/<?php echo $datos['idcafe'].'/'.$datos['codigoFinalizar']?>"><?php echo $datos["nombreFinalizar"]?></a>   
                                <?php }?>  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <a  class="btn btn-brown" href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_inicio">Cancelar</a>
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
  <div class="modal-dialog modal-sm " role="document">
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
            <p>
              <label>Proceso </label>
              <input  name="fecha" type="text" id="fecha" value="<?php echo $datos['nombreSiguiente'] ?>" size="20" />
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