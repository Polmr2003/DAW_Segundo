<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class show_categories extends Model
{
    use HasFactory;
    // tabla donde estan los comentarios en la base de datos
    protected $table = 'show_categories';

    // campos que se pueden editar de la tabla
    protected $fillable = ['show_id', 'categories_id'];

    // para que no de error de timestamps
    public $timestamps = false;
}
