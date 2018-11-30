<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<?php echo var_dump($datos) ?>
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
					<div class="description"></div>

				</div>
				<div class="col-md-7">
					<h4 class="name">Lote</h4>
					<div class="top-price"><?php echo $datos['codigoCafe'] ?></div>				
					<div class="row">
						<div class="col-md-5">
						<div class="item">Especie: <strong><?php echo $datos['especie']?></strong></div>
						<div class="item">Variedad: <strong><?php echo $datos['variedad']?></strong></div>
						
						</div>
						<div class="col-md-7">
						
						</div>
					</div><br>
					<input value="Guardar" class="btn btn-brown" type="submit">															
				</div>
				
				</form>				
			</div>
		</div>
	</section>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 