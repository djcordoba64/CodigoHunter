<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="container">
	<div class="col-md-12">
		<h2>Gestionar trazabilidad del café</h2>
	</div>
	<?php var_dump($datos) ?>
	<div class="contact-wrap">		
			<div class="row">
				<div class="col-md-12">
					<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>     
						<form class="contact-form"  >
							<p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">

						        <label for="codigoCafe" class="">Código del café<abbr class="required" title="required">*</abbr></label>
							</p>
							<div class="row">
  								<div class="col-md-3">
  									<input disabled name="codigoCafe" value="<?php echo isset($datos['codigoCafe'])? $datos['codigoCafe'] : '';?>">
  								</div>
  								<div class="col-m9">
                    <?php if ( $datos["nombreProceso"]=="TRP") { ?>
                    <input type="button" class="btn btn-brown" data-toggle="modal" data-target="#IniciarTrilla" onclick="registrar_estadoTR(<?php echo $datos['idcafe']?>)" value="<?php echo "Iniciar"." ".$datos["proceso"]?>">
                    <?php }?>
                  						
  								</div>							
								</div>
							</div>	
						</form>					
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
           
            <p>
              <label>Fecha</label>
              <input  name="fecha" type="text" id="fecha" value="<?php echo date("m/d/Y"); ?>" size="10" />
            </p>
            <p>
              <label>Hora</label>
              <input type="" disabled name="Hora" id="fechaHora" value="">
            </p>
        
      </div>
      <div class="modal-footer">
      <a  class="btn btn-sm btn-default"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_inicio_Trilla/<?php echo $datos['idcafe']?>">Iniciar</a>       
      </div>
    </div>
  </div>
</div>


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 