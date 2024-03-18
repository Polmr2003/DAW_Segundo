<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    // tabla donde estan las categorias en la base de datos
    protected $table = 'categories';

    // campos que se pueden editar de la tabla
    protected $fillable = ['categoria'];

    // para que no de error de timestamps
    public $timestamps = false;

    // funcion muchos a muchos con shows
    public function shows()
    {
        return $this->belongsToMany(Show::class, 'show_categories');
    }
}
