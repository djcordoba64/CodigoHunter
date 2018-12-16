<?php 
	function enviarCorreo($para,$asunto,$mensaje){
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $de = "test@hostinger-tutorials.com";
    $encabezado = "From:" . $de;
    mail($para,$asunto,$mensaje, $encabezado);
    }
    ?>