<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    
    //Definimos sólo los campos que deseamos que el usuario ingrese
    protected $fillable=[
    	'primerNombre',
    	'segundoNombre',
    	'primerApellido',
    	'segundoApellido',
    	'documentoIdentidad',
        'fechaNacimiento',
        'sexo',
    	'correo',
    	'numeroContacto',
    	'direccion',
    	'usuario',
    	'rol',
    	'contrasena',
    	'estado'
    ];
}
