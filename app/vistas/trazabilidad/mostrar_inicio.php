<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- TESTIMONIALS -->
	<section class="testimonials">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Consultar la trazabilidad de Torrefacción del café</h2>
				</div>
				<div class="col-md-8 col-md-offset-2 testimonials-list">
					<div class="review-item">
						<div class="quote">			
							<i class="glyphicon glyphicon-thumbs-up"><p  style="color: #EBDFC5; font-size:40px">Bienvenido!</p></i>
						</div>
			    		<p class="text">Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. Donec pulvinar tellus eget magna aliquet ultricies. Praesent gravida hendrerit ex, nec eleifend sem convallis vitae. Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. </p>
			    		<div class="name"><a href="#" class="btn btn-default" data-toggle="modal" data-target="#mostrarInicio_Modal">Ingresar</a></div>
			    	</div>
				</div>				
			</div>
		</div>
	</section>
	<!-- TESTIMONIALS END -->




<!-- Modal iniciar proceso-->
<div class="modal fade" id="mostrarInicio_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document" >
    <div class="modal-content">
      <div class="modal-header" >
         <h2>Consultar proceso</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="woocommerce">
			<form class="checkout ">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div id="customer_details">
						    <div class="woocommerce-billing-fields">						       
						        
						        	<div class="col-md-12">
							        	<p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
							                <label for="billing_company" class="">Número de recibo</label>
							                <input class="input-text " name="billing_company" id="billing_company" placeholder="" value="" autocomplete="organization" type="text">
							       		</p>
						       		
						        </div>
						    </div>
						</div>	
					</div>
				</div>
			</div>
			</form>
		</div>
	
      <div class="modal-footer">         
       <a  class="btn btn-sm btn-brown"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/cambiar_estado/">Consultar</a>
      
      </div>       
      </div>

  </div>
</div>
</div>

	
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 