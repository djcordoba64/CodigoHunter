<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;
 
class PageController extends Controller
{   
    public function home(){
      return view('home');
       
    }

    public function saludos($nombre="Invitado"){
       
        $html="<h2>Contenido html</h2>";
        $script="<script>alert('Problema XSS-Cross Site Scripting!')</script>";//ingresado por el formulario

        $consolas=[
        "Play Station4",
        "Xbox One",
        "Wii U"
        ];

        return view ('saludo', compact('nombre','html','script','consolas'));
    }

    public function mensajes(CreateMessageRequest $request){
        //se procesan los datos del formulatrio
        return $request->all();
        
    }

    
}
