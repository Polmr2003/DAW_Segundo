<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $table = 'boards';

    // campos que se pueden editar de la tabla
    protected $fillable = ['title'];

    // funcion uno a muchos con Trellolist
    public function List()
    {
        return $this->hasMany(Trellolist::class);
    }


}
