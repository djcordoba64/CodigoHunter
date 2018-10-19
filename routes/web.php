<?php


//Route::get('/', ['as' => 'home','uses'=>'PageController@home']); 
//Route::get('saludos/{nombre?}', ['as' => 'saludos','uses'=>'PageController@saludos'])-> where ('nombre',"[A-Za-z]+");


//Mensajes
//Route::resource('mensajes','MessagesController');
//Usuarios
//Route::resource('usuarios','UsuariosController');

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('bienvenido', 'BienvenidoController@index')->name('bienvenido'); 

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout'); 

