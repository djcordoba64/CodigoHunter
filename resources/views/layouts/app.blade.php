<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Hunter</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	<div class="container">
		<hr>
		@yield('content')
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
	</div>

</body>
</html>