<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //Definimos sólo los campos que deseamos que el usuario ingrese
    protected $fillable=['nombre','email','mensaje'];
}
