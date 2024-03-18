<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // tabla donde estan los comentarios en la base de datos
    protected $table = 'comments';

    // campos que se pueden editar de la tabla
    protected $fillable = ['show_id', 'titulo', 'descripcion', 'fecha', 'autor'];

    // para que no de error de timestamps
    public $timestamps = false;
    
    // funcion reversa de uno a muchos con show
    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
