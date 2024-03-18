<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    // tabla donde estan los shows en la base de datos
    protected $table = 'shows';

    // campos que se pueden editar de la tabla
    protected $fillable = ['nombre', 'duracion', 'fechas', 'idiomas', 'precio', 'valoracion'];

    // para que no de error de timestamps
    public $timestamps = false;

    // funcion muchos a muchos con categorias
    public function categorias()
    {
        return $this->belongsToMany(Categories::class, 'show_categories');
    }

    // funcion uno a muchos con comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
