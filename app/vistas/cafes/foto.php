<?php require RUTA_APP . '/vistas/inc/header.php' ?>
<section class="product-single">
		<div class="container">
			<div class="row">
			
			<form enctype="multipart/form-data"  action="<?php echo RUTA_URL;?>/Cafes/guardar_foto/<?php echo $datos['idcafe']?>" method="POST">
				<div class="col-md-5">
					<div class="product-image"><img src="<?php echo RUTA_URL.'/images/cafes/lote'.$datos['idcafe'].'.jpg'?>" alt=""></div>
					<div class="col-md-12">
						<input  type="file" name="imagen">
						<br/>				
					</div>
				</div>
				<div class="col-md-7">
					<h4 class="name">Lote</h4>
					<div class="top-price"><?php echo $datos['codigoCafe'] ?></div>				
					<div class="row">
						<div class="col-md-5">
						<div class="item">Especie: <strong><?php echo $datos['especie']?></strong></div>
						<div class="item">Variedad: <strong><?php echo $datos['variedad']?></strong></div>
						<div class="item">Poncentaje de humedad: <strong><?php echo $datos['porcentajeHumedad']?></strong></div>
						<div class="item">Factor de Rendimiento: <strong><?php echo $datos['factorRendimiento']?></strong></div>
						<div class="item">Tipo de tueste: <strong><?php echo $datos['variedad']?></strong></div>
						</div>
						
						<div class="col-md-7">
							<div class="item">Materia prima: <strong><?php echo $datos['Pnombre']?></strong></div>
							<div class="item">Tipo de beneficio: <strong><?php echo $datos['Tnombre']?></strong></div>
						</div>
					</div><br>
					<input value="Guardar" class="btn btn-brown" type="submit">
					<input value="Cerrar" class="btn btn-default" type="button" onclick="window.close();">															
				</div>
				
				</form>				
			</div>
		</div>
</section>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 