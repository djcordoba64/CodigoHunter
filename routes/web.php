<?php


//Route::get('/', ['as' => 'home','uses'=>'PageController@home']); 
//Route::get('saludos/{nombre?}', ['as' => 'saludos','uses'=>'PageController@saludos'])-> where ('nombre',"[A-Za-z]+");


//Mensajes
//Route::resource('mensajes','MessagesController');
//Usuarios
//Route::resource('usuarios','UsuariosController');
Route::get('/', function(){
	return view('auth.login');
});

Route::post('login', 'Auth\LoginController@login')->name('login'); 

