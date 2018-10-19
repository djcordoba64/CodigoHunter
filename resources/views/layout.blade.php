<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>
		.active{
			text-decoration: none;
			color:green;
		}
		.error{
			
			color:red;
			font-size:12px;
		}
	</style>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	<header>
		<?php function activeMenu($url){
			return request()->is($url) ? 'active': '';

		} ?>
		<nav>
			<a class= "{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
			<a class= "{{ activeMenu('saludos*') }}" href="{{ route('saludos','Mauricio')}}">Saludo</a>

			<a class= "{{ activeMenu('mensajes/create')}}" href="{{ route('mensajes.create')}}" >Contactos</a>
			<a class= "{{ activeMenu('mensajes')}}" href="{{ route('mensajes.index')}}" >Mensajes</a>

			<a class= "{{ activeMenu('usuarios/create')}}" href="{{ route('usuarios.create')}}" > Usuarios</a>
			<a class= "{{ activeMenu('usuarios')}}" href="{{ route('usuarios.index')}}" >Lista suarios</a>

		
		</nav>
	</header>

@yield('contenido')
<footer>Copyright ©{{date('Y')}}</footer>
</body>
</html>