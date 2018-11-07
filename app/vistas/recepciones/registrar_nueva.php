<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<!--Recepción del café-->
<h1>Recepción</h1>
<section class="cart-wrap">
	<div class="col-md-12">
		<h2>Agregar cliente</h2>
	</div>
		<div class="container">
			<div class="woocommerce">
				<form class="checkout woocommerce-checkout" action="<?php echo RUTA_URL;?>/Cliente/registrar_consultar" method="POST">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div id="customer_details">
								    <div class="woocommerce-billing-fields">
								    	<p>
										<span class="badge badge-danger"><?php isset($datos["mensaje_error"])? print($datos["mensaje_error"]):''; ?></span>							 
			      						</p>						        
								        <div class="woocommerce-billing-fields__field-wrapper">
									        <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
									        <label for="billing_first_name" class="">Primer Nombre: <abbr class="required" title="required">*</abbr></label>
									        <input type="text" class="input-text"  name="primerNombre" autofocus="autofocus" required value="<?php echo $datos['primerNombre']?>">							
							  			</p>
				</div>
			</div>
		</div>
	</div>
</seption>



<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 