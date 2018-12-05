<?php 
require RUTA_APP . '/vistas/inc/header.php' ?> 

  	<div class="col-md-12">
    <h2>Torrefaccion</h2>
  </div>
  	<section class="cart-wrap">
  		<div class="container">
  			<div class="row">
  				<div class="woocommerce">
  					<div class="page_woo woo_cart">
              <div class="col-md-12">
                <div class="col-sm-7">
                  <div class="footer-social">
                    <div class="title"></div>
                      <ul class="social">
                        <li><a href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/registrar_inicio" data-toggle="tooltip" title="Gestionar proceso de torrefacción!" ><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a></li>
                      </ul> 
                  </div>
                </div>
                <div class="col-sm-5" >
                        <div class="widget-area" role="complementary" style="margin: 20px;">
                            <aside class="widget">
                              <h4>Buscar</h4>
                              <div class="content">
                                <div class="form wp-searchform" method="get">
                                  <input  type="text" name="search"  id="buscar" onkeyup="buscarEstado()" placeholder="fecha">
                                  <button type="submit" class="fa fa-search"></button>
                                </div>
                              </div>
                            </aside>
                        </div>        
                </div>
              </div>
  						<form method="post">
  							<table class="shop_table shop_table_responsive cart" id="tbl_Estados">
  								<thead >
  									<tr  class="header">
    		              <th  class="product-remove">Lote</th>
                      <th class="product-remove">Estado</th>
                      <th class="product-remove">Fecha</th> 
  										<th colspan="2" class="product-remove">Registrado por</th>  										
  									</tr>

  								</thead>
  								<tbody  class="cart_item">
  									<?php foreach($datos['estados']  as $estado): ?>
  									<tr class="cart_item">
  										<td class="product-remove">					
											<?php echo $estado->codigoCafe;?>								
										  </td>
	  									<td class="product-remove">
											<?php echo $estado->codigoEstado;?>
										</td>
                    <td class="product-remove">
                      <?php echo $estado->fechaHora;?>        
                    </td>
										<td class="product-remove">
											<?php echo $estado->primerNombre;?>
											<?php echo $estado->segundoApellido;?>
										</td>
										<td class="product-remove">
											<?php echo $estado->documentoIdentidad;?>				
										</td>
									</tr>
									<?php endforeach;?>
  								</tbody>
  							</table>
  						</form>
              <div class="col-md-12">
             <div class="paging-navigation">
              <hr>
              <div class="pagination">


                  <a class="prev <?php  echo $datos['pagina']<= 1? 'disabled' :'' ?>"  href="<?php echo RUTA_URL;?>/Usuarios/index/<?php echo ($datos['pagina'])?>" >
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>Anterior
                  </a>

                  <?php for ($i=0; $i<$datos['numeroPaginas'] ; $i++): ?>

                    <a href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/index/<?php echo $i+1 ?> " class="page-numbers current <?php echo $datos['pagina']==$i+1 ? 'active':''?> "><?php echo $i+1 ?></a>
                  
                  <?php endfor?>
                
                  <a class="next <?php  echo $datos['pagina']>= $datos['numeroPaginas'] ? 'disabled' :'' ?>"  href="<?php echo RUTA_URL;?>/EstadosTorrefaccion/index/<?php echo $datos['pagina']+1 ?>">Siguiente
                  <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
              </div>
          </div>
        </div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 