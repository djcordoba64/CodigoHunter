<script type="text/javascript" src="<?php echo RUTA_URL ; ?>/
	js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

	/*[
      {
        "id": 1,
        "nombre": "Antioquia"
      },
      {
        "id": 2,
        "nombre": "Valle"
      }
    ];*/
  

var municipios = <?php echo $datos["municipios"];?>;
/*
[{
 		"id": 1,
 		"nombre": "Medellin",
 		"depto": 1
 	},
 	{
 		"id": 2,
 		"nombre": "Envigado",
 		"depto": 1
 	},
 	{
 		"id": 3,
 		"nombre": "Cali",
 		"depto": 2
 	},
 	{
 		"id": 4,
 		"nombre": "Tulua",
 		"depto": 2
 	}
 ];
*/

	/*function cargar_Departamentos()
	{
		$.get("helpers/listarDepartamentos.php", function(resultado){
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$('#departamento').append(resultado);			
			}
		});	
	}
	function dependencia_municipio()
	{
		var id_departamento = $("#departamento").val();
		$.get("helpers/dependenciasMunicipios.php", { id_departamento: id_departamento },
			function(resultado)
			{
				if(resultado == false)
				{
					alert("Error");
				}
				else
				{
					$("#municipio").attr("disabled",false);
					document.getElementById("estado").options.length=1;
					$('#municipio').append(resultado);			
				}
			}

		);
	}*/

</script>

</body>
</html>
