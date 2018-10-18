<?php

namespace App\Http\Controllers;
use DB;
use App\Persona;
use Carbon\Carbon;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
   //function __construct(){
     //  $this->middleware('auth',['except' =>['create','store']]);
    //}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pedimos todos los datos de la tabla
       
        $usuarios=Persona::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a la vista crete.blade(formulario).Primero se define la carpeta seguido del punto y el método del controlador.
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //---------------------------------------------------------------------
    
    //Méto que se encarga de guardar los mensajes en la BD y redirecciona.
    public function store(Request $request)
    {      
        //Guardar mensaje con el método Eloquent(1. Modelo).
         Persona::create($request->all());
        //Redirrecionar
       return redirect()->route('usuarios.index');
         
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //--------------------------------------------------------------------
    //mostrar el detalle de un mensaje de la tabla(pasandole un parámetro)
    public function show($id)
    {
        $usurio= Persona::findOrFail($id);
        
        return view('usuarios.show', compact('usuario'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $usuario= Persona::findOrFail($id);
        return view ('usuario.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //ACTUALIZAMOS    
        $usuario= Persona::findOrFail($id)->update($request->all());
        //rEDIRECCIONAMOS
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar mensaje 1. Consultamos mensaje
        $usuario= Message::findOrFail($id)->delete();

        //Redireccionar
        return redirect()->route('usuarios.index');
    }
}
