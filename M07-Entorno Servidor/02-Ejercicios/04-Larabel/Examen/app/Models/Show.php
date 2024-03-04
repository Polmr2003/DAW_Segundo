<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    // tabla donde estan los owners en la base de datos
    protected $table = 'show';

    // campos que se pueden editar de la tabla
    protected $fillable = ['name', 'fecha', 'idioma', 'precio', 'valoracion'];



    // /**
    //  * Get the possible enum values for status.
    //  *
    //  * @return array
    //  */
    // public static function getStatusOptions()
    // {
    //     return ['home', 'dona', 'altra'];
    // }
}
