@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel -panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Inicio de sesion</h1>
				</div>
				<div class="panel-body">
					<form method="POST" action="{{ route('login')}}">
							{!!csrf_field()!!}
							<div class="form-group {{ $errors->has('usuario')? 'has-error':''}}">
								<label for="usuario">Usuario</label>
								<input class="form-control" 
									type="text" 
									name="usuario" 
									placeholder="Ingrese el número de identificación"  value="{{old('usuario')}}">
								{!!$errors->first('usuario','<span class="help-block">:message</span>')!!}
							</div>
							<div class="form-group {{ $errors->has('contrasena')? 'has-error':''}}">
								<label for="contrasena">Contraseña</label>
								<input class="form-control" 
									type="password" 
									name="contrasena" 
									placeholder="Ingrese la contraseña" value="{{old('contrasena')}}">
									{!!$errors->first('contrasena','<span class="help-block">:message</span>')!!}
							</div>
						<button class="btn btn-primary btn-block">Acceder</button>
					</form>				
				</div>			
			</div>		
		</div>
	</div>
@endsection
