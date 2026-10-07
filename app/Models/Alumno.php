<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //esto es el modelo que corresponde a la migración de Alumno
    //el nombre del ORM de Laravel es Eloquent

    //nombre de la tabla
    protected $table = 'alumno';
    
    //campos que hay que rellenar antes de guardar un objeto en la base de datos
    protected $fillable = ['nombre', 'apellidos', 'fnac', 'genero', 'nacceso'];
}