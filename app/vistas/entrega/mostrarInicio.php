<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<div>
	<div class="col-md-12">
		<h2>Gestión de entrega</h2>
	</div>
	<div class="container" >
	    <div class="row">
	        <div class="col-md-12">	           
				<div class="widget-area" role="complementary"">
					<aside class="widget">
						<div class="col-sm-12" style="margin: 20px;">
							<u style="color: #b89d64; "><p  style="color: #b89d64; font-size:35px">Búsqueda</p></u>							
						</div>
						<div class="col-sm-12">
							<div class="col-sm-4">
								<div class="content">
									<div class="form wp-searchform" method="get">
										<label>*Fecha en que se registro la recepción</label>
										<input  type="text" name="search"  id="buscar" onkeyup="buscarCliente()" placeholder="fecha de la recepción">
										<button type="submit" class="fa fa-search"></button>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="content">
									<div class="form wp-searchform" method="get">
										<label>*Número de recibo</label>
										<input  type="text" name="search"  id="buscar" onkeyup="buscarCliente()" placeholder="Número de recibo">
										<button type="submit" class="fa fa-search"></button>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="content">
									<div class="form wp-searchform" method="get">
										<label>*Número de documento del cliente</label>
										<input  type="text" name="search"  id="buscar" onkeyup="buscarCliente()" placeholder="Documento de identidad">
										<button type="submit" class="fa fa-search"></button>
									</div>
								</div>
							</div>
						</div>
					</aside>
				</div>
				<div  style="margin: 20px;">
					 <table class="shop_table shop_table_responsive cart" id="tbl_Recepcion" >
					                <thead>
					                    <tr class="header">
					                    	<th class="product-remove">Recibo</th>	
					                    	<th class="product-remove">Fecha</th>                    		
					                    	<th class="product-remove">Cliente</th>
											<th class="product-remove">Documento</th>							
											<th class="product-remove">Estado</th>
											<th class="product-remove">Acciones</th>
					                    </tr>
					                </thead>
					                <tbody  class="cart_item">
																
									
					                </tbody>
					            </table>
					
				</div>	      
							
	        </div>
	    </div>
	</div>	
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>