<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div>
	<div class="col-md-12">
		<h2>Gestionar trazabilidad del café</h2>
	</div>
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="well well-sm">
	                <form class="form-horizontal" action="<?php echo RUTA_URL;?>/EstadosTorrefaccion/validar_cafeExiste" method="POST">
	                	<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>  
	                    <fieldset>
	                        <legend class="text-center header">*Ingrese el código del café para seguir con el proceso.</legend>

	                        <div class="form-group">
	                            <span class="col-md-1 col-md-offset-2 text-center">
	                            	<label for="codigoCafe" class="">Código<abbr class="required" title="required">*</abbr></label>
	                            </span>
	                            <div class="col-md-4">
	                                <input id="" required name="codigoCafe" type="text"  class="form-control" placeholder="Codigo del café"  value="">
	                            </div>
	                            <div class="col-md-4">
	                               <input value="Consultar" class="btn btn-lg btn-brown" type="submit">
	                            </div>
	                        </div>
	                    </fieldset>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>	
</div>
	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 