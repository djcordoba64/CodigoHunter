<?php
// Start the session
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="icon" type="image/png" href="images/favicon.png">
<title>Hunter</title>

<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway:300,400,700,800" rel="stylesheet">

<!-- CSS FILES -->
<link href="<?php echo RUTA_URL ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo RUTA_URL ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo RUTA_URL ?>/css/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo RUTA_URL ?>/css/zoomslider.css" rel="stylesheet" type="text/css" />
<link href="<?php echo RUTA_URL ?>/css/style.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL ?>/css/estilos.css">
</head>
<body>
  <!-- TOP BAR -->
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <ul class="top-bar-contacts">
            <li><i class="fa fa-phone" aria-hidden="true"></i>+80 (041) 2824 504 43</li>
            <li class="mail"><i class="fa fa-envelope-o" aria-hidden="true"></i>orders@mistercoffee.us</li>
            <li class="skype"><i class="fa fa-user" aria-hidden="true"></i><?php echo $_SESSION["nombreCompleto"];?></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 top-social-wrap">
          <ul class="top-social">
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- TOP BAR END -->
  <!-- HEADER -->
  <div class="header-wrap">
    <header class="top-nav inner-page" data-spy="affix" data-offset-top="34">
      <div class="container">
        <div class="row position-relative">
          <div class="col-lg-2 col-md-2">
            <a href="<?php echo RUTA_URL."/paginas/index";?>" class="small-logo alt"><img src="images/small-logo.png" alt=""></a>  
          </div>
          <div class="col-lg-10 col-md-10">
            <nav class="navbar collapse navbar-collapse" id="coffee-menu">
              <div class="col-lg-10 col-md-10">
                <ul class="main-menu nav">
                  <li><a href="<?php echo RUTA_URL."/paginas/index";?>">Inicio</a></li>
                  <li class="parent">
                    <a href="#">Usuarios</a>
                    <ul class="sub-menu">
                      <li><a href="/Hunter/Usuarios/index">Administrar</a></li>
                      <li><a href="/Hunter/Usuarios/agregar">Registrar</a></li>
                    </ul>
                  </li>

                  <li class="parent">
                    <a href="#">Clientes</a>
                    <ul class="sub-menu">
                      <li><a href="/Hunter/Cliente/index">Administrar</a></li>
                      <li><a href="/Hunter/Cliente/crear">Registrar</a></li>
                    </ul>
                  </li>
                  
                  
                </ul>
              </div>
              <div class="col-lg-2 col-md-12">
                <div class="top-right">
                  <a href="/Hunter/Login/cerrarSesion" class="cart">
                    <span class="name">Cart</span>
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </a>
                  <a href="cart.html" class="cart">
                    <span class="name">Cart</span>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="count">0</span>
                  </a>
                  <div class="top-search">
                    <input type="text" placeholder="Search">
                    <a href="#" class="fa fa-search search" aria-hidden="true"></a>
                  </div>
                </div>
              </div>
            </nav>
          </div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#coffee-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
      </div>
    </header>
  </div>
  <!-- HEADER END -->

  <!-- PAGE HEAD -->
    <section class="page-head">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li><a href="<?php echo RUTA_URL;?>/paginas">Inicio</a></li>
              <li>Administrar clientes</li>
            </ul>
            <h1>Administrar</h1> 
          </div>
        </div>
      </div>
    </section>
  <!-- PAGE HEAD END -->
