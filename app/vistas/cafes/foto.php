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
					<div class="description"></div>

				</div>
				<div class="col-md-7">
					<h4 class="name">Lote</h4>
					<div class="top-price"><?php echo $datos['codigoCafe'] ?></div>				
					<div class="row">
						<div class="col-md-5">
						<div class="item">Especie: <a href="#">Coffee</a></div>
						<div class="item">Variedad: <strong>10</strong></div>
						<div class="item">Materia prima: <a href="#">Coffee,</a> <a href="#">Robusta</a></div>
						<div class="item">Variedad: <strong>10</strong></div>
						<div class="item">Tipo de beneficio: <strong>10</strong></div>
						</div>
						<div class="col-md-7">
						<div class="item">Especie: <a href="#">Coffee</a></div>
						<div class="item">Variedad: <strong>10</strong></div>
						<div class="item">Materia prima: <a href="#">Coffee,</a> <a href="#">Robusta</a></div>
						<div class="item">Variedad: <strong>10</strong></div>
						<div class="item">Tipo de beneficio: <strong>10</strong></div>
						</div>
					</div><br>
					<input value="Guardar" class="btn btn-brown" type="submit">															
				</div>
				
				</form>				
			</div>
		</div>
	</section>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 