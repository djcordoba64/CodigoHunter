<?php

namespace App\Http\Controllers\Auth;
use Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(){
    //validamos los campos usuario(Número de identificación) y la contraseña
      $credentials =  $this->validate(request(),
        [
            'usuario'=>'required|string',
            'contrasena'=>'required|string',
        ]);

             //return $credentials;
        //iniciar sesion del usuario devuelve un valor true o false
       if (Auth::attempt(  $credentials)){
       return 'Bienvenido';
       }
       //return 'error';
      return back()
       ->withErrors(['contrasena'=> 'El susuario y contraseña no coinciden con los registros'])
      ->withInput(request(['usuario']));//carga los datos ingresados del input.

   } 
}
