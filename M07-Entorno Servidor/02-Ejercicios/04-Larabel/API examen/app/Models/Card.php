<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table = 'cards';

    // campos que se pueden editar de la tabla
    protected $fillable = ['title', 'content', 'trellolist_id'];

    // funcion muchos a muchos con shows
    public function label()
    {
        return $this->belongsToMany(Label::class, 'card_labels');
    }

    // funcion reversa de uno a muchos con Trellolist
    public function list()
    {
        return $this->belongsTo(Trellolist::class);
    }

}
