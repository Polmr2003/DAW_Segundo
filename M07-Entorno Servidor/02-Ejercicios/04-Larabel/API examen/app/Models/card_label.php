<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card_label extends Model
{
    use HasFactory;

    protected $table = 'card_labels';

    // campos que se pueden editar de la tabla
    protected $fillable = ['card_id', 'label_id'];
}
