<?php

namespace App\Http\Controllers\Auth;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Persona;

class LoginController extends Controller
{
 
    public function __construct(){
      //solo podemos acceder al login si somos usuarios no autenticados.
      
      $this->middleware('guest' , ['only' =>'showLoginForm']);
    }

    public function showLoginForm(){

      return view('auth.login');
    }

    public function login(){
    //validamos los campos usuario(Número de identificación) y la contraseña
      $credentials =  $this->validate(request(),
        [
            'usuario'=>'required|string',
            'contrasena'=>'required|string',
        ]);


        //Se hace la consulta en la base de datos utilizando (Eloquent)
      $existe = Persona::Where(['usuario' => request(['usuario'])])->Where(['contrasena' => request(['contrasena'])])->count();
      if ($existe>0){
        //return "HOla";
         return redirect()->route('bienvenido');
       }
       return 'error';
      //return back()
      //->withErrors(['contrasena'=> 'El susuario y contraseña no coinciden con los registros'])
      //->withInput(request(['usuario']));//carga los datos ingresados del input.

   } 

   public function logout(){
    Auth::logout();
    return redirect('/');
  }
}



