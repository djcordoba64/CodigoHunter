
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.0/sweetalert2.min.js"></script>	
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
	//document.ready: todo lo que este dentro de esta funcion se ejecuta solo cuando el documento esta completamente cargado
	$(document).ready(function(){

		if(cerrar){ close();}
		
		//2.crear los items del combo a partir de la variable javascript creada en el paso 1


		$.each(fincas, function(idx, finca)// primer parametro (idx)  = variable "i" que uno crea para los ciclos, la segunda es el objeto que nos llego de php
		{
			// esto se ejecuta por cada objeto de el arreglo de php
			// crear una option individual con el texto y el value deseado
			var o = new Option(finca.nombreFinca, finca.idDetalleFinca);
			
			$(o).html(fincas.nombreFinca);
			// finalmente agrega al combo el nuevo item
			$("#fincas").append(o);
		}
		);

		$.each(deptos, function(idx, depto)
		{
			var o = new Option(depto.departamento, depto.id_departamento);
			$(o).html(depto.departamento);
			$("#departamento").append(o);
		}
		);

		$.each(materias, function(idx, materia)
		{
			var o = new Option(materia.nombre, materia.idmateriaprima);
			$(o).html(materia.nombre);
			$("#materia").append(o);
		}
		);

		$.each(beneficios, function(idx, beneficio)
		{
			var o = new Option(beneficio.nombre, beneficio.idtipoBeneficio);
			$(o).html(beneficio.departamento);
			$("#beneficio").append(o);
		}
		);

	});

		//esto es solo para que el segundo combo se cargue en cascada dependiendo del primero
		$( "#departamento" ).change(function() {
			$('#municipio').empty();

			var deptoId = $("#departamento").val();

  			$(municipios).filter(function (i,n){
        		return n.departamento_id==deptoId;
    		}).each(function(idx, municipio)
			{				
				var o = new Option(municipio.municipio, municipio.id_municipio);
				$(o).html(municipio.municipio);
				$("#municipio").append(o);
			}
			);
		});

		//esto es para cargar los datos de la finca en los campos
		$( "#fincas" ).change(function() {
			
			// sacar id finca seleccionada
			var fincaId = $("#fincas").val();

			// encontrar ojecto del arreglo de fincas de javascript mediante su id
  			var finca = $.grep(fincas, function (element, index) {
    			return element.idDetalleFinca === fincaId;
			});

  			if(finca.length>0){
			//despues de encontrado se cargan los datos en los campos
			$('#nombreFinca').val(finca[0].nombreFinca);
  			$('#municipio').val(finca[0].municipio);
  			$('#vereda').val(finca[0].vereda);
  			$('#Temperatura').val(finca[0].Temperatura);
  			


  			//por ultimo mostrar el div de los datos de la finca

  			$('#divDetalleFinca').show();
  		}
  		else
		{
			$('#nombreFinca').val("");
			$('#municipio').val("");
			$('#vereda').val("");
			$('#Temperatura').val("");

  			


  			//por ultimo mostrar el div de los datos de la finca

  			$('#divDetalleFinca').hide();
		}


		});

	var deptos = <?php echo isset($datos["deptos"])? $datos["deptos"]:"[]";?>;


	var municipios = <?php echo isset($datos["municipios"])? $datos["municipios"]:"[]";?>;

	// 1. crear una variable javascript con la variable donde estan los items de php.
	var fincas = <?php echo isset($datos["fincas"])? $datos["fincas"]:"[]";?>;

	var materias = <?php echo isset($datos["materias"])? $datos["materias"]:"[]";?>;

	var beneficios = <?php echo isset($datos["beneficios"])? $datos["beneficios"]:"[]";?>;

	var cerrar = <?php echo isset($datos["cerrar"])? $datos["cerrar"]:"false";?>;

	  function submitForm(action) {
	    var form = document.getElementById('form1');
	    form.action = action;
		$("#form1").validate();
		if($("#form1").valid()){
	    	form.submit();
		}
		else
		{
			$("#form1").reportValidity();
		}
	  }
	//buscar usuarios.
	function buscarUsuario() {
	  // Declare variables 
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("buscar");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("tbl_Usuarios");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}

	//buscar Cliente.
	function buscarCliente() {
	  // Declare variables 
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("buscar");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("tbl_Cliente");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//mensaje 
$('[data-toggle="tooltip"]').tooltip(); 


//Se utiliza para que el campo de texto solo acepte numeros
function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
 }
 else{
  return false;
 }
}

//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
        return false;
      }	
}
//validar número telefono
function validarLenght(Objeto){
	if(Objeto.length < 7){
		alert('Lo minimo de carácteres son 6.');
		}
	else if(Objeto.length > 15){ 
		}
	} 



function exito(){
	swal("Good job!", "You clicked the button!", "success");
}

//mostrar opción para cambiar contrasena
   
function MostrarSiNoContrasena(sel) {
      if (sel.value=="opc1"){
           divSi = document.getElementById("mostrar");
           divSi.style.display = "";

           divNo = document.getElementById("noMostrar");
           divNo.style.display = "none";

           document.getElementById("contrasena").required = true;

           document.getElementById("confi_Contrasena").required = true;

      }else{

           divSi= document.getElementById("mostrar");
           divSi.style.display="none";

           divNo = document.getElementById("noMostrar");
           divNo.style.display = "";

           document.getElementById("contrasena").removeAttribute("required");

           document.getElementById("confi_Contrasena").removeAttribute("required");
      }
}


    


</script>


</body>

</html>
