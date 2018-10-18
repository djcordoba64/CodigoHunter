<?php

namespace App\Http\Controllers;


use DB;
use App\Message;
use Carbon\Carbon;

use Illuminate\Http\Request;


class MessagesController extends Controller
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
       
        $messages=Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a la vista crete.blade(formulario).Primero se define la carpeta seguido del punto y el método del controlador.
        return view('messages.create');
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
         Message::create($request->all());
        //Redirrecionar
       return redirect()->route('mensajes.index');
         
        
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
        $message= Message::findOrFail($id);
        
        return view('messages.show', compact('message'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $message= Message::findOrFail($id);
        return view ('messages.edit',compact('message'));
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
        $message= Message::findOrFail($id)->update($request->all());
        //rEDIRECCIONAMOS
        return redirect()->route('mensajes.index');
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
        $message= Message::findOrFail($id)->delete();

        //Redireccionar
        return redirect()->route('mensajes.index');
    }
}
