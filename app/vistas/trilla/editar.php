<?php require RUTA_APP . '/vistas/inc/header.php' ?>


<!-- CART --> 
<section class="">
    <div class="woocommerce">
      <div class="product-single"">
      <form class="" action="<?php echo RUTA_URL;?>/DatosTrilla/editar/<?php echo $datos['idDatoTrilla']?>" method="POST">
        <h2>TRILLA</h2>  
        <div class="container">
          <div class="row">
          <div class="col-md-7">
            <h4>Datos a actualizar.</h4>
            <hr>
              <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="mermaTrilla" class="">Merma Trilla<span  style="color: #b89d64;font-size:20px"> % </span><abbr class="required" title="required">*</abbr></label>
                  <div class="quantity">                  
                    <input type="number" name="mermaTrilla"  min="1"  step="1" value="<?php echo isset($datos['mermaTrilla'])? $datos['mermaTrilla'] : '';?>" required>
                  </div>
              </div>
              <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="mallas" class="">Mallas<span  style="color: #b89d64;font-size:20px">  </span><abbr class="required" title="required">*</abbr></label>
                  <div class="quantity">                  
                    <input type="number" name="mallas"  min="1"  step="1" value="<?php echo isset($datos['mallas'])? $datos['mallas'] : '';?>" required>
                  </div>
              </div>
              <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="pesoCafeVerde" class="">Peso verde<span  style="color: #b89d64;font-size:20px">  </span><abbr class="required" title="required">*</abbr></label>
                  <div class="quantity">                  
                    <input type="number" name="pesoCafeVerde"  min="1"  step="1" value="<?php echo isset($datos['pesoCafeVerde'])? $datos['pesoCafeVerde'] : '';?>" required>
                  </div>
              </div><br>              
            <div class="woocommerce-additional-fields">
              <div class="woocommerce-additional-fields__field-wrapper">
                  <p class="form-row notes">
                    <label for="observacion" class="">Observación</label>
                    <textarea name="observacion" class="input-text"  rows="2" cols="5"><?php echo $datos['observacion'] ?></textarea>
                  </p>
              </div>
            </div>
            <div class="col-md-12 text-center" style="margin: 20px;">
            <!--Input de type hidden-->                
              <input value="Cancelar" class="btn btn-lg btn-bordered" type="submit"/>
              <input value="Guardar" class="btn btn-lg btn-brown" type="submit"/>
              <input hidden  name="codigoCafe" value="<?php echo $datos['codigoCafe'] ?>"/>
            </div>             
          </div>
          <div class="col-md-3 col-md-offset-1">

             <h4>
              <input hidden  name="codigoSiguiente" value="<?php echo $datos['codigoSiguiente'] ?>"/>
              <input hidden  name="idcafe" value="<?php echo $datos['idcafe'] ?>"/>
             </h4>
            <aside class="shop-sidebar">
              <div class="widget-area">
                  <ul>
                      <li class="widget-container woocommerce widget_shopping_cart">
                          <div class="widget_shopping_cart_content">
                              <ul class="cart_list product_list_widget ">
                                  <li class="mini_cart_item">
                                     <div class="name"><strong>Lote</strong><br>      
                                      <span class="quantity">
                                        <span class="woocommerce-Price-amount amount" style="color: #b89d64;font-size:25px">
                                          <?php echo $datos['codigoCafe'] ?></span>
                                      </span>
                                  </li>
                                  <li class="mini_cart_item">
                                     <div class="name"><strong>Fecha</strong><br>                                     
                                      <span class="quantity">
                                        <span class="woocommerce-Price-amount amount" >
                                          <span class="woocommerce-Price-currencySymbol"> <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> </span> <?php echo date("m/d/Y g:ia"); ?></span>
                                      </span>
                                  </li>
                              </ul>
                              
                          </div>
                          <div class="clearfix"></div>
                      </li>
                  </ul>
              </div>
            </aside>            
          </div> 
        </div>
      </div>    
      </form>
    </div>
  </div>
</section>
  <!-- CART END --> 


<?php require RUTA_APP . '/vistas/inc/footer.php' ?> 