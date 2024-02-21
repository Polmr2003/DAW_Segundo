<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    // tabla donde estan los owners en la base de datos
    protected $table = 'owners';

    // primaryKey de la tabla owners
    protected $primaryKey = 'id';

    // campos que se pueden editar de la tabla
    protected $fillable = ['name', 'telefono'];

}
