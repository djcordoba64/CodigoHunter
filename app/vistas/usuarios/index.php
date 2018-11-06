<?php 
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

require RUTA_APP . '/vistas/inc/header.php' ?> 

  <!-- PAGE HEAD -->
    <section class="page-head">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?php echo RUTA_URL;?>/paginas">Inicio</a></li>
              <li>Usuarios</li>
            </ul>
            <h1>Administrar</h1> 
          </div>
        </div>
      </div>
    </section>
  <!-- PAGE HEAD END -->
  <!--Lista de los usuarios registrador-->
  	<div class="col-md-12">
		<h3>Usuarios Registrados</h3>
  	</div>
  	<section class="cart-wrap">
  		<div class="container">
  			<div class="row">
  				<div class="woocommerce">
  					<div class="page_woo woo_cart">
  						<form method="post">
  							<table class="shop_table shop_table_responsive cart">
  								<thead>
  									<tr>
  										<th class="product-remove">Documento</th>
										<th class="product-remove">Nombre</th>
										<th class="product-remove">Apellidos</th>
										<th class="product-remove">Correo</th>
										<th class="product-remove">Contácto</th>
										<th class="product-remove">Dirección</th>
										<th class="product-remove">Rol</th>
										<th class="product-remove">Estado</th>
										<th class="product-remove">Acciones</th>
  									</tr>
  								</thead>
  								<tbody  class="cart_item">
  									<?php foreach($datos['personas']  as $usuario): ?>
  									<tr class="cart_item">
  										<td class="product-remove">					
											<?php echo $usuario->documentoIdentidad;?>								
										</td>
	  									<td class="product-remove">
											<a href="<?php echo RUTA_URL;?>/Usuarios/detalle/<?php echo $usuario->idPersona;?>">
												<?php echo $usuario->primerNombre;?>
												<?php echo $usuario->segundoNombre;?>
											</a>
										</td>
										<td class="product-remove">
											<?php echo $usuario->primerApellido;?>
											<?php echo $usuario->segundoApellido;?>
										</td>
										<td class="product-remove">
											<?php echo $usuario->correo;?>				
										</td>
										<td class="product-remove">
											<?php echo $usuario->numeroContacto;?>				
										</td>
										<td class="product-remove">
											<?php echo $usuario->direccion;?>				
										</td>
										<td class="product-remove">
											<?php echo $usuario->rol; ?>
										</td>
										<td class="product-remove">
											<?php echo $usuario->estado;?>				
										</td class="product-remove">
										<td class="product-remove">
                      <a href="<?php echo RUTA_URL;?>/Usuarios/editar/<?php echo $usuario->idPersona;?>" class="btn btn-sm btn-default">
                       <span class="glyphicon glyphicon-edit"></span> Editar
                      </a>		
										</td>
									</tr>
									<?php endforeach;?>
  								</tbody>
  							</table>
  						</form>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 