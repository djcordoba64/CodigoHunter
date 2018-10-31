
<!-- SUBSCRIBE FORM -->

	<section class="subscribe">
		<div class="container ">
			<div class="row">
				<div class="col-md-12">
					<div class="inner">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="top-title">Want to know about new types of coffee?</div>
								<div class="bottom-title">Get our weekly email</div>
							</div>
							<div class="col-lg-5 col-md-6">
								<form class="subs-form">
									<input type="text" placeholder="Enter Your Email">
									<input type="submit" value="SUBMIT">
								</form>
							</div>	
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<!-- SUBSCRIBE FORM END -->

	<!-- FOOTER -->
	<footer class="footer">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-6">
						<a href="#" class="footer-logo"><img src="images/footer-logo.png" alt=""></a>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="footer-about">
							<div class="title">About Mr.Coffee</div>
							<p>Sed sagittis sodales lobortis. Curabitur in eleifend<br> turpis, id vehicula odio. Donec pulvinar tellus<br> eget magna aliquet ultricies. </p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<ul class="footer-contacts">
							<li><i class="fa fa-phone" aria-hidden="true"></i>+80 (041) 2824 504 43</li>
							<li><i class="fa fa-envelope-o" aria-hidden="true"></i>orders@mistercoffee.us</li>
							<li><i class="fa fa-skype" aria-hidden="true"></i>mrcoffee</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="footer-social">
							<div class="title">Follow Us</div>
							<ul class="social">
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="copyrights"><a href="#">Just-themes</a> 2017 &copy; All Rights reserved <a href="#">Terms of Use</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- FOOTER END -->

<!-- JAVASCRIPT FILES -->
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTRSHf8sjMCfK9PHPJxjJkwrCIo5asIzE"></script>	
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/map-style.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/jquery.zoomslider.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/waypoint.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/custom-number.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/jquery.select2.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="<?php echo RUTA_URL ?>/js/main.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		/*cargar_Departamentos();
		$("#departamento").change(function(){dependencia_municipio();});
		$("#municipio").attr("disabled",true);*/

		$.each(deptos, function(idx, depto)
		{
			var o = new Option(depto.departamento, depto.id_departamento);
			/// jquerify the DOM object 'o' so we can use the html method
			$(o).html(depto.departamento);
			$("#departamento").append(o);
		}
		);

	});


		$( "#departamento" ).change(function() {
			$('#municipio').empty();

			var deptoId = $("#departamento").val();

  			$(municipios).filter(function (i,n){
        		return n.departamento_id==deptoId;
    		}).each(function(idx, municipio)
			{				
				var o = new Option(municipio.municipio, municipio.id_municipio);
			/// jquerify the DOM object 'o' so we can use the html method
				$(o).html(municipio.municipio);
				$("#municipio").append(o);
			}
			);
		});

	var deptos = <?php echo $datos["deptos"];?>;


	var municipios = <?php echo $datos["municipios"];?>;


</script>

</body>

</html>
