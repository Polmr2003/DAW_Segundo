<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $table = 'labels';

    // campos que se pueden editar de la tabla
    protected $fillable = ['title'];

    // funcion muchos a muchos con card
    public function card()
    {
        return $this->belongsToMany(Card::class, 'card_labels');
    }
}
