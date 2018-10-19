<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BienvenidoController extends Controller
{
    /public function __construct(){
      //usuarios autenticados 
      $this->middleware('auth');
    }


     public function index()
    {
        return view('bienvenido');
    }
}
