<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<div>
	<div class="col-md-12">
		<h2>Gestionar trazabilidad de Torrefacción</h2>
	</div>
	<div class="container" >
	    <div class="row">
	        <div class="col-md-12" style="padding: 40px;">
	            <div class="well well-sm" style="background: #f5f2eb;">
	                <form class="form-horizontal" action="<?php echo RUTA_URL;?>/EstadosTorrefaccion/validar_cafeExiste" method="POST">
	                    <fieldset>
	                        <legend class="text-center header"><label>*Ingrese el código de lote del  café para seguir con el proceso.</label></legend>

	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center">
	                            	<label for="codigoCafe" class="">Código<abbr class="required" title="required">*</abbr></label>
	                            </span>
	                            <div class="col-md-4">
	                                <input id="" required name="codigoCafe" type="text"  class="form-control" placeholder="Codigo del café"  value="">
	                                <span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>  
	                            </div>

	                            <div class="col-md-4">
	                               <input value="Consultar" class="btn btn-lg btn-brown" type="submit">
	                            </div>
	                        </div>
	                        <div class="col-md-12" style="padding: 20px" >
						<a href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/index" class="btn btn-bordered">Cancelar</a>
					</div>
	                    </fieldset>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>	
</div>
	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 