<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // Para determinar una relacion muchos a muchos
    // public function muchos_a_muchos(){
    //     // utilizamos el metodo belongsToMany para determinar una ralacion muchos a muchos, tambien hay que ponerla en el model de la otra clase
    //     // se utiliza asi: belongsToMany(Classe de la que nos tenemos que relacionar::class, 'tabla con las relaciones en las que mostramos')
    //     return $this->belongsToMany(User::class, 'muchos_a_muchos');
    // }

    // Para determinar una relacion uno a muchos
    // public function uno_a_muchos(){
    //     // utilizamos el metodo hasMany para determinar una ralacion uno a muchos
    //     // se utiliza asi: hasMany(Classe de la que nos tenemos que relacionar::class, 'foreing_key con la clase relacionada', 'id de la clase en la que estamos')
    //     return $this->hasMany(User::class);
    // }


    // Para determinar el reverso de la relacion uno a uno o uno a muchos
    // public function uno_a_uno(){
    //     // utilizamos el metodo belongsTo para determinar una ralacion muchos a uno o uno a uno
    //     // se utiliza asi: belongsTo(Classe de la que nos tenemos que relacionar::class, 'foreing_key con la clase relacionada', 'id de la clase en la que estamos')
    //     return $this->belongsTo(User::class);
    // }

}
