<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trellolist extends Model
{
    use HasFactory;

    protected $table = 'trellolists';

    // campos que se pueden editar de la tabla
    protected $fillable = ['title'];

    // funcion reversa de uno a muchos con Board
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    // funcion uno a muchos con Cards
    public function Card()
    {
        return $this->hasMany(Card::class);
    }
}
