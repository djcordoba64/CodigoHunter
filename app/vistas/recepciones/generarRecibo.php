<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div class="container">
	<div class="col-md-12">
		<h2>Recepción del café</h2>
	</div>
	<div class="contact-wrap">		
		<div class="row">
			<div class="col-md-12">	
				
				<form id="form1" method="POST">													
				<div class="contact-form">
					<div class="row" style="background-color:#fff;height:30%;">										<div class="col-md-6" style="margin: 30px;" >
							<label>Generar recibo de la recepción</label>							
							<input align="center" name="recibo" onChange="MostrarRecibo(this)" class="btn btn-sm btn-default" type="button" id="generarRecibo" value="Generar">
						</div>
						<div class="col-md-12" style="margin: 30px;display:none;" id="tbl_recibo" >
							<div  class="col-md-3">
									<h1>Recibo</h1>							
							</div>
							
						</div>
																					
					</div>					
				</div>
				
				</form>				
			</div>
		</div>
	</div>
</div>
        
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 