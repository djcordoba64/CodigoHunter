<?php require RUTA_APP . '/vistas/inc/header.php' ?>

<!-- SHOP -->
	<div class="shop-wrap">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8">
					<div class="product-list">
						<div class="row">
							<div class="col-md-12">
								<div class="woocommerce-toolbar">
									<div class="row">
										<div class="col-md-8 col-sm-6">
											<div class="result">Showing 1–10 of 12 results</div>
										</div>
										<div class="col-md-4 col-sm-6">
											<select style="width: 100%" class="woo-sort select2-hidden-accessible" tabindex="-1" aria-hidden="true">
							                    <option value="">Sort by newness</option>
							                    <option value="">Sort by score</option>
							                </select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="product-item">
									<div class="img-wrap"><a href="product.html"><img src="images/prod-img.jpg" alt=""></a></div>
									<a href="product.html" class="name">100%  Arabica</a>
									<div class="text">Professional espresso serie</div>
									<div class="price">$19</div>
									<a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add to cart</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="product-item">
									<div class="img-wrap"><a href="product.html"><img src="images/prod-img1.jpg" alt=""></a></div>
									<a href="product.html" class="name">Espresso Premium</a>
									<div class="text">Professional espresso serie</div>
									<div class="price">$46</div>
									<a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add to cart</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="product-item">
									<div class="img-wrap"><a href="product.html"><img src="images/prod-img.jpg" alt=""></a></div>
									<a href="product.html" class="name">100%  Arabica</a>
									<div class="text">Professional espresso serie</div>
									<div class="price">$19</div>
									<a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add to cart</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="product-item">
									<div class="img-wrap"><a href="product.html"><img src="images/prod-img1.jpg" alt=""></a></div>
									<a href="product.html" class="name">Espresso Premium</a>
									<div class="text">Professional espresso serie</div>
									<div class="price">$46</div>
									<a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i>add to cart</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<aside class="shop-sidebar">
					    <div class="widget-area">
					        <ul>
					            <li class="widget-container woocommerce widget_shopping_cart">
					                <h3 class="widget-title">Shoping Cart</h3>
					                <div class="widget_shopping_cart_content">
					                    <ul class="cart_list product_list_widget ">
					                        <li class="mini_cart_item">
					                            <a href="#" class="remove" aria-label="Remove this item"><i class="fa fa-close" aria-hidden="true"></i></a>
					                            <a href="product.html" class="name">
					                                <img src="images/cart-item-img.jpg" alt="">Espresso Premium
				                                </a><br>
					                            <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>46</span>
					                            </span>
					                        </li>
					                    </ul>
					                    <div class="sub-total"><strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>46</span></div>
					                    <div class="total"><strong>Total:</strong> <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>46</span></div>
					                    <p class="buttons">
					                        <a href="cart.html" class="button">VIEV CART</a>
					                        <a href="checkout.html" class="button checkout">CHECKOUT</a> 
				                        </p>
					                </div>
					                <div class="clearfix"></div>
					            </li>
					            <li class="widget-container woocommerce widget_product_categories">
					                <h3 class="widget-title">Categories</h3>
					                <ul class="product-categories">
					                    <li class="cat-item">
					                    	<a href="#">Coffee</a>
					                    </li>
					                    <li class="cat-item">
					                    	<a href="#">Tea</a>
					                    </li>
					                    <li class="cat-item">
					                    	<a href="#">Desserts</a>
					                    </li>
					                </ul>
					                <div class="clearfix"></div>
					            </li>
					            <li class="widget-container woocommerce widget_price_filter">
					                <h3 class="widget-title">Filter by Price</h3>
					                <form>
					                    <div class="price_slider_wrapper">
					                        <div id="slider-range"></div>
					                        <div class="amount-wrap">
						                        <label>Price:</label>
	  											<span id="amount"></span>
  											</div>
  											<button class="filter-btn">FILTER</button>
					                    </div>
					                </form>
					                <div class="clearfix"></div>
					            </li>
					            <li class="widget-container">
					            	<h3 class="widget-title">Tags</h3>
					            	<div class="tag-cloud">
					            		<a href="#">Coffee,</a>
					            		<a href="#">Tea,</a>
					            		<a href="#">Desserts,</a>
					            		<a href="#">Arabica,</a>
					            		<a href="#">Robusta,</a>
					            		<a href="#">Market,</a>
					            		<a href="#">Chinesse</a>
					            	</div>
					            </li>
					        </ul>
					    </div>
					</aside>
				</div>
			</div>
		</div>
	</div>
<!-- SHOP END -->

<?php require RUTA_APP . '/vistas/inc/footer.php' ?>