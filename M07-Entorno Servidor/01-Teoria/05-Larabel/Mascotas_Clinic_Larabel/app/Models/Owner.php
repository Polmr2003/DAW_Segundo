<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    // tabla donde estan los owners en la base de datos
    protected $table = 'owners';

    // primaryKey de la tabla owners
    protected $primaryKey = 'id';

    // campos que se pueden editar de la tabla
    protected $fillable = ['name', 'telefono'];



    /**
     * Get the possible enum values for status.
     *
     * @return array
     */
    public static function getStatusOptions()
    {
        return ['home', 'dona', 'altra'];
    }

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
    //     return $this->hasMany(User::class, 'foreing_key', 'id_local');
    // }

    
    // Para determinar una relacion uno a uno
    // public function uno_a_uno(){
    //     // utilizamos el metodo belongsTo para determinar una ralacion uno a muchos
    //     // se utiliza asi: belongsTo(Classe de la que nos tenemos que relacionar::class, 'foreing_key con la clase relacionada', 'id de la clase en la que estamos')
    //     return $this->belongsTo(User::class, 'foreing_key', 'id_local');
    // }

    

    

}
